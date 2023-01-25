<?php
//Comprobar si se viene de listado.php

try {
    //No hace falta conectarse a la bbdd por que solo muestra lo que viene de listado.php y lo envia a actualizar.php
//Capturamos los datos que nos envia el listado.php
    if (isset($_POST["editar"])) {
        $nombre_corto = $_POST["nombre_corto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $cod = $_POST["cod"];
        $pvp = $_POST["PVP"];
    }
} catch (Exception $ex) {
    $mensaje = $ex->getMessage();
    echo $mensaje;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h2>DATOS DEL PRODUCTO <?= $nombre ?></h2>
        <table class="table">
            <tr>
                <th>Codigo del Producto</th>
                <th>Nombre Corto</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio de Venta al Público</th>
            </tr>
            <tr>
                
            <form id="datos_modificados" action="actualizar.php" method="post">
                <td><?= $cod ?></td>
                <td><input type ="text" name="nombre_corto" value="<?= $nombre_corto ?>"></td>
                <td><input type ="text" name="nombre" value="<?= $nombre ?>"></td>
                <td><input type ="text" name="descripcion" value="<?= $descripcion ?>"></td>
                <td><input type ="text" name="PVP" value="<?= $pvp ?>"></td>
                </tr>
        </table>
        <input type ="hidden" name="cod" value="<?= $cod ?>">
               
        <input type= "submit" name="modificar" value="Modificar">
        <input type= "submit" name="cancelar" value="Cancelar">

    </form>
</body>
</html>
