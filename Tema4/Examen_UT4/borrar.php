<?php
require_once './include/funciones.php';

//Comprobamos si se ha loggeado correctamente
comprobar_sesion();

if (isset($_REQUEST['borrar'])) {
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>La sesión se cerró correctamente</p>
        <p><a href="login.php?sesion_cerrada=true">Volver al login.</a></p>
    </body>
</html>
