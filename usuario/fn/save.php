<?php
include('connect.php');

//recepcion de datos y almacenar en variables
// date("Y/m/d")
date_default_timezone_set("America/Mexico_City");
//Datos del reporte
$date=date("y-m-d");                                //fecha
$time=date("H:i:s");                                //hora
$nombre = $_POST["nombre"];                         //persona que repora
//Status General
$asunto = $_POST["asunto"];                         //asunto
$descripcion = $_POST["descripcion"];               //descripcion
//Datos del Usuario
$usuario = $_POST["usuario"];                       //usuario
$area = $_POST["area"];                             //area
$encargado = $_POST["encargado"];                   //encargado
//Caracteristicas Equipo
$marca = $_POST["marca"];                                  //marca equipo
$modelo = $_POST["modelo"];                                //modelo equipo
$serie = $_POST["serie"];                                  //serie equipo
$equipo= $_POST["inventario"];                             //inventario = id equipo

$firma="";                                          //tiempo
$status="pendiente";                                //tiempo


//hacemos la sentencia de sql, es decir, especificar que se hara con los datos
$sql="INSERT INTO reporte (fecha, hora, nombre, area, encargado_area, usuario, asunto, descripcion, marca, modelo, serie, id_equipo, status)
                          VALUES('$date',
                                '$time',
                                '$nombre',
                                '$area',
                                '$encargado',
                                '$usuario',
                                '$asunto',
                                '$descripcion',
                                '$marca',
                                '$modelo',
                                '$serie',
                                '$equipo',
                                '$status')";
//ejecutar guardado, especificas La coneccion, y la funcion de escribir(guardar datos),
$ejecutar=mysqli_query($conectar, $sql);
//verficar ejecucion
if(!$ejecutar){
        echo"Hubo algún error";
  }else{
    $id=$conectar->insert_id;

    echo "Reporte enviado correctamente, tu número de fólio es: ".$id;
}
 ?>
