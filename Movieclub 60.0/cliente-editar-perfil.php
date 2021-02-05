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
<title>Movieclub, tu tienda de peliculas:: </title>
<link rel="stylesheet" href="2col_leftNav.css" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-family: trebuchet MS;
}
a {
	font-family: trebuchet MS;
}
h1,h2,h3,h4,h5,h6 {
	font-family: Candy Kisses;
}
body {
	background-color: #9999FF;
}
.style1 {font-size: 12pt}
.style2 {padding: 0px 0px 10px 10px}
.style13 {font-size: 16pt}
.style25 {color: #334d55; font-size: 12pt; }
.style26 {color: #FFFFFF; font-size: 12pt; }
.style27 {color: #334d55}
-->
</style></head>
<!-- The structure of this file is exactly the same as 2col_rightNav.html;
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
  <div class="style2">
  <?php
  	$usuarioaeditar=$_SESSION['nombre_usuario'];
  	//Realizamos la consulta de toda la información acerca del usuario
	$usuarioaeditarperfil=conexion("SELECT * FROM clientes WHERE nombre_usuario='$usuarioaeditar'");
	if($filasaeditar= mysql_fetch_array($usuarioaeditarperfil))
	{
  ?>
    <h3 class="style13">Realiza cambios </h3>
    <div align="center" class="style13">
      <form id="form1" name="form1" method="post" action="validar-editar-perfil.php?id=<?php echo "".$filasaeditar["id"].""; ?>">
        <table width="562" height="308" border="2" bordercolor="#6666CC">
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style25">Nombre:</span></th>
            <td bgcolor="#CCCCCC"><span class="style1">
              <label>
              <input name="nombre" type="text" value="<?php echo "".$filasaeditar["nombre"].""; ?>" size="100" />
              </label>
            </span></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style25">Primer Apellido:</span></th>
            <td bgcolor="#CCCCCC"><span class="style1">
              <label>
              <input name="apellido1" type="text" value="<?php echo "".$filasaeditar["apellido1"].""; ?>" size="100" />
              </label>
            </span></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style25">Segundo Apellido:</span></th>
            <td bgcolor="#CCCCCC"><span class="style1">
              <label>
              <input name="apellido2" type="text" value="<?php echo "".$filasaeditar["apellido2"].""; ?>" size="70" />
              </label>
            </span></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style25">D.N.I:</span></th>
            <td bgcolor="#CCCCCC"><input name="dni" type="text" value="<?php echo "".$filasaeditar["dni"].""; ?>" size="20" /></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label>Direccion: </label>
            </span></th>
            <td bgcolor="#CCCCCC"><input name="direccion" type="text" value="<?php echo "".$filasaeditar["direccion"].""; ?>" size="100" /></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label></label>
              <span class="style18 style25">Provincia:</span></span></th>
            <td bgcolor="#CCCCCC"><span class="style1">
              <label></label>
              <span class="style26">
              <select name="provincia">
                <option selected="selected"><?php echo "".$filasaeditar["provincia"].""; ?></option>
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
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label>Nombre Usuario: </label>
            </span></th>
            <td bgcolor="#CCCCCC"><input name="usuario" type="text" value="<?php echo "".$filasaeditar["nombre_usuario"].""; ?>" size="40" /></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label>Contraseña:</label>
            </span></th>
            <td bgcolor="#CCCCCC"><input name="pass" type="password" size="32"/></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label>Repite Contraseña:</label>
            </span></th>
            <td bgcolor="#CCCCCC"><input name="repetirpass" type="password" size="32" /></td>
          </tr>
          <tr>
            <th bgcolor="#33CCFF" scope="row"><span class="style26">
              <label>E-mail:</label>
            </span></th>
            <td bgcolor="#CCCCCC"><label>
              <input name="email" type="text" value="<?php echo "".$filasaeditar["email"].""; ?>" size="50" />
              </label>
            </td>
          </tr>
        </table>
        <p><span class="style1">
          <label><br />
          <input type="submit" name="Submit" value="Finalizar Cambio" />
              </label>
          <label></label>
        </span></p>
      </form>
<?php
	} else {
    echo "<p>Error al consultar la base de datos</p>";
}
//Cerramos la base de datos
mysql_close();
?>
      <p class="style1">
        <label></label>
      </p>
    </div>
    <p>&nbsp;</p>
  </div>
</div>
<!--end content -->
<div id="navBar">
  <div id="sectionLinks">
    <ul class="style1">
      <li>
        <h3>Menu Cliente</h3>
      </li>
      <?php
	  //Se va a generar los enlaces del menú del cliente, a través del nombre del usuario
      echo "<li><a href=\"cliente.php?nombre_usuario=". $_SESSION['nombre_usuario']."\">Inicio</a></li>";
      echo "<li><a href=\"busqueda.php\">Alquilar Película </a></li>";
      echo "<li><a href=\"cliente-reservas.php?nombre_usuario=". $_SESSION['nombre_usuario']."\">Ver mis reservas </a></li>";
      echo "<li><a href=\"cliente-perfil.php?nombre_usuario=". $_SESSION['nombre_usuario']."\">Ver mi perfil </a></li>";
      echo "<li><a href=\"cliente-editar-perfil.php?nombre_usuario=". $_SESSION['nombre_usuario']."\">Editar mi perfil</a></li>";
      echo "<li><a href=\"salir.php\">Cerrar sesión </a></li>";
	  ?>
    </ul>
  </div>
  <div class="relatedLinks">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div class="relatedLinks">
    <h3>&nbsp;</h3>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="advert">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <div id="headlines">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
<!--end navbar -->
<div id="siteInfo">
  <div align="center">&copy;2010-2011 CFP Caixanova Ourense |<a href="#"> Contacto</a></div>
</div>
<br />
</body>
</html>
