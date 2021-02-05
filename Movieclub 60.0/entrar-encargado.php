<?php 
	// Incluimos los datos para realizar la conexion.
	include('conexion.php'); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciando Sesión</title>
<style type="text/css">
<!--
body,td,th {
	font-family: trebuchet MS;
	font-size: 12pt;
}
a {
	font-family: trebuchet MS;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Candy Kisses;
}
.style1 {font-size: 18px}
body {
	background-color: #FFFFFF;
}
.style13 {font-size: 16pt}
.style15 {padding: 0px 0px 10px 10px; margin: 0px;}
.style16 {color: #333333}
.style18 {font-size: 12pt; }
.style23 {color: #334d55; font-size: 12pt; }
.style24 {color: #FFFFFF; font-size: 12pt; }
-->
</style>
</head>

<body>
<?php
	// Si están vacíos el campo
  	if (!isset($_SESSION["nombre_usuario"]) && empty($_POST["usuario2"])) {
	echo "
	<script>alert('Falta el nombre de usuario y contraseña')
		history.back(1);
	</script>"; 
} else {	
if ($_POST["usuario2"]) {
	
// Comprobacion del envio del nombre de usuario y clave.

$usuario2=$_POST["usuario2"];
$clave2=$_POST["clave2"];
$encriptada2=md5($_POST["clave2"]); // Encriptamos la clave.

if ($clave2==NULL) {
echo "Error: El campo de clave esta vacio.";

} else {
//Consultamos si el nombre del usuario
$consultausuarioencargado=conexion("SELECT nombre_usuario FROM encargados WHERE nombre_usuario = '$usuario2'");
$validarencargado = mysql_num_rows($consultausuarioencargado);
//Si no existe ese usuario, volverá al formulario
if($validarencargado<0){
echo "
	<script>alert('No eres encargado.')
		history.back(1);
	</script>";
} else {
	// Consultamos la clave del usuario introducido, validamos el nombre de usuario si es encargado 
	// y la comparamos.
	$comprobarencargado= conexion("SELECT nombre_usuario,contrasenha FROM encargados WHERE nombre_usuario = '$usuario2'");
	$datosencargado= mysql_fetch_array($comprobarencargado);
	if($datosencargado['contrasenha'] != $encriptada2) {
	echo "
	<script>alert('Login Incorrecto')
		history.back(1);
	</script>";
	} else {
		$informacionencargado= conexion("SELECT * FROM encargados WHERE nombre_usuario = '$usuario2'");
		$datosen= mysql_fetch_array($informacionencargado);
		$_SESSION["nombre_usuario"] = $datosen["nombre_usuario"];
		$_SESSION["email"] = $datosen["email"];
		echo "
		Te has identificado correctamente ".$_SESSION["nombre_usuario"].", 
		ya puedes acceder a tu <a href=\"administracion.php?nombre_usuario=".$_SESSION["nombre_usuario"]."\" />página de encargado</a>.";
}
}
}
}
}
//Cerramos la base de datos
mysql_close();
?>
</body>
</html>
