<html>
<head>
<?php
spl_autoload_register(function($classe){
    require 'classes/' .$classe. '.php';
});

$html = new Html();
echo $html->insertCssStylesheet('https://salukimakingcode.github.io/pack/pack.css');
echo $html->insertJS('https://salukimakingcode.github.io/pack/pack.js');
echo $html->insertMetaDescription('Ceci est une description');
echo $html->insertMetaViewport();
?>
</head>

<body>
<?php
echo $html->link('index.php', 'home', 'Home');
echo $html->img('home.png', 'image test');
?>
</body>
</html>