<?php 
	include("include/conexiondb.php");

	$username = $_POST['username'];
	$pwd = $_POST['pwd'];
	$nodo = $_POST['nodo'];

	$sql_ip = "SELECT ip_addr FROM nodos WHERE hostname = '$nodo' LIMIT 1;";
	$resultado_ip = mysqli_query($conexion, $sql_ip);

	while ($array_ip = mysqli_fetch_array($resultado_ip, MYSQLI_ASSOC)) {
	    foreach ($array_ip as $ip => $valor) {
	    	exec("../bash/paquetes_nodos.sh $pwd $username $valor");
	    }
	}	

	header("Location: ../../paginas/paquete.php?retorno=$nodo");
	die();	
?>