<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");
?>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.js" integrity="sha256-xWq811jWtpNFuV8sXFtLWGYcNdTdHKe4phSg0svZIt0=" crossorigin="anonymous"></script>

  <script src="global.js"></script>
  <script src="fn/stats.js"></script>
  <!--responsive-->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata&display=swap&subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata|Sulphur+Point&display=swap&subset=latin-ext" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Estadisticas</title>
</head>
<body>
  <?php include "./header.php" ?>
      <?php $li8='active'; ?>
    <?php include "./ul.php" ?>

  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Totales</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Fechas</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Areas</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-4" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">
              <h2>Personalizadas</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <div id="total">
            </div>
          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <label for="date1">Fecha inicial</label>
            <input type="date" name="init" value="">
            <br>
            <label for="date2">Fecha Final</label>
            <input type="date" name="fin" value="">
            <br>
            <input type="button" id="consulta_fecha" value="Buscar rango de fechas">
            <div id="rango">
            </div>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <select id="areaList" name="">
              <option value="">Seleccione una opción</option>
            </select>
              <div id="stats_area">
              </div>
          </div>
          <div class="tab-pane fade" id="section-4" role="tabpanel" aria-labelledby="index-4">
            cuatlo
          </div>
        </div>
    <!--  Bootstrap navs -->
</section>
</body>
</html>
