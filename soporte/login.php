<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--responsive-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
  <!-- google fonts -->
  <!--<link href="https://fonts.googleapis.com/css?family=Abel|Heebo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">-->
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
     <div class='contenedor'>
            <div class='form'>
                <form action="fn/load.php" method="post">
                     <label for="usuario">Usuario: </label>
                        <div class="col">
                          <input type="text"class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <br>
                    <label for="contraseña">Contraseña: </label>
                  <div class="col">
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                 </div>
            <br>
            <div class="col">
              <button type="submit" class="btn btn-primary" value="entrar">Entrar</button>
            </div>
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
