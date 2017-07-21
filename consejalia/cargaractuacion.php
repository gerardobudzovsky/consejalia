<?php 
	include "conexion.php" ;
		//consigue el id del expediente mediante el numero de expediente
		$expedientes = mysqli_query($conexion, "SELECT * FROM expediente WHERE numero='". $_POST['nmexpediente'] ."' ORDER BY numero LIMIT 1");
		setlocale(LC_ALL, "spanish");
		$expediente=mysqli_fetch_array($expedientes)
		
		//guardamos el formulario
	if (isset($_POST['enviar'])) {

		mysqli_query($conexion, "INSERT INTO actuacion(idexpediente, fin, tipo) VALUES(
			'".$expediente['idexpediente']."',
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
					<h2>Datos comunes a todas las actuaciones</h2>
					<label>Numero de Expediente:</label>
					<input type="text" class="form-control" id="nmexpediente" name="nmexpediente" list="expedientes">
					<datalist id="expedientes">
						<?php 
							$expedientes = mysqli_query($conexion, "SELECT * FROM expediente ORDER BY numero LIMIT 9999");
							setlocale(LC_ALL, "spanish");
							while($expediente=mysqli_fetch_array($expedientes)){
								echo "<option value='" . $expediente['numero'] . "'>";
							};
						?>
					</datalist>				
					<label for="numero">Numero de Actuacion Simple:</label>
					<input class="form-control" id="numero" type="text" name="numero" placeholder="nnnn-a-20XX">
					<label>Fin/Destino/Enviado a:</label>
					<input class="form-control" id="fin" type="text" name="fin">
					<label for="fecha">Fecha de Presentacion:</label>
					<input class="form-control" id="fecha" type="date" name="fecha">
					<label for="resena">Reseña:</label>
					<textarea class="form-control" id="resena" name="resena"></textarea>
					<label>Tipo de Actuacion:</label>
					<select class="form-control" autocomplete="off" id="tipo" name="tipo" onchange="actuacion()">
						<option selected value="Pase">Pase</option>
						<option value="Instrumento">Instrumento</option>					
					</select>
					<!-- pases -->
						<div id="pases">
							<h2>Datos para pases</h2>
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
						</div>
					<!-- instrumentos -->
						<div id="instrumentos" style="display: none;">
							<h2>Datos para Instrumentos</h2>
							<label for="tipoins">Tipo de instrumento:</label>
							<select class="form-control" id="tipoins" name="tipoins" autocomplete="off" onchange="instrumento()">
								<option selected value="Nota">Nota</option>
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
							<!-- notas -->
								<div id="notas">
									<h3>Datos para Nota</h3>
									<label for="ayn">Apellido y Nombre:</label>
									<input class="form-control" type="text" id="ayn" name="ayn">
									<label for="dni">DNI (sin puntos):</label>
									<input class="form-control" type="number" id="dni" name="dni" min="0" max="999999999">
									<label for="direccion">Direccion:</label>
									<input class="form-control" type="text" id="direccion" name="direccion">
									<label for="telefono">Numero de telefono:</label>
									<input class="form-control" type="text" id="telefono" name="telefono">
								</div>					
							<!-- memorandums -->
								<div id="memorandums" style="display: none;">
									<h3>Datos para Memorandum</h3>
								</div>
							<!-- resolusiones -->
								<div id="resoluciones" style="display: none;">
									<h3>Datos para Resolucion</h3>
									<label for="numeror">Numero de Resolucion:</label>
									<input class="form-control" type="number" id="numeror" name="numeror">
									<label for="numeroador">Numero de Actuacion de Origen:</label>
									<input class="form-control" type="text" id="numeroador"  name="numeroador" placeholder="nnnn-a-20XX">
								</div>
							<!-- disposiciones -->
								<div id="disposiciones" style="display: none;">
									<h3>Datos para Disposición</h3>
								</div>
							<!-- proyectos -->
								<div id="proyectos" style="display: none;">
									<h3>Datos para Proyecto</h3>
								</div>
							<!-- Proyectos De Ordenanza -->
								<div id="proyectosDeOrdenanza" style="display: none;">
									<h3>Datos para Proyecto de Ordenanza</h3>
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
									<label for="tiposes">Tipo de sesiones/audiencia:</label>
									<select class="form-control" id="tiposes" name="tiposes">
										<option value="Sesion Ordinaria">Sesion Ordinaria</option>
										<option value="Sesion Especial">Sesion Especial</option>
										<option value="Audiencia Publica">Audiencia Publica</option>
									</select>
								</div>
							<!-- ordenanzas -->
								<div id="ordenanzas" style="display: none;">
									<h3>Datos para Ordenanza</h3>
									<label for="numeroord">Numero de Ordenanza:</label>
									<input class="form-control" type="number" id="numeroord" name="numeroord">
									<label for="numerores">Numero de Resolucion:</label>
									<input class="form-control" type="number" id="numerores" name="numerores">
									<label for="numeroadoo">Numero de Actuacion de Origen:</label>
									<input class="form-control" type="text" id="numeroadoo"  name="numeroadoo" placeholder="nnnn-a-20XX">
								</div>
							<!-- leyes -->
								<div id="leyes" style="display: none;">
									<h3>Datos para Ley</h3>
									<label for="numeroley">Numero de Ley:</label>
									<input class="form-control" type="text" id="numeroley" name="numeroley">
								</div>
							<!-- declaraciones -->
								<div id="declaraciones" style="display: none;">
									<h3>Datos para Declaracion</h3>
									<label for="numerodecl">Numero de Declaracion:</label>
									<input class="form-control" type="text" id="numerodecl" name="numerodecl">
									<label for="numeroadod">Numero de Actuacion de Origen:</label>
									<input class="form-control" type="text" id="numeroadod"  name="numeroadod" placeholder="nnnn-a-20XX">
								</div>
							<!-- invitaciones -->
								<div id="invitaciones" style="display: none;">
									<h3>Datos para Invitacion</h3>
									<label for="qi">Quien invita:</label>
									<input class= "form-control" list="qis" id="qi" name="qi">
									<datalist id="qis">
										<option value="Secretaria de Gobierno">
										<option value="Administracion Provincial del Agua">
										<option value="SAMEEP">
									</datalist>
								</div>
							<!-- oficios -->
								<div id="oficios" style="display: none;">
									<h3>Datos para Oficio</h3>
									<label for="numeroofi">Numero de Oficio:</label>
									<input class="form-control" type="text" id="numeroofi" name="numeroofi">
								</div>					
						</div>
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Cargar Actuacion">
				</div>	
			</form>
		</div>
	</body>
	<script>
		function instrumento() {
				  // Declare variables
				  var input;
				  input = document.getElementById("tipoins").value;
				  	switch(input) {
					    case "Nota":
					    	aux = document.getElementById("notas");
					    	aux.style.display = "";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Memorandum":
					    	aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Resolucion":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Disposicion":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Proyecto":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Proyecto de Ordenanza":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Ordenanza":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Ley":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Declaracion":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Invitacion":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					    break;
					    case "Oficio":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "";
					    break;
					    case "otro":
					    aux = document.getElementById("notas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("memorandums");
					    	aux.style.display = "none";
					    	aux = document.getElementById("resoluciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("disposiciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectos");
					    	aux.style.display = "none";
					    	aux = document.getElementById("proyectosDeOrdenanza");
					    	aux.style.display = "none";
					    	aux = document.getElementById("ordenanzas");
					    	aux.style.display = "none";
					    	aux = document.getElementById("leyes");
					    	aux.style.display = "none";
					    	aux = document.getElementById("declaraciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("invitaciones");
					    	aux.style.display = "none";
					    	aux = document.getElementById("oficios");
					    	aux.style.display = "none";
					} 
		}
		function actuacion() {
				  // Declare variables
				  var input;
				  input = document.getElementById("tipo").value;
				  	switch(input) {
					    case "Pase":
					    	aux = document.getElementById("pases");
					    	aux.style.display = "";
					    	aux = document.getElementById("instrumentos");
					    	aux.style.display = "none";
					    break;
					    case "Instrumento":
					    	aux = document.getElementById("pases");
					    	aux.style.display = "none";
					    	aux = document.getElementById("instrumentos");
					    	aux.style.display = "";
					    break;
					    
					} 
		}
	</script>

</html>