<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<table>
<?php
$mess = $_GET['mess'];
$anio = $_GET['anio'];
if($mess == "" || $anio == ""){
    $anio = date("Y");
    $mess = date("n");
}
    $ultimo = date("t",mktime(0, 0, 0, $mess, 1, $anio));
    if($mess == '12' || $mess == '1'){
        if($mess == '12'){
            $next = 1;
            $prev = $mess -1;
            $anion = $anio + 1;
            $aniop = $anio;
        }
        if($mess == '1'){
            $next = $mess + 1;
            $prev = 12;
            $anion = $anio;
            $aniop = $anio -1;        
        }
    }else{
        $next = $mess + 1;
        $prev = $mess - 1;    
        $aniop = $anio;
        $anion = $anio;
    }
    echo "<tr><th colspan=7>$anioo</th></tr><tr>";
echo "<tr><td><a href='calendario.php?mess=$prev&anio=$aniop'><<</a></td><th colspan=5>$mes[$mess] $mess</th><td><a href='calendario.php?mess=$next&anio=$anion'>>></td></tr><tr>";
echo "<tr><td>D</td><td>L</td><td>M</td><td>M</td><td>J</td><td>V</td><td>S</td></tr>";
    $diaa = "1";
    while($diaa <= $ultimo){
        $dia = date("D",mktime(0,0,0,$mess,$diaa,$anio)); # retorna el día de la semana en letras...
        $fecha = date("d",mktime(0,0,0,$mess,$diaa,$anio)); #retorna el día del mes en 01/31
        $dia_semana = date("w",mktime(0,0,0,$mess,$diaa,$anio)); #retorna el día de la semana en número
 
        if($dia == "Sun"){
            echo "</tr><tr>";
        }
        if($fecha == "01"){
            $i=0;
            while($i != $dia_semana){
                echo "<td>&nbsp;</td>";
                $i++;
            }
        }
        echo "<td>$fecha</td>";
        $diaa++;
    }
    echo "</tr>";
?>
</table>
</body>
</html>
