<?php
/**
 * Created by PhpStorm.
 * User: Panda
 * Date: 25.09.2017
 * Time: 20:26
 */

require_once "NoteAddForm.class.php";
class NoteCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new NoteAddForm();
    }

    public function addNote()
    {
        $this->form->id_game = getFromRequest('id_game',true,'Błędne wywołanie aplikacji - nazwa');
        $this->generateView();
    }

    public function validateSave()
    {
        //return true if not empty
        $this->form->id = getFromRequest('ID',true,'Błędne wywołanie aplikacji - id');
        $this->form->note = getFromRequest('note',true,'Błędne wywołanie aplikacji - nazwa');
        $this->form->id_game = getFromRequest('id_game',true,'Błędne wywołanie aplikacji - nazwa');
        return !empty($this->form->note) && !empty($this->form->id_game);
    }

    public function noteSave()
    {
        if ($this->validateSave()) {
            //2.1 Nowy rekord
            if ($this->form->id == '') {
                //dodaj rekord
                $gameAlreadyRated = getDB()->count("oceny", ["id_user" => getUserId(), "id_game" => $this->form->id_game]) > 0;
                if ($gameAlreadyRated)
                {
                    getMessages()->addMessage(new Message('Gra już została oceniona!', Message::ERROR));
                    $this->generateView();
                    return;
                }
                getDB()->insert("oceny", [
                    "ocena" => $this->form->note,
                    "id_game" => $this->form->id_game,
                    "id_user" => getUserId()
                ]); //todo: more params
            } else {
                //2.2 Edycja rekordu o danym ID
                getDB()->update("oceny", [
                    "ocena" => $this->form->note
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
        getSmarty()->display(getConf()->root_path . '/app/games/note/addNote.html');
    }
}