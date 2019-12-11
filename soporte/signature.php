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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Prubeas bases</title>
</head>
<body>
  <?php include "./header.php" ?>
 <?php include "./ul.php" ?>
  <section>
    <!--  Bootstrap navs -->

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
          <h2>Firma de reportes</h2>
        </a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
      <form class="">
        <form>

          <div class="input-group mb-3 col-6">
            <input type="text" class="form-control" placeholder="Número de reporte" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-outline-primary" type="button">Button</button>
            </div>
          </div>

              <!-- <label for="numr">Número de Reporte</label>
              <input type="text" name="numr" id="nreporte"> -->

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
        <h3>¿Tu problema o duda se resolvio? //tiempo de respuesta </h3>
            <label for="Excelente">Excelente</label>
            <input type="radio" name="tiempo" id="tiempo" value="excelente">
            <label for="Bueno">Bueno</label>
            <input type="radio" name="tiempo" id="tiempo" value="bueno">
            <label for="Regular">Regular</label>
            <input type="radio" name="tiempo" id="tiempo" value="regular">
            <label for="Malo">Malo</label>
            <input type="radio" name="tiempo" id="tiempo" value="malo">

        <span>¿Tu problema o duda se resolvio?
          <select name='solucion'>
            <option value='si'>Si</option>
            <option value='no'>No</option>
          </select>
        </span>

      <!--Canvas-->
        <canvas id="canvas">Su navegador no soporta canvas :( </canvas>
        <div class="buttons">
          <button id="limpiar" class="btn btn-primary">limpiar canvas</button>
          <button id="download" type="button" class="btn btn-primary">Guardar Firma</button>
        </div>
      <!--Canvas-->
    </form>

      </div>
    </div>
</section>

</body>
</html>
