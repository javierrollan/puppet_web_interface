<?php 
	include('../scripts/php/include/conexiondb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/estilo.css">
	<title>Proyecto</title>
</head>
<body>

	<img src="../img/Puppet_transparent_logo.png" alt="">	

	<div class="navegador">
		<tr>	
			<td></td><a href="../index.php">Resumen</a></td>
			<td><a href="nodos.php">Nodos</a></td>
			<td><a href="paquete.php">Paquetes</a></td>
			<td><a href="instalar.php">Instalar</a></td>
			<td><a href="certificados.php">Certificados</a></td>
			<td><a href="ejecutar.php">Ejecutar</a></td>
			<td><a href="manifiesto.php">Manifiesto</a></td>
			<td><a href="crear_modulo.php">Modulos</a></td>
			<td><a href="crear_clases.php">Clases</a></td>
			<td><a href="edicion_clase.php">Edicion</a></td>
		</tr>
	</div>
	
	<h2>Paquetes instalados en los Nodos:</h2>

	<form action="../scripts/php/paquetes_nodos.php" method="POST">
		<p>Selecciona Nodo:</p>
		<select name="nodo">
			<?php
				$sql_nodos = "SELECT hostname FROM nodos;";
				$resultado_nodos = mysqli_query($conexion, $sql_nodos);			
				while ($array_nodos = mysqli_fetch_array($resultado_nodos, MYSQLI_ASSOC)) {					
				    foreach ($array_nodos as $nodos => $valor) {
				    	echo "<option value='$valor'>$valor</option>";
				    }
				}
			?>
		</select>
		<br>
		<label>Usuario:</label>
		<input type="text" name="username">
		<br>
		<label>Contraseña:</label>
		<input type="password" name="pwd">
		<br>
		<input type="submit">		
	</form>

	<div class="centrar">
	<?php
		$nodo = "";
		$nodo = $_GET['retorno'];

		print_r("<h3>"."Paquetes instalados en: $nodo"."</h3>"); 

		$lista = glob("../inventario/$nodo\_*.txt");
		foreach ($lista as $fichero) {
			//print_r($fichero);
			$carga_fichero = fopen("$fichero", "r");
			if ($carga_fichero) {
				while (($linea = fgets($carga_fichero)) !== false ) {
				    print_r("<pre>".$linea."</pre>");
				}
				fclose($carga_fichero);
			}
			else {
				echo "Error en la carga del fichero.";
			}
		}
	?>
	</div>

	<?php 
		mysqli_close($conexion);
	?>

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>