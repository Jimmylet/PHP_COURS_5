<?php
/**
 * File: editorscontroller.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:15
 */

class EditorsController{

    private $editors_model = null;

    public function __construct()
    {
        $this->editors_model = new Editors();
    }

    function index(){
        $editors= $this->editors_model->all();
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['editors'=>$editors,'view'=>$view];
    }
    function show(){

        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $editors = $this->editors_model->find($id);
            $view = 'show_editors.php';
            $page_title = 'La fiche du livre&nbsp;:' . ' ' . $editors->name;
            return['editor'=>$editors,'view'=>$view, 'page_title' => $page_title];
        }else {
            die('il manque un identifiant a votre livre');
        }
    }

}

