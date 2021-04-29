<?php 
	include('../scripts/php/include/conexiondb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto</title>
</head>
<body>

	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_erros', 1);
		error_reporting(E_ALL);	 
		$f = exec('whoami');
		echo $f;
	?>

	<div class="navegador">
		<ul>
			<li><a href="../index.php">Resumen</a></li>
			<li><a href="nodos.php">Nodos</a></li>
			<li><a href="paquetes.php">Paquetes</a></li>
			<li><a href="instalar.php">Instalar</a></li>
			<li><a href="certificados.php">Certificados</a></li>
			<li><a href="ejecutar.php">Ejecutar</a></li>
			<li><a href="">Acceso</a></li>
			<li><a href="crear_modulo.php">Modulos</a></li>
			<li><a href="crear_clases.php">Clases</a></li>
			<li><a href="edicion_clase.php">Edicion</a></li>
		</ul>
	</div>
	
	<h2>Inventario:</h2>

	<p>Añade nodos:</p>

	<form action="../scripts/php/inserta_nodos.php" method="POST">
		<p>Añade los nodos al archivo hosts para su resolucion:</p>
		<label>Usuario:</label>
		<input type="text" name="username" />
		<label>Contraseña:</label>
		<input type="password" name="pwd" />
		<br>
		<p>Datos de los nodos</p>
		<label>Direccion IP:</label>
		<input type="text" name="ip_addr" value="" />
		<br>
		<label>Direccion MAC:</label>
		<input type="text" name="mac_addr" placeholder="00:00:00:00:00:00" />
		<br>
		<label>Nombre Nodo:</label>
		<input type="text" name="hostname" value="" />
		<br>
		<input type="submit">
	</form>

	<?php
		$retorno = "";
		$retorno = $_GET['retorno']; 
		if (empty($retorno)) {
			echo '';
		} else {
			echo "<p>Insercion correcta en la Base de Datos.</p>";
		}
	?>

	<h2>Nodos Disponibles:</h2>

	<p>Listado de Nodos conectados:</p>

	<table>
		<tr>
			<th>Direccion IP</th>
			<th>Direccion Mac</th>
			<th>Hostname</th>
			<th>Estado</th>
		</tr>
		
		<?php 
			$sql_nodos = "SELECT ip_addr, mac_addr, hostname FROM nodos;";
			$resultado_nodos = mysqli_query($conexion, $sql_nodos);
			while ($array_nodos = mysqli_fetch_array($resultado_nodos, MYSQLI_ASSOC)) {
				$i = 0;
				$len = count($array_nodos, COUNT_NORMAL);		
				echo "<tr>";
			    foreach ($array_nodos as $nombre => $valor) {
					$ip_addr = $array_nodos['ip_addr'];
					exec("ping -c 1 -w 1 $ip_addr 2>&1", $output, $exit_code);
					if ($exit_code == 0) {
						if ($i == 0) {
							echo "<td>". $valor ."</td>";
						} elseif ($i == 1) {
							echo "<td>". $valor ."</td>";			
						} elseif ($i == 2) {
							$f = "Online";
							echo "<td>". $valor ."</td>";
							echo "<td>". $f ."</td>";				
						}
						$i++;						
					} else {
						if ($i == 0) {
							echo "<td>". $valor ."</td>";
						} elseif ($i == 1) {
							echo "<td>". $valor ."</td>";			
						} elseif ($i == 2) {
							$f = "Offline";
							echo "<td>". $valor ."</td>";
							echo "<td>". $f ."</td>";				
						}
						$i++;							
					}

			    }
			    echo "</tr>";
			}
		?>
		
	</table>	

	

</body>
</html>