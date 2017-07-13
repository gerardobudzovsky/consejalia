<?php include "conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Informe</title>
	</head>
	<body>
		<?php include "menu.php"; include "incluirjq.php"; ?>
		<div class="container">
			<h1>Informes</h1>
			<h4>Diaria:</h4>
			<a href="informe.php?tipo=diaria" class="btn btn-primary">Crear Informe</a>
			<h4>Semanal:</h4>
			<a href="informe.php?tipo=semanal" class="btn btn-primary">Crear Informe</a>
			<h4>Mensual:</h4>
			<a href="informe.php?tipo=mensual" class="btn btn-primary">Crear Informe</a>
		</div>
	</body>
</html>