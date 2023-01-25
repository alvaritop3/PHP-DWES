<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <?php
        //Dados:
        $dado1 = rand(1, 6);
        $dado2 = rand(1, 6);
        $dado3 = rand(1, 6);

        //mensaje que nos va a aparecer al fina ldel programa
        $texto = "error";
        //mensaje que nos aparece en caso de duo
        $duo = "error";
        //guarda la tirada mas alta en caso de que sean diferentes
        $maximo = 0;
        //guarda la tirada mas baja en caso de que sean diferentes
        $min = 0;
        //diferencia entre la tirada maxima y minima
        $resto = 0;

        //mostramos la tirada de los tres dados
        
        echo "<img src='img/$dado1.svg'>";
        echo "<img src='img/$dado2.svg'>";
        echo "<img src='img/$dado3.svg'><br>";

        //comienzan las comparaciones
        if ($dado1 === $dado2 && $dado2 === $dado3) {
            // si los 3 dados son iguales, son trios
            $texto = "Trio";
        } else if ($dado1 == $dado2 || $dado1 == $dado3) {
            $texto = "Pareja de $dado1";
        } else if ($dado2 == $dado3) {
            $texto = "Pareja de $dado2";
        } else {
            $maximo=max($dado1, $dado2, $dado3);
            $min=min($dado1, $dado2, $dado3);
            
            
            $resto = $maximo - $min;
            
            $texto = "El dado mayor es $maximo y el dado menor es $min y su resto es $resto";
        }

        echo $texto;
        ?>

    </body>
</html>
