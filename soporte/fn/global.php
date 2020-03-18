<?php
 include '../../conn/connect.php';

 $count='';
 $query='SELECT COUNT(*) FROM reporte WHERE status ="pendiente" ';
 $response=mysqli_query($conectar, $query);
 if ($response->num_rows>0) {
   while ($res=$response->fetch_assoc()) {
     $count.=$res['COUNT(*)'];
   }
   echo $count;
 }

 $conectar->close();
?>
