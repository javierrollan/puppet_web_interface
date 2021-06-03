<?php
    $pwd = $_POST['pwd'];
    exec("echo '$pwd' | su -c ./certificados.sh root ", $output, $exit_code);

    header("Location: ../../paginas/certificados.php?retorno2=$exit_code");
?>