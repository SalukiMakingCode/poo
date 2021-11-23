<?php
spl_autoload_register(function($classe){
    require 'classes/' .$classe. '.php';
});
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://salukimakingcode.github.io/pack/pack.css" rel="stylesheet" />
    <script src="https://salukimakingcode.github.io/pack/pack.js"></script>
    <meta charset="UTF-8">
    <meta name="description" content="Parc de voiture" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Parc de voiture</title>
</head>
<body>

<header>Parc de voiture</header>

<main>
    <h1>Les voitures en circulation</h1>
    <?php
    $car1 = New Voiture('q8', 'Audi', 2015, 'BE258AGD', '150000', 'orange', '2500');
    $car2 = New Voiture('rs3', 'Audi', 2016, 'DE858GGDE', '50000', 'rouge', '2800');
    $car3 = New Voiture('continental', 'Bentley', 2019, 'FR06FGR256', '30000', 'gris', '3000');
    $car4 = New Voiture('ix3', 'BMW', 2014, 'BEZER256', '250000', 'blanche', '3100');
    $car5 = New Voiture('Crossfire', 'Chrysler', 2018, 'BEOZCZ74', '65897', 'grise', '2400');
    $car6 = New Voiture('amg', 'Mercedes', 2015, 'BE259AGD', '175000', 'blanche', '2850');
    $car7 = New Voiture('sprinter', 'Mercedes', 2012, 'BEMDG568', '270000', 'grise', '3800');
    $car8 = New Voiture('crafter', 'Volkswagen', 2014, 'FR278GFF', '185000', 'grise', '3900');
    $car9 = New Voiture('id3', 'Volkswagen', 2020, 'DE578DFGR', '25000', 'bleu', '2100');
    $car3->rouler();
    $car8->rouler();
    ?>

    <table style="border: 1px solid">
        <tr>
            <th>Photo</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Mise en circulation</th>
            <th>Immatriculation</th>
            <th>Kilomètrage</th>
            <th>Couleur</th>
            <th>Poids</th>
            <th>Type</th>
            <th>Circule depuis</th>
            <th>Disponibilité</th>
            <th>Pays</th>
            <th>Usure</th>
        </tr>
        <?php
        echo $car1->display();
        echo $car2->display();
        echo $car3->display();
        echo $car4->display();
        echo $car5->display();
        echo $car6->display();
        echo $car7->display();
        echo $car8->display();
        echo $car9->display();
        ?>
    </table>

</main>

<footer></footer>
</body>
</html>
