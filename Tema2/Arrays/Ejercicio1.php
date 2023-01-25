<?php
//Incluye las funciones que se encuentran en otro fichero
include './FuncionesPhp.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $arrayNum = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $max = 8;
        $min = 4;
        $nuevaArray;

        //Pintamos el array original
        echo "<h2>Primer Array sin modificar</h2><br>";
        printArray($arrayNum);

        //Filtramos por los parámetros y nos devuelve otro array 
        $nuevaArray = filtraVector($arrayNum, $max, $min);
        echo "<br>";
        
        //Pintamos el nuevo array filtrado
        echo "<h2>Array filtrado</h2>";
        echo printArray($nuevaArray);

 
        ?>

    </body>
</html>