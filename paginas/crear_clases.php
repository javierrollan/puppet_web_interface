<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
</head>
<body>

	<h2>Creacion Clase</h2>

	<p>Creacion de la clase/s que contendran las funcionalidades del modulo Puppet.</p>

	<?php 
		
		$sql_nombre_modulo = "SELECT nombre FROM modulos;";
		$resultado_modulo = mysqli_query($conexion, $sql_nombre_modulo);
	?>

	<form action="../scripts/php/c_clase.php" method="POST">
		<label for="modulo">Selecciona modulo:</label>
		input
		<select name="modulo">
			<?php 
				while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
					foreach ($array_nombre as $nombre => $valor) {
						echo "<option value='$valor'>$valor</option>";
					}							
				};
			?>					
		</select>
		<label for="nombre_clase">Introduce nombre clase:</label>				
		<input type="text" name="nombre_clase">
		<br>
		<input type="submit">
	</form>	
	
</body>
</html>