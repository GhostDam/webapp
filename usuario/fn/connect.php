<?php
$conectar=mysqli_connect('localhost', 'root', '', 'sis_soporte');
  if (!$conectar){
    echo"no se pudo conectar con el servidor";
  }
  mysqli_set_charset($conectar, "utf8");

?>
