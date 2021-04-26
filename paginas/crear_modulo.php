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
		<br>
		<label for="pwd">Introduce Contraseña:</label>
		<input type="password" name="pwd" />
		<br>
		<label for="nombre_modulo">Inserta Nombre modulo:</label>
		<input type="text" name="nombre_modulo" />
		<br>
		<input type="submit" />
	</form>

	<?php 
		$f = exec("ls -la ../ | grep modulo", $output);
		foreach ($output as $value) {
			
			print_r("<pre>$value</pre>");
		}
	?>

	<button id="contenidocarpeta" onclick="contenidocarpeta()">Ejecutar</button>

    <script>
        function contenidocarpeta() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("texto").innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "../scripts/php/comando_ls.php", true);
            xhr.send();
        }
    </script>



    <div id="texto"></div>

	
</body>
</html>