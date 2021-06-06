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

	<div class="centrar">
	<?php

	exec("../scripts/bash/./cert_request.sh 2>&1", $output1, $exit_code1);

	print_r("<h3>"."Certificados Pendientes:"."</h3>"); 

	$solicitados = glob("../certificados/cert_req.txt");
	foreach ($solicitados as $fichero_sol) {
		$carga_fichero_sol = fopen("$fichero_sol", "r");
		if ($carga_fichero_sol) {
			while (($linea = fgets($carga_fichero_sol)) !== false ) {
				print_r("<pre>".$linea."</pre>");
			}
			fclose($carga_fichero_sol);
		}
		else {
			echo "Error en la carga del fichero.";
		}
	}

	exec("../scripts/bash/./cert_sign.sh 2>&1", $output2, $exit_code2);

	print_r("<h3>"."Certificados firmados:"."</h3>"); 

	$firmados = glob("../certificados/cert_sign.txt");
	foreach ($firmados as $fichero_firm) {
		$carga_fichero_firm = fopen("$fichero_firm", "r");
		if ($carga_fichero_firm) {
			while (($linea = fgets($carga_fichero_firm)) !== false ) {
				print_r("<pre>".$linea."</pre>");
			}
			fclose($carga_fichero_firm);
		}
		else {
			echo "Error en la carga del fichero.";
		}
	}
	?>
	</div>

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>