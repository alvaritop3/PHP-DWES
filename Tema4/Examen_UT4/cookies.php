<?php
//Seleccionamos un color por defecto (Aunque ya lo sea como predeterminado)
$color = 'blanco';

//Compruebo si vengo de eliminar las cookies
if (isset($_REQUEST['borrar'])){
    setcookie("color", "", time() - 3600);
}
//Recojo los el color si se ha pulsado enviar
if (isset($_POST['enviar'])){
    $color = $_POST['colores'];
}

//En primer lugar, comprobamos si existe la cookie que almacena el color
if (!isset($_COOKIE['color'])) {
    //En caso de que no exista (primera vez que se accede) la creamos con un color por defecto
    setcookie("color", $color, time() + 3600);
    
} else {
    //En caso de que si exista, le cambiamos el color al que haya sido seleccionado
    setcookie("color", $color, time() + 3600);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Cookies
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos.css" title="Color">
    </head>

    <body class="<?= $color ?>">
  
        <h1>Selecciona Un color</h1>
        
        <form action="cookies.php" method="POST">
        <select name="colores">
            <?php if ($color=='azul'):?>
            <option name="azul" value="azul" selected>Azul</option>
            <option name="verde" value="verde">Verde</option>
            <option name="rojo" value="rojo">Rojo</option>
            <?php elseif($color=='verde'):?>
            <option name="azul" value="azul">Azul</option>
            <option name="verde" value="verde" selected>Verde</option>
            <option name="rojo" value="rojo">Rojo</option>
            <?php elseif($color=='rojo'):?>
            <option name="azul" value="azul">Azul</option>
            <option name="verde" value="verde">Verde</option>
            <option name="rojo" value="rojo" selected>Rojo</option>
            <?php else:?>
            <option name="azul" value="azul">Azul</option>
            <option name="verde" value="verde">Verde</option>
            <option name="rojo" value="rojo">Rojo</option>
            <?php endif?>
            
        </select>
            <input type="submit" name="enviar"/>
        </form>
        <h1>Eliminar cookies</h1>
        <a href="cookies.php?borrar=true">borrar Cookies</a>
    </body>
</html>