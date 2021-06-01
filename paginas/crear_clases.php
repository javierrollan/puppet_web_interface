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
			<li><a href="manifiesto.php">Ejecutar</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="#">Edicion</a></li>
		</ul>
	</div>

	<h2>Creacion Clase</h2>

	<p>Creacion de la clase/s que contendran las funcionalidades del modulo Puppet.</p>

	<?php 
		
		$sql_nombre_modulo = "SELECT nombre FROM modulos;";
		$resultado_modulo = mysqli_query($conexion, $sql_nombre_modulo);
	?>

	<form action="../scripts/php/c_clase.php" method="POST">
		<label for="modulo">Selecciona modulo:</label>
		<select id="modulo" name="modulo">
			<?php 
				while ($array_nombre = mysqli_fetch_array($resultado_modulo, MYSQLI_ASSOC)) {
					foreach ($array_nombre as $nombre => $valor) {
						echo "<option value='$valor'>$valor</option>";
					}							
				};
			?>					
		</select>
		<br>
		<label>Inserta usuario:</label>
		<input id="username" type="text" name="usuario">
		<br>
		<label for="pwd">Introduce Contraseña:</label>
		<input id="pwd" type="password" name="pwd" />
		<br>		
		<label for="nombre_clase">Introduce nombre clase:</label>				
		<input id="n_clase" type="text" name="nombre_clase">
		<br>
		<input type="submit" id="enviar_datos">
	</form>	

    <script>
    	function enviar(modulo, username, pwd, n_clase) {
    		var parametros = {
    			"modulo" : modulo,
    			"username" : username,
    			"pwd" : pwd,
    			"n_clase" : n_clase
    		};
    		$.ajax({
    			data: parametros,
    			url: '../scripts/php/c_clase.php',
    			type: 'POST',
    			beforeSend: function () {
    				$("#resultado2").html("Enviando datos, espere por favor...");
    			},
    			success: function (response) {
    				$("#resultado2").html(response);
    			}
    		})
    	}

    	function clase(modulo){
    		var parametros = {
    			"modulo" : modulo
    		};
    		$.ajax({
    			data: parametros,
    			url: '../scripts/php/comando_ls_clase.php',
    			type: 'POST',
    			beforeSend: function () {
    				$("#resultado").html("Recuperando datos, espere por favor...");
    			},
    			success: function (response) {
    				$("#resultado").html(response);
    			}
    		})
    	}
    </script>

    <div>
    	Resultado:
    	<span id="#resultado2"></span>
    </div>

    <input type="button" href="javascript:;" onclick="clase($('#modulo').val());return false;" value="Devuelve">
	
    <div>
    	Contenido:
    	<span id="resultado">1</span>
    </div>

    <?php 
    	mysqli_close($conexion);
    ?>

</body>
</html>