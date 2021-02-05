<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$edad = $_POST["edad"];
$id = $_POST["id"];

$sql = "UPDATE `mpi`.`usuarios` SET
            `nombre` = '$nombre',
            `apellidos` = '$apellidos',
            `telefono` = '$telefono',
            `email` = '$email',
            `edad` = '$edad'
        WHERE `usuarios`.`id`=$id";


$resultados = mysql_query($sql);

if($resultados) {
    echo "<p>Los datos del usuario se han actualizado con &eacute;xito.</p>";
} else {
    echo "<p>Error al consultar la base de datos</p>";
}

mysql_close();

?>

<p><a href="bol6ejer1.php">Volver a la gestion</a></p>