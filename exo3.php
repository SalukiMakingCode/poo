<?php
session_start();
spl_autoload_register(function($classe){
    require 'classes/' .$classe. '.php';
});

$user = new User();
$disconnect=false;
if (isset($_POST['type']) && $_POST['type']=="disconnect") {
    $user->disconnectUser();
    $disconnect=true;
}

if (isset($_POST['type']) && $_POST['type']=="nameChange") {
    $user->setName($_POST['username'], $_SESSION['id']);
}

if (isset($_POST['type']) && $_POST['type']=="mailChange") {
    $user->setMail($_POST['mail'], $_SESSION['id']);
}

if (isset($_POST['type']) && $_POST['type']=="deleteMe") {
    $user->deleteUser($_SESSION['id']);
    $disconnect=true;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://salukimakingcode.github.io/pack/pack.css" rel="stylesheet" />
    <script src="https://salukimakingcode.github.io/pack/pack.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="gestion utilisateur" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>gestion utilisateur</title>
</head>

<body>
Ajouter un utilisateur :<br/><br/>
    <form action="exo3.php" method="post">
        <input type="hidden" name="type" value="add">
        User : <input type="text" name="username" placeholder="Username"/><br/>
        Mail : <input type="text" name="email" placeholder="Email"/><br/>
        Pass : <input type="password" name="password" placeholder="Password"/><br/><br/>
        <input type="submit" value="Add an user" />
    </form><br/><br/>
<?php
if (isset($_POST['type']) && $_POST['type']=="add") {
    echo $user->create($_POST['username'], $_POST['email'], $_POST['password']);
}
?>
------------------------------<br/>
Se connecter :<br/><br/>
    <form action="exo3.php" method="post">
        <input type="hidden" name="type" value="connect">
        User : <input type="text" name="username" placeholder="Username"/><br/>
        Pass : <input type="password" name="password" placeholder="Password"/><br/><br/>
        <input type="submit" value="Connect an user" />
    </form><br/><br/>
<?php
if (isset($_POST['type']) && $_POST['type']=="connect") {
    echo $user->connectUser($_POST['username'], $_POST['password']);
}
?>
------------------------------<br/>
Session actuelle :<br/>
<?php
    echo $user->displayConnect($disconnect);
    ?>
</body>
</html>