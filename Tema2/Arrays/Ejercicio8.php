<!DOCTYPE html>
<?php
$idiomas = ["español", "inglés", "francés", "italiano"];

$palabras = [
    ["perro", "dog", "chien", "cane"],
    ["gato", "cat", "chat", "gatto"],
    ["enero", "january", "janvier", "gennaio"],
    ["feliz", "happy", "heureux", "felice"],
    ["viernes", "friday", "vendredi", "venerdì"],
    ["instituto", "high school", "lycée", "istituto"],
    ["vacaciones", "holidays", "vacances", "vazanze"],
    ["noniná", "","", "",""]
   
];
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Diccionario multilingüe.
  </title>
</head>

<body>
  <h1>Diccionario multilingüe</h1>

  <p><b>Actualice la página para mostrar una nueva palabra.</b></p>

   <?php 
    $idiomaAleat = rand(1, count($idiomas)-1);
    $palabraAleat=rand(0, count($palabras)-2);
    
    do{
        $traductAleat=rand(1,3);
    }while($traductAleat==$idiomaAleat);
        
?>


  <p>La palabra <u> <?=$palabras[$palabraAleat][$idiomaAleat]?></u>
    en <?=$idiomas[$idiomaAleat]?>
    es <u><?=$palabras[$palabraAleat][$traductAleat]?></u>
    en <?=$idiomas[$traductAleat]?></p>

<p><b>Traducción a Español:</b></p>
<p>La palabra <u> <?=$palabras[$palabraAleat][$idiomaAleat]?></u>
    en <?=$idiomas[$idiomaAleat]?>
    es <u> <?=$palabras[$palabraAleat][0]?></u>
    en <?=$idiomas[0]?></p>
  <footer>
    <p>Álvaro Pastor Romero</p>
  </footer>
</body>
</html>
