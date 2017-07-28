<?php 
	include "conexion.php";	

	if (isset($_POST['enviar'])) {
		
		mysqli_query($conexion, "UPDATE expediente 
			SET 
			titulo='".$_POST['titulo']."',
			numero='".$_POST['numero']."',
			area='".$_POST['area']."',
			resena='".$_POST['resena']."',
			estado='".$_POST['estado']."',
			fecha='".$_POST['fecha']."'
			WHERE idexpediente=".$_GET['idexpediente'].""
		);
		
		header("Location: consejaliabeta.php");
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ver Expediente</title>
		<!-- Bootstrap -->
		  <meta charset="utf-8">
	</head>
	<body>
		<?php 
			include "menu.php" ;
			include "incluirjq.php";	
		?>
		<?php 
			$expedientes=mysqli_query($conexion, "SELECT * FROM expediente WHERE idexpediente=".$_GET['idexpediente']." LIMIT 1");
			$expediente=mysqli_fetch_array($expedientes);
			setlocale(LC_ALL, "spanish");
			$exp= $expediente;
		?>

		<div class="container">
			<form action="" method="POST">
				<div class="form-group">
					<h1>Ver Expediente</h1>

					<label for="titulo">Titulo:</label>
					<p style="color:green;"><b><?php echo $exp['titulo']; ?></b></p>
					<label for="numero">Numero:</label>
					<p style="color:green;"><b><?php echo $exp['numero']; ?></b></p>
					<label for="area">Origen:</label>
					<!--<input class="form-control" id="area" type="text" name="area" value="<?php echo $exp['area']; ?>" > -->
					<p style="color:green;"><b><?php echo $exp['area']; ?></b></p>
					<datalist id="areas">
						<option value="Equipo de Proyecto">
						<option value="Secretaria">
						<option value="Equipo territorial del bloque">
						<option value="Equipo CCPA">
						<option value="Area de Personal">
					</datalist>
					<label for="resena">Reseña sobre el título:</label>
					<p style="color:green;"><b><?php echo $exp['resena']; ?></b></p>					
					<label for="estado">Estado:</label>
					<select class="form-control" id="estado" name="estado" disabled>
						<option value="Ingresado" <?php if ($exp['estado']=="Ingresado"){ echo "selected='selected'"; }; ?>>Ingresado</option>
						<option value="En tratamiento" <?php if ($exp['estado']=="En tratamiento"){ echo "selected='selected'"; }; ?>>En tratamiento</option>
						<option value="Para firma" <?php if ($exp['estado']=="Para firma"){ echo "selected='selected'"; }; ?>>Para firma</option>
						<option value="Resuelto" <?php if ($exp['estado']=="Resuelto"){ echo "selected='selected'"; }; ?>>Resuelto</option>
						<option value="Archivado" <?php if ($exp['estado']=="Archivado"){ echo "selected='selected'"; }; ?>>Archivado</option>
					</select>
					<label>Fecha de Inicio:</label>
					<p style="color:green;"><b><?php echo $exp['fecha']; ?></b></p>
					<label><h2>Actuaciones:</h2></label>
					<br>
					<?php
						$actuaciones=mysqli_query($conexion, "SELECT * FROM actuacion WHERE idexpediente=".$_GET['idexpediente']."");
						setlocale(LC_ALL, "spanish");
						$tienePrimerReg = false;
						while ($actuacion=mysqli_fetch_array($actuaciones)) {
							$tienePrimerReg = true;
							echo "<h4 class='panel panel-default'><a href='veractuacion.php?idactuacion=" .$actuacion['idactuacion'] . "&idexpediente=" .$actuacion['idexpediente'] . "'>" .$actuacion['numero'] . " " . $actuacion['fin']."</a></h4>";
						}
						if (!$tienePrimerReg){
							echo "<h4 style='color:green;'><b>No tiene actuaciones</b></h4>";
						}
					 ?>
				</div>	
			</form>
		</div>
	</body>
</html>
