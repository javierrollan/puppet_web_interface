<?php 
	include('include/conexiondb.php');

	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$ip_addr = $_POST['ip_addr'];
	$mac_addr = $_POST['mac_addr'];
	$hostname = $_POST['hostname'];

	$sql_insercion_nodo = "INSERT INTO nodos (ip_addr, mac_addr, hostname) VALUES ('$ip_addr', '$mac_addr', '$hostname')";
	if (mysqli_query($conexion, $sql_insercion_nodo)) {
		echo 'Insercion correcta en la Base de Datos';
	} else {
		echo 'Error: ' . $sql_insercion_nodo . "<br>" . mysqli_error($conexion); 
	}

	exec("../bash/./insertar_nodo.sh $pwd $ip_addr $hostname");

	header ("Location: ../../paginas/nodos.php?retorno=1");
?>