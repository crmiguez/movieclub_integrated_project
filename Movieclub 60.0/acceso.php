<?php 
	// Iniciamos sesión e incluimos los datos para realizar la conexion.
	session_start();include('conexion.php'); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movieclub, tu tienda de peliculas::Acceder</title>
<link rel="stylesheet" href="3col_rightNav.css" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-family: trebuchet MS;
	font-size: 12px;
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
.style7 {color: #FFFFFF}
.style8 {font-size: 16pt; }
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
  <h3 class="style8">Accede con tu cuenta </h3>
  <div align="center">
    <form id="form1" name="form1" method="post" action="entrar.php">
      <table width="562" height="211" border="2" bordercolor="#6666CC">
        <tr>
          <th height="102" bgcolor="#3366CC" class="style6" scope="row"><span class="style7">
            <label>Nombre Usuario: </label>
          </span></th>
          <td class="style6"><input type="text" name="usuario" /></td>
        </tr>
        <tr>
          <th height="99" bgcolor="#33CCFF" class="style6" scope="row"><span class="style7">
            <label>Contraseña:</label>
          </span></th>
          <td class="style6"><input name="clave" type="password" /></td>
        </tr>
      </table>
      <p class="style6">
        <label>
        <input type="submit" name="btncliente" value="Aceptar" />
        </label>
        <label></label>
      </p>
    </form>
	
    <p>&nbsp;</p>
  </div>
  <h3 align="left" class="style3"><span class="style8">Acceso solo para encargados</span></h3>
  <form id="form2" name="form2" method="post" action="entrar-encargado.php">
    <div align="center">
      <table width="562" height="211" border="2" bordercolor="#009966">
        <tr>
          <th height="102" bgcolor="#00CC33" class="style6" scope="row"><span class="style7">
            <label>Nombre Usuario: </label>
          </span></th>
          <td class="style6"><input type="text" name="usuario2" /></td>
        </tr>
        <tr>
          <th height="99" bgcolor="#00FF66" class="style6" scope="row"><span class="style7">
            <label>Contraseña:</label>
          </span></th>
          <td class="style6"><input name="clave2" type="password" /></td>
        </tr>
          </table>
    </div>
    <div align="center">
	  <p>
	    <input type="submit" name="btnencargado" value="Aceptar" />
        </p>
    </div>
  </form>
  <p align="left" class="style3">&nbsp;</p>
</div>
<div align="center">
   
</div>
  <!-- fin contenido--> 
  <div id="navBar">
  <div class="style6" id="sectionLinks">
      <h3 class="style18 style6">MENU PRINCIPAL </h3>
    <ul>
      <li class="style18"><a href="main.php"><img src="botoninicio.png" alt="Inicio" width="150" longdesc="main.php" /></a></li>
      <li class="style18"><a href="busqueda.php"><img src="botonbuscar.png" alt="Buscador" width="150" longdesc="busqueda.php" /></a></li>
      <li class="style18"><a href="peliculas.php"><img src="botonpeliculas.png" alt="Peliculas" width="150" longdesc="peliculas.php" /></a></li>
      <li><span class="style18"><a href="directores.php"><img src="botondirectores.png" alt="Directores" width="150" longdesc="directores.php" /></a></span></li>
      <li><span class="style18"><a href="actores.php"><img src="botonactores.png" alt="Actores" width="150" longdesc="actores.php" /></a></span></li>
      <li><a href="acercade.php"><img src="botonacercade.png" alt="Acerca De" width="150" longdesc="acercade.php" /></a></li>
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
