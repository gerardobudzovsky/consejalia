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
					<h2>Campos comunes a todas las actuaciones</h2>
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
					<label for="resena">Reseña:</label>
					<textarea class="form-control" id="resena" name="resena"></textarea>
					<label>Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="Pase">Pase</option>
						<option value="Instrumento">Instrumento</option>					
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
					<h3>Campos para Nota</h3>
					<label for="ayn">Apellido y Nombre:</label>
					<input class="form-control" type="text" id="ayn" name="ayn">
					<label for="dni">DNI (sin puntos):</label>
					<input class="form-control" type="number" id="dni" name="dni" min="0" max="999999999">
					<label for="direccion">Direccion:</label>
					<input class="form-control" type="text" id="direccion" name="direccion">
					<label for="telefono">Numero de telefono:</label>
					<input class="form-control" type="text" id="telefono" name="telefono">
					<h3>Campos para Memorandum</h3>
					<h3>Campos para Resolucion</h3>
					<label for="numeror">Numero de Resolucion:</label>
					<input class="form-control" type="number" id="numeror" name="numeror">
					<label for="numeroador">Numero de Actuacion de Origen:</label>
					<input class="form-control" type="text" id="numeroador"  name="numeroador" placeholder="nnnn-a-20XX">
					<h3>Campos para Proyecto</h3>
					<h3>Campos para Proyecto de Ordenanza</h3>
					<label for="tipopdo">Tipo:</label>
					<select class="form-control" id="tipopdo" name="tipopdo">
						<option value="Ordenanza">Ordenanza</option>
						<option value="Resolucion">Resolucion</option>
						<option value="Declaracion">Declaracion</option>
					</select>
					<label for="concejal">Consejal:</label>
					<input class="form-control" type="text" id="concejal" name="concejal">
					<label for="barrio">Barrio:</label>
					<input class="form-control" type="text" id="barrio" name="barrio">
					<label for="temas">Temas:</label>
					<input class="form-control" type="text" id="temas" name="temas">
					<label for="tiposes">Tipo:</label>
					<select class="form-control" id="tiposes" name="tiposes">
						<option value="Sesion Ordinaria">Sesion Ordinaria</option>
						<option value="Sesion Especial">Sesion Especial</option>
						<option value="Audiencia Publica">Audiencia Publica</option>
					</select>
					<h3>Campos para Ordenanza</h3>
					<label for="numeroord">Numero de Ordenanza:</label>
					<input class="form-control" type="number" id="numeroord" name="numeroord">
					<label for="numerores">Numero de Resolucion:</label>
					<input class="form-control" type="number" id="numerores" name="numerores">
					<label for="numeroadoo">Numero de Actuacion de Origen:</label>
					<input class="form-control" type="text" id="numeroadoo"  name="numeroadoo" placeholder="nnnn-a-20XX">
					<h3>Campos para Ley</h3>
					<label for="numeroley">Numero de Ley:</label>
					<input class="form-control" type="text" id="numeroley" name="numeroley">
					<h3>Campos para Declaracion</h3>
					<label for="numerodecl">Numero de Declaracion:</label>
					<input class="form-control" type="text" id="numerodecl" name="numerodecl">
					<label for="numeroadod">Numero de Actuacion de Origen:</label>
					<input class="form-control" type="text" id="numeroadod"  name="numeroadod" placeholder="nnnn-a-20XX">
					<h3>Campos para Invitacion</h3>
					<label for="qi">Quien invita:</label>
					<input class= "form-control" list="qis" id="qi" name="qi">
					<datalist id="qis">
						<option value="Secretaria de Gobierno">
						<option value="Administracion Provincial del Agua">
						<option value="SAMEEP">
					</datalist>					
					<h3>Campos para Oficio</h3>
					<label for="numeroofi">Numero de Oficio:</label>
					<input class="form-control" type="text" id="numeroofi" name="numeroofi">
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Cargar Actuacion">
				</div>	
			</form>
		</div>
	</body>
</html>