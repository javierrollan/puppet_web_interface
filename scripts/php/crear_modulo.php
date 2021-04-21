<?php
	include("include/conexiondb.php");

	$nombre_modulo = $_POST['nombre_modulo']; 	

	$sql_insercion_modulo = "INSERT INTO modulos (nombre) VALUES ('$nombre_modulo');";
	if (mysqli_query($conexion, $sql_insercion_modulo)) {
		echo 'Insercion correcta en la Base de Datos';
	} else {
		echo 'Error: ' . $sql_insercion_modulo . "<br>" . mysqli_error($conexion);
	}

	
	exec("../bash/./creacion_modulo.sh '$nombre_modulo'");	
?>