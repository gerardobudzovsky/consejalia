<?php 
	include "conexion.php" ;
	
	if (isset($_POST['enviar'])) {

		mysqli_query($conexion, "INSERT INTO actuacion(idexpediente, nombreproy, fin, tipo) VALUES(
			'".$_POST['idexpediente']."',
			'".$_POST['nombreproy']."',
			'".$_POST['fin']."',
			'".$_POST['tipo']."'
			)"
		);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Carga de Actuacion</title>
		<!-- Bootstrap -->
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			include "menu.php";
			include "incluirjq.php";
		?>
		<div class="container">
			<form action="" method="POST">
				<div class="form-group">
					<h1>Carga de Actuacion</h1>
					<label>Nombre del Proyecto:</label>
					<input class="form-control" id="nombreproy" type="text" name="nombreproy">
					<label>Numero de expediente:</label>

					<select class="form-control" id="idexpediente" name="idexpediente" >
						<?php 
							$expedientes = mysqli_query($conexion, "SELECT * FROM expediente ORDER BY numero LIMIT 9999");
							setlocale(LC_ALL, "spanish");
							while($expediente=mysqli_fetch_array($expedientes)){
								echo "<option id='".$expediente['idexpediente']."' value='" . $expediente['idexpediente'] . "'>" . $expediente['numero'] . "</option>";
							};
						?>
					</select>

					<label>Fin:</label>
					<input class="form-control" id="fin" type="text" name="fin">
					<label>Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="Pase">Pase</option>
						<option value="Instrumento">Instrumento</option>
						<option value="Informe de terceros">Informe de terceros</option>
						<option value="Presupuesto">Presupuesto</option>					
					</select>
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Cargar Actuacion">
				</div>	
			</form>
		</div>
	</body>
</html>