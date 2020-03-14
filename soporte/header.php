<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");
?>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <meta charset="utf-8">
  <!-- plugins -->
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <script src="fn/push.min.js"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
    <title>Sistema de soporte técnico</title>
 </head>
<body>
<header>
   <nav class="session">
    <li> Bienvenido: <?php echo $_SESSION["usuario"]; ?>  </li>
    <a class="btn btn-outline-info" href="fn/close.php">Cerrar Sesión</a> </li> 
  </nav>
</header>
<div class="container-fluid">
<script>
  var type = '<?php echo $_SESSION['tipo_admin']; ?>';
  if ('<?php echo $_SESSION['tipo_admin']; ?>' == 'master') {
    $(document).ready(function(){
      $(".admin").show();
    })
  }else {
    $(document).ready(function(){
      $(".admin").remove();
    })
  }
</script>
