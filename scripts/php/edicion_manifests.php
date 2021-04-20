<?php 
	$fichero = '';
	$texto = file_get_contents($fichero);

	if (isset($_POST['textarea2'])) {
		
		file_put_contents($fichero, $_POST['textarea2']);

		header('Location: index.php');
		exit();
	}
?>