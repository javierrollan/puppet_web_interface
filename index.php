<?php 
	include ("scripts/php/include/conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="contenedor">
		<?php 
			ini_set('display_errors', 1);
			ini_set('display_startup_erros', 1);
			error_reporting(E_ALL);
		?>

		<div class="item1">
			<?php 
				$f = exec('whoami');
				echo $f;
			?>			
		</div>

		<div class="item3">

		</div>

		<div class="4">
			<h2>Pruebas:</h2>

			<form action="" method="POST">
				<textarea name="textarea2" cols="50" wrap="soft"><?php $salida = htmlspecialchars($texto); echo $salida; ?></textarea>
				<br>
				<input type="submit" />
			</form>			
		</div>

		<div class="item5">
			<h2>Prueba loop insercion datos desde un Array</h2>

			<?php 
				$nombres = array("Pepe", "Jose", "David");
				$salida2 = "";
				$fichero2 = "prueba4.pp";
				foreach ($nombres as $nombre) {
					$salida2 .= "user { '$nombre':\n\tensure => 'present',\n},\n";
					print_r($salida2);					
				}
				file_put_contents($fichero2, $salida2, FILE_APPEND);
			?>
			
		</div>

		<div>
			<h2>Prueba loop Form</h2>

			<?php 
				$coches = array("bmw", "volkswagen", "fiat", "skoda"); 
			?>
									
			<form action="" method="POST">
				<select name="cars">
					<?php 
						foreach ($coches as $opciones) {
						echo "<option value='$opciones'>$opciones</option>";
						};
					?>
				</select>

			</form>
			
		</div>
		<hr>
		<div>
			<h1>Integracion Total:</h1>

			<p>Integracion de los foreach y escritura a arrays para usarlo con los modulos y las clases.</p>
			
			<h2>Creacion Modulo</h2>

			<p>Creacion de modulo Puppet que contendra la estructura de directorios y archivos.</p>

			<form action="scripts/php/crear_modulo.php" method="POST">
				<input type="text" name="nombre_modulo">
				<br>
				<input type="submit">
			</form>

			<h2>Creacion Clase</h2>

			<p>Creacion de la clase/s que contendran las funcionalidades del modulo Puppet.</p>

			<?php 
				
				$sql_nombre_modulo = "SELECT nombre FROM modulos;";
				$resultado_modulo = mysqli_query($conexion, $sql_nombre_modulo);
			?>

			<form action="scripts/php/crear_clase.php" method="POST">
				<select name="modulo">
					<?php 
						while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
							foreach ($array_nombre as $nombre => $valor) {
								echo "<option value='$valor'>$valor</option>";
							}							
						};
					?>					
				</select>				
				<input type="text" name="nombre_clase">
				<br>
				<input type="submit">
			</form>					

			<h2>Elegir Modulo y Clase Para Edicion</h2>

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

		</div>
	</div>
</body>
</html>
