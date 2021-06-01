<?php 
	include ("../scripts/php/include/conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
	<script type="text/javascript" src="../scripts/js/jquery.js"></script>
</head>
<body>

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

	<h2>Edicion de clases</h2>

	<form action="../scripts/php/e_clases.php" method="POST">
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
	
	<?php 
		mysqli_close($conexion);
	?>

</body>
</html>