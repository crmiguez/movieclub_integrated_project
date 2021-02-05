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
.style14 {color: #334d55}
.style15 {font-size: 16pt; }
.style23 {color: #334d55; font-size: 12pt; }
.style24 {color: #FFFFFF; font-size: 12pt; }
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
  <form id="form2" name="form2" method="post" action="validar-alta-usuario.php">
    <div align="center"></div>
    <h3 class="style15">Rellena datos para usuario </h3>
    <div align="center">
      <table width="562" height="308" border="2" bordercolor="#6666CC">
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Nombre:</span></th>
          <td bgcolor="#CCCCCC"><span class="style1">
            <label>
            <input name="nombre" type="text" size="100" />
            </label>
          </span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Primer Apellido:</span></th>
          <td bgcolor="#CCCCCC"><span class="style1">
            <label>
            <input name="apellido1" type="text" size="100" />
            </label>
          </span></td>
        </tr>
        <tr>
          <th bgcolor="#33CCFF" scope="row"><span class="style23">Segundo Apellido:</span></th>
          <td bgcolor="#CCCCCC"><span class="style1">
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
            <span class="style18 style25 style14">Provincia:</span></span></th>
          <td bgcolor="#CCCCCC"><span class="style1">
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
        <tr>
          <th bgcolor="#33CCFF" scope="row">Guardar como: </th>
          <td bgcolor="#CCCCCC"><label>
            <select name="insertar">
              <option selected="selected"> </option>
              <option>Cliente</option>
              <option>Encargado</option>
            </select>
          </label></td>
        </tr>
      </table>
    </div>
    <p align="center">
      <input type="submit" name="Submit" value="A&ntilde;adir Usuario" />
    </p>
  </form>
  <p>
  <p>&nbsp;</p>
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
