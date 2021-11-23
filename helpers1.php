<?php
spl_autoload_register(function($classe){
    require 'classes/' .$classe. '.php';
});

$nom="nom du gars";
$prenom="prénom du gars";

$form = new Form() ;
echo $form->create('helpers1.php','post');
echo $form->input('nom', $nom);
echo $form->input('prénom', $prenom);
echo $form->breakLine();
echo $form->select('gender', array('key1'=> 'value1', 'key2'=>'value2') );
echo $form->breakLine();
echo $form->textarea('question', 'Votre question ici');
echo $form->breakLine();
echo $form->radio('genre', 'homme', 'Homme');
echo $form->radio('genre', 'femme', 'Femme');
echo $form->breakLine();
echo $form->checkbox('pomme', 'Pomme');
echo $form->checkbox('poire', 'Poire');
echo $form->breakLine();
echo $form->submit('envoyer');
echo $form->end();
