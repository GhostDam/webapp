<?php
  session_start();
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

    include 'connect.php';
    switch ($_POST['action']) {
      case 'load': //cargado de direcciones
        $direcciones=array();;
          $query='SELECT id_direccion, direccion FROM `direcciones` '; //JOIN areas on areas.id_direccion = direcciones.id_direccion
          $carga = mysqli_query($conectar, $query);
          if ($carga->num_rows>0) {
                while ($row=$carga->fetch_assoc()) {
                  $direcciones[]=$row;
                }
             }else {
            $direcciones='No hay datos';
          }
          echo json_encode($direcciones);
         break;
      case 'area': //cargado de areas
            $q = $_POST['area'];
            $lista = array();
            $areas='';
            $empleados='';
            //areas
            $queryArea="SELECT id_area, area, responsable_area FROM `areas` WHERE id_direccion = '$q'";
            $carga = mysqli_query($conectar, $queryArea);
            if ($carga->num_rows>0) {
                  while ($row=$carga->fetch_assoc()) {
                    $areas.="<div class='area' value='".$row['id_area']."'>".$row['area']."
                                <div class='encargado'>".$row['responsable_area']."</div>
                             </div>";
                           }
              }
            //empleados
              $queryEmpleados="SELECT id_direccion, nombre_personal, tipo_personal, id FROM personal
                                            WHERE id_direccion = '$q'";
              $cargaem = mysqli_query($conectar, $queryEmpleados);
                if ($cargaem->num_rows>0) {
                      $empleados.="<table class='table table-hover'>
                                      <thead>
                                          <tr>
                                <td scope='col'>Nombre del personal</td>
                                <td scope='col'>Tipo</td>
                                <td scope='col'>ID</td>
                                <td scope='col'>Borrar</td>
                                <td scope='col'>Editar</td>
                                  <tr>
                                    </thead>
                                      <tbody>";
                      while ($row=$cargaem->fetch_assoc()) {
                        $empleados.="<tr>
                              <td scope='row'>".$row['nombre_personal']."</td>
                              <td scope='row'>".$row['tipo_personal']."</td>
                              <td scope='row'>".$row['id']."</td>
                              <td scope='row'><button class='delete' value ='".$row['id']."'><i class='icon-trash-o'></i></button></td>
                              <td scope='row'><button class='editar icon-pencil-square' value ='".$row['id']."'></button></td>
                            </tr>";
                               }
                      }else {
                        $empleados='<div>No hay datos<div>';
                      }
            $lista = array(0 => $areas,
                            1 => $empleados);
            echo json_encode($lista);
        break;
      case 'agregar_usuario':
            $respuesta='';
            $id_dir=$_POST['direccion'];
            $nombre_empleado=$_POST['nuevo_empleado'];
            $tipo=$_POST['tipo_empleado'];
            //insercion de nuevo personal
            $sql="INSERT INTO personal (id_direccion, nombre_personal, tipo_personal)
                                    VALUES ('$id_dir', '$nombre_empleado', '$tipo')";
            $insercion= mysqli_query($conectar, $sql);
            if ($insercion) {
                $respuesta.='Personal agregado correctamente';
                  }else {
                    $respuesta='Hubo algún error al ingresar el personal'. mysqli_error($conectar);
                  }
           //actualizacion de encargado
            if ($tipo== 'encargado') {
              $id_area=$_POST['nuevo_responsable'];

              $sql = "UPDATE areas SET responsable_area = '$nombre_empleado' WHERE id_area = $id_area";
              $update= mysqli_query($conectar, $sql);
              if ($update) {
                $respuesta.="Se actualizo el responsable.";
                // Alexis Antonio Sanchez Solis
              }
            }
           echo $respuesta;
        break;
      case 'carga_edicion':
        $id_edit=$_POST['id_edit'];
        $response=array();
        $sql="SELECT * FROM personal WHERE id='$id_edit'";
          $carga=mysqli_query($conectar, $sql);
            if ($carga->num_rows>0) {
                while ($row=$carga->fetch_assoc()) {
                  $response[]=$row;
                }
                echo json_encode($response);
              }else {
                echo json_encode("ID de personal no encontrado");
              }

        break;
      case 'editar_personal':
              $respuesta='';
              $id_editar=$_POST['id_editar'];
              $direccion=$_POST['direccion'];
              $edit_empleado=$_POST['edit_empleado'];
              $edit_tipo=$_POST['edit_tipo'];
              //edicion de personal
              $sql="UPDATE personal SET id_direccion ='$direccion', nombre_personal ='$edit_empleado', tipo_personal='$edit_tipo' WHERE id ='$id_editar'";
              $edicion= mysqli_query($conectar, $sql);
              if ($edicion) {
                  $respuesta.='Personal editado correctamente';
                    }else {
                      $respuesta='Hubo algún error al ingresar el personal'. mysqli_error($conectar);
                    }
             //actualizacion de encargado
              if ($edit_tipo== 'encargado') {
                $id_area=$_POST['nuevo_responsable'];
                $sql = "UPDATE areas SET responsable_area = '$edit_empleado' WHERE id_area = $id_area";
                $update= mysqli_query($conectar, $sql);
                if ($update) {
                  $respuesta.=" Se actualizo el responsable.";
                }
              }
             echo $respuesta;
        break;
      case 'eliminar_personal':
            $id=$_POST['id_eliminar'];
            $sql="DELETE FROM personal WHERE id='$id'";
            $eliminar=mysqli_query($conectar, $sql);
            if ($eliminar) {
              echo "Personal eliminado";
            }else {
              echo mysqli_error($conectar);
            }
        break;
    }
    $conectar->close();

  }else{
  die('<script>window.location="../index.php";</script>');
  }
?>
