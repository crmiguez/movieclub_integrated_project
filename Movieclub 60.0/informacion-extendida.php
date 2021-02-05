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
.style2 {
	color: #333333;
	font-size: 12px;
}
.style6 {font-size: 12pt}
-->
</style>
<style type="text/css">
<!--
.style11 {font-size: 14px}
.style12 {font-size: 14pt}
.style13 {font-size: 18pt}
.style9 {font-size: 36pt}
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
<!--Hoja de estilos del calendario -->
<link rel="stylesheet" type="text/css" media="all" href="calendar-blue.css"/>
<!-- librería principal del calendario -->
<script type="text/javascript" src="calendar.js"></script>
<!-- librería para cargar el lenguaje deseado -->
<script type="text/javascript" src="calendar-es.js"></script>
<!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código -->
<script type="text/javascript" src="calendar-setup.js"></script>
</head>
<body>
<div id="masthead">
  <h1 id="siteName"><img src="Fondo Movieclub.png" width="1210" height="113" /></h1>
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
    <p>
      <?php
  	//Cogemos la id de la película que se desea ver
	$idpelicula=$_GET["id"];
	//Actualizamos el campo de visitas de la película
	$actualizarvisitaspelicula=conexion("UPDATE peliculas SET visitas = visitas + 1 WHERE id=$idpelicula");
	//Vamos a realizar 5 consultas en la información amplia de la película
		//PRIMERA CONSULTA: Consultamos toda la información de la película elegida 
	$verpeliculaelegida=conexion("SELECT trailer, titulo, clasificacion, nombre, anho, argumento, visitas, cartel
	FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero
	WHERE peliculas.id=$idpelicula");
		//SEGUNDA CONSULTA: Consultamos el director de la película elegida
	$directorpeliculaelegida=conexion("SELECT directores.id, nombre FROM directores INNER JOIN peliculas ON peliculas.id_director=directores.id
	WHERE peliculas.id=$idpelicula");
		//TERCERA CONSULTA: Consultamos el precio de la película elegida
	$preciopeliculaelegida=conexion("SELECT precio
	FROM tarifas INNER JOIN peliculas ON peliculas.id_tarifa=tarifas.id
	WHERE peliculas.id=$idpelicula");
		//CUARTA CONSULTA: Consultamos todos los actores que han participado en la película elegida
	$actorespeliculaelegida=conexion("SELECT actores.id, nombre_artistico FROM actores INNER JOIN interpretan_ac_pe ON interpretan_ac_pe.id_actor=actores.id WHERE id_pelicula=$idpelicula");
	$numeroactorespeliculaelegida=mysql_num_rows($actorespeliculaelegida);  //Contamos las filas 
																			//para luego mostrarlo en la información amplia
		//QUINTA CONSULTA: Consultamos los premios de la película elegida
	$premiospeliculaelegida=conexion("SELECT nombre FROM premios WHERE id_pelicula=$idpelicula");
	$numeropremiospeliculaelegida=mysql_num_rows($premiospeliculaelegida);  //Contamos las filas 
																			//para luego mostrarlo en la información amplia
	?>
	</p>
    <table width="100%" border="2" bordercolor="#0033FF" bgcolor="#CCCCCC">
      <tr>
        <th scope="col">
          <?php
	//Creamos la tabla principal con la información de la primera consulta
		while($filaselegida=mysql_fetch_array($verpeliculaelegida)){
		echo "<span class=\"style9\"><b>".$filaselegida["titulo"]."</span></b>";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"center\"><object width=\"700\" height=\"500\"><param name=\"movie\" value=\"".$filaselegida["trailer"]."\"></param><param name=\"allowFullScreen\" value=\"true\"></param><param name=\"allowscriptaccess\" value=\"always\"></param>
			<embed src=\"".$filaselegida["trailer"]."\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"true\" width=\"700\" height=\"500\"></embed></object>"; 
		echo"<p>&nbsp;</p>";
		echo "<div align=\"center\"><img src=\"".$filaselegida["cartel"]."\" width=\"300\" height=\"300\" />";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"left\"><b class=\"style18\">Clasificación: </b>".$filaselegida["clasificacion"]."";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"left\"><b class=\"style18\">Género: </b>".$filaselegida["nombre"]."";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"left\"><b class=\"style18\">Año de estreno: </b>".$filaselegida["anho"]."";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"left\"><b class=\"style18\">Argumento: </b>".$filaselegida["argumento"]."";
		echo"<p>&nbsp;</p>";
		echo "<div align=\"left\"><b class=\"style18\">Visitas: </b>".$filaselegida["visitas"]."";
		}
		echo"<p>&nbsp;</p>";
		//Después ponemos el director de la película,
		//que corresponde con la segunda consulta
		while($filaselegida2=mysql_fetch_array($directorpeliculaelegida)){
		echo "<div align=\"left\"><b>Director: </b>
		<a href=\"informacion-extendida-director.php?id=".$filaselegida2["id"]."\">".$filaselegida2["nombre"]."</a>";
		}
		echo"<p>&nbsp;</p>";
		//Ahora ponemos el precio de la película,
		//que corresponde con la tercera consulta
		while($filaselegida3=mysql_fetch_array($preciopeliculaelegida)){
		echo "<div align=\"left\">Precio: <b class=\"style9\">".$filaselegida3["precio"]."</b> euros";
		}
		echo"<p>&nbsp;</p>";
	?>        
      </th>
      </tr>
    </table>
	<p class="style13">&nbsp;</p>
    <table width="50%" border="2" bordercolor="#00CC99" bgcolor="#CCCCCC">
      <tr>
        <th scope="col"><div align="center">
		  <?php
		if($numeroactorespeliculaelegida==0)
		{
				//Si no hay actores,
				//Mostrará que no hay ninguno en la película elegida
				echo " <p align=\"center\" class=\"style13\">
			No ha interpretado ningún actor o actriz en esta película</p>";
			} else {
			//Si hay actores,
			//mostramos cuántos actores han interpretado en la película elegida
			echo " <p align=\"center\" class=\"style13\">
			Han interpretado en esta película $numeroactorespeliculaelegida actores</p>";
			//Mostramos el nombre de los actores, que corresponde con la cuarta consulta
					while($filaselegida4=mysql_fetch_array($actorespeliculaelegida)){
					echo "<div align=\"left\"><a href=\"informacion-extendida-actor.php?id=".$filaselegida4["id"]."\">
		".$filaselegida4["nombre_artistico"]."</a>";
		echo"<p>&nbsp;</p>";
			}
		}
		?>
	      </div></th>
        <th scope="col"><div align="center">
		  <?php
		if($numeropremiospeliculaelegida==0)
		{
				echo " <p align=\"center\" class=\"style13\">
			No obtuvo ningún premio</p>";
			} else {
			//Mostramos cuántos premios tiene la película
				echo " <p align=\"center\" class=\"style13\">
			Obtuvo $numeropremiospeliculaelegida premios</p>";
			//Mostramos el nombre de los premios, que corresponde con la quinta y última consulta
				while($filaselegida5=mysql_fetch_array($premiospeliculaelegida)){
					echo "<div align=\"left\">".$filaselegida5["nombre"]."";
					echo"<p>&nbsp;</p>";
				}
		}
		//Cerramos la base de datos
		mysql_close();
		?>
	      </div></th>
      </tr>
    </table>
    <p>&nbsp;  </p>
        
    <span class="style12">
    </p>
    </span>    
    <div align="left"></div>
  </div>
  <div align="center">
    <p><span class="style12">	</span>
      <?php 
	//Si no hay usuario registrado
//Le mostramos el mensaje de que tiene que registrarse
if(!isset($_SESSION['nombre_usuario'])){ 
	echo "<table width=\"90%\" border=\"2\" bordercolor=\"#CC0000\" bgcolor=\"#CC9966\">";
    echo "<tr>";
    echo "<td><div align=\"center\">No puedes alquilar la pelicula porque no estás registrado. 
   Haz <a href=\"registrousuario.php\">click aquí</a> para registrarte.</td>";
    echo "</tr>";
    echo "</table>";
   } else { 
 //Si hay usuario registrado
 //Le mostramos si está disponible la película elegida
 //Consultamos si la película elegida está disponible
 $disponiblepeliculaelegida=conexion("SELECT disponible FROM peliculas WHERE id=$idpelicula AND disponible >=1");
 $filasdisponible=mysql_num_rows($disponiblepeliculaelegida); 				//Contamos el número de filas
 if($filasdisponible==1)
 {
 	//Y cargamos todo el formulario relacionado con el alquiler
   	echo("<div align=\"center\"><p class=\"style18\"> Hola ".$_SESSION['nombre_usuario'].". Realiza tu pedido. Si quieres volver a tu página pincha <a href=\"cliente.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">aquí</a></p>");
   	echo "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"validar-alquilar-pelicula.php?id=$idpelicula\">";
    echo "<table width=\"90%\" border=\"2\" bordercolor=\"#00FF00\" bgcolor=\"#FFFFFF\">";
    echo "<tr>";
    echo "<td><label>Vendré a la tienda a buscar la película el día...</label>
     <input type=\"text\" name=\"fechainicio\" id=\"fecha_inicio\" />
     <input type=\"button\" id=\"btninicio\" value=\"...\" /></td>";
    echo "</tr>";
	echo "<tr>";
   	echo "<td><label>Voy a devolver la película a la tienda el dia...</label>
	<input type=\"text\" name=\"fechafin\" id=\"fecha_fin\" />
	<input type=\"button\" id=\"btnfin\" value=\"...\" /></td>";
	echo "</tr>";
    echo "</table>";
   	echo "<p>&nbsp;</p>";
   	echo "<input type=\"submit\" name=\"Submit\" value=\"Aceptar\" />"; 
   	echo "<p>&nbsp;</p>";
  	echo "</form>";
  	echo "<!-- script que define y configura el calendario de la fecha inicio-->";
	echo "<script type=\"text/javascript\">";
	echo "Calendar.setup({
inputField : \"fecha_inicio\", // id del campo de texto
ifFormat : \"%Y/%m/%d\", // formato de la fecha que se escriba en el campo de texto
button : \"btninicio\" // el id del botón que lanzará el calendario
});";
	echo "</script>";
	echo "<!-- script que define y configura el calendario-->";
	echo "<script type=\"text/javascript\">";
	echo "Calendar.setup({
inputField : \"fecha_fin\", // id del campo de texto
ifFormat : \"%Y/%m/%d\", // formato de la fecha que se escriba en el campo de texto
button : \"btnfin\" // el id del botón que lanzará el calendario
});";
	echo "</script>";
} else {
	echo "<table width=\"90%\" border=\"2\" bordercolor=\"#CC0000\" bgcolor=\"#CC9966\">";
    echo "<tr>";
	//Le mostramos por mensaje que no está disponible 
	//y que siga buscando o que vuelva a su página de cliente
	echo"<td><div align=\"center\">Lo sentimos ".$_SESSION['nombre_usuario'].", ya han alquilado esta película o se ha agotado la cantidad.</br>
	<div align=\"center\"><a href=\"busqueda.php\">Seguir buscando</a>.</br>
	<div align=\"center\"><a href=\"cliente.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a tu página de cliente</a>.</td>";
	echo "</tr>";
    echo "</table>";
}
//Cerramos la base de datos
mysql_close();
   }
  ?>
    </p>
    <p></p>
  </div>
  <p align="left" class="style11">&nbsp;</p>
  <p align="left" class="style11">&nbsp;</p>
</div>
  <!-- fin contenido--> 
    <div id="navBar">
  <div class="style1" id="sectionLinks">
      <h3 class="style18 style6">MENU PRINCIPAL </h3>
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
    <h3 class="style18 style6">CATEGORIAS</h3>
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
    <h3><span class="formu style6">ACCESO CLIENTES</span></h3>
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
<div id="siteInfo">
  <div align="center" class="style2">&copy;2010-2011 CFP Caixanova Ourense Contacto </div>
</div>
<br />
</body>
</html>
