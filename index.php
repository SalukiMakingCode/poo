<?php
class Connexion {
    private $login;
    private $pass;
    private $connec;

    public function __construct($db, $login = 'root', $pass=''){
        $this->login = $login;
        $this->pass = $pass;
        $this->db = $db;
        $this->connexion();
    }

    private function connexion() {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname='.$this->db.';charset=utf8', $this->login, $this->pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->connec = $bdd;
        }
        catch (PDOException $e) {
            $msg = 'ERROR PDO in' . $e->getfile() . 'L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }

    }

    public function countTable($sql) {
        $array = $this->connec->query($sql);

        return $array->fetchAll();
    }

}

$db= new Connexion('becode');
$sql = 'SELECT COUNT(*) FROM hiking';
print_r($db->countTable($sql));
?>

<br/>
<a href="helpers1.php">Helpers class 1</a> -
<a href="helpers2.php">Helpers class 2</a> -
<a href="helpers3.php">Helpers class 3</a>


