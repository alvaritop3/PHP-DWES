<?php
//Comprobar si viene de redirección
if (isset($_REQUEST["resultado"])){
    $resultado=$_REQUEST["resultado"];
    //Si la actualización
    if ($resultado == 1){
        $mensaje = "La actualización se ha hecho correctamente";
        $estilo = "verde";
    }else if($resultado == 2){
        $mensaje = "La actualización no se ha realizado correctamente";
        $estilo = "rojo";
    }else if ($resultado == 3){
        $mensaje= "No se han producido cambios en la base de datos";
        $estilo = "rojo";
    }else if ($resultado == 4){
        $mensaje = "Primero tiene que seleccionar un producto";
        $estilo = "rojo";
    }
}
//Declaramos las variables de la conexión
$cadena_conexion = "mysql:dbname=dwes;host=127.0.0.1";
$usuario = "dwes";
$clave = "abc123.";

try {
    //Le pasamos los parámetros por variables
    $bd = new PDO($cadena_conexion, $usuario, $clave);

    //Consulta para sacar los datos de la tabla familias
    $query = "SELECT cod, nombre FROM familia";
    $resultadoFamilias = $bd->query($query);
    $arrayFamilia = $resultadoFamilias->fetchAll(PDO::FETCH_OBJ);

    //Comprobamos si se ha pulsado el botón enviar
    if (isset($_POST["enviar"])) {

        //Guardamos el codigo de la familia que se ha seleccionado en el desplegable
        $cod_familia = $_POST["selec_familia"];

        //Ahora vamos a hacer una consulta para sacar los productos de esa familia
        $query2 = "SELECT * FROM producto WHERE familia = " . $cod_familia;
        $resultadoProducto = $bd->query($query2);
        $arrayProducto = $resultadoProducto->fetchAll(PDO::FETCH_OBJ);

        //print_r($arrayProducto);
    }
} catch (Exception $ex) {
    $mensaje = $ex->getMessage();
    echo $mensaje;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Plantilla para Ejercicios Tema 3</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="encabezado">
            <h1>Ejercicio 4: </h1>
            
            <?php if (isset($_REQUEST["resultado"])):?>
            <p class="<?=$estilo?>"><?=$mensaje?></p>
            <?php endif ?>
            
            <?php if (isset($_REQUEST["update"])): ?>
                <?php if ($_REQUEST["update"] == 1): ?>
                    <p>Actualización correcta</p>  
                <?php else: ?>
                    <p>Error en la actualización</p>
                <?php endif; ?>
            <?php endif; ?>
                    
            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <select name="selec_familia">

                    <?php foreach ($arrayFamilia as $valor): ?>
                        <?php if (isset($cod_familia) && $cod_familia == $valor->cod): ?>
                            <option value="<?= $valor->cod ?>" selected><?= $valor->nombre ?></option>
                        <?php else: ?>
                            <option value="<?= $valor->cod ?>"><?= $valor->nombre ?></option>
                        <?php endif ?>
                    <?php endforeach; ?>

                </select>
                <input type= "submit" name="enviar" value="Enviar">
            </form>
        </div>

        <div id="contenido">

            <?php if (isset($_POST["enviar"])): ?>
                <h2>Producto de la familia numero <?= $cod_familia ?> :</h2>
                <table class='table'>
                    <tr>
                        <th>Nombre Corto</th>
                        <th>PVP</th>
                        <th>Modificar</th>
                    </tr>
                    <?php foreach ($arrayProducto as $valor): ?>
                        <tr>
                            <td><?= $valor->nombre_corto ?></td>
                            <td><?= $valor->PVP ?></td>
                            <td>
                                <form id="envio_datos" action="editar.php" method="post">
                                    
                                    <input type="hidden" name="nombre_corto" value="<?=$valor->nombre_corto?>"/>
                                    <input type="hidden" name="nombre" value="<?=$valor->nombre?>"/>
                                    <input type="hidden"  name="descripcion" value="<?=$valor->descripcion?>"/>
                                    <input type="hidden"  name="cod" value="<?=$valor->cod?>"/>
                                    <input type="hidden"  name="PVP" value="<?=$valor->PVP?>"/>
                                    
                                    <input type= "submit" name="editar" value="Editar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            <?php endif ?>
        </div>
        <div id="pie">
        </div>
    </body>
</html>