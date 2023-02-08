<?php
require_once '../Servicios/funciones.php';
require_once '../Servicios/CestaCompra.php';
comprobarSesion();

//Comprobamos si hay cesta creada, sino la creamos
$cesta = CestaCompra::carga_cesta();

//Devolvemos la cesta con el Json_encode
echo json_encode($cesta->get_carrito());

?>
