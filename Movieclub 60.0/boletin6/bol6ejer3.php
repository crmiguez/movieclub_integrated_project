<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$sql ="SELECT * FROM usuarios WHERE id=".$_GET["id"];

$resultados = mysql_query($sql);

if($resultados) {

    $fila = mysql_fetch_array($resultados);
    echo "<table border=1>";
    echo "<tr><td><b>Nombre:</b></td><td>".$fila["nombre"]."</td></tr>";
    echo "<tr><td><b>Apellidos:</b></td><td>".$fila["apellidos"]."</td></tr>";
    echo "<tr><td><b>Tel&eacute;fono:</b></td><td>".$fila["telefono"]."</td></tr>";
    echo "<tr><td><b>Email:</b></td><td>".$fila["email"]."</td></tr>";
    echo "<tr><td><b>Edad:</b></td><td>".$fila["edad"]."</td></tr>";
    echo "</table>";

} else {
    echo "<p>Error al consultar la base de datos</p>";
}

mysql_close();

?>

<p><a href="bol6ejer1.php">Volver a la gestion</a></p>