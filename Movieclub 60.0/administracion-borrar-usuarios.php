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
.style2 {
	color: #006600;
	font-weight: bold;
}
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
<!-- end masthead -->
<div id="content">
  <div align="center">
    <h3 align="left">Lista de clientes </h3>
	<p align=\"center\">&nbsp;</p>
	<?php
		// Consultamos toda la información de los clientes
		$consultaclientes= conexion("SELECT * FROM clientes");
		//Contamos el número de filas de la consulta
		$totalclientes=mysql_num_rows($consultaclientes);
		//Empezamos a crear la tabla con la lista de los clientes
		if($fila = mysql_fetch_array($consultaclientes)){
		echo"<table width=\"80%\" border=\"2\" bgcolor=\"#0099FF\">";
		echo "<tr>";
		echo "<th>Nombre</th>";
		echo "<th>Apellidos</th>";
		echo "<th>DNI</th>";
		echo "<th>Nombre Usuario</th>";
		echo "<th>Direcci&oacute;n</th>";
		echo "<th>Provincia</th>";
		echo "<th>Email</th>";
		echo "</tr>";
			do{
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td> ".$fila["apellido1"]." ".$fila["apellido2"]."</td>";
				echo "<td> ".$fila["dni"]."</td>";
				echo "<td> ".$fila["nombre_usuario"]."</td>";
				echo "<td> ".$fila["direccion"]."</td>";
				echo "<td> ".$fila["provincia"]."</td>";
				echo "<td> ".$fila["email"]."</td>";
				echo "</tr>";
			}while ($fila = mysql_fetch_array($consultaclientes));
			echo "</table>";
			echo"<p align=\"center\">&nbsp;</p>";
		} else {
			//Si no hay filas en la consulta o está vacío
		echo "Error al consultar la base de datos o la base de datos está vacía";
	}
	//Cerramos la base de datos
	mysql_close();
	?>
    <p align="left">    
    <h3 align="left">Lista de encargados</h3>
	<p align=\"center\">&nbsp;</p>
		<?php
		// Consultamos toda la información de los encargados
		$consultaencargados= conexion("SELECT * FROM encargados");
		//Contamos el número de filas de la consulta
		$totalclientes=mysql_num_rows($consultaencargados);
		//Empezamos a crear la tabla con la lista de los encargados
		if($fila = mysql_fetch_array($consultaencargados)){
		echo" <table width=\"80%\" border=\"2\" bgcolor=\"#00CC66\">";
		echo "<tr>";
		echo "<th>Nombre</th>";
		echo "<th>Apellidos</th>";
		echo "<th>DNI</th>";
		echo "<th>Nombre Usuario</th>";
		echo "<th>Direcci&oacute;n</th>";
		echo "<th>Provincia</th>";
		echo "<th>Email</th>";
		echo "</tr>";
			do{
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td> ".$fila["apellido1"]." ".$fila["apellido2"]."</td>";
				echo "<td> ".$fila["dni"]."</td>";
				echo "<td> ".$fila["nombre_usuario"]."</td>";
				echo "<td> ".$fila["direccion"]."</td>";
				echo "<td> ".$fila["provincia"]."</td>";
				echo "<td> ".$fila["email"]."</td>";
				echo "</tr>";
			}while ($fila = mysql_fetch_array($consultaencargados));
			echo "</table>";
			echo"<p align=\"center\">&nbsp;</p>";
		} else {
			//Si no hay filas en la consulta o está vacío
		echo "Error al consultar la base de datos o la base de datos está vacía";
	}
	//Cerramos la base de datos
	mysql_close();
	?>
    <p align="left">
    
    <fieldset>
    <div align="left">
      <h3>Quiero borrar a...</h3>
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="validar-baja-usuarios.php">
        <label>
        <div align="center"><span class="style2">Nombre Usuario</span>
          <input name="usuario" type="text" size="80" />
        </div>
        <p align="center">
          <input type="submit" name="Submit4" value="Borrar Usuario" />
        </p>
      </form>
    </div>
    </fieldset> 
    &nbsp;
</p>
</p>
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
  <div align="center">&copy;2010-2011 CFP Caixanova Ourense |<a href="#">Contact Us</a></div>
</div>
<br />
</body>
</html>
