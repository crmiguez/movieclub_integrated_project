<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validar alquiler película</title>
<style type="text/css">
<!--
body,td,th {
	font-family: trebuchet MS;
	font-size: 12pt;
}
-->
</style></head>
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

/* Comprobamos que se ha escrito los textboxs de las fechas
   y limpiamos las variables para evitar un ataque SQL. */
if (isset($_POST["fechainicio"]) && isset($_POST["fechafin"])){
$fechainicio=limpiar ($_POST["fechainicio"]);
$fechafin=limpiar ($_POST["fechafin"]);

//Si están nulos, le decimos que tiene que elegir una fecha de recogida y devolución
//volviendo al formulario
if ($fechainicio==NULL|$fechafin==NULL){
echo "<script>alert('Por favor, ponga una fecha de recogida y una de devolución de la película.')
		history.back(1);
	</script>";
} else {

//Comprobamos la fecha actual

$fechahoy=date(Y."-".m."-".d); 
echo "Hoy es $fechahoy .";

//Si la fecha inicio o fecha fin tiene la estructura tradicional de día, mes y año, 
//lo devolvemos al formulario pidiendo el formato
//año, mes y día
if ($fechainicio=='%%-%%-%%%%'|$fechafin=='%%-%%-%%%%') {
echo "<script>alert('Formato de fecha incorrecto. Tiene que ser AAAA-MM-DD (Año/Mes/Día) con números.')
		history.back(1);
	</script>";

} else {

//Si envían caracteres alfabéticos en las fechas, lo devolvemos al formulario
if(ctype_alpha($fechainicio)| ctype_alpha($fechafin) | ctype_alnum($fechainicio) | ctype_alnum($fechafin) ){
	echo "<script>alert('La fecha no permite caracteres alfabéticos o alfanuméricos')
		history.back(1);
	</script>";
	
} else {

//Comparamos si las fechas son anteriores o igual al actual. Si ocurre, lo devolvemos al formulario.
if($fechahoy>=$fechainicio | $fechahoy>=$fechafin){
echo "<script>alert('No puedes realizar tu pedido los días anteriores o iguales al actual')
		history.back(1);
	</script>";

} else {

//Comprobamos qsi la fecha fin es menor o igual que la de fecha inicio y que la fecha inicio sea mayor que la de fin. Si ocurre, le devolvemos al formulario
if($fechafin<=$fechainicio | $fechainicio>=$fechafin){
echo "<script>alert('La fecha de devolución no tiene que ser menor que la de recogida, ni la fecha de recogida tiene que ser mayor que la de devolución')
		history.back(1);
	</script>";

} else {
//Cogemos la id de la película
$peliculaalquilada=$_GET["id"];
//Consultamos la id del usuario registrado
$consultaclientedelareserva=conexion("SELECT id FROM clientes WHERE nombre_usuario IN ('".$_SESSION['nombre_usuario']."')");
//Si existe ese cliente
//Creamos el array del resultado de la consulta
$datosclientereserva=mysql_fetch_array($consultaclientedelareserva);
//Almacenamos en una variable la id del cliente
$idclientereserva=$datosclientereserva["id"];
//Insertamos lo necesario en la tabla alquilan_cl_pe
$insertarpedido=conexion("INSERT INTO alquilan_cl_pe ( id_cliente, id_pelicula, fecha_inicio, fecha_fin ) 
VALUES ($idclientereserva, $peliculaalquilada, '$fechainicio','$fechafin')");

//Actualizamos el campo disponible de la película elegida, para que vaya restando a una unidad cada vez
//que se alquila la misma
$actualizardisponiblepelicula = conexion ("UPDATE peliculas SET disponible=disponible-1 WHERE id=$peliculaalquilada");

//Mostramos que se ha realizado con éxito el alquiler
echo "
El cliente ".$_SESSION['nombre_usuario']." ha realizado su alquiler de manera satisfactoria. <br /><hr>
<strong> </strong> <br />";
//Le mostramos varios enlaces para que compruebe que ha alquilado 
//Que siga buscando
echo "<a href=\"cliente-reservas.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Ir hacia la página de reservas</a><br />";
//O que vuelva a su página de cliente
echo "<a href=\"cliente.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a tu página de cliente</a><br />";
echo "<a href=\"busqueda.php\">Seguir buscando</a><br />";
}
}
}
}
}
}
}

?>
</body>
</html>
