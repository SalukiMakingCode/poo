<?php
spl_autoload_register(function($classe){
    require 'classes/' .$classe. '.php';
});
?>
<html lang="fr">

<head>
 <title>Class Validator</title>
</head>

<body>
<?php
$form = new Form() ;
echo $form->create('helpers3.php','post');
echo $form->input('nom', '','Nom');
echo $form->input('prénom', '', 'Prénom');
echo $form->breakLine();
echo $form->input('nombre', '', 'Un nombre entier');
echo $form->breakLine();
echo $form->input('nombreVirgule', '', 'Un nombre à virgule');
echo $form->breakLine();
echo $form->input('email', '','Email');
echo $form->breakLine();
echo $form->submit('envoyer');
echo $form->end();

$validator = new Validator();
if ($validator->validateString($_POST['nom'])) echo $_POST['nom']." : OK";
else echo $_POST['nom']." : NOT OK";
echo $form->breakLine();
if ($validator->validateString($_POST['prénom'])) echo $_POST['prénom']." : OK";
else echo $_POST['prénom']." : NOT OK";
echo $form->breakLine();
if ($validator->validateInteger($_POST['nombre'])) echo $_POST['nombre']." : OK";
else echo $_POST['nombre']." : NOT OK";
echo $form->breakLine();
if ($validator->validateFloat($_POST['nombreVirgule'])) echo $_POST['nombreVirgule']." : OK";
else echo $_POST['nombreVirgule']." : NOT OK";
echo $form->breakLine();
if ($validator->validateEmail($_POST['email'])) echo $_POST['email']." : OK";
else echo $_POST['email']." : NOT OK";
?>
</body>

</html>
