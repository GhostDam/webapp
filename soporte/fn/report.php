
<?php
session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

  include 'connect.php';

  switch ($_POST['to']) {
    case 'vrep': //ver listado de pendientes
            $salida="";
            $start="1";
            // $consulta = "SELECT  * FROM reporte ORDER BY id_reporte DESC LIMIT $start , 10 ";

            // $query="SELECT * FROM reporte WHERE status like 'pendiente%' ORDER By id_reporte DESC  "; aact
            $query="SELECT * FROM reporte WHERE status like 'pendiente%' ORDER By id_reporte DESC LIMIT $start , 10  ";

            $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                  $salida.="<table class='table table-hover'>
                              <thead class='thead thead-dark'>
                                <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Asunto</th>
                                <th>Área</th>
                                <th>Reporta</th>
                                <th>Descripción</th>
                                <th>Actividad</th>
                                <th>Estado actual</th>
                              </tr>
                              </thead>
                              </tbody>
                                  ";
                while ($fila= $resultado->fetch_assoc()) {
                     $salida.="<tbody>
                                <tr>

                      <td>".$fila['id_reporte']."</td>
                      <td>".$fila['fecha']."</td>
                      <td>".$fila['hora']."</td>
                      <td>".$fila['asunto']."</td>
                      <td>".$fila['area']."</td>
                      <td>".$fila['nombre']."</td>
                      <td>".$fila['descripcion']."</td>
                      <td>".$fila['actividad']."</td>
                      <td>".$fila['status']."</td>
                      <td>
                      <button class='atender btn btn-dark' value ='".$fila['id_reporte']."'>Atender </button>
                      <button class='firmar btn btn-dark' value ='".$fila['id_reporte']."'>Firmar </button>
                      </td>
                      </tr>";
                      }
                $salida.="</tbody>
                      </table>";

                    }else {
                    $salida.="No hay reportes pendientes";
                  }
                echo $salida;
      break;
    case 'load'; //conteo de reportes
          $load = "SELECT COUNT(id_reporte) FROM reporte ";
          $query = mysqli_query($conectar, $load);
          $resultado = $query->fetch_assoc();
          $reporte=$resultado['COUNT(id_reporte)'];
          echo $reporte;
        break;
    case 'edit': //cargar edicion
          $salida='';
          $q = $conectar->real_escape_string($_POST['consulta']);
          $query = "SELECT * FROM reporte WHERE id_reporte LIKE '$q' ";
          $resultado = $conectar->query($query);
        if ($resultado->num_rows> 0){
         $salida.="";
         while ($fila= $resultado->fetch_assoc()) {
           $salida.="<form action='fn/report.php' method='post' id='edit_reporte' class='edicion'>
           <fieldset class='datosr'>
           <legend>Datos del Reporte</legend>
               <span>ID reporte: <input name='id' value=".$fila['id_reporte']." readonly></input></span>
               <span>Fecha: </span>".$fila['fecha']."
               <span>Hora: </span>".$fila['hora']."
               <span>Persona que Reporta: </span>".$fila['nombre']."
               <span>Asunto: </span>".$fila['asunto']."
               <span>Descripción: </span>".$fila['descripcion']."
               <span>Tipo de Reporte: </span>
                     <select name='treporte' class='form-val' required>
                         <option value=''  selected>".$fila['treporte']."</option>
                         <option value='incidencia'>Incidencia</option>
                         <option value='eventos'>Evento</option>
                         <option value='cambio'>Cambio</option>
                     </select>
               <div class='hide'><input name='to' value='save_edit'></div>
               <span>Tipo de Servicio: </span>
                      <select name='tservicio' class='form-val'>
                         <option value=''  selected>".$fila['tservicio']."</option>
                         <option value='Hardware'>Hardware</option>
                         <option value='software'>Software</option>
                         <option value='telefonia'>Telefonía</option>
                      </select>
           </fieldset>

           <fieldset class='datosu'>
           <legend>Datos del usuario</legend>
           <span>Provedor del Servicio: </span>
                <select name='provedor' class='form-val'>
                 <option value=''  selected>".$fila['proveedor']."</option>
                 <option value='imjuve'>IMJUVE</option>
                 <option value='externo'>Externo</option>
                </select>
             <span>Usuario: </span>".$fila['usuario']."
             <span>Área: </span>".$fila['area']."
             <span>Responsable: </span>".$fila['encargado_area']."
           </fieldset>

           <fieldset class='de'>
               <legend>Datos del equipo</legend>
               <span>Marca: </span>".$fila['marca']."
               <span>Modelo: </span>".$fila['modelo']."
               <span>Número de serie: </span>".$fila['serie']."
               <span>Tipo de equipo: </span>".$fila['id_equipo']."
           </fieldset>

           <fieldset class='ac'>
             <legend>Actividades</legend>
             <span>Descripción de la actividad: </span><textarea class='form-val' type='textarea' name='actividad' rows='10' cols='50' required>".$fila['actividad']."</textarea>
           </fieldset>

           <fieldset class='fm'>
             <legend>Firma:</legend>
             <img src='".$fila['firma']."'  alt='No se ha recibido la firma'></img>
           </fieldset>

           <fieldset class='cs'>
             <legend>Evaluación del servicio</legend>
             <span>calidad: </span>".$fila['calidad']."
             <span>Atención: </span>".$fila['atencion']."
             <span>Profesional: </span>".$fila['nivel']."
             <span>Tiempo de respuesta: </span>".$fila['tiempo']."
           </fieldset>

           <fieldset class='cl'>
             <legend>Cierre del reporte</legend>
             <span>Fecha Cierre: </span>".$fila['fecha_cierre']."
             <span>Hora cierre: </span>".$fila['hora_cierre']."
             <span>Persona que atendió: </span>".$fila['atendio']."
           </fieldset>

           <fieldset class='st'>
               <Legend>Estado actual: </Legend>
               <span>".$fila['status']."</span>
               </fieldset>
          </form>
          <button id='btnEdit' type='submit' class='btn btn-primary'>Guardar </button>
          ";
            }
            echo $salida;
          }else {
              echo "No hay reportes con ese ID";
          }
        break;
    case 'ask'; //detalles
          $salida="";
            if (!empty($_POST['nrep'])) {
                $q = $conectar->real_escape_string($_POST['nrep']);
                $query = "SELECT * FROM reporte WHERE id_reporte LIKE '$q' ";
                $resultado = $conectar->query($query);
                if ($resultado->num_rows> 0){
                    while ($fila= $resultado->fetch_assoc()) {
                      $salida.="<div action='fn/edit.php' method='post' class='edicion'>
                                 <fieldset class='datosr'>
                                 <legend>Datos del reporte</legend>
                                 <span>ID reporte: ".$fila['id_reporte']."</span>
                                 <span>Fecha: </span>".$fila['fecha']."
                                 <span>Hora: </span>".$fila['hora']."
                                 <span>Persona que Reporta: </span>".$fila['nombre']."
                                 <span>Asunto: </span>".$fila['asunto']."
                                 <span>Descripción: </span>".$fila['descripcion']."
                                 <span>Tipo de reporte: </span>".$fila['treporte']."
                                 <span>Tipo de servicio: </span>".$fila['tservicio']."
                                 </fieldset>

                                 <fieldset class='datosu'>
                                 <legend>Datos del usuario</legend>
                                 <span>Proveedor del servicio: </span>".$fila['proveedor']."
                                 <span>Usuario: </span>".$fila['usuario']."
                                 <span>Área: </span>".$fila['area']."
                                 <span>Responsable: </span>".$fila['encargado_area']."
                                 </fieldset>

                                 <fieldset class='de'>
                                 <legend>Datos del equipo</legend>
                                 <span>Marca: </span>".$fila['marca']."
                                 <span>Modelo: </span>".$fila['modelo']."
                                 <span>Número de serie: </span>".$fila['serie']."
                                 <span>ID inventario: </span>".$fila['id_equipo']."
                                 </fieldset>

                                 <fieldset class='ac'>
                                 <legend>Actividades</legend>
                                 <span>Solución: ".$fila['solucion']."</span>
                                 <span>Actividad: </span>".$fila['actividad']."
                                 </fieldset>

                                 <fieldset class='cs'>
                                 <legend>Evaluación del servicio</legend>
                                 <span>Calidad: </span>".$fila['calidad']."
                                 <span>Atención: </span>".$fila['atencion']."
                                 <span>Profesional: </span>".$fila['nivel']."
                                 <span>Tiempo de respuesta: </span>".$fila['tiempo']."
                                 </fieldset>

                                 <fieldset class='cl'>
                                 <legend>Cierre del reporte</legend>
                                 <span>Fecha de cierre: </span>".$fila['fecha_cierre']."
                                 <span>Hora de cierre: </span>".$fila['hora_cierre']."
                                 <span>Persona que atendió: </span>".$fila['atendio']."
                                 </fieldset>

                                 <fieldset class='fm'>
                                 <legend>Firma</legend>
                                 <img src='".$fila['firma']."'  alt='No se ha recibido la firma'></img>
                                 </fieldset>

                                 <fieldset class='status'>
                                  <legend>Estado actual</legend>
                                   ".$fila['status']."
                                 </fieldset>
                                </div>";
                              }
                      }else {
                        $salida='No hay historial';
                      }
                  echo $salida;
            }
        break;
    case 'view'; //historial
         $paginacion='';
         $start=$_POST['start'];
         // $start=($start)-1;
         $consulta = "SELECT  * FROM reporte ORDER BY id_reporte DESC LIMIT $start , 10 ";
         $resultado = mysqli_query($conectar, $consulta);
         if ($resultado->num_rows>0) {
           $paginacion.="<table class='table table-hover'>
                          <thead>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Fecha</th>
                              <th scope='col'>Persona que reportó</th>
                              <th scope='col'>Área</th>
                              <th scope='col'>Asunto</th>
                              <th scope='col'>Estado actual</th>
                            </tr>
                          </thead>";
           while ($rep = $resultado->fetch_assoc()) {
             $paginacion.="<tr>
                            <td scope='row'>".$rep['id_reporte']."</td>
                              <td scope='row'>".$rep['fecha']."</td>
                              <td scope='row'>".$rep['nombre']."</td>
                              <td scope='row'>".$rep['area']."</td>
                              <td scope='row'>".$rep['asunto']."</td>
                              <td scope='row'>".$rep['status']."</td>
                              <td scope='row'><button value='".$rep['id_reporte']."' class='detalles btn btn-info'>Detalles</button></td>
                          </tr>";
           }
          $paginacion.="</tbody></table>";
         }
        echo $paginacion;
        break;
    case 'save_edit': //guardar edicion
        $id = $_POST["id"];
        $treporte = $_POST["treporte"];
        $tservicio = $_POST["tservicio"];
        $provedor = $_POST["provedor"];
        $actividad = $_POST["actividad"];
        $status = 'pendiente de firma';
        //hacemos la sentencia de sql, es decir, especificar que se hara con los datos
          //SQLQUE"DELETE FROM `teclado` WHERE `ID_TECLADO` = 'save'"
        $sql="UPDATE reporte SET treporte ='$treporte', tservicio ='$tservicio', proveedor ='$provedor', actividad = '$actividad', status = '$status' WHERE id_reporte =('$id')";
        //ejecutar guardado, especificas La coneccion, y la funcion de escribir(guardar datos),
        $ejecutar=mysqli_query($conectar, $sql);
        //verficar ejecucion
        if(!$ejecutar){
                echo"Hubo algún error";
                echo mysqli_error();
          }else{
            echo "Edición guardada correctamente";
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
