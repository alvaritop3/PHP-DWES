<?php

//Comprobar si tengo sesion
require_once 'funciones.php';
comprobarSesion();

if (isset($_POST['borrar_visitas'])) {
    
    if (isset($_SESSION['visitas'])) {
        
        unset($_SESSION['visitas']);
        $_SESSION['visitas'] = [];
        header('Location:sesiones.php?visitas_borradas=true');
    }
    
}else{
    header('Location:sesiones.php');
}


?>