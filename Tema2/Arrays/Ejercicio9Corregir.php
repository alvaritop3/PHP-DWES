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
    ["noniná", "", "", "", ""]
];
$mensaje = "Ha ocurrido un error";

$idiomaAleat = rand(0, count($idiomas) - 1);
$palabraAleat = rand(0, count($palabras) - 1);

//Vamos a elegir el idioma para traducir hasta que no coincida
do {
    $traductAleat = rand(1, 3);
} while ($traductAleat == $idiomaAleat);

$palabraSeleccionada = $palabras[$palabraAleat][$idiomaAleat];
$idiomaOrigen = $idiomas[$idiomaAleat];
$idiomaFinal = $idiomas[$traductAleat];
$palabraTraducida = $palabras[$palabraAleat][$traductAleat];



if ($palabraSeleccionada == "noniná") {
    $mensaje = "La palabra $palabraSeleccionada</u> no tiene traducción en otro idioma.";
} else if ($palabraSeleccionada == " ") {
    $mensaje = "No existe la palabra";
} else {
    $mensaje = "<p>La palabra <u> $palabraSeleccionada</u>
            en $idiomaOrigen
            es <u>$palabraTraducida </u>
            en $idiomaFinal </p>\n
            <p><b>Traducción a Español:</b></p>\n
            <p>La palabra <u> $palabraSeleccionada</u>
            en $idiomaOrigen
            es <u> $palabraTraducida</u>
            en $idiomas[0]</p>";
}


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

<?= $mensaje ?>

        <footer>
            <p>Álvaro Pastor Romero</p>
        </footer>
    </body>
</html>
