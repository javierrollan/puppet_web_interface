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
			<li><a href="manifiesto.php">Manifiesto</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>

	<h2>Certificados de los nodos:</h2>

	<form action="../scripts/php/e_certificados.php" method="POST">
		<label for="">Contraseña:</label>
		<br>
		<input type="password" names="pwd">
		<br>
		<input type="submit">
	</form>

	<?php

	$exit_code = $_GET['retorno2'];

	print_r("<p>"."Exit Code: ".$exit_code."</p>");

	print_r("<h3>"."Certificados:"."</h3>"); 

	$lista = glob("../certificados/certificados.txt");
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

</body>
</html>