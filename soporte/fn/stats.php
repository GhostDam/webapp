<?php

session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){


  include 'connect.php';
  switch ($_POST['to']) {
   case 'primera_grafica';
        $query=" SELECT area, COUNT(*) FROM `reporte` GROUP by area"; //JOIN areas on areas.id_direccion = direcciones.id_direccion
        $carga = mysqli_query($conectar, $query);
        if ($carga->num_rows>0) {
          $json = array();
              while ($row=$carga->fetch_assoc()) {
                $json[] =array('y' => (int)$row['COUNT(*)'], 'name' => $row['area']);
              }
            }else {
              $json='Sin Resultados';
            }
            echo json_encode($json);
        break;
   case 'rango_fechas';
      $date1=$_POST['val1'];
      $date2=$_POST['val2'];
      //SELECT area, COUNT(*) FROM `reporte` WHERE (fecha BETWEEN '2013-01-01' AND '2019-01-01') GROUP by area
      $query="SELECT area, COUNT(*) FROM `reporte` WHERE (fecha BETWEEN '$date1' AND '$date2') GROUP by area"; //JOIN areas on areas.id_direccion = direcciones.id_direccion
      $carga = mysqli_query($conectar, $query);
      if ($carga->num_rows>0) {
        $json = array();
            while ($row=$carga->fetch_assoc()) {
              $json[] =array('y' => (int)$row['COUNT(*)'], 'name' => $row['area']);
            }
            echo json_encode($json);
          }else {
            echo json_encode("Sin resultados");
          }
     break;
     case 'area';
        $area=$_POST['val'];
        //SELECT area, COUNT(*) FROM `reporte` WHERE (fecha BETWEEN '2013-01-01' AND '2019-01-01') GROUP by area
        $query="SELECT usuario, COUNT(*) FROM `reporte` WHERE area = '$area' GROUP by usuario"; //JOIN areas on areas.id_direccion = direcciones.id_direccion
        $carga = mysqli_query($conectar, $query);
        if ($carga->num_rows>0) {
          $json = array();
              while ($row=$carga->fetch_assoc()) {
                $json[] =array('y' => (int)$row['COUNT(*)'], 'name' => $row['usuario']);
              }
              echo json_encode($json);
            }else {
              echo json_encode("Sin resultados");
            }
       break;

    default:
      // code...
      break;
  }
  $conectar->close();

}else{
die('<script>window.location="../index.php";</script>');
}

?>
