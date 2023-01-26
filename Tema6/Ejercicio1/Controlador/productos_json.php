<?php
include_once '../Modelo/DB.php';
include_once '../Servicios/funciones.php';

comprobarSesion();


//Recogemos el código del producto que vamos a añadir

//Obtenemos un Json del producto que hemos seleccionado para añadir
$json_producto = DB::obtieneProducto("IXUS115HSAZ");
echo $json_producto;

?>