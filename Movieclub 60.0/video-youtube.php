<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<object width="640" height="390"><param name="movie" value="http://www.youtube-nocookie.com/v/Mqk7GSmm5U8?fs=1&amp;hl=es_ES&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube-nocookie.com/v/Mqk7GSmm5U8?fs=1&amp;hl=es_ES&amp;rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="640" height="390"></embed></object>

<?php
	//Consultamos si el nombre del usuario
if($validarencargado>0){
// Consultamos la clave del usuario introducido, validamos el nombre de usuario si es encargado 
// y la comparamos.
	$comprobarencargado= conexion("SELECT nombre_usuario,contrasenha FROM clientes WHERE nombre_usuario = '$usuario'");
	$datosencargado= mysql_fetch_array($comprobarencargado);
	if($datosencargado['contrasenha'] != $encriptada) {
		echo "
		<script>alert('Login Incorrecto')
			history.back(1);
		</script>";
		} else {
		// Esta todo correcto asi que guardamos el nombre y email en sesiones para luego mostrarlas.
		$informacionencargado = conexion("SELECT * FROM encargados WHERE nombre_usuario = '$usuario'");
		$datosen = mysql_fetch_array($informacion);
		$_SESSION["nombre_usuario"] = $datosen['nombre_usuario'];
		$_SESSION["email_usuario"] = $datosen['email'];
		echo "
		Te has identificado correctamente ".$_SESSION['nombre_usuario'].", 
		ya puedes acceder a tu <a href=\"administracion.php\"  />pagina de encargado</a>.";
}
}
?>
</body>
</html>
