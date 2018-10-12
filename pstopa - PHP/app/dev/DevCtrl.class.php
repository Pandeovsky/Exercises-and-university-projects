<?php
/**
 * Created by PhpStorm.
 * User: Panda
 * Date: 25.09.2017
 * Time: 19:42
 */

require_once getConf()->root_path . '/app/dev/DevAddForm.class.php';

class DevCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new DevAddForm();
    }

    public function addDev()
    {
        $this->generateView();
    }

    public function validateSave()
    {
        //return true if not empty
        $this->form->id = getFromRequest('ID',true,'Błędne wywołanie aplikacji - id');
        $this->form->name = getFromRequest('dev',true,'Błędne wywołanie aplikacji - nazwa');
        return !empty($this->form->name);
    }

    public function devSave()
    {
        if ($this->validateSave()) {

            //2.1 Nowy rekord
            if ($this->form->id == '') {
                //dodaj rekord
                getDB()->insert("devs", ["nazwa" => $this->form->name]);
            } else {
                //2.2 Edycja rekordu o danym ID
                getDB()->update("devs", [
                    "nazwa" => $this->form->name
                ], [
                    "ID" => $this->form->id
                ]);
            }
            if (getDB()->error()[0] != 0) { //jeśli istnieje kod błędu
                getMessages()->addMessage(new Message('Wystąpił nieoczekiwany błąd podczas zapisu rekordu', Message::ERROR));
                if (getConf()->debug) getMessages()->addMessage(new Message(var_export(getDB()->error(), true), Message::ERROR));
            } else {
                getMessages()->addMessage(new Message('Pomyślnie zapisano rekord', Message::INFO));
            }
            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            forwardTo('gameList');
        } else {
            // 3c. Gdy błąd to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView()
    {
        getSmarty()->assign('form', $this->form);
        getSmarty()->display(getConf()->root_path . '/app/dev/addDev.html');
    }
}