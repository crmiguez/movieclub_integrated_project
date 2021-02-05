<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cerrar Sesión</title>
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
.style7 {color: #FFFFFF}
.style8 {font-size: 16pt; }
-->
</style>
</head>
<body>
<?php  
session_unset(); 					//Cerramos y destruímos la
session_destroy();  				//sesión del usuario registrado
echo "Has cerrado sesi&oacute;n correctamente. Gracias por su visita."; 		//Mostramos un mensaje de que lo ha cerrado
echo "<a href=\"main.php\">Volver a la página principal</a>";					//Correctamente y mostramos un enlace para que 
																				// vuelva a la página general
?>
</body>
</html>
