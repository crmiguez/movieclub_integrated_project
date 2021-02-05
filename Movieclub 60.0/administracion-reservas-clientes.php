<?php 
	// Iniciamos sesión e incluimos los datos para realizar la conexion.
	session_start();include('conexion.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movieclub, tu tienda de peliculas:: Administracion</title>
<link rel="stylesheet" href="2col_rightNav.css" type="text/css" />
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
body {
	background-color: #009999;
}
.style1 {font-size: 12pt}
-->
</style></head>
<!-- The structure of this file is exactly the same as 2col_leftNav.html;
     the only difference between the two is the stylesheet they use -->
<body>
<div id="masthead">     
	<?php
   //Incluimos el archivo de privacidad
	include('privado.php');
   ?>
</div>
<!-- Fin Cabecera -->
<div id="content">
  <div align="center">
  <?php
  	//Consultamos las reservas realizadas por todos los clientes, haciendo un triple INNER JOIN 
	//(clientes con alquilan_cl_pe, peliculas con alquilan_cl_pe y tarifas con peliculas)
	$consultareservasclientesregistrados=conexion("SELECT nombre, apellido1, apellido2, nombre_usuario, titulo, fecha_inicio, fecha_fin, precio
FROM ((clientes INNER JOIN alquilan_cl_pe ON alquilan_cl_pe.id_cliente = clientes.id) INNER JOIN peliculas ON peliculas.id =alquilan_cl_pe.id_pelicula)
INNER JOIN tarifas ON tarifas.id = peliculas.id_tarifa");
	$totalreservasclientesregistrados=mysql_num_rows($consultareservasclientesregistrados);
  //Si hay más de una reserva
  if($totalreservasclientesregistrados>=1)
  {
  		//Mostramos el número de pedidos que hay por atender
  		echo "<b>Hay $totalreservasclientesregistrados alquileres por atender</b></p>";
		echo "<p>&nbsp;</p>";
		//Creamos la tabla con su cabecera
		echo"<table width=\"400\" height=\"400\" border=\"2\" bordercolor=\"#996666\" bgcolor=\"#00CC33\">";
		echo "<tr>";
		echo "<th>Cliente</th>";
		echo "<th>Nombre de Usuario</th>";
		echo "<th>Película</th>";
		echo "<th>Fecha a regogerla en la tienda</th>";
		echo "<th>Fecha a devolver en la tienda </th>";
		echo "<th>Precio a pagar</th>";
		echo "</tr>";
		while($filaspedidosatender=mysql_fetch_array($consultareservasclientesregistrados)){
		//Introducimos filas y con el resultado de la consulta, mostrando el cliente, el usuario, la película que ha alquilado
		//las fechas de recogida y devolución, y el precio a pagar 
	  		echo "<tr>";
			echo "<td><div align=\"center\">".$filaspedidosatender["nombre"]." 
			".$filaspedidosatender["apellido1"]." ".$filaspedidosatender["apellido2"]."</td>";
			echo "<td><div align=\"center\">".$filaspedidosatender["nombre_usuario"]."</td>";
			echo "<td><div align=\"center\">".$filaspedidosatender["titulo"]."</td>";
			echo "<td><div align=\"center\">".$filaspedidosatender["fecha_inicio"]."</td>";
			echo "<td><div align=\"center\">".$filaspedidosatender["fecha_fin"]."</td>";
			echo "<td><div align=\"center\">".$filaspedidosatender["precio"]."</td>";
			echo "</tr>";
		}
		//Cerramos la tabla una vez rellenado los datos de la consulta
		echo "</table>";
		echo "<p>&nbsp;</p>";
  }
  else
  {
  	//Si no hay ninguna reserva mostramos un mensaje de que no hay reservas por el momento
	echo "No hay alquileres por atender en estos momentos</p>";
  }
 //Cerramos la base de datos
 mysql_close();
  ?>
    <p>&nbsp;</p>
  </div>
</div>
<!--end content -->
<div id="navBar">
  <div id="sectionLinks">
    <ul class="style1"><li>
      <h3>Menu Encargado</h3>
    </li>
<?php
	  //Creamos los enlaces a las páginas del encargado
	  echo "<li><a href=\"administracion.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">
	  Inicio</a></li>";
      echo "<li><a href=\"administracion-reservas-clientes.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">
	  Ver Reservas Clientes</a></li>";
      echo "<li><a href=\"administracion-alta-usuarios.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Nuevo Encargado/Cliente </a></li>";
      echo "<li><a href=\"administracion-borrar-usuarios.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Borrar Encargado/Cliente </a></li>";
      echo "<li><a href=\"salir.php\">Cerrar sesi&oacute;n </a></li>";
	 ?>
    </ul>
  </div>
  <div class="relatedLinks">
    <h3>&nbsp;</h3>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div class="relatedLinks">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="advert">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="headlines">
    <h3>&nbsp;</h3>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
<!--end navBar div -->
<div id="siteInfo">
  <div align="center">&copy;2010-2011 CFP Caixanova Ourense |<a href="#">Contacto</a></div>
</div>
<br />
</body>
</html>
