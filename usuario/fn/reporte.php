<?php

  require("connect.php");
//cargar areas
//print_r($_REQUEST);
if(isset($_POST['caso'])){// && $_POST['caso']=='loadArea'
    $areas="";
    $query = "SELECT area FROM areas ORDER BY area";
    $resultado = $conectar->query($query);
    if ($resultado->num_rows> 0){
    while ($fila= $resultado->fetch_assoc()) {
      $areas.="<option>".$fila['area']."</option>";
      }
    }
    echo $areas;
  }
//cargar areas
//seleccionar responsable
  if (isset($_POST['responsable'])) {
    $responsable="";
      $q = $_POST['responsable'];
    $query = "SELECT responsable_area, id_area FROM areas WHERE area = '$q'";

    $resultado = $conectar->query($query);
    if ($resultado->num_rows> 0){
    while ($fila= $resultado->fetch_assoc()) {
      $responsable.=$fila['responsable_area']."-".$fila['id_area'];
      }
    }
    else {
      $responsable.="El área ingresada es incorrecta";
    }
  echo $responsable;
}
//seleccionar responsable
// cargar usuarios de areas
if (isset($_POST['usuarios'])) {
  $usuarios = '';
  $personal='';
  $datos=array();
  $q = $conectar->real_escape_string($_POST['usuarios']);
        $query = "SELECT nombre_usuario, id_equipo FROM usuarios WHERE id_area = '$q' ORDER BY nombre_usuario";
        $resultado = $conectar->query($query);
        if ($resultado->num_rows> 0){
          $usuarios.="<option value='' selected required'>Selecciona tu usuario</option>";
        while ($fila= $resultado->fetch_assoc()) {
          $usuarios.="<option name='".$fila['id_equipo']."'>".$fila['nombre_usuario']."</option>";
          }
        }else{
          $usuarios.="<option value='' selected required'>No hay usuarios</option>";
        }


    $query2="SELECT nombre_personal FROM areas join direcciones on areas.id_direccion = direcciones.id_direccion
                                              join personal on direcciones.id_direccion = personal.id_direccion
                                              WHERE id_area = '$q' ";
    $resultado2 = $conectar->query($query2);
    while ($fila= $resultado2->fetch_assoc()) {
      $personal.="<option>".$fila['nombre_personal']."</option>";
      }
      $datos = array(0 => $usuarios,
                     1 => $personal);
      echo json_encode($datos);
  }
// cargar usuarios de areas
// carga de equipos
  if (isset($_POST['equip'])) {
    $salida=[];
  $q = $conectar->real_escape_string($_POST['equip']);
  $query = "SELECT nombre_equipo, tipo, marca, modelo, num_serie FROM cpu INNER JOIN equipos on cpu.id_equipo = equipos.id_equipo
                                                           INNER JOIN usuarios on equipos.id_equipo = usuarios.id_equipo
                                                           WHERE usuarios.id_usuario = '$q' ORDER BY marca";

  $resultado = $conectar->query($query);
  if ($resultado->num_rows> 0){
  while ($fila= $resultado->fetch_all()) {
    $salida=$fila;
    }
  }
  echo json_encode($salida);
  }
// carga de equipos

$conectar->close();
?>
