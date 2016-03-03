<?php
/**
 * books.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */

    function getBooks(){ //renvoie une série de livre
        // Essayer de réccupérer la liste des titres des livres
        $sqlBooks = 'SELECT * FROM books';
        $pdoSt = $GLOBALS['cn']->query($sqlBooks);
        $books = $pdoSt->fetchAll();
        $view = 'allbooks.php';
        return ['books'=>$books, 'view'=>$view];
    }


function getBook($id){ //Reçoit un ID et renvoie un livre en particulier
    $sqlBook = 'SELECT * FROM books WHERE id = :id';
    $pdoSt = $GLOBALS['cn']->prepare($sqlBook);
    $pdoSt->execute([':id'=>$id]);
    $book = $pdoSt->fetch();
    $view = 'singlebook.php';

    return ['book'=>$book, 'view'=>$view];
}