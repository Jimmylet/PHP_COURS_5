<?php
/**
 * File: editorscontroller.php
 * User: Dylan Schirino
 * Date: 5/03/16
 * Time: 12:15
 */
function index(){
    include ('editors.php');
    $editors=getEditors();
    $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
    return['editors'=>$editors,'view'=>$view];
}
function show(){
    include ('editors.php');

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $editor = getEditor($id);
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['editor'=>$editor,'view'=>$view];
    }else {
        die('il manque un identifiant a votre livre');
    }
}