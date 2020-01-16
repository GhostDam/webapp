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
  <?php $li7='active'; ?>

 <?php include "./ul.php" ?>
  <section>
    <!--  Bootstrap navs -->

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <!--<a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">-->
          <h2>Firma de reportes</h2>
        </a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">

        <div class='form-group alert alert-primary'>

         <!-- <label class="col-sm-12 col-form-label">Número de reporte a firmar.</label>     
          <div class="input-group mb-3 col-6">
            <input type="text" name='num' class="form-control" placeholder="Número de reporte">
            <div class="">
              <button class="btn btn-outline-danger" id='consulta'type="button">Consultar</button>
            </div>  
           </div> -->
           <div class="row">
             <div class="col-sm-10">
              <div class="input-group mb-0">
                <label class="col-sm-12 col-form-label">Número de reporte a firmar.</label>     
                  <input type="text" name='num' class="form-control" placeholder="#0000">
                  <!-- <div class="input-group-append">
                    <button class="btn btn-outline-danger" type="button" id="consulta">Consultar</button>
                  </div> -->
                </div>
              </div>
              <div class="col-sm-2">
                  <button class="btn btn-outline-danger" type="button" id="consulta">Consultar</button>
              </div>
            </div>








       <form class='firmar text-center hide'>
        <label>Reporte a firmar</label>
        <input type="text" id='toSign' readonly>

        <hr>
        <h3>En general,¿Qué tan satisfecho esta usted con el servicio?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
        </div>

        <hr>

        <h3>¿Cuál fue el nivel de atención del servicio?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
        </div>

        <hr>

        <h3>¿Cómo calificaría el tiempo de respuesta?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
            </div>

            <hr>

        <h3>¿Su problema o duda se resolvió?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
            </div>

        <br>
        <hr>

        
        <h3>¿Tu problema o duda se resolvió?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="solucion" value="si">
            <label class="form-check-label" for="Regular">Si</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="solucion" value="no">
            <label class="form-check-label" for="Malo">No</label>
          </div>

         <!-- <select name='solucion'>
            <option value='si'>Si</option>
            <option value='no'>No</option>
          </select> -->

      <!--Canvas-->
        <canvas id="canvas">Su navegador no soporta canvas :( </canvas>
        <div class="buttons text-center">
          <button id="limpiar" type='button' class="btn btn-danger">Limpiar firma</button>
          <button id="download" type="button" class="btn btn-danger">Guardar firma</button>
        </div>
      <!--Canvas-->
    </form>

      </div>
    </div>
</section>

</body>
</html>
