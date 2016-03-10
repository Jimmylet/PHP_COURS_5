<?php

/**
 * bookscontroller.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */
class BooksController
{

    private $books_model = null;

    public function __construct()
    {
        $this->books_model = new Books();
    }

    public function index()
    {
        $books = $this->books_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['books' => $books, 'view' => $view];
    }


    public function show()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $books = $this->books_model->find($id);
            $view = 'show_books.php';
            $page_title = 'La fiche du livre&nbsp;:' . ' ' . $books->title;

            return ['book' => $books, 'view' => $view, 'page_title' => $page_title];

        } else {
            die('Il manque l‘identifiant de votre livre');
        };
    }

}


