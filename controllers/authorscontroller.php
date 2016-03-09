<?php
/**
 * authorscontroller.php
 * Créé par : Jimmy Letecheur
 * Date : 8/03/16
 */

function index(){
    include ('authors.php');
    $authors = getAuthors();
    $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

    return ['authors' => $authors, 'view' => $view];
}

function show(){
    include ('authors.php');
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $author = getAuthor($id);
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['author' => $author, 'view' => $view];

    } else {
        die('Il manque l‘identifiant de votre livre');
    };
}
