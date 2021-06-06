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

	exec("sha256sum /etc/puppetalbs/puppetserver/ca/requests/nodo1.pem", $output, $exit_code2);
	print_r($exit_code2);
	print_r($output);

	?>

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>