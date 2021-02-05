<?php 
	// Iniciamos sesión e incluimos los datos para realizar la conexion.
	session_start();
	include('conexion.php'); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movieclub, tu tienda de peliculas</title>
<link rel="stylesheet" href="3col_rightNav.css" type="text/css" />
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
.style16 {color: #333333}
.style18 {font-size: 12pt; }
.style21 {font-size: 12px; font-weight: bold; }
.style23 {font-size: 12pt; font-weight: bold; }
-->
</style>
<!--jQuery library-->
<script type="text/javascript" src="lib/jquery-1.4.2.min.js"></script>
<!--jCarousel library-->
<script type="text/javascript" src="lib/jquery.jcarousel.min.js"></script>
<!--jCarousel skin stylesheet-->
<link rel="stylesheet" type="text/css" href="skins/tango/skin.css" />
<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        vertical: true,
        scroll: 2
    });
});

</script>
</head>
<body>
<div id="cabecera">
  <h1 id="siteName"><img src="Fondo Movieclub.png" width="1210" height="113" /></h1>
  <div id="breadCrumb"> 
    <div align="center"><a href="#"></a></div>
  </div>
</div>
<!-- Fin cabecera -->
<div id="headlines">
  <div align="center">
    <p class="style1">Buscar película </p>
<!--Metemos el visor de imágenes en una tabla, para evitar que convierta en enlace innecesario en el resto de  -->
	<!--la página -->
    <table width="90%" border="0">
      <tr>
        <th scope="col">
		  <div align="center">
		    <?php
		//Comenzamos a poner el código HTML para el visor de imágenes JCarousel vertical		
		echo "<div id=\"wrap\">";
		echo "<ul id=\"mycarousel\" class=\"jcarousel jcarousel-skin-tango\">";
		//Consultamos las películas más visitadas, que llevan 5 o más
		$consultacarteles= conexion("SELECT id,cartel FROM peliculas WHERE visitas >= 5");
		//Si existe la consulta, rellenamos una lista 
		if($cartelconenlace= mysql_fetch_array($consultacarteles))
		{
			//Mientras exista el resultado de la consulta, hacemos una lista con el enlace a la información extendida
			//y el cartel de la película
			while ($cartelconenlace= mysql_fetch_array($consultacarteles))
			{
				echo "<li><a href=\"informacion-extendida.php?id=".$cartelconenlace["id"]."\"><img src=\"".$cartelconenlace["cartel"]."\" width=\"75\" height=\"75\" alt=\"\" /></li>";
			} 
		//Cerramos la lista y la parte correspondiente al visor de imágenes
		echo"</ul>";
		echo "</div>";
	} else {
	//En el caso de que no exista lo dejamos vacío
	echo"</ul>";
	echo "</div>";
	}
?>
          </div></th>
      </tr>
    </table>
   
  </div>
</div>
<div id="content">
  <div align="center">
  <?php
		//Consultamos todos los directores de la base de datos y las ordenamos alfabéticamente por el nombre 
		$directoresbasedatos=conexion("SELECT * FROM directores ORDER BY nombre ASC");
		$totalbddirectores=mysql_num_rows($directoresbasedatos); //Contamos las filas
	echo " <p align=\"center\" class=\"style13\">Directores en total: $totalbddirectores </p>";	  //Mostramos el total de directores que hay en la base de datos
?>
  <table width="100%" border="1" bordercolor="#996600" bgcolor="#CCCCCC" class="feature">
    <tr>
      <th scope="col"><div align="center">
        <?php
	//Mientras exista la consulta, rellenamos los datos, rellenamos todo lo referente a la información reducida
	//de los directores de la base de datos
	while($datosdirectores=mysql_fetch_array($directoresbasedatos)){
	echo "
	<table width=\"90%\" border=\"2\">";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><b>Foto:</b></td>";
	echo "<td><div align=\"center\"><img src=\"".$datosdirectores["foto_director"]."\" width=\"300\" height=\"300\" /></td></tr>";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><b>Nombre: </b></td>";
	echo"<td><a href=\"informacion-extendida-director.php?id=".$datosdirectores["id"]."\">".$datosdirectores["nombre"]."</a></td></tr>";
	echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><b>Biografía: </b><td>".$datosdirectores["biografia_director"]."</td>";
    echo "</table>";
	echo"<p>&nbsp;</p>";	
	}
