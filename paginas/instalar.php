<?php 
	include ("../scripts/php/include/conexiondb.php");
?>
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
			<li><a href="">Acceso</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>

	<h2>Instalacion del agente Puppet:</h2>
	
	<p>Instalacion del agente en un nodo externo</p>

	<form action="" method="POST">
		<label>Elige nodo/s:</label>
		<br>
		<?php 
			$sql_nombre_nodo = "SELECT hostname,ip_addr FROM nodos;";
			$resultado_nombre = mysqli_query($conexion, $sql_nombre_nodo);

			while ($array_nodo = mysqli_fetch_array($resultado_nombre, MYSQLI_ASSOC)) {
			    $i = 0;
			    foreach ($array_nodo as $nombre) {
			    	if ($i == 0) {
			    		echo "<label>".$array_nodo['hostname']."</label>";
			    	} elseif ($i == 1) {
			    		echo "<input type='checkbox' name='nodo[]' value=".$array_nodo['ip_addr'].">";
			    	}
			    	$i++;	
			    }
			}
		?>
		<br>
		<p>Datos de usuario en nodo</p>
		<label>Usuario:</label>
		<input type="text" name="username" id="">
		<br>
		<label>Contraseña:</label>
		<input type="text" name="pwd" id="">
		<br>
		<input type="submit" />
	</form>

	<?php 
		$nodo = $_POST['nodo'];
		foreach ($nodo as $value) {
			echo $value;
		}
		mysqli_close($conexion);
	?>

</body>
</html>