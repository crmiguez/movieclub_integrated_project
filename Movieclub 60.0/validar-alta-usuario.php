<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validar Alta Usuario</title>
<style type="text/css">
<!--
body,td,th {
	font-family: trebuchet MS;
}
a {
	font-family: trebuchet MS;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Candy Kisses;
}
body {
	background-color: #009999;
}
.style1 {font-size: 12pt}
.style14 {color: #334d55}
.style15 {font-size: 16pt; }
.style23 {color: #334d55; font-size: 12pt; }
.style24 {color: #FFFFFF; font-size: 12pt; }
-->
</style>
</head>
<body>
<?php

// Incluimos los datos para realizar la conexion.

include('conexion.php');

// Funcion para limpiar cadenas maliciosas

function limpiar($cadena)
{
  if (get_magic_quotes_gpc())
    $cadena = stripslashes($cadena);
	$cadena = htmlspecialchars($cadena);
  return mysql_real_escape_string($cadena);
}

/* Comprobamos que se accede desde otra pagina
   y no escribiendo la direccion desde el navegador. */

if (!$_SERVER['HTTP_REFERER']) {
	echo "Acceso No Autorizado";
} else {

/* Comprobamos que se ha escrito el nombre de usuario
   y limpiamos las variables para evitar un ataque SQL. */

if (isset($_POST["usuario"])) {
$nombre= limpiar ($_POST["nombre"]);
$apellido1= limpiar ($_POST["apellido1"]);
$apellido2= limpiar ($_POST["apellido2"]);
$dni= limpiar ($_POST["dni"]);
$direccion= limpiar ($_POST["direccion"]);
$provincia= limpiar ($_POST["provincia"]);
$usuario = limpiar($_POST["usuario"]);
$pass = limpiar($_POST["pass"]);
$repetirpass = limpiar($_POST["repetirpass"]);
$email = limpiar($_POST["email"]);
$insertartabla = limpiar($_POST["insertar"]);

// Si falta algun campo avisa y lo vuelve al formulario.

if ($usuario==NULL|$pass==NULL|$repetirpass==NULL|$email==NULL|$dni==NULL|$nombre==NULL|$apellido1==NULL|$apellido2==NULL|$direccion==NULL|$provincia==NULL|$insertartabla==NULL) {
	echo "
	<script>alert('Faltan campos por rellenar.')
		history.back(1);
	</script>";
	
} else {

//Comprobamos si han puesto una dirección o email diferente a los ejemplos orientativos o si han puesto valores numéricos

if ($email=='usuario@correo.com'|$email=='usuario@%'|$email=='%@correo.com'|$direccion=='C./Portal,Piso'|$direccion=='%/Portal,Piso'|$direccion=='C./%,Piso'|$direccion=='C./Portal,%'|$dni=='00000000L') {
	echo "
	<script>alert('Los ejemplos de email, direccion y dni son ejemplos para indicar cómo tienes que poner los datos')
		history.back(1);
	</script>";
	
} else {

//Comprobamos si ha metido correctamente el DNI

if (ctype_digit($email)|ctype_digit($dni)|ctype_digit($direccion)) {
	echo "
	<script>alert('El email, la dirección y el DNI no deben contener caracteres numéricos')
		history.back(1);
	</script>";
	
} else {

//Comprobamos si en el DNI se han enviado los 8 dígitos más la letra

if (strlen($dni)<9){ 
echo "
	<script>alert('DNI incorrecto. Vuelva a ponerlo con sus 8 dígitos y la letra, todo junto')
		history.back(1);
	</script>";
} else {
	
// Comprobamos si las contraseñas coinciden.

if($pass!=$repetirpass) {
	echo "
	<script>alert('Las contraseñas no coinciden.')
		history.back(1);
	</script>";

} else {
	
// Validamos los campos de usuario y contrasenha para caracteres alfanuméricos

if (!ctype_alnum($usuario)|ctype_digit($usuario)) {
	echo "
	<script>alert('Nombre de usuario incorrecto, solo caracteres alfanumericos.')
		history.back(1);
	</script>";

} else {
	
if (!ctype_alnum($pass)) {
	echo "
	<script>alert('Clave incorrecta, solo caracteres alfanumericos.')
		history.back(1);
	</script>";

} else {

// Validamos los campos nombre, apellido1 y apellido2 para que NO contengan caracteres numéricos

if (!ctype_alpha($nombre)|!ctype_alpha($apellido1)|!ctype_alpha($apellido2)) {
	echo "
	<script>alert('El nombre y los apellidos no deben contener números ni caracteres alfanuméricos')
		history.back(1);
	</script>";

} else {

//Comprobamos si en el DNI se han enviado los 8 dígitos más la letra

if (!ctype_alnum($dni)) {
	echo "
	<script>alert('DNI incorrecto. Vuelva a ponerlo con sus 8 dígitos y la letra, todo junto')
		history.back(1);
	</script>";

} else {


// Comprobamos si el nombre de usuario, el email o la contraseña ya existían en la BD (Consultaremos las tablas clientes y encargados).

$comprobar1 = conexion("SELECT nombre_usuario FROM clientes WHERE nombre_usuario = '$usuario'");
$validarnombrecl = mysql_num_rows($comprobar1); // Numero de filas si coincide.

$comprobar2 = conexion("SELECT email FROM clientes WHERE email='$email'");
$validaremailcl = mysql_num_rows($comprobar2); // Numero de filas si coincide.


$comprobar3 = conexion ("SELECT contrasenha FROM clientes WHERE contrasenha = '$pass'");
$validarpasscl = mysql_num_rows($comprobar3); // Numero de filas si coincide.

$comprobar4 = conexion("SELECT nombre_usuario FROM encargados WHERE nombre_usuario = '$usuario'");
$validarnombreen = mysql_num_rows($comprobar4); // Numero de filas si coincide.

$comprobar5 = conexion("SELECT email FROM encargados WHERE email='$email'");
$validaremailen = mysql_num_rows($comprobar5); // Numero de filas si coincide.


$comprobar6 = conexion ("SELECT contrasenha FROM encargados WHERE contrasenha = '$pass'");
$validarpassen = mysql_num_rows($comprobar6); // Numero de filas si coincide.


if ($validarnombrecl>0|$validaremailcl>0|$validarpasscl>0|$validarnombreen>0|$validaremailen>0|$validarpassen>0) {
	echo "
	<script>alert('EL nombre de usuario o la cuenta de correo o la contraseña estan ya en uso.')
		history.back(1);
	</script>";

} else {


// Para mayor seguridad encriptamos la clave con el algoritmo MD5

$passmd5 = md5($pass);

//Ya hemos terminado la validacion y podemos insertar los datos en la BD.

if($insertartabla=='Cliente'){
//Si queremos guardar como cliente
		$insertar = conexion("INSERT INTO 	clientes(nombre,apellido1,apellido2,dni,nombre_usuario,direccion,provincia,id_encargado,email,contrasenha) VALUES('$nombre','$apellido1','$apellido2','$dni','$usuario','$direccion','$provincia',1,'$email','$passmd5')");
		echo "
	El cliente $usuario ha sido registrado de manera satisfactoria. <br /><hr>
	<strong>Datos de Cliente:</strong> <br />
	Nombre: $nombre <br />
	Apellidos: $apellido1  $apellido2 <br />
	DNI: $dni <br />
	Nombre de Usuario: $usuario <br />
	Contrase&ntilde;a: $clave. <br />
	Email: $email. <br />
	";
	//Una vez dado de alta, volverá a la página de administrador
	echo"<a href=\"administracion.php\">Volver a la página de administrador</a>";
}
if($insertartabla=='Encargado'){
	$insertar = conexion("INSERT INTO 	encargados(nombre,apellido1,apellido2,dni,nombre_usuario,direccion,provincia,email,contrasenha) VALUES('$nombre','$apellido1','$apellido2','$dni','$usuario','$direccion','$provincia','$email','$passmd5')");
	echo "
El encargado $usuario ha sido registrado de manera satisfactoria. <br /><hr>
<strong>Datos de Cliente:</strong> <br />
Nombre: $nombre <br />
Apellidos: $apellido1  $apellido2 <br />
DNI: $dni <br />
Nombre de Usuario: $usuario <br />
Contrase&ntilde;a: $clave. <br />
Email: $email. <br />
";
//Una vez dado de alta, volverá a la página de administrador
	echo"<a href=\"administracion.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a la página de administrador</a>";
}
}
}
}
}
} 
}
}
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
