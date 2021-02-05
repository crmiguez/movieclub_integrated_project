<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$sql ="SELECT * FROM usuarios";

$resultados = mysql_query($sql);

if($resultados) {
	echo "<p><a href=\"bol6ejer2.php\">Nuevo usuario</a></p>";
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "<th>Apellidos</th>";
	echo "<th>Tel&eacute;fono</th>";
	echo "<th>email</th>";
	echo "<th>edad</th>";
	echo "<th>Funcionalidades</th>";
	echo "</tr>";
	
	while($fila = mysql_fetch_array($resultados)) {
		echo "<tr>";
		echo "<td>".$fila["nombre"]."</td>";
		echo "<td> ".$fila["apellidos"]."</td>";
		echo "<td> ".$fila["telefono"]."</td>";
		echo "<td> ".$fila["email"]."</td>";
		echo "<td> ".$fila["edad"]."</td>";
		echo "<td>
			<a href=\"bol6ejer4.php?id=".$fila["id"]."\">Modificar</a> |
			<a href=\"bol6ejer5.php?id=".$fila["id"]."\">Eliminar</a> |
			<a href=\"bol6ejer3.php?id=".$fila["id"]."\">Consultar</a>
		      </td>";
		echo "</tr>";
	}
	
	echo "</table>";
} else {
	echo "Error al consultar la base de datos";
}

mysql_close();

?>
