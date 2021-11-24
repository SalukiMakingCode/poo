<?php
require 'DataBase.php';
class User
{
  private $id;
  private $username;
  private $email;
  private $password;
  private $connected;

    public function create($username, $email, $password) {
        if ($this->verifyNewUser($username, $email, $password) != "ok") {
            return $this->verifyNewUser($username, $email, $password);
        }

        $db= new DataBase('poo');
        $db->addUser($username, $email, $password);

        return "User added<br/><br/>";
    }

    private function verifyNewUser($username, $email, $password) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        if (!$username) return "Error : username not good<br/><br/>";

        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) return "Error : email not good<br/><br/>";

        $password = filter_var($password, FILTER_SANITIZE_STRING);
        if (!$password) return "Error : password not good<br/><br/>";

        return "ok";
    }

    public function connectUser($username, $password) {
        $db= new DataBase('poo');
        return $db->connectUser($username, $password);
    }

    public function disconnectUser() {
        session_destroy();
    }

    public function setName($username, $id) {
        $db= new DataBase('poo');
        return $db->setName($username, $id);
    }

    public function deleteUser($id) {
        $db= new DataBase('poo');
        $db->deleteUser($id);
    }

    public function setMail($mail, $id) {
        $mail = filter_var($mail, FILTER_SANITIZE_STRING);
        $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!$mail) return;
        $db= new DataBase('poo');
        return $db->setMail($mail, $id);
    }

    public function displayConnect($disconnect) {
        if (isset($_SESSION['user']) && !$disconnect) return $_SESSION['user']." - id : ".$_SESSION['id']." - mail : ".$_SESSION['email']."
        <form action='exo3.php' method='post'>
            <input type='hidden' name='type' value='disconnect'>
            <input type='submit' value='Disconnect' />
        </form><br/><br/>
        -------------------------------<br/>
        Changer de nom :<br/>
        <form action='exo3.php' method='post'>
            <input type='hidden' name='type' value='nameChange'>
            <input type='text' name='username'/><br/>
            <input type='submit' value='change your name' />
        </form><br/><br/>
        -------------------------------<br/>
        Changer de mail :<br/>
        <form action='exo3.php' method='post'>
            <input type='hidden' name='type' value='mailChange'>
            <input type='text' name='mail'/><br/>
            <input type='submit' value='change your mail' />
        </form><br/><br/>
        -------------------------------<br/>
        supprimer mon compte :<br/>
        <form action='exo3.php' method='post'>
            <input type='hidden' name='type' value='deleteMe'>
            <input type='submit' value='Delete me' />
        </form><br/><br/>
        ";
        else return "Null";
    }

}

//De mettre à jour son nom dans la base de donnée
//De mettre à jour son email dans la base de donnée
//De le supprimer de la base de donnée