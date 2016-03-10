<?php
/**
 * model.php
 * Créé par : Jimmy Letecheur
 * Date : 10/03/16
 */

class Model
{

    protected $table = '';
    protected $cn = null;

    public function __construct()
    {
        $dbConfig = parse_ini_file('dd.ini'); // variable pour par parcourir et extraire l'informations du fichier
        $pdoOptions = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // permet de choisir entre PDO donne des tableaux associatifs ou des tableaux d'objets
            // permet d'écrire $book->title aulieu de book=['title']
        ];

        try { // code que l'on va essayer d'éxécuter. Il lancer une exception et il faut l'attraper.
            $dsn = sprintf('%s:dbname=%s;host=%s', $dbConfig['driver'], $dbConfig['dbname'], $dbConfig['host']);
            $this->cn = new PDO($dsn, $dbConfig['username'], $dbConfig['password'], $pdoOptions); // NOTRE OBJET PDO
            $this->cn->exec('SET CHARACTER SET UTF8'); // executer la requête SET CHARACTER SET UTF8
            $this->cn->exec('SET NAMES UTF8');
            /*variable pour la connexion, dans lequel on instancie un objet pdo. On lui donne le nom de la base de donnée mysql. On lui donne
            le nom d'utilisateur et le mot de passe.
            //var_dump($cn)
            //doit donner un résultat object(PDO)#1*/
        } catch (PDOException $exception) {//attraper l'exception. Ici on ne peut stocker qu'un objet de PDOException, c'est le typage.
            die($exception->getMessage()); // -> est l'équivalent du point en JS. On va chercher une propriété particulière d'un objet.
        }
    }

    public function all(){
        $sqlAuthors = sprintf('SELECT * FROM %s',$this->table);
        $pdoSt = $this->cn->query($sqlAuthors);

        return $pdoSt->fetchAll(); // pour avoir tous les authors
    }

    public function find($id){ //Reçoit un ID et renvoie un livre en particulier
        $sql = sprintf('SELECT * FROM %s WHERE id = :id',$this->table);
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id'=>$id]);
        return $pdoSt->fetch(); // pour avoir un seul authors
    }

}