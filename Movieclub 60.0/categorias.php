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
  <div align="center" class="style13">
	<?php
		//Cogemos la id del genero elegido a través del enlace
		$idcategoria=$_GET["id"];
		//Consultamos todas las películas de la categoría elegida
		$categoriaelegidabasedatos=conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE id_genero='$idcategoria' ORDER BY titulo ASC");
		$totalbdcategoriaelegida=mysql_num_rows($categoriaelegidabasedatos); //Contamos las filas
	echo "Peliculas en total: $totalbdcategoriaelegida </p>";	  //Mostramos el total de películas que hay en la base de datos
?>
    <table width="100%" border="1" bordercolor="#00FFFF" bgcolor="#CCCCCC">
      <tr>
        <th scope="col"><div align="center">
	<?php
	//Mientras exista la consulta, rellenamos los datos, rellenamos todo lo referente a la información reducida
	//de las películas de la base de datos
	while($datoscategoria=mysql_fetch_array($categoriaelegidabasedatos)){
	echo "<table width=\"90%\" border=\"2\">";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><div align=\"center\"><b>Cartel:</b></td>";
	echo "<td><div align=\"center\"><img src=\"".$datoscategoria["cartel"]."\" width=\"300\" height=\"300\" /></td></tr>";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><div align=\"center\"><b>Título:</b></td>";
	echo"<td><a href=\"informacion-extendida.php?id=".$datoscategoria["id"]."\">".$datoscategoria["titulo"]."</a></td></tr>";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><div align=\"center\"><b>Año:</b></td><td>".$datoscategoria["anho"]."</td></tr>";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><div align=\"center\"><b>Género:</b></td><td>".$datoscategoria["nombre"]."</td></tr>";
    echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><div align=\"center\"><b>Clasificación:</b></td><td>".$datoscategoria["clasificacion"]."</td></tr>";
	echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><b>Argumento</b></td><td>".$datoscategoria["argumento"]."</td></tr>";
	echo "<tr><td width=\"37%\" bgcolor=\"#99FFCC\"><b>Trailer</b></td><td><object width=\"560\" height=\"349\"><param name=\"movie\" value=\"".$datoscategoria["trailer"]."\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param><embed src=\"".$datoscategoria["trailer"]."\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"560\" height=\"349\"></embed></object></td></tr>";
    echo "</table>";
	echo"<p>&nbsp;</p>";
	echo"<p>&nbsp;</p>";	
	}
//Cerramos la base de datos
mysql_close();

?>
</div>
</th>
      </tr>
    </table>

    <p align="left" class="style18">&nbsp; </p>
    <p>&nbsp;</p>
  </div>
</div>
  <span class="style13">
  <!-- fin contenido--> 
  </span>
  <div class="style13" id="navBar">
  <div class="style1" id="sectionLinks">
    <h3 class="style6 style18">MENU PRINCIPAL </h3>
    <ul>
      <li class="style6 style18"><a href="main.php"><img src="botoninicio.png" alt="Inicio" width="150" longdesc="main.php" /></a></li>
      <li class="style6 style18"><a href="busqueda.php"><img src="botonbuscar.png" alt="Buscador" width="150" longdesc="busqueda.php" /></a></li>
      <li class="style6 style18"><a href="peliculas.php"><img src="botonpeliculas.png" alt="Peliculas" width="150" longdesc="peliculas.php" /></a></li>
      <li class="style18"><span class="style6"><a href="directores.php"><img src="botondirectores.png" alt="Directores" width="150" longdesc="directores.php" /></a></span></li>
      <li class="style18"><span class="style6"><a href="actores.php"><img src="botonactores.png" alt="Actores" width="150" longdesc="actores.php" /></a></span></li>
      <li><span class="style18"><a href="acercade.php"class="style6"><img src="botonacercade.png" alt="Acerca De" width="150" longdesc="acercade.php" /></a></span><a href="acercade.php"class="style6"></a></li>
    </ul>
  </div>
  <div class="relatedLinks">
    <h3 class="style6 style18">CATEGORIAS</h3>
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
    <ul class="style6">
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
