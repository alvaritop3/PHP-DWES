<?php

require_once 'funciones.php';
comprobarSesion();

//A partir de aquí se ejecutará en caso de que si tengamos una sesión abierta con usuario válido

if (isset($_POST["cerrar_sesion"])) {

    // Destruir todas las variables de sesión.
    $_SESSION = array();

    // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
    // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
        );
    }

    // Finalmente, destruir la sesión.
    session_destroy();

    //Lo redirecciono a la página de Login para que inicie sesión

    header('Location: login.php?logout=true');
}
?>