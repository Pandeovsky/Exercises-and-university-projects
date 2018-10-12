<?php
require_once "LoginForm.class.php";

class LoginCtrl{
	private $form;

	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
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

		// sprawdzenie, czy dane logowania poprawne
		// (takie informacje najczęściej przechowuje się w bazie danych)
		$joins = [
							"[>]user_roles" => ["ID" => "ID_user"],
							"[>]role" => ["user_roles.ID_role" => "ID"]
						];
		$role = getDB()->get("users", $joins, ["role.rola", "users.ID"], ["login" => $this->form->login, "haslo" => $this->form->pass]);

		if (!empty($role['rola']))
		{
			//zalogowany - dostajesz role, o ile haslo i login jest poprawny
			addRole($role['rola']);
			setUserId($role['ID']);
		}
		else {
			getMessages()->addMessage(new Message('Niepoprawny login lub hasło',Message::ERROR));
		}
	/*if ($this->form->login == "admin" && $this->form->pass == "admin") {
			addRole('user');
			addRole('admin');
		} else if ($this->form->login == "user" && $this->form->pass == "user") {
			addRole('user');
		} else {
			getMessages()->addMessage(new Message('Niepoprawny login lub hasło',Message::ERROR));
		}
*/
		return ! getMessages()->isError();
	}

	public function doLogin(){
		if ($this->validate()){
			//zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
			getMessages()->addMessage(new Message('Poprawnie zalogowano do systemu',Message::INFO));
			storeMessages();
			redirectTo("gameList");
		} else {
			//niezalogowany => pozostań na stronie logowania
			$this->generateView();
		}
	}

	public function doLogout(){
		// 1. zakończenie sesji
		session_destroy();
		// 2. idź na stronę główną (z przekazaniem messages przez sesję)
		session_start(); //rozpocznij nową sesję w celu przekazania messages w sesji
		getMessages()->addMessage(new Message('Poprawnie wylogowano z systemu',Message::INFO));
		storeMessages();
		redirectTo('gameList');
	}

	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza do widoku
		getSmarty()->display(getConf()->root_path.'/app/login/LoginView.html');
	}
}
