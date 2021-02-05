<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<table border="1" style="width: 80%; margin: 10px;"> 
    <tr> 
        <td><b>Id</b></td> 
        <td><b>Nombres</b></td> 
        <td><b>Apellidos</b></td> 
        <td><b>País</b></td> 
    </tr> 

    <?php 
     
        // Apertura de la conexión a la base de datos e Inclusión del script 
         
        // Instanciamos el objeto 
        $paging = new PHPPaging; 
         
        // Indicamos la consulta al objeto  
        $paging->agregarConsulta("SELECT * FROM usuarios ORDER BY id ASC"); 
         
        // Ejecutamos la paginación 
        $paging->ejecutar();   
         
        // Imprimimos los resultados, para esto creamos un ciclo while 
        // Similar a while($datos = mysql_fetch_array($sql)) 
        while($datos = $paging->fetchResultado()) {  
            echo "<tr>";  
            echo "<td>".$datos['id']."</td>";  
            echo "<td>".$datos['nombre']."</td>";  
            echo "<td>".$datos['apellidos']."</td>";  
            echo "<td>".$datos['pais']."</td>";  
            echo "</tr>";  
        }  
     
    ?> 

</table> 

<?php 
    // Imprimimos la barra de navegación 
    echo "<b>Navegación</b>: ".$paging->fetchNavegacion(); 
?>
</body>
</html>
