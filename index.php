<?php 
	include ("scripts/php/include/conexiondb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
	<div class="contenedor">
		<?php 
			ini_set('display_errors', 1);
			ini_set('display_startup_erros', 1);
			error_reporting(E_ALL);
		?>

		<div class="item1">
			<?php 
				$f = exec('whoami');
				echo $f;
			?>			
		</div>

		<div class="item3">

		</div>

		<div class="4">
			<h2>Pruebas:</h2>

			<form action="" method="POST">
				<textarea name="textarea2" cols="50" wrap="soft"><?php $salida = htmlspecialchars($texto); echo $salida; ?></textarea>
				<br>
				<input type="submit" />
			</form>			
		</div>

		<div class="item5">
			<h2>Prueba loop insercion datos desde un Array</h2>

			<?php 
				$nombres = array("Pepe", "Jose", "David");
				$salida2 = "";
				$fichero2 = "prueba4.pp";
				foreach ($nombres as $nombre) {
					$salida2 .= "user { '$nombre':\n\tensure => 'present',\n},\n";
					print_r($salida2);					
				}
				file_put_contents($fichero2, $salida2, FILE_APPEND);
			?>
			
		</div>

		<div>
			<h2>Prueba loop Form</h2>

			<?php 
				$coches = array("bmw", "volkswagen", "fiat", "skoda"); 
			?>
									
			<form action="" method="POST">
				<select name="cars">
					<?php 
						foreach ($coches as $opciones) {
						echo "<option value='$opciones'>$opciones</option>";
						};
					?>
				</select>

			</form>
			
		</div>
		<hr>
		<div>
			<h1>Integracion Total:</h1>

			<p>Integracion de los foreach y escritura a arrays para usarlo con los modulos y las clases.</p>
			
			<h2>Creacion de modulos:</h2>
			<a href="paginas/crear_modulo.php">Crear modulos</a>

			<h2>Creacion de clases:</h2>
			<a href="paginas/crear_clases.php">Crear clases</a>				

			<h2>Elegir Modulo y Clase Para Edicion</h2>
			<a href="paginas/edicion_clase">Edicion clase</a>

		</div>
	</div>
</body>
</html>
