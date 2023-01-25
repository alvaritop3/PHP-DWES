<?php

//Declaramos las variables de la conexión
$cadena_conexion = "mysql:dbname=dwes;host=127.0.0.1";
$usuario = "dwes";
$clave = "abc123.";

try {

//Comprobamos si se ha pulsado el botón modificar
    if (isset($_POST["modificar"])) {
        //Recogemos el contenido modificado
        $cod = $_POST["cod"];
        $nombre_corto = $_POST["nombre_corto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $pvp = $_POST["PVP"];

        //Le pasamos los parámetros por variables
        $bd = new PDO($cadena_conexion, $usuario, $clave);

        //Hacemos los update aquí
        $query = "UPDATE producto "
                . "SET nombre = :nombre, nombre_corto = :nombre_corto, "
                . "descripcion = :descripcion, PVP= :pvp "
                . "WHERE cod = '" . $cod . "'";

        $preparada = $bd->prepare($query);
        $parametros = [':nombre' => $nombre, ':nombre_corto' => $nombre_corto, ':descripcion' => $descripcion, ':pvp' => $pvp];
        $preparada->execute($parametros);
        
        if ($preparada) {
            //Si se ha hecho correctamente devolvemos un 1
            header('Location: listado.php?resultado=1');
        } else {
            //Si no se ha hecho correctamente devolvemos un 2
            header('Location: listado.php?resultado=2');
        }
    }else if (isset($_POST["cancelar"])){
        //Si se ha pulsado el boton cancelar devolvemos un 3
            header('Location: listado.php?resultado=3');
    }else {
        //Si no se ha cumplido ninguna de las anteriores (no viene de pulsar modificar ni cancelar)
        header('Location: listado.php?resultado=4');   
    }
    
} catch (Exception $ex) {
    $mensaje = $ex->getMessage();
    echo $mensaje;
}
?>