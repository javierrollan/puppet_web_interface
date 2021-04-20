<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'dashboard');
	define('DB_PASSWORD', 'dashboard');
	define('DB_NAME', 'dashboard');
	
	$conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if($conexion === false){
		die("Error: conexion rechazada. ".mysqli_connect_error());
	}
?>