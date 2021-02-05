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
<title>Movieclub, tu tienda de peliculas:: Registro</title>
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
.style13 {font-size: 16pt}
.style16 {color: #333333}
.style18 {font-size: 12pt; }
.style23 {color: #334d55; font-size: 12pt; }
.style24 {color: #FFFFFF; font-size: 12pt; }
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
.style25 {color: #334d55}
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
  <h3 class="style13">Rellena tus datos</h3>
  <div align="center" class="style13">
    <form id="form1" name="form1" method="post" action="validar-registro.php">
      <table width="562" height="308" border="2" bordercolor="#6666CC">
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Nombre:</span></th>
          <td bgcolor="#CCCCCC"><span class="style18">
            <label>
            <input name="nombre" type="text" size="100" />
            </label>
          </span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Primer Apellido:</span></th>
          <td bgcolor="#CCCCCC"><span class="style18">
            <label>
            <input name="apellido1" type="text" size="100" />
            </label>
          </span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Segundo Apellido:</span></th>
          <td bgcolor="#CCCCCC"><span class="style18">
            <label>
            <input name="apellido2" type="text" size="70" />
            </label>
          </span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">D.N.I:</span></th>
          <td bgcolor="#CCCCCC"><input name="dni" type="text" value="00000000L" size="20" /></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label>Direccion: </label>
          </span></th>
          <td bgcolor="#CCCCCC"><input name="direccion" type="text" value="C./Portal,Piso" size="100" /></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label></label>
            <span class="style18 style25">Provincia:</span></span></th>
          <td bgcolor="#CCCCCC"><span class="style18">
            <label></label>
            <span class="style24">
            <select name="provincia">
              <option selected="selected"> </option>
              <option>A Coruña</option>
              <option>Lugo</option>
              <option>Ourense</option>
              <option>Pontevedra</option>
              <option>Madrid</option>
              <option>Barcelona</option>
              <option>Valencia</option>
              <option>Alicante</option>
              <option>Sevilla</option>
              <option>Málaga</option>
              <option>Murcia</option>
              <option>Cádiz</option>
              <option>Vizcaya</option>
              <option>Islas Baleares</option>
              <option>Las Palmas</option>
              <option>Asturias</option>
              <option>Santa Cruz</option>
              <option>Zaragoza</option>
              <option>Granada</option>
              <option>Tarragona</option>
              <option>Córdoba</option>
              <option>Gerona</option>
              <option>Guipúzcoa</option>
              <option>Toledo</option>
              <option>Almería</option>
              <option>Badajoz</option>
              <option>Jaén</option>
              <option>Navarra</option>
              <option>Castellón</option>
              <option>Cantabria</option>
              <option>Valladolid</option>
              <option>Ciudad Real</option>
              <option>Huelva</option>
              <option>León</option>
              <option>Lérida</option>
              <option>Cáceres</option>
              <option>Albacete</option>
              <option>Burgos</option>
              <option>Salamanca</option>
              <option>La Rioja</option>
              <option>Álava</option>
              <option>Guadalajara</option>
              <option>Huesca</option>
              <option>Cuenca</option>
              <option>Zamora</option>
              <option>Palencia</option>
              <option>Ávila</option>
              <option>Segovia</option>
              <option>Teruel</option>
              <option>Soria</option>
              <option>Ceuta</option>
              <option>Melilla</option>
            </select>
          </span></span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label>Nombre Usuario: </label>
          </span></th>
          <td bgcolor="#CCCCCC"><input name="usuario" type="text" size="40" /></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label>Contraseña:</label>
          </span></th>
          <td bgcolor="#CCCCCC"><input name="pass" type="password" size="32"/></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label>Repite Contraseña:</label>
          </span></th>
          <td bgcolor="#CCCCCC"><input name="repetirpass" type="password" size="32" /></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style24">
            <label>E-mail:</label>
          </span></th>
          <td bgcolor="#CCCCCC"><label>
            <input name="email" type="text" value="usuario@correo.com" size="50" />
            </label>          </td>
        </tr>
      </table>
      <p>
          <input type="submit" name="Submit" value="Finalizar Registro" />
      </p>
    </form>
    <p>
      <label></label>
      <label></label>
    </p>
  </div>
  <h3 align="left" class="style13">&nbsp;</h3>
</div>
<span class="style13">
<!-- fin contenido-->
</span>
<div class="style13" id="navBar">
  <div class="style1" id="sectionLinks">
    <h3 class="style6 style18">MENU PRINCIPAL </h3>
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
