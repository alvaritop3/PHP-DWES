<?php
//Comprobamos si se ha pulsado eliminar las cookies
if (isset($_REQUEST['borrar'])){
    setcookie("idioma", "", time() - 3600);
}
//Comprobamos si venimos redirigidos de pulsar un enlace de idiomas
if (isset($_REQUEST['idi'])) {
    $idioma = $_REQUEST["idi"];
}else{
    $idioma= "esp";
}

//Comproamos si al acceder, hay alguna cookie guardada
if (!isset($_COOKIE['idioma'])) {
    setcookie("idioma", "esp", time() + 3600);
} else {
    setcookie("idioma", $idioma, time() + 3600);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Selecciona un idioma de los siguientes</h2>
        <a href="index.php?idi=esp">Castellano</a>
        <a href="index.php?idi=ing">Ingles</a>
        <a href="index.php?idi=port">Portugues</a>
        <a href="index.php?idi=fran">Frances</a>
        
        <h2>Pulse el siguiente enlace para eliminar las cokies </h2>
        <a href="index.php?borradas=true">Borrar Cookies</a>
        <?php if (isset($idioma)): ?>
        <h2>Lenguaje escogido: <?= $idioma?></h2>
        <?php endif ?>
    </body>
</html>
