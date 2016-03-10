<?php
/**
 * index.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */


$viewsDir = __DIR__.'/views'; //on doit mettre le chemin depuis la ra cine de l'ordinateur
$modelsDir = __DIR__.'/models';
$controllerDir = __DIR__.'/controllers';
set_include_path($viewsDir . PATH_SEPARATOR . $modelsDir . PATH_SEPARATOR . $controllerDir . PATH_SEPARATOR . get_include_path()); // chemin d'inclusions pour éviter d'écrire views/nomdufichier (et séparateur de chemin de l'ordi)

spl_autoload_register(function($class){
    include($class . '.php');
});

$dbConfig = parse_ini_file('dd.ini'); // variable pour par parcourir et extraire l'informations du fichier
$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    // permet de choisir entre PDO donne des tableaux associatifs ou des tableaux d'objets
    // permet d'écrire $book->title aulieu de book=['title']
];

spl_autoload_register(function($class){
    include($class .'php');
});

// Essayer de faciliter la logique qui nous mène à produire les données en essayant d'établir une convention
// qui est basée sur la définition d'une entité.
include ('routes.php');
$defaultRoute = $routes['default'];
$routeParts = explode('_',$defaultRoute);

$a = isset($_REQUEST['a'])?$_REQUEST['a']:$routeParts[0]; // index=lister les livres
$e = isset($_REQUEST['e'])?$_REQUEST['e']:$routeParts[1];
if(!in_array($a.'_'.$e, $routes)){
    ///redirection 404
    die('Ce que vou cherchez n‘est pas ici');
}


$controller_name = ucfirst($e).'Controller'; //on met ici le nom de la class. ucfirst mets la premiere lettre en majuscule.
$controller = new $controller_name();


$data = call_user_func([$controller, $a]);

include('view.php');
