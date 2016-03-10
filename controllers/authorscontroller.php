<?php
/**
 * authorscontroller.php
 * Créé par : Jimmy Letecheur
 * Date : 8/03/16
 */

class AuthorsController{

    private $authors_model = null;

    public function __construct()
    {
        $this->authors_model = new Authors();
    }

    function index()
    {
        $authors = $this->authors_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['authors' => $authors, 'view' => $view];
    }

    function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $authors = $this->authors_model->find($id);
            $view = 'show_authors.php';
            $page_title = 'La fiche du livre&nbsp;:' . ' ' . $authors->name;

            return ['author' => $authors, 'view' => $view, 'page_title' => $page_title];

        } else {
            die('Il manque l‘identifiant de votre livre');
        };
    }
}


