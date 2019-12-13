 <?php
require_once('conexion.php');
//echo '<pre>'.print_r($_POST,1).'</pre>';die();
$id_reporte = $_POST['reporte'];
$response['mensaje'] = '';
$response['existe'] = 0;
 $sql="SELECT * FROM reporte  WHERE id_reporte = $id_reporte";
 $resultado=$conexion->query($sql);
 if($resultado->num_rows > 0){
    $response['mensaje'] = "Ya se califico este reporte";
    $response['existe'] = 1;
 }else{
    $response['id'] = $id_reporte;
 }
 echo json_encode($response);
