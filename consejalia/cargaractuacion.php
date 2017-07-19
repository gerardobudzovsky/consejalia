<?php 
	include "conexion.php" ;
	
	if (isset($_POST['enviar'])) {

		mysqli_query($conexion, "INSERT INTO actuacion(idexpediente, fin, tipo) VALUES(
			'".$_POST['idexpediente']."',
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
					<h2>Campos comunes a todos las actuaciones</h2>
					<label>Numero de Expediente:</label>
					<select class="form-control" id="idexpediente" name="idexpediente" >
						<?php 
							$expedientes = mysqli_query($conexion, "SELECT * FROM expediente ORDER BY numero LIMIT 9999");
							setlocale(LC_ALL, "spanish");
							while($expediente=mysqli_fetch_array($expedientes)){
								echo "<option id='".$expediente['idexpediente']."' value='" . $expediente['idexpediente'] . "'>" . $expediente['numero'] . "</option>";
							};
						?>
					</select>
					<label for="numero">Numero de Actuacion Simple:</label>
					<input class="form-control" id="numero" type="text" name="numero" placeholder="nnnn-a-20XX">
					<label>Fin/Destino/Enviado a:</label>
					<input class="form-control" id="fin" type="text" name="fin">
					<label for="fecha">Fecha de Presentacion:</label>
					<input class="form-control" id="fecha" type="date" name="fecha">
					<label>Reseña:</label>
					<input class="form-control" type="text" id="resena" name="resena">
					<label>Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="Pase">Pase</option>
						<option value="Instrumento">Instrumento</option>					
					</select>
					<label for="tipoins">Tipo de instrumento:</label>
					<select class="form-control" id="tipoins" name="tipoins">
						<option value="Nota">Nota</option>
						<option value="Memorandum">Memorandum</option>
						<option value="Resolucion">Resolucion</option>
						<option value="Disposicion">Disposicion</option>					
						<option value="Proyecto">Proyecto</option>					
						<option value="Disposicion">Disposicion</option>
						<option value="Proyecto de Ordenanza">Proyecto de Ordenanza</option>					
						<option value="Ordenanza">Ordenanza</option>					
						<option value="Ley">Ley</option>
						<option value="Ordenanza">Ordenanza</option>					
						<option value="Declaracion">Declaracion</option>					
						<option value="Invitacion">Invitacion</option>
						<option value="Oficio">Oficio</option>
						<option value="Otro">Otro</option>						
					</select>
					<h2>Campos para pases</h2>
					<label for="origen">Origen:</label>
					<input class= "form-control" list="areas" id="origen" name="origen">
					<datalist id="areas">
						<option value="Equipo de Proyecto">
						<option value="Secretaria">
						<option value="Equipo territorial del bloque">
						<option value="Equipo CCPA">
						<option value="Area de Personal">
					</datalist>
					<label for="destino">Destino:</label>
					<input class= "form-control" list="areas" id="destino" name="destino">
					<datalist id="areas">
						<option value="Equipo de Proyecto">
						<option value="Secretaria">
						<option value="Equipo territorial del bloque">
						<option value="Equipo CCPA">
						<option value="Area de Personal">
					</datalist>
					<h2>Campos para Instrumentos</h2>
					<h3>Campos para Nota</h3>
					<h3>Campos para Memorandum</h3>
					<h3>Campos para Resolucion</h3>
					<h3>Campos para Proyecto</h3>
					<h3>Campos para Proyecto de Ordenanza</h3>
					<h3>Campos para Ordenanza</h3>
					<h3>Campos para Declaracion</h3>
					<h3>Campos para Invitacion</h3>
					<h3>Campos para Oficio</h3>
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Cargar Actuacion">
				</div>	
			</form>
		</div>
	</body>
</html>