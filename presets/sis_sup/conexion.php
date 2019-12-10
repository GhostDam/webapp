<?php
$mysqli= new mysqli("localhost","root","","sis_soporte");

if($mysqli ->connect_errno){
	echo "Fallo al conectar".$mysqli->connect_errno;
	}else{
	$mysqli->set_charset("utf8");

	$jsondata = array();
	$jsondataList = array();

	switch ($_POST["action"]) {
		case 'cuantos':
			$myquery = "SELECT COUNT(*) id_reporte FROM reporte";
			$resultado = $mysqli->query($myquery);
					if (!$resultado) {
					echo	mysqli_error($mysqli);
				}
			$fila = $resultado ->fetch_assoc();
			$jsondata['total'] = $fila['id_reporte'];
			echo json_encode($jsondata);
			break;
		case 'dame':
			// code...
			$myquery = "SELECT * FROM reporte ORDER BY id_reporte DESC LIMIT ".$mysqli->real_escape_string($_POST['limit'])." OFFSET ".$mysqli->real_escape_string($_POST["offset"]);
			$resultado = $mysqli->query($myquery);
				// code...
						while($fila = $resultado ->fetch_assoc()){
							$jsondataperson = array();
							$jsondataperson["id"] = $fila["id_reporte"];
							$jsondataperson["fecha"] = $fila["nombre"];
							$jsondataperson["persona"] = $fila["fecha"];
							$jsondataperson["area"] = $fila["hora"];
							$jsondataList[]=$jsondataperson;
						}

						$jsondata["lista"] = array_values($jsondataList);

			echo json_encode($jsondata);
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
