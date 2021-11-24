<?php

class DataBase
{
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

    public function addUser($username, $email, $password) {
        $sql = "INSERT INTO user (username, email, password) VALUES
                ('$username', '$email', '$password')";
        $this->connec->exec($sql);
    }

    public function connectUser($username, $password) {
        $sql = "SELECT id, username, email FROM user WHERE username='".$username."' AND password='".$password."'";
        $req = $this->connec->query($sql);
        $row = $req->fetch();
        if (isset($row->username)) {
            if ($row->username == $username) {
                $_SESSION['user'] = $username;
                $_SESSION['id']=$row->id;
                $_SESSION['email']=$row->email;

                return "connexion ok<br/><br/>";
            }
        }
        return "connexion failed<br/><br/>";
    }

    public function setName($username, $id) {
        $sql = "UPDATE user SET username='" . $username . "' WHERE id='".$id."'";
        $this->connec->exec($sql);
        $_SESSION['user'] = $username;
    }

    public function setMail($mail, $id) {
        $sql = "UPDATE user SET email='" . $mail . "' WHERE id='".$id."'";
        $this->connec->exec($sql);
        $_SESSION['email'] = $mail;
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user WHERE id='".$id."'";
        $this->connec->exec($sql);
        session_destroy();
    }

}