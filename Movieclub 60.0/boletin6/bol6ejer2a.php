<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$edad = $_POST["edad"];

$sql = "INSERT INTO `mpi`.`usuarios`
        (`nombre` ,`apellidos` ,`telefono` ,`email` ,`edad` )
        VALUES
        ('$nombre', '$apellidos', '$telefono', '$email', '$edad')";

$resultados = mysql_query($sql);

if($resultados) {
    echo "<p>El usuario se ha almacenado con &eacute;xito.</p>";
} else {
    echo "<p>Error al consultar la base de datos</p>";
}

mysql_close();

?>

<p><a href="bol6ejer1.php">Volver a la gestion</a></p>