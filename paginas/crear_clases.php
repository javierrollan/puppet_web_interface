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
	<script type="text/javascript" src="../scripts/js/jquery.js"></script>
</head>
<body>

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

	<h2>Creacion Clase</h2>

	<p>Creacion de la clase/s que contendran las funcionalidades del modulo Puppet.</p>

	<?php 
		
		$sql_nombre_modulo = "SELECT nombre FROM modulos;";
		$resultado_modulo = mysqli_query($conexion, $sql_nombre_modulo);
	?>

	<form action="../scripts/php/c_clase.php" method="POST">
		<label for="modulo">Selecciona modulo:</label>
		<select id="modulo" name="modulo">
			<?php 
				while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
					foreach ($array_nombre as $nombre => $valor) {
						echo "<option value='$valor'>$valor</option>";
					}							
				};
			?>					
		</select>
		<br>
		<label>Inserta usuario:</label>
		<input id="username" type="text" name="usuario">
		<br>
		<label for="pwd">Introduce Contraseña:</label>
		<input id="pwd" type="password" name="pwd" />
		<br>		
		<label for="nombre_clase">Introduce nombre clase:</label>				
		<input id="n_clase" type="text" name="nombre_clase">
		<br>
		<input type="submit" id="enviar_datos">
	</form>	

	<?php
		$retorno = "";
		$retorno = $_GET['retorno'];
		$clase = $_GET['clase']; 
		if (empty($retorno)) {
			echo '';
		} else {
			echo "<p>Insercion correcta en la Base de Datos.</p>";
			echo "<br>";
			echo "<p>Clase $clase creada correctamente</p>";
		}
	?>

    <?php 
    	mysqli_close($conexion);
    ?>

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>