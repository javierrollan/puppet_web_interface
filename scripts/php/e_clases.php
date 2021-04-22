<?php 
	include("include/conexiondb.php");

	$modulo_E = $_POST['modulo_E'];
	$sql_modulo_E = "SELECT nombre FROM modulos WHERE nombre = '$modulo_E' LIMIT 1";
	$query_modulo_E  = mysqli_query($conexion, $sql_modulo_E);

	while ($resultado_E = mysqli_fetch_array($query_modulo_E, MYSQLI_ASSOC)) {
	    foreach ($resultado as $nombre => $valor) {
	    	
	    }
	}
?>