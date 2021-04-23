<?php 
  echo "Esto es una prueba de carga de contenido dinamico";
  echo "<br>";
  $f = exec('ls -la');
  echo $f;
?>