<?php
session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

      include 'connect.php';
      switch ($_POST['action']) {
        case 'guardar_tema': //GUARDAR TEMAS DE USUARIO
            $id=$_POST['id'];
            $tema=$_POST['tema'];
            $sql="UPDATE login SET tema ='$tema' WHERE usuario =('$id')";
            $ejecutar=mysqli_query($conectar, $sql);
              if(!$ejecutar){
                echo "hubo algun error";
              }else{
                  echo "Guardado correctamente";
                }
               session_start();
              $_SESSION['tema'] = $_POST['tema'];
          break;
        case 'lista_admins': //cargar lista de admins
            $admins = '';
            $query = "SELECT * FROM login";
            $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                  $admins.="<table class='table table-hover'>
                          <thead>
                            <tr>
                          <th scope='col'>Administrador</th>
                          <th scope='col'>Nombre</th>
                          <th scope='col'>Tipo</th>
                          <th scope='col'>Eliminar</th>
                                  </tr>
                                    </thead>
                                       <tbody>";
                  while ($rest = $resultado->fetch_assoc()) {
                    $admins.= "<tr>
                                <td scope='row'>".$rest["usuario"]."</td>
                                <td scope='row'>".$rest["nombre"]."</td>
                                <td scope='row'>".$rest["tipo_admin"]."</td>
                                <td scope='row'><button name='".$rest["id"]."' class='delete'><i class='icon-trash-o'></i></button></td>
                              </tr>
                    ";
                    }
              $admins.="</tbody></table";
              echo $admins;
            }
          break;
        case 'agregar_admin': //agregado de admins
            $useradm = $_POST['useradm'];
            $nameadm = $_POST['nameadm'];
            $pass = $_POST['pass'];
            $hashedpass= password_hash($pass, PASSWORD_DEFAULT);
            $rankadm = $_POST['rankadm'];
            $insert = "INSERT INTO login (id, usuario, pass, nombre, tipo_admin) VALUES (NULL, '$useradm', '$hashedpass', '$nameadm', '$rankadm')";
            $ejecutar=mysqli_query($conectar, $insert);
              if (!$ejecutar) {
                  echo 'hubo algun error';
                  print_r($conectar);
                }else {
                  echo "Administrador agregado correctamente";
                }
          break;
        case 'borrar_admin': //borrado de admin
            $idadm = $_POST['delete'];
            $delete = "DELETE FROM login WHERE id = '$idadm'";
            $ejecutar=mysqli_query($conectar, $delete);
            if (!$ejecutar) {
              echo mysqli_error($conectar);
            }else {
              echo "Administrador Eliminado";
            }
          break;
          case 'lista_tecnicos': //cargar lista de tecnicos
            $admins = '';
            $query = "SELECT * FROM tecnicos";
            $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                  $admins.="<table class='table table-hover'>
                          <thead>
                            <tr>
                          <th scope='col'>ID</th>
                          <th scope='col'>Técnico</th>
                          <th scope='col'>Tipo</th>
                          <th scope='col'>Eliminar</th>
                                  </tr>
                                    </thead>
                                       <tbody>";
                  while ($rest = $resultado->fetch_assoc()) {
                    $admins.= "<tr>
                                <td scope='row'>".$rest["id_tecnico"]."</td>
                                <td scope='row'>".$rest["nombre_tecnico"]."</td>
                                <td scope='row'>".$rest["tipo_tecnico"]."</td>
                                <td scope='row'><button name='".$rest["id_tecnico"]."' class='borrar_tecnico'><i class='icon-trash-o'></i></button></td>
                              </tr>
                    ";
                    }
              $admins.="</tbody></table";
              echo $admins;
            }
          break;
          case 'agregar_tecnico': //agregado de admins
            $nombreTecnico = $_POST['nombreTecnico'];
            $tipoTecnico = $_POST['tipoTecnico'];

            $insert = "INSERT INTO tecnicos (nombre_tecnico, tipo_tecnico) VALUES ('$nombreTecnico', '$tipoTecnico')";
            $ejecutar=mysqli_query($conectar, $insert);
              if (!$ejecutar) {
                  echo 'hubo algun error';
                  print_r($conectar);
                }else {
                  echo "Técnico agregado correctamente";
                }
          break;
          case 'borrar_tecnico': //borrado de admin
            $idTec = $_POST['delete'];
            $delete = "DELETE FROM tecnicos WHERE id_tecnico = '$idTec'";
            $ejecutar=mysqli_query($conectar, $delete);
            if (!$ejecutar) {
              echo mysqli_error($conectar);
            }else {
              echo "Técnico eliminado";
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
