
<?php
session_start();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){

  include 'connect.php';

  switch ($_POST['action']) {
    case 'vrep': //ver listado de pendientes
            $salida=array();
            $query = "SELECT * FROM reporte WHERE status like 'pendiente%' ORDER BY id_reporte DESC ";
            $resultado = $conectar->query($query);
              if ($resultado->num_rows> 0){
                while ($fila= $resultado->fetch_assoc()) { //regresa un objeto de arrays
                  $salida[]=$fila;
                     //  <button class='atender btn btn' value ='".$fila['id_reporte']."'>Atender </button>
                     //  <button class='firmar btn btn' value ='".$fila['id_reporte']."'>Firmar </button>
                      }
                    }else {
                    $salida="No hay reportes pendientes";
                  }
                echo json_encode($salida);
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
               <span>ID del reporte: <input name='id' value=".$fila['id_reporte']." readonly></input></span>
               <span>Fecha: </span>".$fila['fecha']."
               <span>Hora: </span>".$fila['hora']."
               <span>Persona que Reporta: </span>".$fila['nombre']."
               <span>Asunto: </span>".$fila['asunto']."
               <span>Descripción: </span>".$fila['descripcion']."
               <span>Tipo de Reporte: </span>
                     <select name='treporte' class='form-val' required>
                         <option value=''  selected>".'Selecciona una opción'."</option>
                         <option value='incidencia'>Incidencia</option>
                         <option value='eventos'>Evento</option>
                         <option value='cambio'>Cambio</option>
                     </select>
               <div class='hide'><input name='to' value='save_edit'></div>
               <span>Tipo de Servicio: </span>
                      <select name='tservicio' class='form-val'>
                         <option value=''  selected>".'Selecciona una opción'."</option>
                         <option value='Hardware'>Hardware</option>
                         <option value='software'>Software</option>
                         <option value='telefonia'>Telefonía</option>
                      </select>
           </fieldset>

           <fieldset class='datosu'>
           <legend>Datos del usuario</legend>
           <span>Proveedor del servicio: </span>
                <select name='provedor' class='form-val'>
                 <option value=''  selected>".'Selecciona una opción'."</option>
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
               <span>Nombre del equipo: </span>".$fila['id_equipo']."
           </fieldset>

           <fieldset class='ac'>
             <legend>Actividades</legend>
             <span>Descripción de la actividad: </span><textarea class='form-val' type='textarea' name='actividad' rows='10' cols='50' required>".$fila['actividad']."</textarea>
           </fieldset>

          <button id='btnEdit' type='submit' class='btn btn-primary'>Guardar </button>
          ";
            }
            echo $salida;
          }else {
              echo "No hay reportes con ese ID";
          }
           // <fieldset class='cs'>
           //   <legend>Evaluación del servicio</legend>
           //   <span>calidad: </span>".$fila['calidad']."
           //   <span>Atención: </span>".$fila['atencion']."
           //   <span>Profesional: </span>".$fila['nivel']."
           //   <span>Tiempo de respuesta: </span>".$fila['tiempo']."
           // </fieldset>

           // <fieldset class='cl'>
           //   <legend>Cierre del reporte</legend>
           //   <span>Fecha Cierre: </span>".$fila['fecha_cierre']."
           //   <span>Hora cierre: </span>".$fila['hora_cierre']."
           //   <span>Persona que atendió: </span>".$fila['atendio']."
           // </fieldset>

           // <fieldset class='fm'>
           //   <legend>Firma:</legend>
           //   <img src='".$fila['firma']."'  alt='No se ha recibido la firma'></img>
           // </fieldset>

          //  <fieldset class='st'>
          //      <Legend>Estado actual: </Legend>
          //      <span>".$fila['status']."</span>
          //      </fieldset>
          // </form>

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
                                 <span>Nombre del equipo: </span>".$fila['id_equipo']."
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
                                 <span>Tiempo  de respuesta: </span>".$fila['tiempo']."
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
    case 'historial'; //historial
         $historial=array();
         $consulta = "SELECT  * FROM reporte ORDER BY id_reporte DESC";
         $resultado = mysqli_query($conectar, $consulta);
         if ($resultado->num_rows>0) {
           while ($rep = $resultado->fetch_assoc()) {
             $historial[]=$rep;
           }
         }else{
          $historial="No hay reportes en el historial.";
         }

         // $start=$_POST['start'];
         // $consulta = "SELECT  * FROM reporte ORDER BY id_reporte DESC LIMIT $start , 10 ";
         // $resultado = mysqli_query($conectar, $consulta);
         // if ($resultado->num_rows>0) {
         //   $historial.="<table class='table table-hover'>
         //                  <thead>
         //                    <tr>
         //                    <th scope='col'>#</th>
         //                    <th scope='col'>Fecha</th>
         //                      <th scope='col'>Persona que reportó</th>
         //                      <th scope='col'>Área</th>
         //                      <th scope='col'>Asunto</th>
         //                      <th scope='col'>Estado actual</th>
         //                    </tr>
         //                  </thead>";
         //   while ($rep = $resultado->fetch_assoc()) {
         //     $historial.="<tr>
         //                    <td scope='row'>".$rep['id_reporte']."</td>
         //                      <td scope='row'>".$rep['fecha']."</td>
         //                      <td scope='row'>".$rep['nombre']."</td>
         //                      <td scope='row'>".$rep['area']."</td>
         //                      <td scope='row'>".$rep['asunto']."</td>
         //                      <td scope='row'>".$rep['status']."</td>
         //                      <td scope='row'><button value='".$rep['id_reporte']."' class='detalles btn btn-primary'>Detalles</button></td>
         //                  </tr>";
         //   }
         //  $historial.="</tbody></table>";
         // }
        echo json_encode($historial);
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
