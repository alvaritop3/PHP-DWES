<?php
//Seleccionamos un idioma por defecto
$idioma = "esp";

if (isset($_POST["enviar"])) {

    $idioma = $_POST["idioma"];
    setcookie('idioma', $idioma, time() + 3600 * 24);
    
} else {
    //Si no se ha pulsado el botón enviar,el idioma 
    //que se mostrará será el que está almacenada en la cookie
    if (isset($_COOKIE["idioma"])) {
        $idioma = $_COOKIE["idioma"];
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1>Selecciona un idioma para el contenido de la web</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <select name="idioma">
                <?php if (isset($idioma) && $idioma == "esp"): ?>
                    <option value="esp" selected>Español</option>
                    <option value="ing">Ingles</option>
                <?php elseif (isset($idioma) && $idioma == "ing"): ?>
                    <option value="esp" >Español</option>
                    <option value="ing" selected>Ingles</option>               
                <?php endif ?>

                <input type="submit" name= "enviar" value="Enviar"/>
            </select>
        </form>

        <?php if ($idioma == "ing"): ?>
            <h1>Tittle</h1>
        <?php elseif ($idioma == "esp"): ?>
            <h1>Titulo</h1>
        <?php endif ?>
    </body>
</html>
