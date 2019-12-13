<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/master.css">
  <title>Sistema de reportes IMJUVE</title>
</head>
<body>
  <header>
    <img src="img/imjuve.png" alt="">
  </header>
  <main>
    <div class="contenedor">
      <div class="uso">
        <a href="reporte.php">Reporte</a>
      </div>
    </div>
  </main>
</body>
</html>
<?php
    @session_start();
    if(isset($_SESSION["message"])){ //si hay mensaje
    $mensaje = $_SESSION["message"];
?>
  <script>
    var mensaje = "<?php echo $mensaje; ?>"
    swal(mensaje, "", "success")
  </script>
<?php  unset($_SESSION["message"]);}  //si hay mensaje ?>
