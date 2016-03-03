<?php
/**
 * bookscontroller.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */



function index(){
    include ('books.php');
    $books = getBooks();
    $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

    return ['books' => $books, 'view' => $view];
}


function show()
{
    include ('books.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $book = getBook($id);
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['book' => $book, 'view' => $view];

    } else {
        die('Il manque l‘identifiant de votre livre');
    };
}


?>