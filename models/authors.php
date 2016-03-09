<?php
/**
 * authors.php
 * Créé par : Jimmy Letecheur
 * Date : 8/03/16
 */

function getAuthors(){
    $sqlAuthors = 'SELECT * FROM authors';
    $pdoSt = $GLOBALS['cn']->query($sqlAuthors);

    return $pdoSt->fetchAll(); // pour avoir tous les authors
}

function getAuthor($id){ //Reçoit un ID et renvoie un livre en particulier
    $sqlAuthor = 'SELECT * FROM authors WHERE id = :id';
    $pdoSt = $GLOBALS['cn']->prepare($sqlAuthor);
    $pdoSt->execute([':id'=>$id]);
    return $pdoSt->fetch(); // pour avoir un seul authors
}