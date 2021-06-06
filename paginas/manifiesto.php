<?php 
	include ("../scripts/php/include/conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/estilo.css">
	<title>Proyecto</title>
	<script type="text/javascript" src="../scripts/js/jquery.js"></script>
</head>
<body>

	<img src="../img/Puppet_transparent_logo.png" alt="">

	<div class="navegador">
		<tr>	
			<td></td><a href="../index.php">Resumen</a></td>
			<td><a href="nodos.php">Nodos</a></td>
			<td><a href="paquete.php">Paquetes</a></td>
			<td><a href="instalar.php">Instalar</a></td>
			<td><a href="certificados.php">Certificados</a></td>
			<td><a href="ejecutar.php">Ejecutar</a></td>
			<td><a href="manifiesto.php">Manifiesto</a></td>
			<td><a href="crear_modulo.php">Modulos</a></td>
			<td><a href="crear_clases.php">Clases</a></td>
			<td><a href="edicion_clase.php">Edicion</a></td>
		</tr>
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

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>

</body>
</html>