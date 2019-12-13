<?php
session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

      include 'connect.php';
      switch ($_POST['action']) {
        case 'lista_admins': //cargar lista de admins
            $admins = '';
            $query = "SELECT * FROM login";
            $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                  $admins.="<table>
                                <thead class='table table-hover'>
                                      <tr>
                                    <td scope='col'>Admin</td>
                                    <td scope='col'>Nombre</td>
                                      <td scope='col'>Tipo</td>
                                    <td scope='col'>Eliminar</td>
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
        default:
          // code...
          break;
      }
      $conectar->close();

    }else{
    die('<script>window.location="../index.php";</script>');
  }
?>
