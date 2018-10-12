<?php
require_once "RegisterForm.class.php";

class RegisterCtrl{
	private $form;

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new RegisterForm();
	}

	public function validate() {
		$this->form->login = getFromRequest('login',true,'Błędne wywołanie systemu');
		$this->form->pass = getFromRequest('pass',true,'Błędne wywołanie systemu');

		//nie ma sensu walidować dalej, gdy brak parametrów
		if (getMessages()->isError()) return false;

		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if (empty($this->form->login)) {
			getMessages()->addMessage(new Message('Nie podano loginu',Message::ERROR));
		}
		if (empty($this->form->pass)) {
			getMessages()->addMessage(new Message('Nie podano hasła',Message::ERROR));
		}

		//nie ma sensu walidować dalej, gdy brak wartości
		if (getMessages()->isError()) return false;

		$user = getDB()->count("users", ["login" => $this->form->login]);

		if ($user > 0) {
			getMessages()->addMessage(new Message('Użytkownik o takim loginie istnieje', Message::ERROR));
		}
		else {
			//dodaj usera
			try {
				getDB()->insert("users", [
					"login" => $this->form->login,
					"haslo" => $this->form->pass
				]);
				$user_id = getDB()->id(); //id by dodać domyślną rolę użytkownikowi

				$default_user_role = 2;

				getDB()->insert("user_roles", [
					"ID_user" => $user_id,
					"ID_role" => $default_user_role
				]);
			} catch (Exception $e) {
				getMessages()->addMessage(new Message('Coś poszło nie tak przy dodawaniu usera: '.$e->getMessage(), Message::ERROR));
			}



		}

		return ! getMessages()->isError();
	}

	public function doRegister(){
		if ($this->validate()){
			//zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			getMessages()->addMessage(new Message('Utworzono konto',Message::INFO));
			storeMessages();
			redirectTo("gameList");
		} else {
			//niezalogowany => pozostań na stronie rejestracji
			$this->generateView();
		}
	}

	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		getSmarty()->display(getConf()->root_path.'/app/register/RegisterView.html');
	}
}
