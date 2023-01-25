<?php
require_once './include/funciones.php';
//Comprobamos si venimos redirigido de otra página 
if (isset($_REQUEST['no_loggeado'])) {
    $aviso = 'Haga login para continuar';
}
if (isset($_REQUEST['sesion_cerrada'])){
    $aviso = 'Sesión cerrada correctamente';
}

//Comprobamos si venimos de enviar el formulario
if (isset($_REQUEST['enviado'])) {
    //Recogemos los datos del formulario
    $usuario = $_POST['usuario'];
    $contra = $_POST['clave'];

    //Antes de hacer la consulta a la bbdd, vamos a comprobar que los campos no están vacíos
    if ($usuario == '' || $contra == '') {
        $aviso = 'Debe introducir usuario y contraseña';
    }
    //Ejecutamos la función
    $resultado_login = comprobar_usuario($usuario, $contra);
    //FALTA HACER EL COUNT, POR QUE DE ESTA MANERA SIEMPRE ENTRA AUNQUE NO INTRODUZCAS NADA 
    $num_fila = $resultado_login->rowCount();
    //Si el resultado es 1 lo mandamos a la siguiente página
    if ($num_fila == 1) {
        session_start();
        //Guardamos el nombre del usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        //Redireccionamos a principal.php
        header('Location:principal.php?logeado=true');
    } else {
        $aviso = 'Usuario y contraseña incorrectos';
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Formulario de login</title>
        <meta charset = "UTF-8">
        <link href="estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>	
        <?php
        if (isset($aviso)) {
            echo "<p class = aviso >$aviso</p>";
        }
        ?>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?enviado=true" method = "POST">
            <label for = "usuario">Usuario</label> 
            <?php if (isset($usuario)): ?>
                <input value = "<?= $usuario ?>" id = "usuario" name = "usuario" type = "text">	
            <?php else: ?>
                <input value = "" id = "usuario" name = "usuario" type = "text">
            <?php endif ?>
            <label for = "clave">Clave</label> 
            <input id = "clave" name = "clave" type = "password">					
            <input type = "submit">
        </form>
    </body>
</html>
