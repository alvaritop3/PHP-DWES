<?php
//Creamos las variables para la conexión
$cadena_conexion = "mysql:dbname=dwes;host=127.0.0.1";
$usuario = "dwes";
$clave = "abc123.";

$mensaje;

//Hacemos la conexión dentro de un try catch para capturar errores
try {
    //Le pasamos los parámetros por variables
    $bd = new PDO($cadena_conexion, $usuario, $clave);  
    //Comprobamos si se ha enviado el cod_prod y lo guardamos en una variable para usarlo durante el programa
    if (isset($_POST["cod_prod"])) {
        $cod_prod = $_POST['cod_prod'];
    }
    //PARA GENERAR EL DESPLEGABLE    
    //Generamos la consulta
    $consulta = 'SELECT cod, nombre FROM producto';
    //Hacemos la consulta y los resultados se almacenan en una variable
    $resultado = $bd->query($consulta);
    //Del resultado, queremos un objeto
    $productos = $resultado->fetchAll(PDO::FETCH_OBJ);

    //PARA MODIFICAR LAS UNIDADES DEL STOCK
    if (isset($_POST["modificar"])) {

        //Recogemos los datos enviados en variables
        $unidadesModificadas = $_POST["unidades"];
        $tiendasModificadas = $_POST["tiendas"];

        //Creamos la consulta
        $actualizacion = "UPDATE stock SET unidades = :unidades WHERE producto ='" . $cod_prod . "' AND tienda = :tienda";

        $resultado_actualizacion = $bd->prepare($actualizacion);

        for ($i = 0; $i < count($tiendasModificadas); $i++) {
            $parametros = [":unidades" => $unidadesModificadas[$i], ":tienda" => $tiendasModificadas[$i]];
            $resultado_actualizacion->execute($parametros);
        }
    }
    //PARA GENERAR LA TABLA DE STOCK
    if (isset($_POST["cod_prod"])) {


        //Creamos otra variable con el nombre del producto seleccionado
        foreach ($productos as $valor) {
            if ($valor->cod == $cod_prod) {
                $nombre_prod = $valor->nombre;
            }
        }
        //Generamos la consulta Preparada
        $consulta_stock = "SELECT tienda.nombre , stock.unidades, tienda.cod FROM stock"
                . " INNER JOIN tienda ON stock.tienda = tienda.cod "
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

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;
              charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="encabezado">
            <h1>Ejercicio 1.3: </h1>

            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label>Productos: </label>
                <select name="cod_prod">
                    <?php foreach ($productos as $value): ?>
                        <?php if ($cod_prod == $value->cod) : ?>    <!--para ver si he enviado el formulario, mostrar el producto que he enviado-->
                            <option value="<?= $value->cod ?>" selected> <?= $value->nombre ?> </option>
                        <?php else: ?>
                            <option value="<?= $value->cod ?>"> <?= $value->nombre ?> </option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
                <input type="submit" name= "enviar" value="Enviar"/>
            </form>
        </div>
        <div id="contenido">

            <h2>Stock de productos en las tiendas:</h2>

            <?php if (isset($cod_prod)): //Si tengo código enviado    ?>
                <?php if (count($stock) != 0): //Si tengo stock imprimo el formulario para modificar   ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                        <?php foreach ($stock as $valor): ?>

                            <p> Tienda <?= $valor->nombre ?> : 
                                <input type="text" name="unidades[]" value="<?= $valor->unidades ?>"/> 
                                <input type="hidden" name= "tiendas[]" value="<?= $valor->cod ?>"/>
                            </p>

                        <?php endforeach; ?>
                        <input type="hidden" name="cod_prod" value="<?= $cod_prod ?>"/>
                        <input type="submit" name= "modificar" value="Modificar" class='modifica'/>

                    </form>
                <?php else : ?>
                    <p> NO hay stock de este producto</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div id="pie">
        </div>
    </body>
</html>
