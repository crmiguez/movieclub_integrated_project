<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CalendarioJ</title>

<!--Hoja de estilos del calendario -->
<link rel="stylesheet" type="text/css" media="all" href="calendar-blue.css"/>
<!-- librería principal del calendario -->
<script type="text/javascript" src="calendar.js"></script>
<!-- librería para cargar el lenguaje deseado -->
<script type="text/javascript" src="calendar-es.js"></script>
<!-- librería que declara la función Calendar.setup, que ayuda a generar un calendario en unas pocas líneas de código -->
<script type="text/javascript" src="calendar-setup.js"></script>
</head>

<body>

<!-- formulario con el campo de texto y el botón para lanzar el calendario-->
<form action="#" method="get">
<input type="text" name="date" id="fecha" />
<input type="button" id="boton" value="..." />
</form>

<!-- script que define y configura el calendario-->
<script type="text/javascript">
Calendar.setup({
inputField : "fecha", // id del campo de texto
ifFormat : "%d/%m/%Y", // formato de la fecha que se escriba en el campo de texto
button : "boton" // el id del botón que lanzará el calendario
});

</script>
</body>
</html>
