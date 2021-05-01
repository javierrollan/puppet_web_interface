<?php 
  echo "Esto es una prueba de creacion de carpeta";
  echo "<br>";
  $f = exec('ls -la');
  $nombre_carpeta = $_GET['q'];

  exec("mkdir $nombre_carpeta");
  echo $f;
?>