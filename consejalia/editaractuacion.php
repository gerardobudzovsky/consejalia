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
							
					<!-- notas -->
					
					<h3>Datos para Nota</h3>
					<label for="notaayn">Apellido y Nombre:</label>
					<input class="form-control" type="text" id="notaayn" name="notaayn" value="<?php echo $inst['notaayn']; ?>">
					<label for="notadni">DNI (sin puntos):</label>
					<input class="form-control" type="number" id="notadni" name="notadni" min="0" max="999999999" value="<?php echo $inst['notadni']; ?>">
					<label for="notadireccion">Direccion:</label>
					<input class="form-control" type="text" id="notadireccion" name="notadireccion" value="<?php echo $inst['notadireccion']; ?>">
					<label for="notatelefono">Numero de telefono:</label>
					<input class="form-control" type="text" id="notatelefono" name="notatelefono" value="<?php echo $inst['notatelefono']; ?>">					
					
					<!-- memorandums -->
					<h3>Datos para Memorandum</h3>
					
					<!-- resolusiones -->
					
					<h3>Datos para Resolucion</h3>					
					<label for="resnumero">Numero de Resolucion:</label>
					<input class="form-control" type="number" id="resnumero" name="resnumero" value="<?php echo $inst['resnumero']; ?>">
					<label for="resndado">Numero de Actuacion de Origen:</label>
					<input class="form-control" type="text" id="resndado"  name="resndado" placeholder="" value="<?php echo $inst['resndado']; ?>">
					
					<!-- disposiciones -->
					<h3>Datos para Disposición</h3>
					
					<!-- proyectos -->
					<h3>Datos para Proyecto</h3>
					
					<!-- Proyectos De Ordenanza -->
					
					<h3>Datos para Proyecto de Ordenanza</h3>
					<label for="pdotipo">Tipo:</label>
					<select class="form-control" id="pdotipo" name="pdotipo">
						<option value="Ordenanza" <?php if ($inst['pdotipo']=="Ordenanza"){ echo "selected='selected'"; }; ?> >Ordenanza</option>
						<option value="Resolucion" <?php if ($inst['pdotipo']=="Resolucion"){ echo "selected='selected'"; }; ?> >Resolucion</option>
						<option value="Declaracion" <?php if ($inst['pdotipo']=="Declaracion"){ echo "selected='selected'"; }; ?> >Declaracion</option>
					</select>
					<label for="pdoconcejal">Consejal:</label>
					<input class="form-control" type="text" id="pdoconcejal" name="pdoconcejal" value="<?php echo $inst['pdoconcejal']; ?>">
					<label for="pdobarrio">Barrio:</label>
					<input class="form-control" type="text" id="pdobarrio" name="pdobarrio" value="<?php echo $inst['pdobarrio']; ?>">
					<label for="pdotemas">Temas:</label>
					<input class="form-control" type="text" id="pdotemas" name="pdotemas" value="<?php echo $inst['pdotemas']; ?>">
					<label for="pdotiposes">Tipo de sesiones/audiencia:</label>
					<select class="form-control" id="pdotiposes" name="pdotiposes">
						<option value="Sesion Ordinaria" <?php if ($inst['pdotiposes']=="Sesion Ordinaria"){ echo "selected='selected'"; }; ?>>Sesion Ordinaria</option>
						<option value="Sesion Especial" <?php if ($inst['pdotiposes']=="Sesion Especial"){ echo "selected='selected'"; }; ?>>Sesion Especial</option>
						<option value="Audiencia Publica" <?php if ($inst['pdotiposes']=="diencia Publica"){ echo "selected='selected'"; }; ?>>Audiencia Publica</option>
					</select>
					
					<!-- ordenanzas -->

					<h3>Datos para Ordenanza</h3>
					<label for="ordnumero">Numero de Ordenanza:</label>
					<input class="form-control" type="number" id="ordnumero" name="ordnumero" value="<?php echo $inst['ordnumero']; ?>">
					<label for="ordnumerores">Numero de Resolucion:</label>
					<input class="form-control" type="number" id="ordnumerores" name="ordnumerores" value="<?php echo $inst['ordnumerores']; ?>">
					<label for="ordndado">Numero de Actuacion de Origen:</label>
					<input class="form-control" type="text" id="ordndado"  name="ordndado" placeholder="" value="<?php echo $inst['ordndado']; ?>">
					
					<!-- leyes -->
					<h3>Datos para Ley</h3>
					<label for="leynumero">Numero de Ley:</label>
					<input class="form-control" type="text" id="leynumero" name="leynumero" value="<?php echo $inst['leynumero']; ?>">
					
					<br>
					<input class="btn btn-default" type="submit" name="enviar" value="Guardar Cambios">
				</div>	
			</form>
		</div>
	</body>
</html>