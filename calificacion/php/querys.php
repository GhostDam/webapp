<?php
include('conexion.php');
// echo "<PRE>".print_r($_POST,1)."</PRE>"; die();
date_default_timezone_set("America/Mexico_City");
$id = $_POST['idreporte']; //id

$resolucion = $_POST['resolucion']; //solucion
$calificacion = $_POST['calidad']; //calidad
$atencion = $_POST['atencion']; //atencion
$profesional = $_POST['nivel']; //profesional
$respuesta = $_POST['respuesta']; //tiempo

$direccion = "firmas/firma.".$id.".png"; //posicion firma
$firma = utf8_decode($_POST['img']);  //archivo firma
$status = "completo";  // cierre de status

$fecha =date("d-m-y");
$hora=date("H:i:s");                                     //horaciere

$firma = $_POST['img'];  //archivo firma



//guardar         ("../DIRECCION/."NOMBRE".'FORMATO',base64_decode(explode(',',IMG_POST[?])); //formato
file_put_contents("../../soporte/firmas/"."firma.$id".'.png',base64_decode(explode(',',$firma)[1]));
//
//
   $sql="UPDATE reporte SET solucion ='$resolucion', calidad = '$calificacion', atencion='$atencion', nivel='$profesional', tiempo ='$respuesta',
                                firma='$direccion', fecha_cierre='$fecha', hora_cierre='$hora', status='$status' WHERE id_reporte ='$id' ";
   $resultado=$conexion->query($sql);
   if ($resultado) {
     $response['mensaje']='Se guardo Correctamente';
   }else{
     $response['error']= $conexion->error;
   }
   echo json_encode($response['mensaje']);

?>
