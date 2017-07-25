<?php 
	include "conexion.php";
	
	if (isset($_POST['enviar'])) {
		
		mysqli_query($conexion, "UPDATE actuacion
			SET
			idexpediente= '".$_POST['idexpediente']."',
			numero= '".$_POST['numero']."',
			fin= '".$_POST['fin']."',
			fecha= '".$_POST['fecha']."',
			resena= '".$_POST['resena']."',
			tipo= '".$_POST['tipo']."',
			paseorigen= '".$_POST['paseorigen']."',
			pasedestino= '".$_POST['pasedestino']."'
			WHERE idactuacion=".$_GET['idactuacion'].
				  " AND idexpediente=".$_GET['idexpediente'].""
		);
		
		
		if ($_POST['tipo'] == 'Instrumento') {			
			
			mysqli_query($conexion, "UPDATE instrumento
			SET 
			tipo= '".$_POST['tipoins']."'
			WHERE idactuacion=".$_GET['idactuacion']."" 
			);
			
		}
		
		header("Location: gestionactuaciones.php");
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Editar Actuacion</title>
		<!-- Bootstrap -->
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			include "menu.php";
			include "incluirjq.php";
		?>
		<?php 
			$actuaciones=mysqli_query($conexion, "SELECT * FROM actuacion 
				WHERE idactuacion=".$_GET['idactuacion'].
				" AND idexpediente=".$_GET['idexpediente']." LIMIT 1");
			$actuacion=mysqli_fetch_array($actuaciones);
			setlocale(LC_ALL, "spanish");
			$act= $actuacion;
			
			
			$instrumentos=mysqli_query($conexion, "SELECT * FROM instrumento 
				WHERE idactuacion=".$_GET['idactuacion']." LIMIT 1");
			$instrumento=mysqli_fetch_array($instrumentos);
			setlocale(LC_ALL, "spanish");
			$inst= $instrumento;
			
		?>

		<div class="container">
			<form action="" method="POST">
				<div class="form-group">
					<h1>Editar Actuacion</h1>
					
					<label>Numero de expediente:</label>
					<select class="form-control" id="idexpediente" name="idexpediente" >
						<?php 
							$expedientes = mysqli_query($conexion, "SELECT * FROM expediente ORDER BY numero LIMIT 9999");
							setlocale(LC_ALL, "spanish");
					  		while($expediente=mysqli_fetch_array($expedientes)){
								if($expediente['idexpediente']==$act['idexpediente']){ 
									$selected="selected='selected'";
								} 
								else {
									$selected="";
								}
								echo "<option id='".$expediente['idexpediente']."' value='" . $expediente['idexpediente'] . "' ".$selected. ">" . $expediente['numero'] . "</option>"	;
							};
						?>
					</select>
					<label for="numero">Numero de Actuacion Simple:</label>
					<input class="form-control" type="text" id="numero" name="numero" value="<?php echo $act['numero']; ?>" placeholder="" >
					<label for="fin">Fin/Destino/Enviado a:</label>
					<input class="form-control" id="fin" type="text" name="fin" value="<?php echo $act['fin']; ?>">
					<label for="fecha">Fecha de Presentacion:</label>
					<input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $act['fecha']; ?>">
					<label for="resena">Reseña:</label>
					<textarea class="form-control" id="resena" name="resena"><?php echo $act['resena']; ?></textarea>					
					<label for="tipo">Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="Pase" <?php if ($act['tipo']=="Pase"){ echo "selected='selected'"; }; ?>>Pase</option>
						<option value="Instrumento" <?php if ($act['tipo']=="Instrumento"){ echo "selected='selected'"; }; ?>>Instrumento</option>			
					</select>	

					<!-- pases -->
						<h2>Datos para pases</h2>
						<label for="paseorigen">Origen:</label>
						<input class= "form-control" list="areas" id="paseorigen" name="paseorigen" value="<?php echo $act['paseorigen']; ?>" >
						<datalist id="areas">
							<option value="Equipo de Proyecto">
							<option value="Secretaria">
							<option value="Equipo territorial del bloque">
							<option value="Equipo CCPA">
							<option value="Area de Personal">
						</datalist>
						<label for="pasedestino">Destino:</label>
						<input class= "form-control" list="areas" id="pasedestino" name="pasedestino" value="<?php echo $act['pasedestino']; ?>">
						<datalist id="areas">
							<option value="Equipo de Proyecto">
							<option value="Secretaria">
							<option value="Equipo territorial del bloque">
							<option value="Equipo CCPA">
							<option value="Area de Personal">
						</datalist>
						
					<!-- instrumentos -->
					
					<h2>Datos para Instrumentos</h2>
							<label for="tipoins">Tipo de instrumento:</label>
							<select class="form-control" id="tipoins" name="tipoins" autocomplete="off">
								<option selected value="Nota" <?php if ($inst['tipo']=="Nota"){ echo "selected='selected'"; }; ?>>Nota</option>
								<option value="Memorandum" <?php if ($inst['tipo']=="Memorandum"){ echo "selected='selected'"; }; ?>>Memorandum</option>
								<option value="Resolucion" <?php if ($inst['tipo']=="Resolucion"){ echo "selected='selected'"; }; ?>>Resolucion</option>
								<option value="Disposicion" <?php if ($inst['tipo']=="Disposicion"){ echo "selected='selected'"; }; ?>>Disposicion</option>
								<option value="Proyecto" <?php if ($inst['tipo']=="Proyecto"){ echo "selected='selected'"; }; ?>>Proyecto</option>
								<option value="Proyecto de Ordenanza" <?php if ($inst['tipo']=="Proyecto de Ordenanza"){ echo "selected='selected'"; }; ?>>Proyecto de Ordenanza</option>
								<option value="Ordenanza" <?php if ($inst['tipo']=="Ordenanza"){ echo "selected='selected'"; }; ?>>Ordenanza</option>
								<option value="Ley" <?php if ($inst['tipo']=="Ley"){ echo "selected='selected'"; }; ?>>Ley</option>
								<option value="Declaracion" <?php if ($inst['tipo']=="Declaracion"){ echo "selected='selected'"; }; ?>>Declaracion</option>
								<option value="Invitacion" <?php if ($inst['tipo']=="Invitacion"){ echo "selected='selected'"; }; ?>>Invitacion</option>
								<option value="Oficio" <?php if ($inst['tipo']=="Oficio"){ echo "selected='selected'"; }; ?>>Oficio</option>
							</select>
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Guardar Cambios">
				</div>	
			</form>
		</div>
	</body>
</html>