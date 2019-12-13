<?php
  session_start();
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){ //if Ajax Request
      include 'connect.php';
      $action = $_POST['to'];
      switch ($action) {
        case 'cargar_usuarios':
          $usuarios = array();
          $query_usuarios = "SELECT nombre_usuario FROM usuarios";
          $consulta = mysqli_query($conectar, $query_usuarios);

          while ($us = $consulta->fetch_all()) {
              $usuarios=$us;
          }

        echo json_encode($usuarios);
          break;
        case 'fill': //cargar datos para el reporte
          $usr = $conectar->real_escape_string($_POST['usr']);
          $query = "SELECT nombre_usuario, area, nombre_equipo, tipo, marca, modelo, num_serie, responsable_area FROM usuarios
                                    JOIN  areas on usuarios.id_area = areas.id_area
                                    JOIN equipos on usuarios.id_equipo = equipos.id_equipo
                                    JOIN cpu on equipos.id_equipo = cpu.id_equipo
                                   WHERE nombre_usuario = '$usr'";
          $query2 = "SELECT nombre_personal FROM usuarios
    								                   JOIN	areas on usuarios.id_area = areas.id_area
                                       JOIN direcciones ON areas.id_direccion = direcciones.id_direccion
                                       JOIN personal on direcciones.id_direccion = personal.id_direccion
                                      WHERE nombre_usuario = '$usr'";
           $resultado = $conectar->query($query);
           $resultado2 = $conectar->query($query2);
            if ($resultado->num_rows> 0){
              $json = array();
              $res='';
                while ($fila=$resultado->fetch_assoc()){
                      $jrs = $fila;
                  }
                while ($fila2 = $resultado2->fetch_all()){
                        $res = $fila2;
                  }
              $array = array(0 => $jrs,
                             1 => $res);
                 // array_push($json,$res);
             echo json_encode($array);
            }
          else {
            echo json_encode("Usuario no econtrado");
          }
         break;
        case 'crear': //crear reporte
            date_default_timezone_set("America/Mexico_City");
            //Datos del reporte
            $date=date("y-m-d");                                //fecha
            $time=date("H:i:s");                                //hora
            $nombre = $_POST["nombre"];                         //persona que repora
            //Status General
            $asunto = $_POST["asunto"];                         //asunto
            $descripcion = $_POST["descripcion"];               //descripcion
            $trep = $_POST["treporte"];                         //tipo reporte
            $tser = $_POST["tservicio"];                        //tipo servicio
            //Datos del Usuario
            $prov = $_POST["provedor"];                         //proveedor servicio
            $usuario = $_POST["usuario"];                                      //usuario
            $area = $_POST["area"];                             //area
            $encargado = $_POST["encargado"];                   //encargado
            //Caracteristicas Equipo
            $marca = $_POST["marca"];                                         //marca equipo
            $modelo = $_POST["modelo"];                                        //modelo equipo
            $serie = $_POST["serie"];                                         //serie equipo
            $equipo= $_POST["inventario"];                                          //inventario = id equipo
            //actividades
            $solucion= '';
            $actividad= '';
            //Evaluacion
            $calidad = "";                                        //calidad
            $atencion = "";                                       //atencion
            $nivel = "";                                         //nivel
            $tiempo="";                                          //tiempo
            //
            $firma="";                                          //tiempo
            $status= "pendiente";                          //status

            //hacemos la sentencia de sql, es decir, especificar que se hara con los datos
            //(fecha, hora, nombre, encargado_area, area, asunto, descripcion, treporte, tservicio, proveedor, usuario, marca, modelo, serie, id_equipo, solucion, actividad, status)
            $sql="INSERT INTO reporte (fecha, hora, nombre, encargado_area, area, asunto, descripcion, treporte, tservicio, proveedor, usuario, marca, modelo, serie, id_equipo, solucion, actividad, status)VALUES('$date',
                                                          '$time',
                                                          '$nombre',
                                                          '$encargado',
                                                          '$area',
                                                          '$asunto',
                                                          '$descripcion',
                                                          '$trep',
                                                          '$tser',
                                                          '$prov',
                                                          '$usuario',
                                                          '$marca',
                                                          '$modelo',
                                                          '$serie',
                                                          '$equipo',
                                                          '$solucion',
                                                          '$actividad',
                                                          '$status')";
                //ejecutar guardado, especificas La coneccion, y la funcion de escribir(guardar datos),
            $ejecutar=mysqli_query($conectar, $sql);
            //verficar ejecucion
              if(!$ejecutar){
                      echo"hubo algun error";
                }else{
                  echo "Reporte Agregado con Exito";
                }
            break;
      }
      $conectar->close();

    }else{
    die('<script>window.location="../index.php";</script>');
  }

?>
