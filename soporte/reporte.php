<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");
?>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <script src="https://code.jquery.com/jquery-3.4.0.js"integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!--<link href="https://fonts.googleapis.com/css?family=Abel|Heebo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">-->
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css  -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="fn/report.js" charset="utf-8"></script>
  <title>SOPORTE</title>
</head>
<body>
  <?php include "./header.php"; $li2 = "active"; ?>
  <?php include "./ul.php" ?>
  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Pendientes</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Atender</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Historial</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-4" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">
              <h2>Detalles</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <div id="mostrar">
            </div>
          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <div id="edicion" class="">
                      <label for="buscador">Atender por ID de reporte:</label>
                      <input type="text" class="form-control col-3" id="buscador" name="buscador" placeholder="####">
                      <button id="editar"  class="btn btn-info" name="" value="buscar">Buscar</button>
            </div>
            <div id="atender" class="">
            </div>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <div id="historial">
            </div>


            <div class="">
              <nav aria-label="Page navigation example">
                <ul class="paginacion pagination justify-content-center" id='pages'>

                </ul>
              </nav>
            </div>



          </div>
          <div class="tab-pane fade" id="section-4" role="tabpanel" aria-labelledby="index-4">
            <div class="col-5">
              <label for="buscador">Buscar en el historial por ID de Reporte:</label>
              <input type="text" class="form-control" id="buscarh" name="buscador" placeholder="####">
              <input type="button" class="btn btn-info" id="verhist" name="" value="buscar">
            </div>
            <div id="detalles">
            </div>
          </div>
        </div>
    <!--  Bootstrap navs -->

</section>
</body>
</html>
