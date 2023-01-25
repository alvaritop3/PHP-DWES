<?php
if(!isset($_COOKIE['contador'])){
    setcookie('contador', '1', time() + 3600 * 24);
    echo "Bienvenido por primera vez";
} else {
    $contador = (int) $_COOKIE['contador'];
    $contador++;
    setcookie('contador', $contador, time() + 3600 * 24);
    echo "Bienvenido por $contador vez";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
