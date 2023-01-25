<?php
function filtraVector($arrayEntrada, $max, $min) {

    $indice = 0;
    $arrayAuxiliar = [];

    while ($indice < count($arrayEntrada)) {

        if ($arrayEntrada[$indice] >= $min && $arrayEntrada[$indice] <= $max) {
            //array_push($arrayAuxiliar, $indice);
            
            //De esta manera, nos inroduce el valor en el siguiente espacio
            $arrayAuxiliar[]=$arrayEntrada[$indice];
        }
        $indice++;
    }
    return $arrayAuxiliar;
}

function printArray($arrayEntrada){
    
    foreach($arrayEntrada as $value){
        echo $value." ";  
    }
}
?>

<?php function tabla($numero){
$resultado=0;
$devolver="";
for ($index = 1; $index <= 10; $index++) {
    $resultado=$numero*$index;
    
    $devolver.="$numero x $indice = $resultado.\n";
}
return $devolver;
}
?>


