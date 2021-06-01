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
			<li><a href="manifiesto.php">Ejecutar</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>

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

	<button id="contenidomodulo" onclick="contenidomodulo()">Ejecutar</button>

    <script>
        function contenidomodulo() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("salida").innerHTML = this.responseText;
                }
            };
            xhr.open("GET", "../scripts/php/comando_ls_modulo.php", true);
            xhr.send();
        }
    </script>

    <div id="salida"></div>

</body>
</html>