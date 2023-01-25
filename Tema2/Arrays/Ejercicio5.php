<!DOCTYPE html>
<!--Crea un menú desplegable dinámico cuyas opciones sean los colores indicados
en los distintos elementos de un array dado. Dicho menú tendrá un botón de
formulario asociado que enviará la opción seleccionada. Una vez pulsado, se
volverá a la misma página mostrando el color de fondo elegido y la opción
seleccionada marcada por defecto en el menú desplegable.-->


<?php
//Ponemos un color por defecto
$fondoPag = '#FFFFFF';  //Esta variable es la que contiene el color del fondo de pagina
//Definimos las variables (en este caso un array)
$arrayColores = array(
    'azul' => '#2CA8C9',
    'rojo' => '#EC2323',
    'amarillo' => '#EBF210'
);

//Compruebo si se ha pulsado el botón 
if (isset($_POST['Enviar'])) {
    $fondoPag = $_POST['color'];
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body bgcolor="<?= $fondoPag ?>"
          <h1>Indica de que color quiere el fondo<br></h1>
    <!--Empieza el formulario-->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <select name="color" id="col">

            <!--Hacemos el bucle-->
            <?php foreach ($arrayColores as $nombreColor => $codHex): ?>
                <?php if ($fondoPag == $codHex): ?>
                    <option selected value="<?= $codHex ?>"><?= $nombreColor ?></option>
                <?php else: ?>
                    <option value="<?= $codHex ?>"><?= $nombreColor ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>

        <!--Enviar el formulario-->
        <input type="submit" value="Enviar" name="Enviar"/>
    </form>

</body>
</html>
