<?php

require_once "bd_funciones.php";

conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre);

$sql ="SELECT * FROM usuarios WHERE id=".$_GET["id"];

$resultados = mysql_query($sql);

if($resultados) {

    $fila = mysql_fetch_array($resultados);
    ?>

    <form method="POST" action="bol6ejer4a.php">
        <p><b>Nombre:</b> <input name="nombre" size="50" value="<?php echo $fila["nombre"]; ?>" type="text"></p>
        <p><b>Apellidos:</b> <input name="apellidos" size="50" value="<?php echo $fila["apellidos"]; ?>" type="text"></p>
        <p><b>Telefono:</b> <input name="telefono" size="50" value="<?php echo $fila["telefono"]; ?>" type="text"></p>
        <p><b>Email:</b> <input name="email" size="50" value="<?php echo $fila["email"]; ?>" type="text"></p>
        <p><b>Edad:</b> <input name="edad" value="<?php echo $fila["edad"]; ?>" type="text"></p>
        <p><input name="boton" value="Enviar" type="submit"></p>
        <input name="id" value="<?php echo $fila["id"]; ?>" type="hidden">
    </form>

    <?

} else {
    echo "<p>Error al consultar la base de datos</p>";
}

mysql_close();

?>

<p><a href="bol6ejer1.php">Volver a la gestion</a></p>