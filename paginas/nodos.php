<?php 
	include('../scripts/php/include/conexiondb.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/estilo.css">
	<title>Proyecto</title>
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

	<div class="centrar">
	<?php
		$retorno = "";
		$retorno = $_GET['retorno']; 
		if (empty($retorno)) {
			echo '';
		} else {
			echo "<p>Insercion correcta en la Base de Datos.</p>";
		}
	?>
	</div>

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
			mysqli_close($conexion);
		?>
		
	</table>	

	<div class="footer">

		<p>Proyecto creado por Alejandro Fernández, Javier Rollan y Oscar Simón</p>

	</div>	

</body>
</html>