//Cerramos la base de datos
mysql_close();
?>
        </div>    </th>
        </tr>
  </table>
  </div>
  <p>&nbsp;</p>
</div>
  <span class="style13">
  <!-- fin contenido--> 
  </span>
  <div id="navBar">
  <div class="style1" id="sectionLinks">
      <h3 class="style18">MENU PRINCIPAL </h3>
    <ul>
      <li class="style18"><a href="main.php"><img src="botoninicio.png" alt="Inicio" width="150" longdesc="main.php" /></a></li>
      <li class="style18"><a href="busqueda.php"><img src="botonbuscar.png" alt="Buscador" width="150" longdesc="busqueda.php" /></a></li>
      <li class="style18"><a href="peliculas.php"><img src="botonpeliculas.png" alt="Peliculas" width="150" longdesc="peliculas.php" /></a></li>
      <li><span class="style18"><a href="directores.php"><img src="botondirectores.png" alt="Directores" width="150" longdesc="directores.php" /></a></span></li>
      <li><span class="style18"><a href="actores.php"><img src="botonactores.png" alt="Actores" width="150" longdesc="actores.php" /></a></span></li>
      <li><a href="acercade.php"class="style6"><img src="botonacercade.png" alt="Acerca De" width="150" longdesc="acercade.php" /></a></li>
    </ul>
  </div>
  <div class="relatedLinks">
    <h3 class="style18">CATEGORIAS</h3>
   <?php
		//Comenzamos a crear la lista de enlaces
		echo "<ul>";
		//Consultamos los géneros de la base de datos y lo ordenamos alfabéticamente
		$generosbasedatos=conexion("SELECT id, nombre FROM generos ORDER BY nombre ASC");
		$totalgeneros= mysql_num_rows($generosbasedatos); //Cuenta el total de filas en la consulta
		//Si existe la consulta, rellenamos una lista 
		if($enlacesgenero= mysql_fetch_array($generosbasedatos))
		{
			//Mientras exista el resultado de la consulta, hacemos una lista con los enlaces a los géneros de la BD
			while ($enlacesgenero= mysql_fetch_array($generosbasedatos))
			{
				echo "<li><span class=\"style18\"><a href=\"categorias.php?id=".$enlacesgenero["id"]."\">".$enlacesgenero["nombre"]."</a></span></li>";
			}
			//Cerramos la lista
			echo "</ul>";
		} else {
		//En el caso de que no exista lo dejamos sin enlaces
		echo "</ul>";
		}
		//Cerramos la base de datos
		mysql_close();
	?>
  </div>
  <div class="relatedLinks">
    <h3><span class="formu style6 style18">ACCESO CLIENTES</span></h3>
    <ul class="style18">
      <li><a href="acceso.php"><img src="botonacceso.png" alt="Acceso" width="150" longdesc="acceso.php" /></a></li>
    </ul>

    <ul>
      <li><span class="style6"><a href="registrousuario.php" title="Nuevo Cliente"><img src="botonnuevocliente.png" alt="Nuevo Cliente" width="150" longdesc="registrousuario.php" /></a></span></li>
    </ul>
  </div>
</div>
<!--end navBar div -->
  </span>
  <div class="style13" id="siteInfo">
  <div align="center" class="style16">&copy;2010-2011 CFP Caixanova Ourense Contacto </div>
</div>
  <span class="style13"><br />
  </span>
</body>
</html>
