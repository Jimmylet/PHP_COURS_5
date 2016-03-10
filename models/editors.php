<?php

function getEditors(){ //renvoie une série de livre
    // Essayer de réccupérer la liste des titres des livres
    $sqlEditors = 'SELECT * FROM editors';
    $pdoSt = $GLOBALS['cn']->query($sqlEditors);

    return $pdoSt->fetchAll();
}
function getEditor($id)
{
    $sqlEditor = 'SELECT * FROM editors WHERE id = :id'; //on récupere un livre en particulier sur base de son ID
    $pdoSt = $GLOBALS['cn'] -> prepare($sqlEditor);
    $pdoSt -> execute([':id'=>$id]);// on execute en remplacant par la valeur recupere dans l'url de $id
    return $pdoSt->fetch();

}