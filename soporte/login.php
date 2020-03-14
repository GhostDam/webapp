<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
      <div class="form shadow">
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
