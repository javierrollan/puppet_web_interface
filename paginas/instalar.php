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

	<h2>Instalacion del agente Puppet:</h2>
	
	<p>Instalacion del agente en un nodo externo</p>

	<form action="" method="POST">
		<label>Elige nodo/s:</label>
		<br>
		<?php 
			$sql_nodo = "SELECT hostname FROM nodos";
			$resultado_nodo = mysqli_query($conexion, $sql_nodo);

			while ($array_nodo = mysqli_fetch_array($resultado_nodo, MYSQLI_ASSOC)) {
			    foreach ($array_nodo as $nombre => $valor) {
			    	echo "<label>$valor</label>";
			    	echo "<input type='checkbox' name='nodo[]' value='$valor' />";
			    	echo "<br>";
			    }
			}
		?>
		<input type="submit" />
	</form>

	<?php 
		$n_nodo = $_POST['nodo'];
		
	    foreach ($n_nodo as $nombre => $valor) {
	    	echo "$valor";
	    }		
	?>
</body>
</html>