<?php
/**
 * index.php
 * Créé par : Jimmy Letecheur
 * Date : 3/03/16
 */


$viewsDir = __DIR__.'/views'; //on doit mettre le chemin depuis la ra cine de l'ordinateur
set_include_path($viewsDir . PATH_SEPARATOR . get_include_path()); // chemin d'inclusions pour éviter d'écrire views/nomdufichier (et séparateur de chemin de l'ordi)

$dbConfig = parse_ini_file('dd.ini'); // variable pour par parcourir et extraire l'informations du fichier
$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    // permet de choisir entre PDO donne des tableaux associatifs ou des tableaux d'objets
    // permet d'écrire $book->title aulieu de book=['title']
];

try { // code que l'on va essayer d'éxécuter. Il lancer une exception et il faut l'attraper.
    $dsn = sprintf('%s:dbname=%s;host=%s', $dbConfig['driver'], $dbConfig['dbname'], $dbConfig['host']);
    $cn = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $pdoOptions); // NOTRE OBJET PDO
    $cn->exec('SET CHARACTER SET UTF8'); // executer la requête SET CHARACTER SET UTF8
    $cn->exec('SET NAMES UTF8');
    /*variable pour la connexion, dans lequel on instancie un objet pdo. On lui donne le nom de la base de donnée mysql. On lui donne
    le nom d'utilisateur et le mot de passe.
    //var_dump($cn)
    //doit donner un résultat object(PDO)#1*/
} catch (PDOException $exception) {//attraper l'exception. Ici on ne peut stocker qu'un objet de PDOException, c'est le typage.
    die($exception->getMessage()); // -> est l'équivalent du point en JS. On va chercher une propriété particulière d'un objet.
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqlBook = 'SELECT * FROM books WHERE id = :id';
    $pdoSt = $cn->prepare($sqlBook);
    $pdoSt->execute([':id'=>$id]);
    $book = $pdoSt->fetch();
    $view = 'singlebook.php';
}else{
    // Essayer de réccupérer la liste des titres des livres
    $sqlBooks = 'SELECT * FROM books';
    $pdoSt = $cn->query($sqlBooks);
    $books = $pdoSt->fetchAll();
    $view = 'allbooks.php';
};


include('view.php');

?>
