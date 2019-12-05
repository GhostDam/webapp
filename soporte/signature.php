<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");

?>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js"
integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
crossorigin="anonymous"></script>
  <script src="fn/signature.js"></script>
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Prubeas bases</title>
</head>
<body>
  <?php include "./header.php" ?>
 <?php include "./ul.php" ?>
  <section>

<div class="">
<!--Addons-->
  <div class="calificacion">
  <label for="numr">Número de Reporte</label>
  <input type="text" name="numr" id="nreporte">
  <h3>En general,¿Qué tan satisfecho esta usted con el servicio? // calidad del servicio</h3>
          <label for="Excelente">Excelente</label>
          <input type="radio" name="calidad" id="calidad" value="excelente">
          <label for="Bueno">Bueno</label>
          <input type="radio" name="calidad" id="calidad" value="bueno">
          <label for="Regular">Regular</label>
          <input type="radio" name="calidad" id="calidad" value="regular">
          <label for="Malo">Malo</label>
          <input type="radio" name="calidad" id="calidad" value="malo">
        <h3>¿Cuál fue el nivelde atención del servicio? //nivel de atencion </h3>
          <label for="Excelente">Excelente</label>
          <input type="radio" name="atencion" id="atencion" value="excelente">
          <label for="Bueno">Bueno</label>
          <input type="radio" name="atencion" id="atencion" value="bueno">
          <label for="Regular">Regular</label>
          <input type="radio" name="atencion" id="atencion" value="regular">
          <label for="Malo">Malo</label>
          <input type="radio" name="atencion" id="atencion" value="malo">
        <h3>¿Cómo calificaria el tiempo de respuesta? //nivel profesional</h3>
          <label for="Excelente">Excelente</label>
          <input type="radio" name="profesion" id="profesion" value="excelente">
          <label for="Bueno">Bueno</label>
          <input type="radio" name="profesion" id="profesion" value="bueno">
          <label for="Regular">Regular</label>
          <input type="radio" name="profesion" id="profesion" value="regular">
          <label for="Malo">Malo</label>
          <input type="radio" name="profesion" id="profesion" value="malo">
        -<h3>¿Tu problema o duda se resolvio? //tiempo de respuesta </h3>
          <label for="Excelente">Excelente</label>
          <input type="radio" name="tiempo" id="tiempo" value="excelente">
          <label for="Bueno">Bueno</label>
          <input type="radio" name="tiempo" id="tiempo" value="bueno">
          <label for="Regular">Regular</label>
          <input type="radio" name="tiempo" id="tiempo" value="regular">
          <label for="Malo">Malo</label>
          <input type="radio" name="tiempo" id="tiempo" value="malo">
        </div>

        <span>¿Tu problema o duda se resolvio? <select name='solucion'><option value='si'>Si</option><option value='no'>No</option></select></span>

<!--Ads-->
<!--Canvas-->
  <canvas id="canvas">Su navegador no soporta canvas :( </canvas>
  <div class="buttons">
    <button id="limpiar">limpiar canvas</button>
    <button id="download" type="button" >Guardar Firma</button>
  </div>
                  <!-- <canvas id="pizarra">Su navegador no soporta canvas :( </canvas>
                  <button id="limpiar">limpiar canvas</button> -->
<!--Canvas-->
</div>
</section>
<script type="text/javascript">
  var nombre = '<?php echo $_SESSION["nombre"]; ?>';
  console.log(nombre)
</script>

</body>
</html>
