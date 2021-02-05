<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zona Alquiler Privada</title>
</head>

<body>
<?php 
//Si no hay usuario registrado
//Le mostramos el mensaje de que tiene que registrarse
if(!isset($_SESSION['nombre_usuario'])){ 
   echo("<p> No puedes alquilar la pelicula porque no estás registrado. 
   Haz <a href=\"registrousuario.php\">click aquí</a> para registrarte.</p>");
   } else { 
 //Si hay usuario registrado
 //Le mostramos si está disponible la película elegida
 //Consultamos si la película elegida está disponible
 $disponiblepeliculaelegida=conexion("SELECT disponible FROM peliculas WHERE id=$idpelicula AND disponible > 1");
 $filasdisponible=mysql_num_rows($disponiblepeliculaelegida); 				//Contamos el número de filas
 if($filasdisponible==1)
 {
   	echo("<p> Hola ".$_SESSION['nombre_usuario'].". Realiza tu pedido.</p>");
   	echo " <form id=\"form1\" name=\"form1\" method=\"post\" action=\"validar-alquilar-pelicula.php\">
   <p>
   <label>Vendré a la tienda a buscar la película el día...</label>
     <input type=\"text\" name=\"fechainicio\" id=\"fecha_inicio\" />
     <input type=\"button\" id=\"btninicio\" value=\"...\" />
 </p>
   <p>&nbsp;  </p>
   <label>Voy a devolver la película a la tienda el dia...</label>
	<input type=\"text\" name=\"fechafin\" id=\fecha_fin\" />
	<input type=\"button\" id=\"btnfin\" value=\"...\" />
	<input type=\"submit\" name=\"Submit\" value=\"Aceptar\" />
  </form>";
  	echo "<!-- script que define y configura el calendario de la fecha inicio-->";
	echo "<script type=\"text/javascript\">";
	echo "Calendar.setup({
inputField : \"fecha_inicio\", // id del campo de texto
ifFormat : \"%d-%m-%Y\", // formato de la fecha que se escriba en el campo de texto
button : \"btninicio\" // el id del botón que lanzará el calendario
});";
	echo "</script>";
	echo "<!-- script que define y configura el calendario-->";
	echo "<script type=\"text/javascript\">";
	echo "Calendar.setup({
inputField : \"fecha_fin\", // id del campo de texto
ifFormat : \"%d-%m-%Y\", // formato de la fecha que se escriba en el campo de texto
button : \"btnfin\" // el id del botón que lanzará el calendario
});";
	echo "</script>";
} else {
	echo("<p> Lo sentimos ".$_SESSION['nombre_usuario'].", ya han alquilado esta película o se ha agotado la cantidad
	<a href=\"busqueda.php\">Seguir buscando</a>.</p>");
}
//Cerramos la base de datos
mysql_close();
   }
?>
</body>
</html>
