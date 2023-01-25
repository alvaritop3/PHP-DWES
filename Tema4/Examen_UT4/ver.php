<?php
require_once './include/funciones.php';

//Comprobamos si se ha loggeado correctamente
comprobar_sesion();

if (isset($_SESSION['nombre'])&& isset($_SESSION['edad'])){
    $mensaje= 'Su nombre es '.$_SESSION['nombre'].' y su edad '.$_SESSION['edad'].' años';
}else{
    if (isset($_SESSION['nombre'])&& !isset($_SESSION['edad'])){
        $mensaje= 'Sólo ha escrito que su nombre es '.$_SESSION['nombre'];
    }else if(!isset($_SESSION['nombre'])&& isset($_SESSION['edad'])){
        $mensaje = 'Sólo ha escrito que su edad es '.$_SESSION['edad'];
    }else{
        $mensaje = 'No ha escrito todavía ni su nombre ni su edad';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ver datos. Sesiones
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sesiones.css" title="Color">
</head>

<body>
  <h1>Ver datos</h1>


  <p><strong><?= $mensaje?></strong></p>
  <p><a href="principal.php">Volver a la página principal.</a></p>
</body>
</html>

