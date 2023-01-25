<?php
require_once './include/funciones.php';

//Comprobamos si se ha loggeado correctamente
comprobar_sesion();

if(isset($_SESSION['edad'])){
    $edad = $_SESSION['edad'];
    $edad_escrita='Usted ya ha ecrito su edad: '.$edad;    
}
//Si pulsa guardar, guardamos la edad escrita en la Session
if (isset($_POST["guardar"])){
    $edad= $_POST['edad'];
    
    if ($edad == ""){
        $aviso= "No ha escrito su edad";
    }elseif(!is_numeric($edad)){
        $aviso= "No ha escrito la edad como número entero positivo";
    }elseif($edad<1 || $edad>100){
        $aviso= "La edad debe estar comprendida entre 1 y 100";
    }else{
       $_SESSION['edad'] = $edad; 
       header('Location: principal.php');
    }   
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Edad. Sesiones
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="sesiones.css" title="Color">
</head>

<body>
  <h1>Edad</h1>
 <?php if(isset($edad)):?>
  <p class='aviso'><?=$edad_escrita?></p>
  <?php endif?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>Escriba su edad:</p>

<?php
if (isset($aviso)) {
    print "    <p><label>Edad: <input type=\"text\" name=\"edad\" size=\"20\" maxlength=\"20\"></label> "
        . "<span class=\"aviso\">$aviso</span></p>\n";
    print "\n";
} else {
    print "    <p><label>Edad: <input type=\"text\" name=\"edad\" size=\"20\" maxlength=\"20\"></label></p>\n";
    print "\n";
}
?>
    <p>
      <input type="submit" name="guardar" value="Guardar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <p><a href="principal.php">Volver a la página principal.</a></p>
