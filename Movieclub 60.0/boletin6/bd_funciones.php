<?

$bd_servidor = "localhost";
$bd_usuario = "root";
$bd_password = "root";
$bd_nombre = "mpi";

function conectar_bd($bd_servidor,$bd_usuario, $bd_password, $bd_nombre) {
//Conexion con la bd
    if( $id = mysql_connect($bd_servidor, $bd_usuario, $bd_password)) {
        if(mysql_select_db($bd_nombre,$id) ) {
            //La conexion se ha realizado
            //echo "<p>La conexion ha tenido exito</p>";
        } else {
            die("<p>La conexion NO ha tenido exito</p>");
        }
    } else {
        die("<p>NO se ha podido conectar con el servidor de bases de datos</p>");
    }
}



?>
