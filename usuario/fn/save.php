<?php
require('../../conn/connect.php');

//recepcion de datos y almacenar en variables
// date("Y/m/d")
date_default_timezone_set("America/Mexico_City");
//Datos del reporte

$date=date("y-m-d");                                //fecha
$time=date("H:i:s");                                //hora
$nombre = $conectar->real_escape_string($_POST["nombre"]);                         //persona que repora
//Status General
$asunto = $conectar->real_escape_string($_POST["asunto"]);                         //asunto
$descripcion = $conectar->real_escape_string($_POST["descripcion"]);               //descripcion
//Datos del Usuario
$usuario = $conectar->real_escape_string($_POST["usuario"]);                       //usuario
$area = $conectar->real_escape_string($_POST["area"]);                             //area
$encargado = $conectar->real_escape_string($_POST["encargado"]);                   //encargado
//Caracteristicas Equipo
$marca = $conectar->real_escape_string($_POST["marca"]);                                  //marca equipo
$modelo = $conectar->real_escape_string($_POST["modelo"]);                                //modelo equipo
$serie = $conectar->real_escape_string($_POST["serie"]);                                  //serie equipo
$equipo= $conectar->real_escape_string($_POST["inventario"]);                             //inventario = id equipo

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
    echo("Error description: " . $ejecutar->error);
    // echo print_r($ejecutar);
  }else{
    $id=$conectar->insert_id;

    echo "Reporte enviado correctamente, en bréve será atendido.\n Su número de fólio es: ".$id.".";
}
 ?>
