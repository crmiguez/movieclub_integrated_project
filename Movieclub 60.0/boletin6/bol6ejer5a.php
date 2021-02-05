<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$id = $_POST["id"];

$sql = "DELETE FROM `mpi`.`usuarios` WHERE `usuarios`.`id`=$id";


$resultados = mysql_query($sql);

if($resultados) {
    echo "<p>El usuario ha sido borrado con &eacute;xito.</p>";
} else {
    echo "<p>Error al consultar la base de datos</p>";
}

mysql_close();

?>

<p><a href="bol6ejer1.php">Volver a la gestion</a></p>