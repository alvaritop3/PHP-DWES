<?php

require_once '../Servicios/funciones.php';
require_once '../Servicios/CestaCompra.php';
comprobarSesion();

//Comprobamos si hay cesta creada, sino la creamos
$cesta = CestaCompra::carga_cesta();

//print_r($_POST);
//print_r($cesta);


//Recogemos los parametros
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    $codigo_producto = $_POST['codigo'];
    $unidades = $_POST['unidades'];
    
    //echo $codigo_producto;
    //echo $unidades;
    
    //Introduzco el artículo en la cesta
    $cesta->carga_articulo($unidades, $codigo_producto);
    //IMPORTANTE GUARDAR LA CESTA EN LA SESIÓN
    $cesta->guarda_cesta();
    
}


