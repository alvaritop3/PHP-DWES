<?php
//Variables de la conexión
$localhost = "127.0.0.1";
$usuario = "dwes";
$contra = "abc123.";
$baseDatos = "dwes";

try {
    //Hacemos la conexión
    $bd = new mysqli("$localhost", "$usuario", "$contra", "$baseDatos");
    if ($bd->connect_error) {
        echo "Se ha producido un error al conectar con la base de datos";
    } else {
        //Creamos la consulta para acceder a los productos
        $query = "SELECT * FROM producto";
        $consulta = $bd->query($query);
        $productos = $consulta->fetch_all(MYSQLI_ASSOC);
        //Comprobamos si se ha pulsado el botón enviar
        if (isset($_POST["enviar"])) {
            //Recogemos el codigo del producto que se ha seleccionado
            $cod_prod = $_POST["cod_prod"];

            //Creamos la segunda consulta
            $query2 = "SELECT stock.unidades, stock.producto , tienda.nombre FROM stock "
                    . "INNER JOIN tienda WHERE tienda.cod = stock.tienda AND stock.producto= '" . $cod_prod . "'";
            $consulta2 = $bd->query($query2);
            $stock = $consulta2->fetch_all(MYSQLI_ASSOC);
        }
    }
} catch (Exception $ex) {
    $mensajeConexion = "Ha ocurrido un error: " . $ex;
}
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
              charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="encabezado">
            <h1>Ejercicio: </h1>
            <p>Selecciona un producto:</p>
            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <select name="cod_prod">
                    <?php foreach ($productos as $value): ?>
                        <?php if (isset($cod_prod)): ?>
                            <?php if ($cod_prod == $value["cod"]): ?>
                                <option selected value="<?= $value["cod"] ?>"><?= $value["nombre"] ?></option>
                            <?php else: ?>
                                <option value="<?= $value["cod"] ?>"><?= $value["nombre"] ?></option>
                            <?php endif ?>
                        <?php else: ?>
                            <option value="<?= $value["cod"] ?>"><?= $value["nombre"] ?></option>

                        <?php endif ?>
                    <?php endforeach ?>
                    <input type="submit" name="enviar" value="enviar"/>
                </select>
            </form>

        </div>
        <div id="contenido">
            <h2>Stock del producto en las tiendas</h2>
            <?php if (isset($stock)&count($stock)!=0): ?>
            
                <table border="1">
                    <tr>
                        <th>TIENDA</th>
                        <th>PRODUCTO</th>
                        <th>STOCK</th>
                    </tr>

                    <?php foreach ($stock as $value): ?>
                        <tr>
                            <td><?= $value["nombre"] ?></td>
                            <td><?= $value["producto"] ?></td>
                            <td><?= $value["unidades"] ?></td>
                        </tr>

                    <?php endforeach ?>

                </table>
            <?php else: ?>
            <h3>No hay stock del producto con código <?=$cod_prod?></h3>
            <?php endif ?>
            
        </div>
        <div id="pie">
        </div>
    </body>
</html>