<?php

$cadena_conexion = 'mysql:dbname=dwes;host=127.0.0.1';
$usuario_conexion = 'apasrom619';
$clave_usuario = 'usuario';

  try{//realizamos la conexión con la base de datos
    $bd = new PDO($cadena_conexion, $usuario_conexion, $clave_usuario);
   
    $usuario = 'carmen';
    $clave = password_hash('1234', PASSWORD_DEFAULT);
   
    //echo $clave;
   
   $consulta = "INSERT INTO usuarios (usuario, password) VALUES('$usuario', '$clave')";
   
   $bd->query($consulta);
   
   echo 'usuario añadido correctamente';
   
   
   
   
  } catch (Exception $e){
    echo "ERROR: ". $e->getMessage();
  }

