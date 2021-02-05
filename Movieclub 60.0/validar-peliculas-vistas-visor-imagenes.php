
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
<?php
include('conexion.php');
echo "<div id=\"wrap\">";
echo "<ul id=\"mycarousel\" class=\"jcarousel jcarousel-skin-tango\">";
	//Consultamos las películas más visitadas, que llevan 5 o más
	$consultacarteles= conexion("SELECT id,cartel FROM peliculas WHERE visitas >= 5");
	$contador=0;
	//Si existe, las rellenamos con imágenes y enlaces a la información extendida
	if($cartelconenlace= mysql_fetch_array($consultacarteles))
	{
		for($contador=0; $contador<=$cartelconenlace= mysql_fetch_array($consultacarteles); $contador++)
		{
			echo "<li><a href=\"informacion-extendida.php?id=".$cartelconenlace["id"]."\"><img src=\"".$cartelconenlace["cartel"]."\" width=\"75\" height=\"75\" alt=\"\" /></li>";
	} 
	echo"</ul>";
	echo "</div>";
	}
//Cerramos la base de datos
mysql_close();
?>
</body>
</html>
