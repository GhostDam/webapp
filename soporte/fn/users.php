  <?php
  session_start();
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

    include 'connect.php';
      //
      // $quien = $_SESSION["nombre"];
      // $hora = '';
      // function record($quien, $accion, $detalle, $hora){
      // $save="INSERT INTO record (persona, accion, valor, hora)
      //                   VALUES ('$quien', '$accion', '$detalle', '$hora')";
      // $saverecord=mysqli_query($conectar, $save);
      //     if (!$saverecord) {
      //       print_r($conectar);
      //     }
      //   };

      switch ($_POST['action']) {
        case 'load_area':   //Carga de areas
          $areas="";
          $query = "SELECT id_area, area FROM areas ORDER BY area";
          $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                while ($row1= $resultado->fetch_assoc()) {
                  $areas.="<option value='".$row1['id_area']."'>".$row1['area']."</option>";
                  }
              }
              echo $areas;
          break;
        case 'load_users':   //carga de usuarios
            $usuarios="";
            $q = $conectar->real_escape_string($_POST['area']);
              if ($q=='Todas las areas') {
              $query = "SELECT area, nombre_usuario, id_usuario, nombre_responsable, nombre_equipo FROM areas
                                                                                                   JOIN usuarios ON areas.id_area =  usuarios.id_area
                                                                                                   JOIN equipos ON usuarios.id_equipo = equipos.id_equipo
                                                                                                   ORDER BY area ";
            }else{
              $query = "SELECT area, nombre_usuario, id_usuario, nombre_responsable, nombre_equipo FROM areas
              JOIN usuarios ON areas.id_area =  usuarios.id_area
              JOIN equipos ON usuarios.id_equipo = equipos.id_equipo
              WHERE area LIKE '$q' OR nombre_usuario LIKE '$q'
              ORDER BY area ";
            }
            $resultado = $conectar->query($query);
            if ($resultado->num_rows> 0){
              $usuarios.="<table class='table table-hover'>
                            <thead>
                              <tr>
                                <th scope='col'>Area</th>
                                <th scope='col'>Id</th>
                                <th scope='col'>Usuario</th>
                                <th scope='col'>Responsable</th>
                                <th scope='col'>Equipo</th>
                                <th scope='col'>Eliminar</th>
                                <th scope='col' class='total'></th>
                              </tr>
                            </thead>
                          <tbody>";
              while ($row2 = $resultado->fetch_assoc()) {
                $usuarios.=
                            "<tr>
                                <td scope='row'>".$row2['area']."</td>
                                <td scope='row'>".$row2['id_usuario']."</td>
                                <td  scope='row' class='usr'>".$row2['nombre_usuario']."</td>
                                <td scope='row'>".$row2['nombre_responsable']."</td>
                                <td scope='row'>".$row2['nombre_equipo']."</td>
                                <td scope='row'><button class='delete' value ='".$row2['id_usuario']."' name='2'><i class='icon-trash-o'></i></button></td>
                                <td scope='row'><button class='editar icon-pencil-square' value ='".$row2['id_usuario']."'></button></td>
                            <tr>";
                          }
                      $usuarios.="</tbody></table";
                  }else {
                    $usuarios.="No hay usuarios";
                  }
            echo $usuarios;
         break;
        case 'load_pc':   //carga de equipos por area para asignar
          $equipos="";
          $q = $conectar->real_escape_string($_POST['required']);
          $query = "SELECT id_equipo, nombre_equipo FROM equipos INNER JOIN areas ON areas.id_area =  equipos.id_area
                                                                       WHERE areas.id_area LIKE '$q' ORDER BY nombre_equipo ";
          $resultado = $conectar->query($query);
                if ($resultado->num_rows> 0){
                  $equipos.="<option value=''>Selecciona el equipo a asignar</option>";
                  while ($row2 = $resultado->fetch_assoc()) {
                    $equipos.=
                    "<option value='".$row2['id_equipo']."'>".$row2['nombre_equipo']."</option>";
                  }
                }else {
              $equipos.= "<option value=''>El area no cuenta con equipos</option>";
              }
            echo $equipos;
         break;
        case 'save_user':   //guardado de usuarios
          $action = $_POST['action'];
          $id_area=$_POST['createarea'];//string
          $id_equipo=$_POST['createequipo'];//string
          $id_user=$_POST['createuser'];//libre
          $id_nombre=$_POST['createnombre'];//
          $sql="INSERT INTO usuarios (`id_usuario`, `id_area`, `id_equipo`, `nombre_usuario`, `nombre_responsable`)
                                      VALUES (NULL, '$id_area', '$id_equipo', '$id_user',  '$id_nombre')";
          $ejecutar=mysqli_query($conectar, $sql);
          if(!$ejecutar){
              echo "No se pudo agregar usuario";
            }else{
              echo 'usuario agregado correctamente';
              // record($quien, $action, $id_user, $hora);
            }
         break;
        case 'del_user':  //borrado de usuarios
            $id_user=$_POST['delete'];
            $query = "DELETE FROM usuarios WHERE id_usuario LIKE '$id_user' ";
            $resultado = $conectar->query($query);
            echo "Eliminado correctamente";
          break;
        case 'load_edit':
          $id= $_POST['id'];
          $datos=array();
          $query = "SELECT * FROM usuarios jOIN equipos ON usuarios.id_equipo = equipos.id_equipo WHERE id_usuario = '$id'";
          $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                while ($row1= $resultado->fetch_assoc()) {
                  $datos=$row1;
                  }
              }else {
                $datos='No Existe el id ingresado';
              }
              echo json_encode($datos);

          break;
        case 'guardar_edicion':
            $id = $_POST["id"];
            $nombre_edicion = $_POST["nombre_edicion"];
            $area_edicion = $_POST["area_edicion"];
            $responsable_edicion = $_POST["responsable_edicion"];
            $equipo_edicion = $_POST['equipo_edicion'];
            $sql="UPDATE usuarios SET id_area = '$area_edicion', id_equipo = '$equipo_edicion', nombre_usuario = '$nombre_edicion',  nombre_responsable = '$responsable_edicion'  WHERE id_usuario = '$id'";
            //ejecutar guardado, especificas La coneccion, y la funcion de escribir(guardar datos),
            $ejecutar=mysqli_query($conectar, $sql);
            //verficar ejecucion
            if(!$ejecutar){
                    echo"hubo algun error";
                    echo $sql;
                    echo mysqli_error($conectar);
              }else{
                echo('Edicion ejecutada correctamente');
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
