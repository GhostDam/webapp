
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- css -->
     <link rel="stylesheet" href="css/master.css">
       <title>SOPORTE</title>
</head>
<body>
    <header>
     <h1>SISTEMA DE ATENCIÓN DE REPORTES</h1>
  </header>
  <div class="form-gr">
    <div class='contenedor'>
      <div class='img'>
        <img src="md/imjuve-logo.png" class="img-fluid" alt="Responsive image">
      </div>
      <div class="form">
         <form class="form-login" action="fn/load.php" method="post" autocomplete='off'>
            <label for="usuario">Usuario: </label>
             <input type="text"class="form-control" id="usuario" name="usuario" required>
             <label for="contraseña">Contraseña: </label>
              <input type="password" class="form-control" id="contraseña" name="contraseña" required>
          <input type="submit" class="btn btn-danger" value="Entrar">
         </form>
       </div>
   </div>
</body>  
</html>
<?php
    @session_start();
    if(isset($_SESSION["message"])){ //si hay mensaje
    $mensaje = $_SESSION["message"];
?>
  <script>
    var mensaje = "<?php echo $mensaje; ?>"
    swal(mensaje, "Favor de verificar", "error")
  </script>
<?php  unset($_SESSION["message"]);} //si hay mensaje ?>
