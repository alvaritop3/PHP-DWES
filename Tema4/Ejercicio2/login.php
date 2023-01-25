<?php
//Creamos las variables para la conexión
$cadena_conexion = "mysql:dbname=empresa;host=127.0.0.1";
$usuario = "apasrom619";
$clave = "usuario";

//Capturo el contenido del header en caso de que venga redirigido
    if (isset($_REQUEST["redirigido"])){
        $mensaje_login_fallido = "Debe pasar por Login antes de continuar";
    }
 //Capturo el contenido del header en caso de que venga de cerrar sesión
    if (isset($_REQUEST["logout"])){
        $mensaje_login_fallido = "Ha cerrado su sesión correctamente";
    }   
    
try {
    
    if (isset($_POST["enviar"])) {

        //Creo una variable para mostrar un mensaje en caso de no acertar user y contra
        $mensaje_login_fallido;

        //Recojo el usuario
        $user = $_POST["usuario"];
        //La contraseña la encriptamos en md5 (Para ello, la contraseña en la base de datos
        //tiene que estar también encriptada)
        $pass = md5($_POST["password"]);

        $bd = new PDO($cadena_conexion, $usuario, $clave);

        $query = "SELECT * FROM usuarios WHERE Nombre= :nombre AND clave= :clave";
        $preparar_login = $bd->prepare($query);
        $parametros = [":nombre" => $user, ":clave" => $pass];
        $preparar_login->execute($parametros);
        $num_fila = $preparar_login->rowCount();
        
        //Si me devuelve 0, es que no ha encontrado coincidencias
        if ($num_fila > 0) {
            //En caso de que se hata loggeado correctamente
            session_start();
            //Guardo el nombre del usuario en la session
            //$_SESSION['usuario'] = $user;

            //MEJORA:
            if(isset($_SESSION['usuario'])){
                header('Location:continuar_cerrar_sesion.php?redireccionado=true');
            }else{
                $_SESSION['usuario'] = $user;
                header('Location: sesiones.php');
            }
            
            //Redirecciono a la página de bienvenida Ejercicio Cookies
            //header('Location: bienvenida.php');
            //Redirecciono a la página de sesiones Ejercicio Sesiones
            //header('Location: sesiones.php');
        } else {
            $mensaje_login_fallido = "Usuario y/o contraseña no válido";
        }
    }
} catch (Exception $ex) {
    $mensaje_excepcion = "Algo no ha salido bien:" . $ex->getMessage();
    echo $mensaje_excepcion;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="login.php" method="post">
            <label for="usuario">Introduzca su usuario:</label>
            <input type="text" name="usuario">
            <label for="password">Introduzca su contraseña:</label>
            <input type="password" name="password">

            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        
        <?php if (isset($mensaje_excepcion)): ?>
            <p style="color:red"><?= $mensaje_excepcion ?></p>
        <?php endif ?>
            
            
        <?php if (isset($mensaje_login_fallido)): ?>
            <p style="color:red"><?= $mensaje_login_fallido ?></p>
        <?php endif ?>


    </body>
</html>

