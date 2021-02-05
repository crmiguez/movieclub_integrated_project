<?php 
	// Iniciamos sesión e incluimos los datos para realizar la conexion.
	session_start();include('conexion.php'); 	
?>
<?php
	//Mostramos el mensaje de bienvenida
	echo "
	<script>alert('Bienvenidos a Movieclub.')
	</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
.style3 {font-size: 24pt}
.style6 {font-size: 12pt}
.style7 {font-size: 12pt; font-weight: bold; }
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
<div id="masthead">
  <h1 id="siteName"><img src="Fondo Movieclub.png" width="1210" height="113" /></h1>
</div>
<!-- Fin cabecera -->
<div id="headlines">
  <div align="center">
    <p class="style1">Buscar película</p>
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
    <p class="style1">&nbsp;</p>

    <p>&nbsp;</p>
  </div>
</div>
<div id="content">
  <h3 align="left" class="style3">NOVEDADES</h3>
  <div align="center">
<?php
  //Vamos a consultar las peliculas mas recientes
  $consultapelisnuevas= conexion("SELECT peliculas.*, nombre FROM peliculas INNER JOIN generos ON generos.id=peliculas.id_genero WHERE visitas <= 5 limit 5");
  $totalpn= mysql_num_rows($consultapelisnuevas); //Cuenta el total de filas en la consulta
  // Creamos la cabecera de la tabla
  if($fila= mysql_fetch_array($consultapelisnuevas)){
  	echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#00CCCC\">";
	echo "<tr>";
	echo "<th>Título</th>";
	echo "<th>Género</th>";
	echo "<th>Cartel</th>";
	echo "</tr>";
	do {
	//Introducimos filas y las rellenamos con contenido de la consulta con el enlace directo a la información extendida
	  	echo "<tr>";
		echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$fila["id"]."\">".$fila["titulo"]."</a></td>";
		echo "<td><div align=\"center\">".$fila["nombre"]."</td>";
		echo "<td><div align=\"center\"><img src=\"".$fila["cartel"]."\" width=\"200\" height=\"200\" /></td>";
		echo "</tr>";
	} while ($fila = mysql_fetch_array($consultapelisnuevas));
	echo"</table> ";
	echo"<p>&nbsp;</p>";
}else{
//Si no hay ninguna novedad, mostramos un mensaje
echo "¡ No hay ninguna novedad en estos momentos !";
}
//Cerramos la base de datos
mysql_close();
?>
  </div>
  <h3 align="left" class="style3">Mas vistas </h3>
  <div align="center">
 <?php 
 //Vamos a consultar las peliculas más visitadas
  $consultapelismasvistas= conexion("SELECT * FROM peliculas WHERE visitas > 5 ORDER BY visitas DESC limit 5");
  $totalmv= mysql_num_rows($consultapelismasvistas);
  // Creamos la cabecera de la tabla
  if($row= mysql_fetch_array($consultapelismasvistas)){
  	echo"<table width=\"500\" height=\"500\" border=\"2\" bgcolor=\"#0099CC\">";
	echo "<tr>";
	echo "<th>Título</th>";
	echo "<th>Visitas</th>";
	echo "</tr>";
	do {
	//Introducimos filas y las rellenamos con contenido de la consulta con el enlace directo a la información extendida
	  echo "<tr>";
		echo "<td><div align=\"center\"><a href=\"informacion-extendida.php?id=".$row["id"]."\">".$row["titulo"]."</a></td>";
		echo "<td><div align=\"center\">".$row["visitas"]."</td>";
		echo "</tr>";
	} while ($row = mysql_fetch_array($consultapelismasvistas));
	echo"</table> ";
	echo"<p>&nbsp;</p>";
}else{
//Si no hay ninguna visitada, mostramos un mensaje
echo "¡ No hay ninguna visita en las películas !";
}
//Cerramos la base de datos
mysql_close();
?>
    <h3 align="left" class="style3">Peliculas por Categoria </h3>
<?php
  //Vamos a consultar el número de películas por género
  $consultapelisporgenero= conexion("SELECT nombre, COUNT(titulo) FROM generos RIGHT OUTER JOIN peliculas ON peliculas.id_genero=generos.id GROUP BY nombre");
  $totalpg= mysql_num_rows($consultapelisporgenero);
  // Creamos la cabecera de la tabla
  if($row2= mysql_fetch_array($consultapelisporgenero)){
  	echo"<table width=\"500\" height=\"500\" border=\"1\" bordercolor=\"#333333\" bgcolor=\"#99CC00\">";
	echo "<tr>";
	echo "<th>Género</th>";
	echo "<th>Número películas</th>";
	echo "</tr>";
	do {
	//Introducimos filas y las rellenamos con contenido
		echo "<tr>";
		echo "<td><div align=\"center\">".$row2["nombre"]."</td>";
		echo "<td><div align=\"center\">".$row2["COUNT(titulo)"]."</td>";
		echo "</tr>";
	} while ($row2= mysql_fetch_array($consultapelisporgenero));
	echo"</table>";
	echo"<p>&nbsp;</p>";
}else{
//Si no hay ninguna película con género, mostramos un mensaje
echo "¡ No hay películas con género asignado !";
}
//Cerramos la base de datos
mysql_close();
?>
  </div>
</div>
  <div align="center">
  </div>
  <!-- fin contenido--> 
  <div id="navBar">
  <div class="style1" id="sectionLinks">
    <h3 class="style6">MENU PRINCIPAL </h3>
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
    <h3 class="style6">CATEGORIAS</h3>
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
    <h3><span class="formu style6">ACCESO CLIENTES</span></h3>
    <ul class="style6">
      <li><a href="acceso.php"><img src="botonacceso.png" alt="Acceso" width="150" longdesc="acceso.php" /></a></li>
    </ul>

    <ul>
      <li><span class="style6"><a href="registrousuario.php" title="Nuevo Cliente"><img src="botonnuevocliente.png" alt="Nuevo Cliente" width="150" longdesc="registrousuario.php" /></a></span></li>
    </ul>
  </div>
</div>
<!--end navBar div -->
<div id="siteInfo">
  <div align="center" class="style2">&copy;2010-2011 CFP Caixanova Ourense Contacto </div>
</div>
<br />
</body>
</html>
