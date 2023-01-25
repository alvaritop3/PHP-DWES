<?php
//Creamos las variables para la conexión
$cadena_conexion = "mysql:dbname=dwes;host=127.0.0.1";
$usuario = "dwes";
$clave = "abc123.";

$mensaje;

//Hacemos la conexión dentro de un try catch para capturar errores
try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);  //Le pasamos los parámetros por variables
//PARA GENERAR EL DESPLEGABLE    
//Generamos la consulta
    $consulta = 'SELECT cod, nombre FROM producto';
    //Hacemos la consulta y los resultados se almacenan en una variable
    $resultado = $bd->query($consulta);
    //Del resultado, queremos un objeto
    $productos = $resultado->fetchAll(PDO::FETCH_OBJ);

    //Pruebas
    //Para imprimir el objeto $productos
    //var_dump($productos);
    //Para ver la informacion que contiene y como acceder
    //foreach ($productos as $producto) {
    //    echo $producto->cod;
    //    echo " ";
    //    echo$producto->nombre;
    //}
    
    
    
//PARA GENERAR LA TABLA DE STOCK
    if (isset($_POST["enviar"])) {
        //Creamos una variable con el producto seleccionado
        $cod_prod = $_POST["cod_prod"];
        //Creamos otra variable con el nombre del producto seleccionado
        foreach ($productos as $valor) {
            if ($valor->cod == $cod_prod) {
                $nombre_prod = $valor->nombre;
            }
        }
        //Generamos la consulta
        $consulta_stock = "SELECT tienda.nombre, stock.unidades FROM stock"
                . " INNER JOIN tienda ON stock.tienda=tienda.cod "
                . "WHERE stock.producto='" . $cod_prod . "'";
        //Hacemos la consulta
        $resultado_stock = $bd->query($consulta_stock);
        //Guardamos el resultado en un objeto
        $stock = $resultado_stock->fetchAll(PDO::FETCH_OBJ);
        
        
    }
} catch (PDOException $ex) {
    $mensaje = $ex->getMessage();
    echo $mensaje;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01
    Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
              charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="encabezado">
            <h1>Ejercicio 1 con conexión PDO: </h1>
            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>Productos:</label>
                <select name="cod_prod">
                    <?php foreach ($productos as $valor): ?>
                        <?php if ($cod_prod == $valor->cod): ?>
                            <option value="<?= $valor->cod ?>" selected><?= $valor->nombre ?></option>
                        <?php else: ?>
                            <option value="<?= $valor->cod ?>"><?= $valor->nombre ?></option>
                        <?php endif ?>

                    <?php endforeach; ?>
                </select>
                <input type="submit" name= "enviar" value="Enviar"/>
            </form>
        </div>

        <div id="contenido">

            <?php if (isset($cod_prod) && count($stock)!= 0): ?>

                <h2>Stock del producto en las tiendas</h2>
                <table  border="1">
                    <tr>
                        <th>Nombre de la tienda</th>
                        <th>Nombre Producto</th>
                        <th>Unidades</th>
                    </tr>

                    <?php foreach ($stock as $valor): ?>
                        <tr>
                            <td><?= $valor->nombre ?></td>
                            <td><?= $nombre_prod ?></td>
                            <td><?= $valor->unidades ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php elseif (isset($stock) && count($stock) == 0) : ?>
                <h2>No hay stock del producto <strong><?= $nombre_prod ?></strong></h2>
            <?php endif ?> 



        </div>
        <div id="pie">
        </div>
    </body>
</html>