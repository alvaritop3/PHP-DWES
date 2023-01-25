<?php
//Creamos las variables de la conexión
$cadena_conexion = "mysql:dbname=dwes;host=127.0.0.1";
$usuario = "dwes";
$clave = "abc123.";
$mensaje = "";
$ok = true;

try {
    //Hacemos la conexión
    $bd = new PDO($cadena_conexion, $usuario, $clave);

    //Creamos las variables "fijas"
    $tiendaOrigen = "1";
    $tiendaDestino = "3";
    $codProdTran = "BEB01";
    $mensaje = "";

    //TRANSACIÓN
    //Preparamos las consultas
    $query1 = "UPDATE stock SET unidades = 1 WHERE producto='" . $codProdTran . "' AND tienda = '" . $tiendaOrigen . "'";
    $query2 = "INSERT INTO stock(producto, tienda, unidades) VALUES ('" . $codProdTran . "','" . $tiendaDestino . "','1') ";

    //Preparamos la transación
    $bd->beginTransaction();

    //Comprobamos si ha salido bien
    if ($bd->exec($query1) == 0) {
        $ok = false;
    }
    if ($bd->exec($query2) == 0) {
        $ok = false;
    }
    

    if ($ok) {
        $bd->commit();
    } else {
        $bd->rollback();
        $mensaje = "No se ha podido hacer la transación";
        echo $mensaje;
    }

    //MOSTRAR LOS RESULTADOS
    $query3 = "SELECT * FROM stock WHERE tienda = '" . $tiendaDestino . "'";
    $resultado = $bd->query($query3);

    //De la consulta, sacamos un objeto
    $consultaStock = $resultado->fetchAll(PDO::FETCH_OBJ);
    
} catch (PDOException $e) {
    //Hacemos un rollback
    $bd->rollback();
    //Mostramos un mensaje
    $mensaje = $e->getMessage();
    echo $mensaje;
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio Transaciones</title>
    </head>
    <body>
        <h1>Programa para pasar un producto con código <?= $codProdTran ?> de la tienda número <?= $tiendaOrigen ?> a la número <?= $tiendaDestino ?></h1>
        <table>
            <tr>
                <th>Producto</th>
                <th>Tienda</th>
                <th>Unidades</th>
            </tr>
            <?php for ($i=0; $i< count($consultaStock); $i++): ?>
            <tr>
                <td>
                <?=$consultaStock[$i]->producto?>
            </td>
            <td>
                <?=$consultaStock[$i]->tienda?>
            </td>
            <td>
                <?=$consultaStock[$i]->unidades?>
            </td>
            <?php endfor ?>
            </tr>
        </table>
    </body>
</html>
