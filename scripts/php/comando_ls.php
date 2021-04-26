<?php 
	$fecha = array();
	exec("ls -la ../../ | grep modulo | awk '{OFS=":"}{print $6" "$7" "$8}'", $output);
	$nombre = array();
	exec();
	$permisos = array();
	exec();

	foreach ($output as $value) {
		
		print_r("<pre>$value</pre>");
	}
?>