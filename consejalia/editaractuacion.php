<!--

-->

<?php 
	include "conexion.php" ;
	
	if (isset($_POST['enviar'])) {
		mysqli_query($conexion, "UPDATE actuacion
			SET
			idexpediente= '".$_POST['idexpediente']."',
			fin= '".$_POST['fin']."',
			tipo= '".$_POST['tipo']."'
			WHERE idactuacion=".$_GET['idactuacion'].
				  " AND idexpediente=".$_GET['idexpediente'].""
		);
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

					<label>Fin:</label>
					<input class="form-control" id="fin" type="text" name="fin" value="<?php echo $act['fin']; ?>">	
					<label>Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="Pase" <?php if ($act['tipo']=="Pase"){ echo "selected='selected'"; }; ?>>Pase</option>
						<option value="Instrumento" <?php if ($act['tipo']=="Instrumento"){ echo "selected='selected'"; }; ?>>Instrumento</option>			
					</select>		
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Guardar Cambios">
				</div>	
			</form>
		</div>
	</body>
</html>