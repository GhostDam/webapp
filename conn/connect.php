<?php
//conectar con servidor formato 'host', 'usuario', 'contraseña', 'base de datos'
$conectar=mysqli_connect('localhost', 'root', '', 'portfolio');
mysqli_set_charset($conectar, "utf8");
//verificar conexion

  if (!$conectar){
    echo"no se pudo conectar con el servidor";
  }

?>
