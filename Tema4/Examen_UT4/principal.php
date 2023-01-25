<?php
require_once './include/funciones.php';

//Comprobamos si se ha loggeado correctamente
comprobar_sesion();




?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Sesiones</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sesiones.css" title="Color">
</head>

<body>

  <h1>Nombre y edad (Inicio)</h1>

  <p>Elija una opción:</p>

  <ul>
    <li><a href="nombre.php">Introducir su nombre</a></li>
    <li><a href="edad.php">Introducir su edad</a></li>
    <li><a href="ver.php">Ver su nombre y edad</a></li>
    <li><a href="borrar.php?borrar=true">Borrar la información y salir</a></li>
  </ul>

  <footer>
    <p>Escriba aquí su nombre</p>
  </footer>
</body>
</html>

