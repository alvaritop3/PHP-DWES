<?php include '../Arrays/FuncionesPhp.php'; ?>
<!DOCTYPE html>
<?php $numero = 0 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="tabla_multiplicar" id="multiplicacion">

            <?php do { ?>
                <label for="numero"></label>
                <input type="number" name="numero" id="numero">
                <?php $numero = $_POST["numero"]; ?>
            <?php } while ($numero > 0); ?>
        </form>
        <?php if (isset($_POST["enviar"]))  ?>
        <p><?= tabla($numero) ?><p>

            <?php} endif ?>
    </body>
</html>
