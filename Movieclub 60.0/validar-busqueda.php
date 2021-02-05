<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validar Búsqueda</title>
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
/* Comprobamos que se ha escrito el titulo
   y limpiamos las variables para evitar un ataque SQL. */
if (isset($_POST["titulo"]))
{
	$titulo=limpiar ($_POST["titulo"]);
	$director=limpiar ($_POST["director"]);
	$actor=limpiar ($_POST["actor"]);
	$anho=limpiar ($_POST["anho"]);
	$premio= limpiar ($_POST["premio"]);
	$tarifa= limpiar ($_POST["tarifa"]);
	
//Si todos los campos están vacíos, avisamos de que tiene que hacer una búsqueda parcial o completa
//volviendo al formulario

if ($titulo==NULL | $director==NULL | $actor==NULL | $anho==NULL | $premio==NULL |$tarifa==NULL)	
echo "
	<script>alert('Faltan campos por rellenar.')
		history.back(1);
	</script>";
	
}
}
}		
?>
</body>
</html>
