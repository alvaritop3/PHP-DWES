<?php

//Vengo del login
    //Capturo la fecha y hora
$fecha_conexion = date('l jS \of F Y h:i:s A');

if (!isset($_COOKIE['fecha'])) {
    setcookie('fecha', $fecha_conexion, time() + 3600 * 24);
    $mensaje_login = "Bienvenido por primera vez";
    
} else {
    setcookie('fecha', $fecha_conexion, time() + 3600 * 24);
    $mensaje_login = "La última vez que accedió fué: $fecha_conexion";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1><?=$mensaje_login?></h1>
    </body>
</html>
