<?php 
//Comprobar si tengo sesion
require_once 'funciones.php';
comprobarSesion();

/*if(isset($_REQUEST['redireccionado'])){
    
}*/




?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Ya hay una sesión abierta <?=$_SESSION['usuario']?></h2>
        <h3>¿Qué desea hacer?</h3>
        <form action="cerrar_sesion.php" method="post">
            <input type= "submit" name="cerrar_sesion" value="Cerrar Sesión">
        </form>
            
        <form action="sesiones.php" method="post">
            <input type= "submit" name="continuar_sesion" value="Continuar Sesión">
        </form>
    </body>
</html>
