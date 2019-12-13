<?php
require_once('conexion.php');

$id_reporte = $_POST['idreporte'];
$respuesta['mensaje'] ='';
$respuesta['guardado'] = 0;
 $sql="SELECT * FROM calificacion  WHERE id=$id_reporte";
 $resultado=$conexion->query($sql);
if($resultado->num_rows >=1) {
    $respuesta['mensaje'] = "Se guardo correctamente";
    $respuesta['guardado'] = 1;
  }else{
    $respuesta['id']=$id_reporte;
  }
  echo json_encode($respuesta);
