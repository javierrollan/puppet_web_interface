<?php 
	$n_nodo = $_POST['nodo'];

	foreach ($n_nodo as $nombre => $valor) {
		echo "$valor";
	}		
?>