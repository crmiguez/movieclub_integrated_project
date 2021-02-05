<?php 
   $_SESSION['nombre_usuario']=$_GET["nombre_usuario"];
   echo("<p> Bienvenido ". $_SESSION['nombre_usuario'].". Si quieres cerrar sesion <a href=\"salir.php\">click aqui</a>.</p>");
?>

