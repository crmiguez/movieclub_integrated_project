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
<title>Movieclub, tu tienda de peliculas:: Buscador</title>
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
.style7 {color: #FFFFFF}
.style13 {font-size: 16pt}
.style14 {color: #334d55}
.style16 {color: #333333}
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
.style19 {font-size: 12pt}
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
  <form id="form1" name="form1" method="post" action="resultado.php">
    <h3 align="left" class="style13">Quiero buscar peliculas por </h3>
    <div align="center" class="style13">
      <table width="504" height="308" border="2" bordercolor="#6666CC">
        <tr>
          <th width="109" bgcolor="#33CCFF" scope="row"><span class="style14">Título:</span></th>
          <td width="377" bgcolor="#CCCCCC"><label>
            <input name="titulo" type="text" value="" size="60" />
          </label></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style14">Director/Directora:</span></th>
          <td bgcolor="#CCCCCC"><label>
            <input name="director" type="text" value="" size="60" />
          </label></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style14">Actor/Actriz:</span></th>
          <td bgcolor="#CCCCCC"><input name="actor" type="text" value="" size="60" /></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style7">
            <label>Año Estreno : </label>
          </span></th>
          <td bgcolor="#CCCCCC"><label>
            <select name="anho">
              <option>Todos</option>
              <option>2011</option>
              <option>2010</option>
              <option>2009</option>
              <option>2008</option>
              <option>2007</option>
              <option>2006</option>
              <option>2005</option>
              <option>2004</option>
              <option>2003</option>
              <option>2002</option>
              <option>2001</option>
              <option>2000</option>
              <option>Antes de 2000</option>
              <option selected="selected"> </option>
            </select>
          </label></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style7">
            <label>Género: </label>
          </span></th>
          <td bgcolor="#CCCCCC"><label>
            <select name="genero">
              <option>Todos</option>
              <option>Sin Género</option>
              <option>Romántica</option>
              <option>Histórica</option>
              <option>Terror</option>
              <option>Suspense</option>
              <option>Comedia</option>
              <option selected="selected"> </option>
            </select>
          </label></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style7">
            <label>Premio: </label>
          </span></th>
          <td bgcolor="#CCCCCC"><label>
            <select name="premio">
              <option>Todos</option>
              <option>No Tiene Premio</option>
              <option>Oscar</option>
              <option>Globo Oro</option>
              <option>Goya</option>
              <option>Festival</option>
              <option selected="selected"> </option>
            </select>
          </label></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style7">
            <label>Precio Alquiler:</label>
          </span></th>
          <td bgcolor="#CCCCCC"><label>
            <select name="tarifa">
              <option>15</option>
              <option>20</option>
              <option>25</option>
              <option selected="selected"> </option>
            </select>
          </label></td>
        </tr>
      </table>
      <p>
        <label>
        <input type="submit" name="Submit" value="Buscar" />
        </label>
      </p>
    </div>
  </form>
  <h3 align="left" class="style13">&nbsp;</h3>
  <div align="center">
    <?php
  	//Si se ha iniciado sesión
	if(isset($_SESSION['nombre_usuario'])){ 
	//Consultamos si el usuario es cliente
	$nombreusuario=$_SESSION['nombre_usuario'];
	$consultarusuarioconectadocliente=conexion("SELECT nombre_usuario FROM clientes WHERE nombre_usuario='$nombreusuario'");
	$totalusuaconectadocliente=mysql_num_rows($consultarusuarioconectadocliente); //Contamos el número de filas
	if($totalusuaconectadocliente==1){
	//En el caso de que sea cliente, le creamos un enlace a su página de cliente por si desea volver
	echo "<a href=\"cliente.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a tu página de cliente</a></p>";
	} else {
	//Consultamos si el usuario es encargado
	$consultarusuarioconectadoencargado=conexion("SELECT nombre_usuario FROM encargados WHERE nombre_usuario='$nombreusuario'");
	$totalusuaconectadoencargado=mysql_num_rows($consultarusuarioconectadoencargado); //Contamos el número de filas
	if($totalusuaconectadoencargado==1){
	//En el caso de que sea encargado, le creamos un enlace a su página de encargado por si desea volver
	echo "<a href=\"administracion.php?nombre_usuario=".$_SESSION['nombre_usuario']."\">Volver a tu página de cliente</a></p>";
	} else{
	//Si no es ni cliente ni encargado, no mostramos nada
	echo "<p>&nbsp;</p>";
	}
	}
	}
  ?>
  </div>
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
				echo "<li><span class=\"style19\"><a href=\"categorias.php?id=".$enlacesgenero["id"]."\">".$enlacesgenero["nombre"]."</a></span></li>";
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
  <div align="center" class="style16">&copy;2010-2011 CFP Caixanova Ourense Contacto </div>
</div>
  <span class="style13"><br />
  </span>
</body>
</html>
