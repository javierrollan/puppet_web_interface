<?php 
	include('../scripts/php/include/conexiondb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
</head>
<body>

	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_erros', 1);
		error_reporting(E_ALL);	 
		$f = exec('whoami');
		echo $f;
	?>

	<div class="navegador">
		<ul>
			<li><a href="../index.php">Resumen</a></li>
			<li><a href="nodos.php">Nodos</a></li>
			<li><a href="paquete.php">Paquetes</a></li>
			<li><a href="instalar.php">Instalar</a></li>
			<li><a href="certificados.php">Certificados</a></li>
			<li><a href="ejecutar.php">Ejecutar</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>

	<form action="../scripts/php/e_remoto.php" method="POST">
		<label>Selecciona nodo:</label>
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
		<input type="text" name="username" />
		<br>
		<label>Contraseña:</label>
		<input type="password" name="pwd" />
		<br>
		<label>Comando:</label>
		<input type="text" name="comando" />
		<br>
		<input type="submit">		
	</form>	

	<?php 
		mysqli_close($conexion);
	?>
	
</body>
</html>