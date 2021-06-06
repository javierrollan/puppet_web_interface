<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/estilo.css">
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
		$retorno = "";
		$retorno = $_GET['retorno'];
		$modulo = $_GET['modulo']; 
		if (empty($retorno)) {
			echo '';
		} else {
			echo "<p>Insercion correcta en la Base de Datos.</p>";
			echo "<br>";
			echo "<p>Modulo $modulo creado correctamente</p>";
		}
	?>

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

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>