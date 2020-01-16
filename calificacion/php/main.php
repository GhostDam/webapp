<?php

session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){ // && $_SESSION['usuario']!=''

  // print_r($_POST);

  include 'conexion.php';
  switch ($_POST['action']) {
   case 'consulta';
          $id_reporte = $_POST['reporte'];
          $response['mensaje'] = '';
          $response['firma'] = '';
          $sql="SELECT firma FROM reporte  WHERE id_reporte = $id_reporte";
          $resultado=$conexion->query($sql);
          if($resultado->num_rows > 0){
              $response['mensaje'] = "Reporte ya firmado";
              $response['id'] = $id_reporte;
              while ($fila=$resultado->fetch_assoc()){
                    $response['firma'] = $fila['firma'];
                }
          }else{
            $response['mensaje'] = "Número de reporte inexistente";
          }
          echo json_encode($response);
      break;
   case 'consulta_tecnicos';   

        $response=[];
        $sql="SELECT nombre_tecnico FROM tecnicos";
        $resultado=$conexion->query($sql);
        if($resultado->num_rows > 0){
            while ($fila=$resultado->fetch_all()){
                  $response = $fila;
              }
        }else{
          $response['mensaje'] = "Número de reporte inexistente";
        }
        echo json_encode($response);
    break;

    default:
      // code...
      break;
  }
  $conexion->close();

}else{
die('<script>window.location="../index.php";</script>');
}

?>
