<?php
	include("include/conexiondb.php");

	$modulo = $_POST['modulo'];

	echo $modulo;
	echo '<br>';

	$sql_id_modulo = "SELECT id_modulo FROM modulos WHERE nombre = '$modulo' LIMIT 1";
	$query_id_modulo = mysqli_query($conexion, $sql_id_modulo);
	while ($resultado = mysqli_fetch_array($query_id_modulo, MYSQLI_ASSOC)) {
	    foreach ($resultado as $id => $valor) {
	    	echo '<br>';
	    	print_r($resultado);
	    	echo '<br>';
	    	$nombre_clase = $_POST['nombre_clase'];
			$sql_insercion_clase = "insert into clases (id_modulo, nombre) values ($valor,'$nombre_clase');";
			if (mysqli_query($conexion, $sql_insercion_clase)) {
				echo 'Insercion correcta en la Base de Datos';
			} else {
				echo 'Error: ' . $sql_insercion_clase . "<br>" . mysqli_error($conexion);
			}
	    }
	}

	

 
	exec("../bash/./creacion_clase.sh '$nombre_clase'");

	header("Loaction: ../../index.php");
?>