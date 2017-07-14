<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Informe</title>
	<meta charset="utf-8">
</head>
<body>
<?php include "menu.php"; include "incluirjq.php"; ?>

<div class="container">
	<h1>Informes</h1>
	<h4>Del Día:</h4>
	<a href="informe.php?tipo=diaria" class="btn btn-primary">Crear Informe de Transacciones del Día</a>
	<h4>Semanal:</h4>
	<a href="informe.php?tipo=semanal" class="btn btn-primary">Crear Informe de Transacciones de la Semana</a>
	<h4>Mensual:</h4>
	<a href="informe.php?tipo=mensual" class="btn btn-primary">Crear Informe de Transacciones del Mes</a>

</div>

</body>
</html>