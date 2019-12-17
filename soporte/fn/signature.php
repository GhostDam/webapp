<?php
  session_start();
  if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest' && $_SESSION['usuario']!=''){ //if Ajax Request
      include 'connect.php';
      $action = $_POST['to'];
      switch ($action) {
        case 'consulta';
        $id_reporte = $_POST['data'];
        $response['mensaje'] = '';
        $response['firma'] = '';

        $sql="SELECT firma FROM reporte WHERE id_reporte = $id_reporte";
        $resultado=$conectar->query($sql);
  
         if($resultado->num_rows > 0){
            $response['mensaje'] = "Reporte ya firmado";
            $response['id'] = $id_reporte;
                while ($fila=$resultado->fetch_assoc()){
                        $response['firma'] = $fila['firma'];
                }
            }else{
            echo mysqli_error($conectar);
            $response['mensaje'] = "Número de reporte inexistente";
         }
  
         echo json_encode($response);
  
  
          break;
          case 'guardar_firma':
            date_default_timezone_set("America/Mexico_City");
            $num = $_POST['num'];
            $calidad = $_POST['cal'];
            $atencion = $_POST['atn'];
            $nivel = $_POST['prf'];
            $tiempo = $_POST['tmp'];
            $solucion = $_POST["sol"];
        
        
            $direccion = "firmas/firma.".$num.".png";
            $firma = $_POST['img'];
            $status = "completo";
        
            $fechacierre=date("d-m-y");                                    //fecha-cierre
            $horacierre=date("H:i:s");                                     //horaciere
            // $atendio = $_POST['pat'];                                    //quien atendio
        
        
            // file_put_contents("../firmas/".date('Y-m-d_H_i_s').'.png',base64_decode(explode(',',$firma)[1]));
            //guardar         ("../DIRECCION/."NOMBRE".'FORMATO',base64_decode(explode(',',IMG_POST[?])); //formato
            file_put_contents("../firmas/"."firma.$num".'.png',base64_decode(explode(',',$firma)[1]));
        
            // $sql = "INSERT INTO bocinas (id_bocinas, marca, modelo, serie) VALUES('$solucion','$calificacion', '$direccion','$firma')";
            $sql = "UPDATE reporte SET calidad = '$calidad', atencion = '$atencion', nivel = '$nivel', tiempo = '$tiempo', solucion ='$solucion', firma = '$direccion', status = '$status', fecha_cierre = '$fechacierre', hora_cierre = '$horacierre'
                                    WHERE id_reporte ='$num'";
        
            $resultado = $conectar->query($sql);
            if($resultado){
                echo "Firma guardada correctamente";
                }else {
                echo "No se guardo".$conectar->error;
                }     
        break; 
            }
        

        $conectar->close();

    }else{
    die('<script>window.location="../index.php";</script>');
  }

?>
