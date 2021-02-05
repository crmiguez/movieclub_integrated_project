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
<title>Movieclub, tu tienda de peliculas:: Resultado</title>
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
.style19 {font-size: 12pt}
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
<style type="text/css">
<!--
.style20 {font-size: 12px}
-->
</style>
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
	$genero=limpiar ($_POST["genero"]);
	$premio= limpiar ($_POST["premio"]);
	$tarifa= limpiar ($_POST["tarifa"]);
//BUSQUEDA PARCIAL POR TÍTULO
	//Comprobamos que no está vacío
if ($titulo<>''){
	//Hacemos una consulta con LIKE para el título
	$cadenatitulo= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero 
	WHERE titulo LIKE '%$titulo%'");
	$resultadostitulonumero=mysql_num_rows($cadenatitulo); //Contamos las filas
	if($resultadostitulonumero>=1)
	{
		//Mostramos el número de resultados obtenidos a través del título
		echo "Hay $resultadostitulonumero resultados de la búsqueda por título '$titulo'";
		echo"<p>&nbsp;</p>";
		//Creamos la cabecera de la tabla
		echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
		echo "<tr>";
		echo "<th>Título</th>";
		echo "<th>Género</th>";
		echo "<th>Cartel</th>";
		echo "</tr>";
		while ($resultadostitulo = mysql_fetch_array($cadenatitulo))
		{
			//Y rellenamos las filas con los datos obtenidos de la consulta
			echo "<tr>";
			echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadostitulo["id"]."\">".$resultadostitulo["titulo"]."</a></td>";
			echo "<td><div align=\"center\">".$resultadostitulo["nombre"]."</td>";
			echo "<td><div align=\"center\"><img src=\"".$resultadostitulo["cartel"]."\" width=\"200\" height=\"200\" /></td>";
			echo "</tr>";
		} 
		//Una vez mostrado las filas, cerramos la tabla
		echo"</table> ";
		echo"<p>&nbsp;</p>";
	} 
	else 
	{
		//Si no existe resultados, mostramos este mensaje
		echo "No hay resultados de la búsqueda por título '$titulo'";
		echo"<p>&nbsp;</p>";
	}
} else {
//BUSQUEDA PARCIAL POR DIRECTOR
	//Comprobamos que no está vacío
if ($director<>''){
	//Hacemos una consulta con LIKE para el director
	$cadenadirector= conexion("SELECT peliculas.*, directores.nombre FROM peliculas INNER JOIN directores ON directores.id=peliculas.id_director 
	WHERE nombre LIKE '%$director%'");
	$resultadosdirectornumero=mysql_num_rows($cadenadirector); //Contamos las filas
	if($resultadosdirectornumero>=1)
	{
		//Mostramos el número de resultados obtenidos a través del director
		echo "Hay $resultadosdirectornumero resultados de la búsqueda por director '$director'";
		echo"<p>&nbsp;</p>";
		//Creamos la cabecera de la tabla
		echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
		echo "<tr>";
		echo "<th>Título</th>";
		echo "<th>Director</th>";
		echo "<th>Cartel</th>";
		echo "</tr>";
		while ($resultadosdirector = mysql_fetch_array($cadenadirector))
		{
		//Y rellenamos las filas con los datos obtenidos de la consulta
			echo "<tr>";
			echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosdirector["id"]."\">".$resultadosdirector["titulo"]."</a></td>";
			echo "<td><div align=\"center\">".$resultadosdirector["nombre"]."</td>";
			echo "<td><div align=\"center\"><img src=\"".$resultadosdirector["cartel"]."\" width=\"200\" height=\"200\" /></td>";
			echo "</tr>";
		} 
		//Una vez mostrado las filas, cerramos la tabla
		echo"</table> ";
		echo"<p>&nbsp;</p>";
	} 
	else 
	{
		//Si no existe resultados, mostramos este mensaje
		echo "No hay resultados de la búsqueda por director '$director'";
		echo"<p>&nbsp;</p>";
	}
} else {
//BUSQUEDA PARCIAL POR ACTOR
	//Comprobamos que no está vacío
if ($actor<>''){
	//Hacemos una consulta con doble INNER JOIN y LIKE para el actor
	$cadenaactor= conexion("SELECT peliculas.*, actores.nombre_artistico FROM (peliculas INNER JOIN interpretan_ac_pe ON interpretan_ac_pe.id_pelicula=peliculas.id)INNER JOIN actores ON actores.id=interpretan_ac_pe.id_actor WHERE nombre_artistico LIKE '%$actor%'");
	$resultadosactornumero=mysql_num_rows($cadenaactor); //Contamos las filas
	if($resultadosactornumero>=1)
	{
		//Mostramos el número de resultados obtenidos a través del actor
		echo "Hay $resultadosactornumero resultados de la búsqueda por actor '$actor'";
		echo"<p>&nbsp;</p>";
		//Creamos la cabecera de la tabla
		echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
		echo "<tr>";
		echo "<th>Título</th>";
		echo "<th>Actor</th>";
		echo "<th>Cartel</th>";
		echo "</tr>";
		while ($resultadosactor = mysql_fetch_array($cadenaactor))
		{
			//Y rellenamos las filas con los datos obtenidos de la consulta
			echo "<tr>";
			echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosactor["id"]."\">".$resultadosactor["titulo"]."</a></td>";
			echo "<td><div align=\"center\">".$resultadosactor["nombre_artistico"]."</td>";
			echo "<td><div align=\"center\"><img src=\"".$resultadosactor["cartel"]."\" width=\"200\" height=\"200\" /></td>";
			echo "</tr>";
		} 
		//Una vez mostrado las filas, cerramos la tabla
		echo"</table> ";
		echo"<p>&nbsp;</p>";
	} 
	else 
	{
		//Si no existe resultados, mostramos este mensaje
		echo "No hay resultados de la búsqueda por actor '$actor'";
		echo"<p>&nbsp;</p>";
	}
} else {
//BUSQUEDA PARCIAL POR AÑO DE ESTRENO
	//Comprobamos que no está vacío
if ($anho<>''){
	//Hacemos un switch, dependiendo de lo que elija en el list/menu
	switch ($anho) {
    case 'Todos':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año Todos
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año Todos";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año Todos";
			echo"<p>&nbsp;</p>";
		}
        break;
    case '2011':
		$cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2011");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2011
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2011";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2011";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2010':
		$cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2010");
				$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2010
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2010";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2010";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2009':
		$cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2009");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2009
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2009";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2009";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2008':
		$cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2008");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2008
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2008";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2008";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2007':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2007");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2007
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2007";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2007";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2006':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2006");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2006
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2006";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2006";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2005':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2005");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2005
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2005";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2005";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2004':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2004");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2004
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2004";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2004";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2003':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2003");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2003
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2003";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2003";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2002':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2002");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2002
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2002";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2002";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2001':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2001");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2001
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2001";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2001";
			echo"<p>&nbsp;</p>";
		}
        break;
	case '2000':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho = 2000");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año 2000
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año 2000";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año 2000";
			echo"<p>&nbsp;</p>";
		}
        break;
    case 'Antes de 2000':
        $cadenaanho= conexion("SELECT peliculas.* FROM peliculas WHERE anho < 2000");
		$resultadosanhonumero=mysql_num_rows($cadenaanho); //Contamos las filas
		if($resultadosanhonumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del año antes de 2000
			echo "Hay $resultadosanhonumero resultados de la búsqueda por año antes del 2000";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Año</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosanho = mysql_fetch_array($cadenaanho))
			{
			//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosanho["id"]."\">".$resultadosanho["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosanho["anho"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosanho["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por año antes del 2000";
			echo"<p>&nbsp;</p>";
		}
        break;
	}
}else{
//BUSQUEDA PARCIAL POR GÉNERO
	//Comprobamos que no está vacío
if ($genero<>''){
	//Hacemos un switch, dependiendo de lo que elija en el list/menu
	switch ($genero) {
    case 'Todos':
        $cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Todos
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Todos";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Todos";
			echo"<p>&nbsp;</p>";
		}
        break;
    case 'Sin Género':
		$cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre= 'Sin Género' OR nombre IS NULL");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Sin Género
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Sin Género";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Sin Género";
			echo"<p>&nbsp;</p>";
		}
        break;
	case 'Romántica':
		$cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre= 'Romántica'");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Romántica
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Romántica";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Romántica";
			echo"<p>&nbsp;</p>";
		}
        break;
	case 'Histórica':
		$cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre= 'Histórica'");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Histórica
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Histórica";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Histórica";
			echo"<p>&nbsp;</p>";
		}
        break;
	case 'Terror':
		$cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre='Terror'");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Terror
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Terror";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Terror";
			echo"<p>&nbsp;</p>";
		}
        break;
	case 'Suspense':
        $cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre='Suspense'");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Suspense
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Suspense";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Suspense";
			echo"<p>&nbsp;</p>";
		}
        break;
	case 'Comedia':
        $cadenagenero= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE nombre='Comedia'");
		$resultadosgeneronumero=mysql_num_rows($cadenagenero); //Contamos las filas
		if($resultadosgeneronumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través del género Comedia
			echo "Hay $resultadosgeneronumero resultados de la búsqueda por género Comedia";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Género</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadosgenero = mysql_fetch_array($cadenagenero))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadosgenero["id"]."\">".$resultadosgenero["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadosgenero["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadosgenero["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por género Comedia";
			echo"<p>&nbsp;</p>";
		}
        break;
	}
}else{
//BUSQUEDA PARCIAL POR PREMIO
	//Comprobamos que no está vacío
if ($premio<>''){
	//Hacemos un switch, dependiendo de lo que elija en el list/menu
	switch ($premio) {
    case 'Todos':
        $cadenapremio= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN premios ON premios.id_pelicula=peliculas.id");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de todos los premios
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios Todos";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Premio</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadospremio["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio Todos";
			echo"<p>&nbsp;</p>";
		}
        break;
		case 'No Tiene Premio':
        $cadenapremio= conexion("SELECT peliculas.* FROM peliculas WHERE id NOT IN(SELECT id_pelicula 
																				   FROM premios)");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de los que no tiene premio
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios No Tiene Premio";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio No Tiene Premio";
			echo"<p>&nbsp;</p>";
		}
        break;
		case 'Oscar':
        $cadenapremio= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN premios ON premios.id_pelicula=peliculas.id WHERE nombre='Oscar'");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de los premios Oscar
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios Todos";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Premio</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadospremio["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio Oscar";
			echo"<p>&nbsp;</p>";
		}
        break;
		case 'Globo Oro':
        $cadenapremio= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN premios ON premios.id_pelicula=peliculas.id WHERE nombre='Globo Oro'");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de los premios Globo de Oro
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios Todos";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Premio</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadospremio["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio Globo Oro";
			echo"<p>&nbsp;</p>";
		}
        break;
		case 'Goya':
        $cadenapremio= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN premios ON premios.id_pelicula=peliculas.id WHERE nombre='Goya'");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de los premios Goya
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios Goya";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Premio</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadospremio["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio Goya";
			echo"<p>&nbsp;</p>";
		}
        break;
		case 'Festival':
        $cadenapremio= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN premios ON premios.id_pelicula=peliculas.id WHERE nombre LIKE 'Festival%' OR nombre LIKE 'Grand Prix%'");
		$resultadospremionumero=mysql_num_rows($cadenapremio); //Contamos las filas
		if($resultadospremionumero>=1)
		{
			//Mostramos el número de resultados obtenidos a través de los premios en Festival
			echo "Hay $resultadospremionumero resultados de la búsqueda por premios Festival";
			echo"<p>&nbsp;</p>";
			//Creamos la cabecera de la tabla
			echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
			echo "<tr>";
			echo "<th>Título</th>";
			echo "<th>Premio</th>";
			echo "<th>Cartel</th>";
			echo "</tr>";
			while ($resultadospremio = mysql_fetch_array($cadenapremio))
			{
				//Y rellenamos las filas con los datos obtenidos de la consulta
				echo "<tr>";
				echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadospremio["id"]."\">".$resultadospremio["titulo"]."</a></td>";
				echo "<td><div align=\"center\">".$resultadospremio["nombre"]."</td>";
				echo "<td><div align=\"center\"><img src=\"".$resultadospremio["cartel"]."\" width=\"200\" height=\"200\" /></td>";
				echo "</tr>";
			} 
			//Una vez mostrado las filas, cerramos la tabla
			echo"</table> ";
			echo"<p>&nbsp;</p>";
		} 
		else 
		{
			//Si no existe resultados, mostramos este mensaje
			echo "No hay resultados de la búsqueda por premio Festival";
			echo"<p>&nbsp;</p>";
		}
        break;
	}
}else{
//BUSQUEDA PARCIAL POR PREMIO
	//Comprobamos que no está vacío
if ($tarifa<>''){
	//Hacemos un switch, dependiendo de lo que elija en el list/menu
	switch ($tarifa) {
		case 15:
			$cadenatarifa= conexion("SELECT peliculas.*, precio FROM peliculas INNER JOIN tarifas ON tarifas.id=peliculas.id_tarifa WHERE precio = 15");
			$resultadostarifanumero=mysql_num_rows($cadenatarifa); //Contamos las filas
			if($resultadostarifanumero>=1)
			{
				//Mostramos el número de resultados obtenidos a través del precio 15 euros
				echo "Hay $resultadostarifanumero resultados de la búsqueda por precio de 15 euros";
				echo"<p>&nbsp;</p>";
				//Creamos la cabecera de la tabla
				echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
				echo "<tr>";
				echo "<th>Título</th>";
				echo "<th>Precio</th>";
				echo "<th>Cartel</th>";
				echo "</tr>";
				while ($resultadostarifa = mysql_fetch_array($cadenatarifa))
				{
					//Y rellenamos las filas con los datos obtenidos de la consulta
					echo "<tr>";
					echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadostarifa["id"]."\">".$resultadostarifa["titulo"]."</a></td>";
					echo "<td><div align=\"center\">".$resultadostarifa["precio"]." euros </td>";
					echo "<td><div align=\"center\"><img src=\"".$resultadostarifa["cartel"]."\" width=\"200\" height=\"200\" /></td>";
					echo "</tr>";
				} 
				//Una vez mostrado las filas, cerramos la tabla
				echo"</table> ";
				echo"<p>&nbsp;</p>";
			} 
			else 
			{
				//Si no existe resultados, mostramos este mensaje
				echo "No hay resultados de la búsqueda por precio de 15 euros";
				echo"<p>&nbsp;</p>";
			}
		break;
		case 20:
			$cadenatarifa= conexion("SELECT peliculas.*, precio FROM peliculas INNER JOIN tarifas ON tarifas.id=peliculas.id_tarifa WHERE precio = 20");
			$resultadostarifanumero=mysql_num_rows($cadenatarifa); //Contamos las filas
			if($resultadostarifanumero>=1)
			{
				//Mostramos el número de resultados obtenidos a través del precio 20 euros
				echo "Hay $resultadostarifanumero resultados de la búsqueda por precio de 20 euros";
				echo"<p>&nbsp;</p>";
				//Creamos la cabecera de la tabla
				echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
				echo "<tr>";
				echo "<th>Título</th>";
				echo "<th>Precio</th>";
				echo "<th>Cartel</th>";
				echo "</tr>";
				while ($resultadostarifa = mysql_fetch_array($cadenatarifa))
				{
					//Y rellenamos las filas con los datos obtenidos de la consulta
					echo "<tr>";
					echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadostarifa["id"]."\">".$resultadostarifa["titulo"]."</a></td>";
					echo "<td><div align=\"center\">".$resultadostarifa["precio"]." euros </td>";
					echo "<td><div align=\"center\"><img src=\"".$resultadostarifa["cartel"]."\" width=\"200\" height=\"200\" /></td>";
					echo "</tr>";
				} 
				//Una vez mostrado las filas, cerramos la tabla
				echo"</table> ";
				echo"<p>&nbsp;</p>";
			} 
			else 
			{
				//Si no existe resultados, mostramos este mensaje
				echo "No hay resultados de la búsqueda por precio de 20 euros";
				echo"<p>&nbsp;</p>";
			}
		break;
		case 25:
			$cadenatarifa= conexion("SELECT peliculas.*, precio FROM peliculas INNER JOIN tarifas ON tarifas.id=peliculas.id_tarifa WHERE precio = 25");
			$resultadostarifanumero=mysql_num_rows($cadenatarifa); //Contamos las filas
			if($resultadostarifanumero>=1)
			{
				//Mostramos el número de resultados obtenidos a través del precio 25 euros
				echo "Hay $resultadostarifanumero resultados de la búsqueda por precio de 25 euros";
				echo"<p>&nbsp;</p>";
				//Creamos la cabecera de la tabla
				echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
				echo "<tr>";
				echo "<th>Título</th>";
				echo "<th>Precio</th>";
				echo "<th>Cartel</th>";
				echo "</tr>";
				while ($resultadostarifa = mysql_fetch_array($cadenatarifa))
				{
					//Y rellenamos las filas con los datos obtenidos de la consulta
					echo "<tr>";
					echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$resultadostarifa["id"]."\">".$resultadostarifa["titulo"]."</a></td>";
					echo "<td><div align=\"center\">".$resultadostarifa["precio"]." euros </td>";
					echo "<td><div align=\"center\"><img src=\"".$resultadostarifa["cartel"]."\" width=\"200\" height=\"200\" /></td>";
					echo "</tr>";
				} 
				//Una vez mostrado las filas, cerramos la tabla
				echo"</table> ";
				echo"<p>&nbsp;</p>";
			} 
			else 
			{
				//Si no existe resultados, mostramos este mensaje
				echo "No hay resultados de la búsqueda por precio de 25 euros";
				echo"<p>&nbsp;</p>";
			}
		break;
		
	}
} else {
//Si está vacío, le pedimos que haga una búsqueda parcial de cada uno de los campos y volvemos al formulario
	echo "
	<script>alert('Por favor realiza una búsqueda parcial de cada uno de los campos')
		history.back(1);
	</script>";
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
  </div>
  <h3 align="left" class="style13">&nbsp;</h3>
</div>
  <span class="style13">
  <!-- fin contenido--> 
  </span>
  <div class="style13" id="navBar">
  <div class="style1" id="sectionLinks">
    <h3 class="style6 style19">MENU PRINCIPAL </h3>
    <ul>
      <li class="style6"><a href="main.php"><img src="botoninicio.png" alt="Inicio" width="150" longdesc="main.php" /></a></li>
      <li class="style6"><a href="busqueda.php"><img src="botonbuscar.png" alt="Buscador" width="150" longdesc="busqueda.php" /></a></li>
      <li class="style6"><a href="peliculas.php"><img src="botonpeliculas.png" alt="Peliculas" width="150" longdesc="peliculas.php" /></a></li>
      <li><span class="style6"><a href="directores.php"><img src="botondirectores.png" alt="Directores" width="150" longdesc="directores.php" /></a></span></li>
      <li><span class="style6"><a href="actores.php"><img src="botonactores.png" alt="Actores" width="150" longdesc="actores.php" /></a></span></li>
      <li><a href="acercade.php"class="style6"><img src="botonacercade.png" alt="Acerca De" width="150" longdesc="acercade.php" /></a></li>
    </ul>
  </div>
  <div class="relatedLinks">
    <h3 class="style6 style19">CATEGORIAS</h3>
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
				echo "<li><span class=\"style6\"><a href=\"categorias.php?id=".$enlacesgenero["id"]."\">".$enlacesgenero["nombre"]."</a></span></li>";
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
    <h3><span class="formu style6 style19">ACCESO CLIENTES</span></h3>
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
  <div align="center" class="style16 style20">&copy;2010-2011 CFP Caixanova Ourense Contacto </div>
</div>
  <span class="style13"><br />
  </span>
</body>
</html>
