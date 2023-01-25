<?php
$filas = "0";
$pintarTabla = false;
$mensaje = "";
$mensaje2 = "";

if (isset($_POST["enviar"])) {

    $filas = $_POST["filas"];
    $columnas = $_POST['columnas'];

    if ($filas == " " || $filas == " ") {
        $mensaje = "El número de filas no puede estar en blanco";
    } elseif (!ctype_digit($filas)) {
        $mensaje = "El número introducido no es válido";
    } elseif ($filas < 0 || $filas > 200) {
        $mensaje = "El número de filas no puede ser inferior a 0 o superior a 200";
    } elseif ($columnas == " " || $columnas == " ") {
        $mensaje2 = "El número de columnas no puede estar en blanco";
    } elseif (!ctype_digit($columnas)) {
        $mensaje2 = "El número introducido no es válido";
    } elseif ($columnas < 0 || $columnas > 200) {
        $mensaje = "El número de columnas no puede ser inferior a 0 o superior a 200";
    } else {
        $pintarTabla = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Tabla de una columna.
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="php-ejercicios.css" title="Color">
    </head>

    <body>
        <?php if ($pintarTabla): ?>
            <table border="1">
               
                
                    <?php for ($i = 1; $i <= $filas; $i++): ?>
                    <tr>
                        <?php for ($c = 1; $c <= $columnas; $c++): ?>
                            <td><?= "$i - $c" ?></td>
                        <?php endfor ?>

                    </tr>
                <?php endfor; ?>
            </table>
        <?php else : ?>
            <p><?= $mensaje ?></p>
            <p><?= $mensaje2 ?></p>
        <?php endif; ?>

    </body>
                