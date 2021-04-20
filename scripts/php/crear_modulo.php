<?php
	include("include/conexiondb.php");

	$nombre_modulo = $_POST['nombre_modulo']; 	

	$sql_insercion_modulo = "insert into modulos (nombre) values ('$nombre_modulo');";
	if (mysqli_query($conexion, $sql_insercion_modulo)) {
		echo 'Insercion correcta en la Base de Datos';
	} else {
		echo 'Error: ' . $sql_insercion_modulo . "<br>" . mysqli_error($conexion);
	}

	
	exec("../bash/./creacion_modulo.sh '$nombre_modulo'");	
?>