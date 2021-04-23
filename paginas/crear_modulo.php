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

	<h2>Creacion Modulo</h2>

	<p>Creacion de modulo Puppet que contendra la estructura de directorios y archivos.</p>

	<form action="../scripts/php/c_modulo.php" method="POST">
		<label for="username">Inserta Usuario:</label>
		<input type="text" name="username" />
		<label for="pwd">Introduce Contraseña:</label>
		input
		<input type="text" name="pwd" />
		<label for="nombre_modulo">Inserta Nombre modulo:</label>
		input
		<input type="text" name="nombre_modulo" />
		<br>
		<input type="submit" />
	</form>

	
</body>
</html>