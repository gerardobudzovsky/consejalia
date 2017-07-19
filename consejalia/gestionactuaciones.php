<?php include "conexion.php" ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Gestion de Actuaciones</title>
		<!-- Bootstrap -->
		<meta charset="utf-8">
	</head>
	<body>
		<?php include "menu.php"; include "incluirjq.php"; ?>

		<?php 
			$filas= mysqli_query($conexion, "SELECT * FROM actuacion");
			setlocale(LC_ALL, "spanish");	
		?>

	<div class="container">	
		<h1>Actuaciones</h1>
		
		<div class="form-inline">
			<p id="demo"></p>
			<input class="form-control" type="text" id="Titulo" onkeyup="obra()" placeholder="Buscar...">
			<label>Filtro 1</label>
			<input id="contacto" onchange="mostrar()" type="checkbox" name="" checked="checked">
			<label>Filtro 2</label>
			<input id="referente" onchange="mostrar()" type="checkbox" name="" checked="checked">
			<label>Filtro 3</label>
			<input id="colaborador" onchange="mostrar()" type="checkbox" name="" checked="checked">
			<label>Filtro 4</label>
			<input id="otro" onchange="mostrar()" type="checkbox" name="" checked="checked">			
			<a class="btn btn-primary float-right" href="carganuevo.php">Cargar Nuevo Expediente</a>
			<a class="btn btn-primary float-right" href="cargaractuacion.php">Cargar Nueva Actuacion</a>

		</div>
		<p></p>
		<textarea hidden style="width:100%" id="exito"></textarea>

	 <div class="table-responsive">          
	  <table class="table table-inverse" id="mytable">
	    <thead>
	      <tr class="azul">
	        <th>Id Actuacion</th>
	        <th>Id Expediente</th>
			<th>Titulo Expediente</th>	        
			<th>Numero Expediente</th>
			<th>Fin</th>
	        <th>Tipo de actuacion</th>
	        <th>Opciones</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php 
	        	$i=0;
	        	while ($fila=mysqli_fetch_array($filas)) {

		        	$filaexpe= mysqli_query($conexion, "SELECT * FROM expediente WHERE idexpediente=".$fila[1]."");
		        	$arrexpe= mysqli_fetch_array($filaexpe);
		        	
		        	echo "<tr>";
		        	echo "<td>".$fila[0] ."</td>";
		        	echo "<td>".$fila[1] ."</td>";
		        	echo "<td>".$arrexpe[1] ."</td>";	        	
		        	echo "<td>".$arrexpe[2] ."</td>";
		        	echo "<td>".$fila[3] ."</td>";
		        	echo "<td>".$fila[4] ."</td>";
		        	echo "<td><a href=editaractuacion.php?idactuacion=".$fila[0]."&idexpediente=".$fila[1].">Editar</a>";
		        	echo "&nbsp;&nbsp;&nbsp";
		        	echo "<a href=borraractuacion.php?idactuacion=".$fila[0]."&idexpediente=".$fila[1].">Borrar</a></td>";
		        	echo "</tr>";
	        	}
	        ?>  
	    </tbody>
	  </table>
	  </div>
	</div>
	</body>

				<script>
				function obra() {
				  // Declare variables
				  var input, filter, table, tr, td, i;
				  input = document.getElementById("Titulo");
				  filter = input.value.toUpperCase();
				  table = document.getElementById("mytable");
				  tr = table.getElementsByTagName("tr");

				  // Loop through all table rows, and hide those who don't match the search query
				  for (i = 0; i < tr.length; i++) {
				    td0 = tr[i].getElementsByTagName("td")[0];
				    td1 = tr[i].getElementsByTagName("td")[1];
				    td2 = tr[i].getElementsByTagName("td")[2];
				    td3 = tr[i].getElementsByTagName("td")[3];
				    td4 = tr[i].getElementsByTagName("td")[4];
				    td5 = tr[i].getElementsByTagName("td")[5];
				    td6 = tr[i].getElementsByTagName("td")[6];
				    td7 = tr[i].getElementsByTagName("td")[7];
				    td8 = tr[i].getElementsByTagName("td")[8];
				    
				    if (td0) {
				      if ((td0.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td1.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td2.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td3.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td4.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td5.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td6.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td7.innerHTML.toUpperCase().indexOf(filter) > -1) || 
				      	(td8.innerHTML.toUpperCase().indexOf(filter) > -1) ) {
				        tr[i].style.display = "";
				      } else {
				        tr[i].style.display = "none";
				      }
				    }
				  }
				}

				function mostrar()
				{
					table = document.getElementById("mytable");
				 	tr = table.getElementsByTagName("tr");
				 	for (i = 1; i < tr.length; i++) {
				 		tr[i].setAttribute("hidden", true);
				 	}
				 	for (i = 1; i < tr.length; i++) {
				 		td = tr[i].getElementsByTagName("td")[12].innerHTML;
				 		if (document.getElementById('contacto').checked && (td.toUpperCase() == "CONTACTO")) 
						  {
						      tr[i].removeAttribute("hidden");
						  } 
						if (document.getElementById('referente').checked && (td.toUpperCase() == "REFERENTE")) 
						  {
						      tr[i].removeAttribute("hidden");
						  } 
						if (document.getElementById('colaborador').checked && (td.toUpperCase() == "COLABORADOR")) 
						  {
						      tr[i].removeAttribute("hidden");
						  } 
						if (document.getElementById('otro').checked && (td.toUpperCase() == "OTRO")) 
						  {
						      tr[i].removeAttribute("hidden");
						  } 
				 	}
				  
				}

				</script>
</html>