<?php
function comprobar_usuario($usuario, $contra){
    
    //La contraseña que recibimos como parámetro, no está hasheada y en la bbdd si
    $contra_hash= md5($contra);
    
    //Creamos las variables para la conexión
       $cadena_conexión='mysql:host=localhost;dbname=dwes';
       $user = "root";
       $pass = "notiene";
       
    try{
       //Hacemos la conexión
    $bd= new PDO ($cadena_conexión, $user, $pass);
    
    //Preparamos la consulta
    $query = "SELECT * FROM usuarios WHERE usuario= :name AND password = :pass";
    $preparada = $bd->prepare($query);
    $preparada->execute(array(':name'=>$usuario, ':pass'=>$contra_hash));
    $filas = $preparada->rowCount();
    
    if ($filas==1){
        //Si me devuelve una fila, es que ha encontrado una coincidencia
        return true;
    }else{
        //sino, no ha coincidido el usuario y la contraseña
        return false;
    }  
    } catch (Exception $ex) {
        return "Error: ".$ex->getMessage();
    }   
   
    
}

function comprobar_sesion(){
    session_start();
    
    if (!isset($_SESSION['usuario'])){
        header('Location: login.php?no_loggeado=true');
        exit();
    }
}

?>


