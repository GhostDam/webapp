<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");
?><html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <script src="fn/inventory.js"></script>
  <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata&display=swap&subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata|Sulphur+Point&display=swap&subset=latin-ext" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Inventarios</title>
</head>
<body>
  <?php include "./header.php" ?>
  <?php $li4 = "active";?>
  <?php include "./ul.php" ?>

  <section>
    <!--  Bootstrap navs -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
          <h2>Ver Equipos</h2>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
          <h2>Ver componentes</h2>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
          <h2>Agregar Equipos</h2>
        </a>
      </li>
    </ul>
    <!--navs -->
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
        <div class="buscador">
          <label>Buscar Equipos por área o tipo</label>
          <input list="sel" id="selection" type="text" name="" value="">
          <datalist id="sel" class="invList">
          </datalist>
          <!-- <select id="selection" class="invList">
            <option disabled selected>Selecciona el area</option>
            <option value="%_%">todas las areas</option>
          </select> -->
        </div>
        <div class="respuesta">
        </div>
      </div>
      <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
        <label for="detail">Busca por ID de Equipo para ver detalladamente</label>
        <input type="text" name="detail" id="search">
        <input type="button" value="Buscar" id="detailed">
      <div id="componentes">

      </div>

      </div>
      <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
        <form class="tarjeta" id="nuevo_equipo">
          <fieldset class="eq">
          <legend>Formulario para la adición de equipos</legend>
            <label for="area">Área a la que se agregara el equipo</label> <br>
              <select class="invList"  name="area">
                <option value="">Selecciona el área</option>
              </select>
              <br>
              <label for="nombre_equipo">Nombre del equipo</label>
              <input type="text" name="nombre_equipo">
              <br>
          </fieldset>

          <fieldset class="cp">
            <legend>CPU</legend>
            <label for="caracteristicas">Caracteristicas</label>
            <input type="text" name="caracteristicas" value="">
            <br>
            <label for="tipo_cpu">Ram</label>
            <input type="text" name="ram" value="">
            <br>
            <label for="tipo">Tipo</label>
            <select name="tipo_cpu">
                <option selected value="">Selecciona el tipo</option>
                <option value="mpc">mpc - Desktop</option>
                <option value="ml">ml - Laptop</option>
                <option value="mao">mao - All In One</option>
                <option value="mac">Mac</option>
            </select>
            <br>
            <label for="marca_cpu">marca</label>
            <input type="text" name="marca_cpu" value="">
            <br>
            <label for="modelo_cpu">modelo</label>
            <input type="text" name="modelo_cpu" value="">
            <br>
            <label for="serie_cpu">serie</label>
            <input type="text" name="serie_cpu" value="">
          </fieldset>

          <fieldset disabled class="mn">
            <legend>Monitor <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <label for="marca_mn">Marca monitor</label>
            <input type="text" name="marca_mn" value="">
            <br>
            <label for="modelo_mn">Modelo monitor</label>
            <input type="text" name="modelo_mn" value="">
            <br>
            <label for="num_serie_mn">Serie monitor</label>
            <input type="text" name="num_serie_mn" value="">
            <br>
          </fieldset>

          <fieldset disabled class="m">
            <legend>Mouse <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <label for="marca_m">Marca mouse</label>
            <input type="text" name="marca_m" value="">
            <br>
            <label for="modelo_m">Modelo mouse</label>
            <input type="text" name="modelo_m" value="">
            <br>
            <label for="num_serie_m">Serie mouse</label>
            <input type="text" name="num_serie_m" value="">
            <br>
          </fieldset>

          <fieldset disabled class="b">
            <legend>Bocinas <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <br>
            <label for="marca_b">Marca bocina</label>
            <input type="text" name="marca_b" value="">
            <br>
            <label for="modelo_b">Modelo bocina</label>
            <input type="text" name="modelo_b" value="">
            <br>
            <label for="num_serie_b">Serie bocina</label>
            <input type="text" name="num_serie_b" value="">
          </fieldset>

          <fieldset disabled class="t">
            <legend>Teclado <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <label for="marca_t">Marca teclado</label>
            <input type="text" name="marca_t" value="">
            <br>
            <label for="modelo_t">Modelo teclado</label>
            <input type="text" name="modelo_t" value="">
            <br>
            <label for="num_serie_t">Serie teclado</label>
            <input type="text" name="num_serie_t" value="">
            <br>
          </fieldset>

          <fieldset disabled class="nb">
            <legend>No Brake <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <label for="marca_nb">Marca Nobrake</label>
            <input type="text" name="marca_nb" value="">
            <br>
            <label for="modelo_nb">Modelo Nobrake</label>
            <input type="text" name="modelo_nb" value="">
            <br>
            <label for="num_serie_nb">Serie Nobrake</label>
            <input type="text" name="num_serie_nb" value="">
            <br>
          </fieldset>

          <fieldset disabled class="c">
            <legend>cargador <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
            </legend>
            <label for="marca_c">Marca cargador</label>
            <input type="text" name="marca_c" value="">
            <br>
            <label for="modelo_c">Modelo cargador</label>
            <input type="text" name="modelo_c" value="">
            <br>
            <label for="num_serie_c">Serie cargador</label>
            <input type="text" name="num_serie_c" value="">
            <br>
          </fieldset>

          <input id="crear_equipo" type="button" value="crear">
        </form>

      </div>
    </div>
<!--  Bootstrap navs -->
  </section>

</body>
</html>
