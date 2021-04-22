<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
</head>
<body>

	<h2>Edicion de clases</h2>

	<form action="scripts/php/edicion_clases.php" method="POST">
		<p>Elegir Modulo:</p>
		<select name="modulo_E">
			<?php
				$sql_nombre_modulo = "SELECT nombre FROM modulos;";
				$resultado_modulo = mysqli_query($conexion, $sql_nombre_modulo);					 
				while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
					foreach ($array_nombre as $nombre => $valor) {
						echo "<option value='$valor'>$valor</option>";
					}							
				};
			?>						
		</select>
		<br>
		<p>Editar clase:</p>
		<select name="clase_E">
			<?php 
				while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
					foreach ($array_nombre as $nombre => $valor) {
						echo "<option value='$valor'>$valor</option>";
					}							
				};
			?>
		</select>
		<br>
		<textarea name="" id="" cols="30" rows="10"><?php $salida = htmlspecialchars($texto); echo $salida; ?></textarea>
	</form>
	
</body>
</html>