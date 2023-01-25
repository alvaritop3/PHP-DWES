<?php
require_once './include/funciones.php';

//Comprobamos si se ha loggeado correctamente
comprobar_sesion();

if(isset($_SESSION['nombre'])){
    $nombre=$_SESSION['nombre'];
        $nombre_escrito='Usted ya ha ecrito que su nombre es: '.$nombre;    
}

//Si pulsa guardar, guardamos el nombre escrito en la Session
if (isset($_POST["guardar"])){
    $nombre= $_POST['nombre'];
    if ($nombre == ""){
        $aviso= "No ha escrito su nombre";
    }else{
       $_SESSION['nombre'] = $nombre; 
       header('Location: principal.php');
    }   
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    Nombre. Sesiones.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sesiones.css" >
</head>
<body>
  <h1>Nombre</h1>

  
<?php

?>
  <?php if(isset($nombre)):?>
  <p class='aviso'><?=$nombre_escrito?></p>
  <?php endif?>
  
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>Escriba su nombre:</p>

<?php
if (isset($aviso)) {
    print "    <p><label>Nombre: <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"></label> "
        . "<span class=\"aviso\">$aviso</span></p>\n";
    print "\n";
} else {
    print "    <p><label>Nombre: <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
}
?>
    <p>
      <input type="submit" name="guardar" value="Guardar">
      <input type="reset" name='borrar' value="Borrar">
    </p>
  </form>

  <p><a href="principal.php">Volver a la página principal.</a></p>
