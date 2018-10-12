<?php
require_once 'init.php';
// Po załadowaniu skryptu 'init.php' w całej aplikacji dostępne są obiekty:
// konfiguracji, smarty, messages oraz bazy danych Medoo (Smarty i Medoo ładowane i tworzone w momencie pierwszego użycia)
// za pomocą funkcji: getConf(), getSmarty(), getMessages() oraz getDB()
// dodatkowo szereg przydatnych funkcji:
// - getFromRequest(), getFromSession(), getFromCookies(), getFromPost(), getFromGet()
// pozwalają one od razu wygenerowac błąd (Message) gdy parametr jest wymagany
// - forwardTo(), redirectTo() czyli przekazanie żądania lub przekierowanie przeglądarki do podanej akcji
// - addRole(), inRole() czyli możliwość zapisania nazwy ról uzytkwnika w sesji i sprawdzenie czy użytkownik jest w danej roli
// - funkcja control() upraszczająca wywołanie metody wskazanego kontrolera ze zintegrowaną ochroną (na podstawie roli)
// - funkcje pozwalające na przechowywanie Messages, obiektów i danych w sesji: storeMessages/loadMessages, storeObject/loadObject, storeData/loadData
// - funkcja validateDate() sprawdzająca poprawność daty (walidator)
// - jest również dostępna zmienna $action inicjowana z parametru żądania

getConf()->login_action = 'loginShow'; // akcja przekierowania dla chronionej zawartości gdy użytkownik nie zalogowany

switch ($action) {
    case 'loginShow':
        control('/app/login/', 'LoginCtrl', 'generateView'); // publiczna
    case 'login':
        control('/app/login/', 'LoginCtrl', 'doLogin'); // publiczna
    case 'logout':
        control('/app/login/', 'LoginCtrl', 'doLogout'); // publiczna
    case 'registerShow':
        control('/app/register/', 'RegisterCtrl', 'generateView'); // publiczna
    case 'register':
        control('/app/register/', 'RegisterCtrl', 'doRegister'); // publiczna
    case 'gameNew':
        control('/app/games/edit/', 'gameEditCtrl', 'generateView', 'admin'); //rola user
    case 'devNew':
        control('/app/dev/', 'DevCtrl', 'addDev', 'admin'); //rola admin
    case 'devSave':
        control('/app/dev/', 'DevCtrl', 'devSave', 'admin'); //rola admin
    case 'gameEdit':
        control('/app/games/edit/', 'gameEditCtrl', 'goEdit', 'admin'); //rola user
    case 'gameSave':
        control('/app/games/edit/', 'gameEditCtrl', 'goSave', 'admin'); //rola user
    case 'gameDelete':
        control('/app/games/edit/', 'gameEditCtrl', 'goDelete', 'admin'); //rola admin
    case 'gameNote':
        control('/app/games/note/', 'NoteCtrl', 'addNote', 'user'); //rola user i powyzej
    case 'noteSave':
        control('/app/games/note/', 'NoteCtrl', 'noteSave', 'user'); //rola user i powyzej
    case 'gameListPart': //AJAX - wysłanie samej tabeli HTMLowej
        control('/app/games/list/', 'gameListCtrl', 'goShowPart'); // publiczna
    default : //'personList' akcja domyślna
        control('/app/games/list/', 'gameListCtrl', 'goShow'); // publiczna
}
