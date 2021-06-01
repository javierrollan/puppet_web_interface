<?php 
	include ("../scripts/php/include/conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
	<script type="text/javascript" src="../scripts/js/jquery.js"></script>
</head>
<body>

	<div class="navegador">
		<ul>
			<li><a href="../index.php">Resumen</a></li>
			<li><a href="nodos.php">Nodos</a></li>
			<li><a href="paquete.php">Paquetes</a></li>
			<li><a href="instalar.php">Instalar</a></li>
			<li><a href="certificados.php">Certificados</a></li>
			<li><a href="ejecutar.php">Ejecutar</a></li>
            <li><a href="manifiesto.php">Manifiesto</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>

	<h2>Edicion de Manifiesto:</h2>

    <?php 
        $fichero = "/etc/puppetlabs/code/environments/production/manifests/manifiesto.pp";

        if(isset($_POST['datos'])) {
            file_put_contents($fichero, $_POST['datos']);

            header('Location: manifiesto.php');
        }

        $texto = file_get_contents($fichero);
    ?>

	<form action="" method="POST">
		<br>
		<p>Editar Manifiesto:</p>
		<br>
		<textarea name="datos" id="" cols="30" rows="10"><?php $salida = htmlspecialchars($texto); echo $salida; ?></textarea>
        <input type="submit">
    </form>
	
	<?php 
		mysqli_close($conexion);
	?>

</body>
</html>