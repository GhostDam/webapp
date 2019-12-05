<?php
include('conexion.php');
// echo "<PRE>".print_r($_POST,1)."</PRE>"; die();
$id = $_POST['idreporte'];
$resolucion = $_POST['resolucion'];
$calificacion = $_POST['calificacion'];
$atencion = $_POST['atencion'];
$respuesta = $_POST['respuesta'];
$fecha = $_POST['fecha'];


$sql="SELECT * FROM reporte  WHERE id_reporte = $id";
$resultado=$conexion->query($sql);
$num=$resultado->num_rows;
 $response['mensaje']='';
if($num>=1) {
    $response['mensaje']='Ya se califico este reporte';
}else if ($num ==0){
   $sql="UPDATE reporte SET solucion ='$resolucion', calidad = '$calificacion', atencion='$atencion', nivel='$respuesta' WHERE id_reporte ='$id' ";
$resultado=$conexion->query($sql);
if ($resultado) {
  $response['mensaje']='Se guardo Correctamente';
}else{
    $response['error']= $conexion->error;
 }
}

echo json_encode($response);
?>
