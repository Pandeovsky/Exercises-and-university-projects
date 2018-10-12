<?php
require_once getConf()->root_path.'/app/games/list/gameSearchForm.class.php';

class gameListCtrl {

	private $current_page;
	private $form; //dane formularza wyszukiwania
	private $records; //rekordy pobrane z bazy danych

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new gameSearchForm();
	}

	public function validate() {
		// 1. sprawdzenie, czy parametry zostały przekazane
		// - nie trzeba sprawdzać
		$this->form->name = getFromRequest('sf_tytul');
		$this->current_page = getFromRequest('current_page');

		// 2. sprawdzenie poprawności przekazanych parametrów
		// - nie trzeba sprawdzać

		// 3. załaduj messages z sesji, jeśli jest (pozwala przekazywać komunikaty przez redirect)
		loadMessages();

		return ! getMessages()->isError();
	}

	public function process(){
		$games_per_page = 8;
		$page_count = 1;
		// 1. Walidacja danych formularza (z pobraniem)
		// - W tej aplikacji walidacja nie jest potrzebna, ponieważ nie wystąpią błedy podczas podawania nazwiska.
		//   Jednak pozostawiono ją, ponieważ gdyby uzytkownik wprowadzał np. datę, lub wartość numeryczną, to trzeba
		//   odpowiednio zareagować wyświetlając odpowiednią informację (poprzez obiekt wiadomości Messages)
		$this->validate();

		// 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
		$search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
		if ( isset($this->form->name) && strlen($this->form->name) > 0) {
			$search_params['games.tytul[~]'] = $this->form->name.'%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
		}
		if(!isset($this->current_page)){
			$this->current_page = 1;
		}
		// 3. Pobranie listy rekordów z bazy danych

		//przygotowanie frazy where na wypadek większej liczby parametrów
		$num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "AND" => &$search_params ];
		} else {
			$where = &$search_params;
		}
		$total = getDB()->count("games",$where);
		if($total <= $games_per_page){


		$where["GROUP"] = ["games.ID",
		"games.tytul",
		"games.gatunek",
		"games.rok_produkcji",
		"devs.nazwa"];

		//dodanie frazy sortującej po tytule
		$where ["ORDER"] = "tytul";
		$joins = [ "[>]devs" => ["developer" => "ID"], "[>]oceny" => ["ID" => "id_game"] ];
		//wykonanie zapytania
						$this->records = getDB()->query("select games.ID, games.tytul, games.gatunek, games.rok_produkcji, devs.nazwa as developer, avg(oceny.ocena) as ocena from games
				left join oceny on oceny.id_game = games.ID
				left join devs on devs.ID = games.developer
				where games.tytul LIKE :title
				group by games.ID, games.tytul, games.gatunek, games.rok_produkcji, games.developer",
				[":title" => $this->form->name.'%'])->fetchAll();
		}else{
			$page_count = ceil($total/$games_per_page);
			$pomelo = (($this->current_page-1)*$games_per_page);
			$where["LIMIT"]=[$pomelo,$games_per_page];

			$where["GROUP"] = ["games.ID",
			"games.tytul",
			"games.gatunek",
			"games.rok_produkcji",
			"devs.nazwa"];

			//dodanie frazy sortującej po tytule
			$where ["ORDER"] = "tytul";
			$joins = [ "[>]devs" => ["developer" => "ID"], "[>]oceny" => ["ID" => "id_game"] ];
			//wykonanie zapytania
							$this->records = getDB()->query("select games.ID, games.tytul, games.gatunek, games.rok_produkcji, devs.nazwa as developer, avg(oceny.ocena) as ocena from games
					left join oceny on oceny.id_game = games.ID
					left join devs on devs.ID = games.developer
					where games.tytul LIKE :title
					group by games.ID, games.tytul, games.gatunek, games.rok_produkcji, games.developer
					limit :limit, :perpage",
					[":title" => $this->form->name.'%',
					 ":limit" => $pomelo,
				 	 ":perpage" => $games_per_page]);

					}


		if (getDB()->error()[0]!=0){ //jeśli istnieje kod błędu
			getMessages()->addMessage(new Message('Wystąpił błąd podczas pobierania rekordów',Message::ERROR));
			if (getConf()->debug) getMessages()->addMessage(new Message(var_export(getDB()->error(), true),Message::ERROR));
		}

		// 4. dane dla widoku
		getSmarty()->assign('searchForm',$this->form); // dane formularza (wyszukiwania w tym wypadku)
		getSmarty()->assign('games',$this->records);  // lista rekordów z bazy danych

        getSmarty()->assign('cp',$this->current_page);
        getSmarty()->assign('tl',$page_count);
	}

	function goShow(){
		$this->process();
		getSmarty()->display(getConf()->root_path.'/app/games/list/gameList.html');
	}

	function goShowPart(){ //dla AJAX
		$this->process();
		getSmarty()->display(getConf()->root_path.'/app/games/list/gameListPart.html');
	}
}
