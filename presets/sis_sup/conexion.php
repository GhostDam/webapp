<?php
$mysqli= new mysqli("localhost","root","","sis_soporte");

if($mysqli ->connect_errno){
	echo "Fallo al conectar".$mysqli->connect_errno;
	}else{
	$mysqli->set_charset("utf8");

	switch ($_POST["action"]) {
		case 'carga_total':
			$jsondata = array();
			$myquery = "SELECT COUNT(*) id_reporte FROM reporte";
			$resultado = $mysqli->query($myquery);

			$fila = $resultado ->fetch_assoc();

			// $jsondata['total'] = $fila['id_reporte'];
			$jsondata = $fila['id_reporte'];

			echo json_encode($jsondata);
			break;
		case 'consulta':
			$paginacion='';
			$myquery = "SELECT * FROM reporte ORDER BY id_reporte DESC LIMIT ".$mysqli->real_escape_string($_POST['limit'])." OFFSET ".$mysqli->real_escape_string($_POST["offset"]);
			$resultado = $mysqli->query($myquery);
			if ($resultado) {
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
																 }
						while($fila = $resultado ->fetch_assoc()){
							$paginacion.="<tr>
                             	<td scope='row'>".$fila['id_reporte']."</td>
                               <td scope='row'>".$fila['fecha']."</td>
                               <td scope='row'>".$fila['nombre']."</td>
                               <td scope='row'>".$fila['area']."</td>
                               <td scope='row'>".$fila['asunto']."</td>
                               <td scope='row'>".$fila['status']."</td>
                               <td scope='row'><button value='".$fila['id_reporte']."' class='detalles btn btn-info'>Detalles</button></td>
                           </tr>";
            }

			echo json_encode($paginacion);
			break;

		default:
			// code...
			break;
	}








	// if($_POST['param1']=="cuantos"){

	// }elseif($_POST["param1"]=="dame"){

header("Content-type:application/json; charset = utf-8");
exit();
}

?>
