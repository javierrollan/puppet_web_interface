<?php
	$datos = array();
	exec("ls -la /etc/puppetlabs/code/modules| grep modulo", $datos); 

	foreach ($datos as $dato) {
		
		print_r("<pre>$dato</pre>");
	}	
?>