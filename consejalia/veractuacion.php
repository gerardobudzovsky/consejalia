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
			tipo= '".$_POST['tipoins']."',
			notaayn= '".$_POST['notaayn']."',
			notadni= '".$_POST['notadni']."',
			notadireccion= '".$_POST['notadireccion']."',
			notatelefono= '".$_POST['notatelefono']."',
			resnumero= '".$_POST['resnumero']."',
			resndado= '".$_POST['resndado']."',
			pdotipo= '".$_POST['pdotipo']."',
			pdoconcejal= '".$_POST['pdoconcejal']."',
			pdobarrio= '".$_POST['pdobarrio']."',
			pdotemas= '".$_POST['pdotemas']."',
			pdotiposes= '".$_POST['pdotiposes']."',
			ordnumero= '".$_POST['ordnumero']."',
			ordnumerores= '".$_POST['ordnumerores']."',
			ordndado= '".$_POST['ordndado']."',
			leynumero= '".$_POST['leynumero']."'
			
			WHERE idactuacion=".$_GET['idactuacion']."" 
			);
			
		}
		
		header("Location: gestionactuaciones.php");
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Ver Actuacion</title>
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
					<h1>Ver Actuacion</h1>
					
					<label>Numero de expediente:</label>
					<select class="form-control" id="idexpediente" name="idexpediente" disabled>
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
					<label>Numero de Actuacion Simple:</label>
					<p style="color:green;"><b><?php echo $act['numero']; ?></b></p>
					<label for="fin">Fin/Destino/Enviado a:</label>
					<p style="color:green;"><b><?php echo $act['fin']; ?></b></p>
					<label for="fecha">Fecha de Presentacion:</label>
					<p style="color:green;"><b><?php echo $act['fecha']; ?></b></p>
					<label for="resena">Reseña:</label>
					<p style="color:green;"><b><?php echo $act['resena']; ?></b></p>					
					<label for="tipo">Tipo de Actuacion:</label>
					<select class="form-control" id="tipo" name="tipo" disabled>
						<option value="Pase" <?php if ($act['tipo']=="Pase"){ echo "selected='selected'"; }; ?>>Pase</option>
						<option value="Instrumento" <?php if ($act['tipo']=="Instrumento"){ echo "selected='selected'"; }; ?>>Instrumento</option>			
					</select>	

					<!-- pases -->
					
					<h2>Datos de pases</h2>
					<label for="paseorigen">Origen:</label>
					<p style="color:green;"><b><?php echo $act['paseorigen']; ?></b></p>
					<datalist id="areas">
						<option value="Equipo de Proyecto">
						<option value="Secretaria">
						<option value="Equipo territorial del bloque">
						<option value="Equipo CCPA">
						<option value="Area de Personal">
					</datalist>
					<label for="pasedestino">Destino:</label>
					<p style="color:green;"><b><?php echo $act['pasedestino']; ?></b></p>
					<datalist id="areas">
						<option value="Equipo de Proyecto">
						<option value="Secretaria">
						<option value="Equipo territorial del bloque">
						<option value="Equipo CCPA">
						<option value="Area de Personal">
					</datalist>
						
					<!-- instrumentos -->
					
					<h2>Datos de Instrumentos</h2>
					<label for="tipoins">Tipo de instrumento:</label>
					<select class="form-control" id="tipoins" name="tipoins" autocomplete="off" disabled>
						<option selected value=""></option>
						<option value="Nota" <?php if ($inst['tipo']=="Nota"){ echo "selected='selected'"; }; ?>>Nota</option>
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
							
					<!-- notas -->
					
					<h3>Datos de Nota</h3>
					<label for="notaayn">Apellido y Nombre:</label>
					<p style="color:green;"><b><?php echo $inst['notaayn']; ?></b></p>
					<label for="notadni">DNI (sin puntos):</label>
					<p style="color:green;"><b><?php echo $inst['notadni']; ?></b></p>
					<label for="notadireccion">Direccion:</label>
					<p style="color:green;"><b><?php echo $inst['notadireccion']; ?></b></p>
					<label for="notatelefono">Numero de telefono:</label>
					<p style="color:green;"><b><?php echo $inst['notatelefono']; ?></b></p>				
					
					<!-- memorandums -->
					<h3>Datos de Memorandum</h3>
					
					<!-- resolusiones -->
					
					<h3>Datos de Resolucion</h3>					
					<label for="resnumero">Numero de Resolucion:</label>
					<p style="color:green;"><b><?php echo $inst['resnumero']; ?></b></p>
					<label for="resndado">Numero de Actuacion de Origen:</label>
					<p style="color:green;"><b><?php echo $inst['resndado']; ?></b></p>
					
					<!-- disposiciones -->
					<h3>Datos de Disposición</h3>
					
					<!-- proyectos -->
					<h3>Datos de Proyecto</h3>
					
					<!-- Proyectos De Ordenanza -->
					
					<h3>Datos de Proyecto de Ordenanza</h3>
					<label for="pdotipo">Tipo:</label>
					<select class="form-control" id="pdotipo" name="pdotipo" disabled>
						<option selected value=""></option>
						<option value="Ordenanza" <?php if ($inst['pdotipo']=="Ordenanza"){ echo "selected='selected'"; }; ?> >Ordenanza</option>
						<option value="Resolucion" <?php if ($inst['pdotipo']=="Resolucion"){ echo "selected='selected'"; }; ?> >Resolucion</option>
						<option value="Declaracion" <?php if ($inst['pdotipo']=="Declaracion"){ echo "selected='selected'"; }; ?> >Declaracion</option>
					</select>
					<label for="pdoconcejal">Consejal:</label>
					<p style="color:green;"><b><?php echo $inst['pdoconcejal']; ?></b></p>
					<label for="pdobarrio">Barrio:</label>
					<p style="color:green;"><b><?php echo $inst['pdobarrio']; ?></b></p>
					<label for="pdotemas">Temas:</label>
					<p style="color:green;"><b><?php echo $inst['pdotemas']; ?></b></p>
					<label for="pdotiposes">Tipo de sesiones/audiencia:</label>
					<select class="form-control" id="pdotiposes" name="pdotiposes" disabled>
						<option selected value=""></option>
						<option value="Sesion Ordinaria" <?php if ($inst['pdotiposes']=="Sesion Ordinaria"){ echo "selected='selected'"; }; ?>>Sesion Ordinaria</option>
						<option value="Sesion Especial" <?php if ($inst['pdotiposes']=="Sesion Especial"){ echo "selected='selected'"; }; ?>>Sesion Especial</option>
						<option value="Audiencia Publica" <?php if ($inst['pdotiposes']=="diencia Publica"){ echo "selected='selected'"; }; ?>>Audiencia Publica</option>
					</select>
					
					<!-- ordenanzas -->

					<h3>Datos de Ordenanza</h3>
					<label for="ordnumero">Numero de Ordenanza:</label>
					<p style="color:green;"><b><?php echo $inst['ordnumero']; ?></b></p>
					<label for="ordnumerores">Numero de Resolucion:</label>
					<p style="color:green;"><b><?php echo $inst['ordnumerores']; ?></b></p>
					<label for="ordndado">Numero de Actuacion de Origen:</label>
					<p style="color:green;"><b><?php echo $inst['ordndado']; ?></b></p>
					
					<!-- leyes -->
					<h3>Datos de Ley</h3>
					<label for="leynumero">Numero de Ley:</label>
					<p style="color:green;"><b><?php echo $inst['leynumero']; ?></b></p>
					
					<br>
				</div>	
			</form>
		</div>
	</body>
</html>