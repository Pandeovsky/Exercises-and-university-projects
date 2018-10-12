<?php
require_once "gameEditForm.class.php";

class gameEditCtrl {

	private $form; //dane formularza
	private $dev_list;

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new gameEditForm();
		$this->dev_list = getDB()->select("devs", "*", []);
	}

	//validacja danych przed zapisem (nowe dane lub edycja)

	public function goEdit(){
		// 1. walidacja id osoby do edycji
		if ( $this->validateEdit() ){
		  // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
			$record = getDB()->get("games", "*",[
				"ID" => $this->form->id
			]);
		  // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
			if (getDB()->error()[0]==0){
				$this->form->id = $record['ID'];
				$this->form->name = $record['tytul'];
				$this->form->genre = $record['gatunek'];
				$this->form->birthdate = $record['rok_produkcji'];
				$this->form->dev = $record['developer'];
				//$this->form->note = $record['ocena'];
			} else { //jeśli istnieje kod błędu
				getMessages()->addMessage(new Message('Wystąpił nieoczekiwany błąd podczas odczytu rekordu',Message::ERROR));
				if (getConf()->debug) getMessages()->addMessage(new Message(var_export(getDB()->error(), true),Message::ERROR));
			}
		}

		// 3. Wygenerowanie widoku
		$this->generateView();
	}

	//validacja danych przed wyswietleniem do edycji

	public function validateEdit() {
		//pobierz parametry na potrzeby wyswietlenia danych do edycji
		//z widoku listy osób (parametr jest wymagany)
		$this->form->id = getFromRequest('id',true,'Błędne wywołanie aplikacji');
		return ! getMessages()->isError();
	}

	//wysiweltenie rekordu do edycji wskazanego parametrem 'id'

	public function generateView(){
		getSmarty()->assign('form',$this->form);    // dane formularza do widoku

		getSmarty()->assign('devs',$this->dev_list);
		getSmarty()->display(getConf()->root_path.'/app/games/edit/gameEdit.html');
	}

	public function goDelete(){
		// 1. walidacja id osoby do usuniecia
		if ( $this->validateEdit() ){
		  // 2. usunięcie rekordu
			getDB()->delete("games",[
				"ID" => $this->form->id
			]);
			if (getDB()->error()[0]!=0){ //jeśli istnieje kod błędu
				getMessages()->addMessage(new Message('Wystąpił nieoczekiwany błąd podczas usuwania rekordu',Message::ERROR));
				if (getConf()->debug) getMessages()->addMessage(new Message(var_export(getDB()->error(), true),Message::ERROR));
			} else {
				getMessages()->addMessage(new Message('Pomyślnie usunięto rekord',Message::INFO));
			}
		}

		// 3. Przekierowanie na stronę listy osób
		forwardTo('gameList');
	}

	public function goSave(){

		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie

			//2.1 Nowy rekord
			if ($this->form->id == '') {
				//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
				$count = getDB()->count("games");
				if ($count <= 50) {
					getDB()->insert("devs", ["nazwa" => $this->form->dev]);
					getDB()->insert("games", [
						"tytul" => $this->form->name,
						"gatunek" => $this->form->genre,
						"rok_produkcji" => $this->form->birthdate,
						"developer" => $this->form->dev
					]);
				} else { //za dużo rekordów
					// 3a. Gdy za dużo rekordów to pozostań na stronie
					getMessages()->addMessage(new Message('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.',Message::WARNING));
					$this->generateView(); //pozostań na stronie edycji
					exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
				}
			} else {
			//2.2 Edycja rekordu o danym ID
				getDB()->update("games", [
					"tytul" => $this->form->name,
					"gatunek" => $this->form->genre,
					"rok_produkcji" => $this->form->birthdate,
					"developer" => $this->form->dev
				], [
					"ID" => $this->form->id
				]);
			}
			if (getDB()->error()[0]!=0){ //jeśli istnieje kod błędu
				getMessages()->addMessage(new Message('Wystąpił nieoczekiwany błąd podczas zapisu rekordu',Message::ERROR));
				if (getConf()->debug) getMessages()->addMessage(new Message(var_export(getDB()->error(), true),Message::ERROR));
			} else {
				getMessages()->addMessage(new Message('Pomyślnie zapisano rekord',Message::INFO));
			}
			// 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
			forwardTo('gameList');
		} else {
			// 3c. Gdy błąd to pozostań na stronie
			$this->generateView();
		}
	}

	public function validateSave() {
		//0. Pobranie parametrów z walidacją
		$this->form->id = getFromRequest('ID',true,'Błędne wywołanie aplikacji - id');
		$this->form->name = getFromRequest('tytul',true,'Błędne wywołanie aplikacji - nazwa');
		$this->form->genre = getFromRequest('gatunek',true,'Błędne wywołanie aplikacji - gatunek');
		$this->form->birthdate = getFromRequest('rok_produkcji',true,'Błędne wywołanie aplikacji - rok produkcji');
		$this->form->dev = getFromRequest('developer',true,'Błędne wywołanie aplikacji - developer');
		//$this->form->note = getFromRequest('ocena',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		// 1. sprawdzenie czy wartości wymagane nie są puste
		if (empty(trim($this->form->name))) {
			getMessages()->addMessage(new Message('Wprowadź Tytuł',Message::ERROR));
		}
		if (empty(trim($this->form->genre))) {
			getMessages()->addMessage(new Message('Wprowadź Gatunek',Message::ERROR));
		}
		if (empty(trim($this->form->birthdate))) {
			getMessages()->addMessage(new Message('Wprowadź datę wydania',Message::ERROR));
		}
		if (empty(trim($this->form->dev))) {
			getMessages()->addMessage(new Message('Wprowadź Developera',Message::ERROR));
		}
		if ( getMessages()->isError() ) return false;

		// 2. sprawdzenie poprawności przekazanych parametrów
		if ( ! validateDate($this->form->birthdate,'Y-m-d') ){
			getMessages()->addMessage(new Message('Zły format daty. Poprawny format daty: Rok/Miesiąc/Dzień',Message::ERROR));
		}

		return ! getMessages()->isError();
	}
}
