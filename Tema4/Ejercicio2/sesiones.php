<?php

//Comprobar si tengo sesion
require_once 'funciones.php';
comprobarSesion();

//Comprobamos si hemos pulsado el botón de borrar visitas
//Capturo el contenido del header en caso de que venga borrar_visitas
    if (isset($_REQUEST["visitas_borradas"])){
        $mensaje_visitas = "Las visitas se han borrado correctamente";
    }

//Aqui vamos a registrar las horas de las visitas de esa sesión
if (isset($_SESSION['visitas'])) {
    $visitasAnteriores = $_SESSION['visitas'];
} else {
    $_SESSION['visitas'] = [];
}

$_SESSION['visitas'][] = date("d-m-y h:i:s", time());


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php if(isset($mensaje_visitas)): //Muestro este mensaje si he borrado las visitas?>
        <h2><?=$mensaje_visitas?></h2>
        <?php endif?>
        
        <h3>SESION INICIADA CORRECTAMENTE: <?= $_SESSION["usuario"] ?></h3>
        
        <?php if (isset($visitasAnteriores)): ?>
        
                <?php foreach ($visitasAnteriores as $value): ?>
                    <p><?= $value ?></p>
                <?php endforeach; ?>   
                    
        <?php else: ?>
            <p>Bienvenido por primera vez</p>
        <?php endif ?>
            
        <form action="cerrar_sesion.php" method="post">
            <input type= "submit" name="cerrar_sesion" value="Cerrar Sesion">
        </form>
            
        <form action="borrar_visitas.php" method="post">
            <input type= "submit" name="borrar_visitas" value="Borrar Visitas">
        </form>
            
    </body>
</html>
