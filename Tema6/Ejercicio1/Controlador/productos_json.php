<?php
include_once '../Modelo/DB.php';

//Recogemos el código del producto que vamos a añadir

//Obtenemos un Json del producto que hemos seleccionado para añadir
$json_producto = DB::obtieneProducto($cod_prod);

?>