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

        return $pdoSt->fetchAll();
    }


function getBook($id){ //Reçoit un ID et renvoie un livre en particulier
    $sqlBook = 'SELECT * FROM books WHERE id = :id';
    $pdoSt = $GLOBALS['cn']->prepare($sqlBook);
    $pdoSt->execute([':id'=>$id]);
    return $pdoSt->fetch(); // pour avoir un seul authors
}