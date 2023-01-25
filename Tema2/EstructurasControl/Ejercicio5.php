<?php
$usuario = "error";
$password = "error";
$mensaje = "error";
$color= "error";

if (isset($_POST["enviar"])) {
    $usuario=$_POST["login"];
    $password=$_POST["password"];
    
    if($usuario=="user01" && $password=="iesmm2223"){
        $mensaje="Bienvenido $usuario";
        $color="verde";
    }else{
        $color="rojo";
        if($usuario==" " || $usuario==""|| $password==""||$password==" "){
            $mensaje="Debes introducir un nombre de usuario y una contraseña";
        }elseif($usuario!=="user01"){
            $mensaje="El nombre de usuario es incorrecto";
        }else if($usuario=="user01" && $password!=="iesmm2223"){
            $mensaje="Contraseña incorrecta";
        }
      
    }
}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario edad</title>
        <style>
            h2{
                text-align:center;
            }

            table{
                background-color:#FFC;
                padding:5px;
                border:#666 5px solid;
            }

            .rojo{
                font-size:18px;
                color:#F00;
                font-weight:bold;
                text-align:center;

            }

            .verde{
                font-size:18px;
                color:#0C3;
                font-weight:bold;
                text-align:center;
            }


        </style>
    </head>

    <body>
        <h2>INTRODUCE TUS CREDENCIALES</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="datos_usuario" id="datos_usuario">
            <table width="15%" align="center">
                <tr>
                    <td>Usuario:</td>
                    <td><label for="Usuario"></label>
                        <input type="text" name="login" id="login"></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><label for="Contraseña"></label>
                        <input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
                </tr>
            </table>
            <p class="<?=$color?>"><?=$mensaje?></p>
        </form>

<?php ?>

    </body>
</html>