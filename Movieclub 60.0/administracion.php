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
<!-- end masthead -->
<div id="content">
  
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
