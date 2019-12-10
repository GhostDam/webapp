<?php
$mysqli= new mysqli("localhost","root","","ejemplotablas");

if($mysqli ->connect_errno){
	echo "Fallo al conectar".$mysqli->connect_errno;
	}else{
	$mysqli->set_charset("utf8");
	$jsondata = array();
	$jsondataList = array();


	if($_GET['param1']=="cuantos"){

		$myquery = "SELECT COUNT(*) total FROM tabla1";
		$resultado = $mysqli->query($myquery);
		$fila = $resultado ->fetch_assoc();
		$jsondata['total'] = $fila['total'];
	}elseif($_GET["param1"]=="dame"){
		$myquery = "SELECT * FROM tabla1 LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);
		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc()){
			$jsondataperson = array();
			$jsondataperson["id"] = $fila["id"];
			$jsondataperson["nombre"] = $fila["nombre"];
			$jsondataperson["apellidopaterno"] = $fila["apellidopaterno"];
			$jsondataperson["apellidomaterno"] = $fila["apellidomaterno"];
			$jsondataList[]=$jsondataperson;
		}
		$jsondata["lista"] = array_values($jsondataList);
	}

header("Content-type:application/json; charset = utf-8");
echo json_encode($jsondata);
exit();
}

?>
