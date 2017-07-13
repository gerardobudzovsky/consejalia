<?php 
	include "conexion.php" ;
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			include "menu.php" ; 
			include "incluirjq.php";
			
			$actuaciones=mysqli_query($conexion, "SELECT * FROM actuacion 
				WHERE idactuacion=".$_GET['idactuacion']." AND idexpediente=".$_GET['idexpediente']." LIMIT 1");
				$actuacion=mysqli_fetch_array($actuaciones);
				setlocale(LC_ALL, "spanish");

				if (isset($_POST['enviar'])) {				
					mysqli_query($conexion, "DELETE FROM actuacion WHERE idactuacion=".$_GET['idactuacion']." AND idexpediente=".$_GET['idexpediente']."");
				header("Location:gestionactuaciones.php");
			}
		?>
		<title>Borrar Actuacion</title>
		<!-- Bootstrap -->
		<meta charset="utf-8">
	</head>
	<body>
		<div class="container">
			<h2>¿Esta seguro que desea borrar esta actuacion?</h2>
			<?php
				$filaexpe= mysqli_query($conexion, "SELECT * FROM expediente WHERE idexpediente=".$actuacion[1]."");
		        $arrexpe= mysqli_fetch_array($filaexpe);
		        	
		        echo "<h3> Titulo de expediente: ".$arrexpe[1] ."</h2>";	        	
				echo "<h3>Nombre de proyecto: ". $actuacion[2] . "</h3>";
				echo "<h4>Fin: ". $actuacion[3] . "</h4>";
			?>
			<form action="" method="POST">
				<br>
				<input class="btn btn-default" type="submit" name="enviar" value="Borrar Actuacion">
			</form>
		</div>
	</body>
</html>