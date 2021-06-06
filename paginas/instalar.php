<?php 
	include ("../scripts/php/include/conexiondb.php");
?>
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

	<h2>Instalacion del agente Puppet:</h2>
	
	<p>Instalacion del agente en un nodo externo</p>

	<form action="../scripts/php/instalar_agente.php" method="POST">
		<label>Elige nodo/s:</label>
		<br>
		<select name="nodo">
			<?php 
				$sql_nombre_nodo = "SELECT hostname FROM nodos;";
				$resultado_nombre = mysqli_query($conexion, $sql_nombre_nodo);
				while ($array_nodo = mysqli_fetch_array($resultado_nombre, MYSQLI_ASSOC)) {
				    foreach ($array_nodo as $nombre => $valor) {
				    	echo "<option value='$valor'>$valor</option>";
				    }
				}
			?>
		</select>
		<br>
		<p>Datos de usuario en nodo</p>
		<label>Usuario:</label>
		<input type="text" name="username" id="">
		<br>
		<label>Contraseña:</label>
		<input type="password" name="pwd" id="">
		<br>
		<input type="submit" />
	</form>

	<?php 
		mysqli_close($conexion);
	?>

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>