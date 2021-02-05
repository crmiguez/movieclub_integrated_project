<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validar borrado usuarios</title>
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
$usuario = limpiar($_POST["usuario"]);
if ($usuario==NULL) {
	echo "
	<script>alert('Por favor escriba el nombre del usuario que desee borrar.')
		history.back(1);
	</script>";
	
} else {
//Consultamos si el nombre de usuario está o en la tabla de clientes o encargados
$comprobar1 = conexion("SELECT nombre_usuario FROM clientes WHERE nombre_usuario = '$usuario'");
$validarnombrecl = mysql_num_rows($comprobar1); // Numero de filas si coincide.
$comprobar2 = conexion("SELECT nombre_usuario FROM encargados WHERE nombre_usuario = '$usuario'");
$validarnombreen = mysql_num_rows($comprobar2); // Numero de filas si coincide.

//Si no existe, lo vuelve a la página
if($validarnombrecl<0|$validarnombreen<0){
	echo "
	<script>alert('No existe usuario')
		history.back(1);
	</script>";
} else {
//Si está en la tabla de clientes
if ($validarnombrecl==1) {
//Hacemos la sentencia de borrado 
$borradocliente= conexion ("DELETE FROM clientes WHERE nombre_usuario = '$usuario'");
echo "
El cliente $usuario ha sido eliminado de manera satisfactoria. <br /><hr>";
//Una vez borrado el cliente volvemos a la página de borrar usuarios
echo"<a href=\"administracion-borrar-usuarios.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a la página para comprobar resultado </a>";
}
//Si está en la tabla de encargados
if ($validarnombreen==1) {
//Borramos el encargado
$borradoencargado= conexion ("DELETE FROM encargados WHERE nombre_usuario = '$usuario'");
echo "
El usuario $usuario ha sido eliminado de manera satisfactoria. <br /><hr>";
//Una vez borrado el cliente volvemos a la página de borrar usuarios
echo"<a href=\"administracion-borrar-usuarios.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a la página para comprobar resultado </a>";
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
