<!doctype html>
<?php
	
	$alumnos = [
                "icm" => ["nombre" => "Inmaculada", 
                          "password" => "inma1234"],
		"jpe" => ["nombre" => "Javier", 
                          "password" => "javier1234"],
                "apr" => ["nombre" => "Alvaro", 
                          "password" => "alvaro1234"],
                "pda" => ["nombre" => "Pedro", 
                          "password" => "pedro1234"]
		]
?>
<?php 

$usuario=" ";
$contra=" ";
$mensaje=" ";
$estilo= " ";

if (isset($_REQUEST["enviando"])){
    $usuario=$_REQUEST["login"];
    $contra=$_REQUEST["password"];
    
    if ($usuario==""||$contra=""){
        $mensaje="El campo usuario/contraseña no puede estar vacío";
        $estilo= "no_validado";
    }elseif (!array_key_exists($usuario, $alumnos) || $contra!=$alumnos[$usuario]["password"]){
        $mensaje= "¡Usuario/contraseña incorrecta";
        $estilo= "no_validado";
    }else{
        $mensaje= '¡Bienvenido'. $alumnos[$usuario]["nombre"].'!';
        $estilo= "validado";
    }
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Validación alumno</title>
<style>
	h1{
		text-align:center;
	}

	.tabla_login{
		background-color:#FFC;
		padding:5px;
		border:#666 5px solid;
        }
	
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}
        
        .tabla_alumnos {border:1px solid black}

</style>
</head>

<body>
<h1>VALIDACIÓN ALUMNO 2DAW</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="datos_alumno" id="datos_alumno">
  <table class="tabla_login" width="15%" align="center">
    <tr>
      <td>Nombre:</td>
      <td><label for="login"></label>
      <input type="text" name="login" id="login"></td>
    </tr>
    <tr>
      <td>Contraseña:</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar"></td>
    </tr>
  </table>    
</form>

<p class="<?=$estilo?>"><?= $mensaje?></p>

<table>
    <tr>
        <th>USUARIOS</th>
        <th>NOMBRES</th>
    </tr>
    <?php foreach ($alumnos as $key=>$value): ?>
    <tr>
        <td><?=$alumnos[$key]?></td>
        <td> <?= $value ?></td>
    </tr>
    <?php endforeach?>;
</table>

</body>
</html>
