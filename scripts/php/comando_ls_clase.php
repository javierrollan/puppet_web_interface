<?php
	$modulo = $_POST['modulo'];
	$datos = array();
	exec("ls -la /etc/puppetlabs/code/modules/$modulo/manifests/", $datos); 

	foreach ($datos as $dato) {
		
		print_r("<pre>$dato</pre>");
	}	
?>