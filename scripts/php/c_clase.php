<?php
	include("include/conexiondb.php");

	# Obtenemos el nombre del modulo
	$modulo = $_POST['modulo'];
	# Realizamos una query en la BD en la tabla modulo 
	# filtrando la busqueda por el nombre del modulo para obtener el ID del modulo
	$sql_id_modulo = "SELECT id_modulo FROM modulos WHERE nombre = '$modulo' LIMIT 1";
	# Realizamos la conexion y enviamos la query contra la BD
	$query_id_modulo = mysqli_query($conexion, $sql_id_modulo);
	# Mientras nos devuelva un resultado lo asignaremos a un array asociativo
	while ($resultado = mysqli_fetch_array($query_id_modulo, MYSQLI_ASSOC)) {
	    # Recorremos el array asociativo
	    foreach ($resultado as $id => $valor) {
	    	# Obtenemos el nombre de la clase por parte del usuario
	    	$nombre_clase = $_POST['nombre_clase'];
			# Insertamos en la BD el nombre de la clase y el ID_modulo
			$sql_insercion_clase = "INSERT INTO clases (id_modulo, nombre) VALUES ($valor,'$nombre_clase');";
			# Simple Check para asegurar que la insercion ha funcionado
			if (mysqli_query($conexion, $sql_insercion_clase)) {
				echo 'Insercion correcta en la Base de Datos';
			} else {
				echo 'Error: ' . $sql_insercion_clase . "<br>" . mysqli_error($conexion);
			}
	    }
	}
 
 	# Ejecuta el script bash y crea la clase.
 	$usuario = $_POST['usuario'];
 	$password = $_POST['pwd'];
	exec("../bash/./creacion_clase.sh $usuario $password $modulo $nombre_clase");

	echo "Datos isertados correctamente en la base de datos";
?>