<?php
include 'connect.php';

date_default_timezone_set("America/Mexico_City");
$num = $_POST['num'];
$calidad = $_POST['cal'];
$atencion = $_POST['atn'];
$nivel = $_POST['prf'];
$tiempo = $_POST['tmp'];
$solucion = $_POST["sol"];


$direccion = "firmas/firma.".$num.".png";
$firma = $_POST['img'];
$status = "completo";

$fechacierre=date("d-m-y");                                         //fecha-cierre
$horacierre=date("H:i:s");                                     //horaciere
// $atendio = $_POST['pat'];                                      //quien atendio


// file_put_contents("../firmas/".date('Y-m-d_H_i_s').'.png',base64_decode(explode(',',$firma)[1]));
//guardar         ("../DIRECCION/."NOMBRE".'FORMATO',base64_decode(explode(',',IMG_POST[?])); //formato
file_put_contents("../firmas/"."firma.$num".'.png',base64_decode(explode(',',$firma)[1]));

// $sql = "INSERT INTO bocinas (id_bocinas, marca, modelo, serie) VALUES('$solucion','$calificacion', '$direccion','$firma')";
$sql = "UPDATE reporte SET calidad = '$calidad', atencion = '$atencion', nivel = '$nivel', tiempo = '$tiempo', solucion ='$solucion',
                            firma = '$direccion', status = '$status', fecha_cierre = '$fechacierre', hora_cierre = '$horacierre',
                            atendio = '$atendio' WHERE id_reporte ='$num'";

$resultado = $conectar->query($sql);
if($resultado){
    echo print_r($_POST);
}else {
    echo "No se guardo".$conectar->error;
}

?>
