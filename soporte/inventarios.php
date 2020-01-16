<?php
    @session_start();
    if(!isset($_SESSION["usuario"])) header("location: login.php");
?><html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <script src="https://code.jquery.com/jquery-3.4.0.js"
  integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <script src="fn/inventory.js"></script>
   <!--google font-->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- bootstrap toogle -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>  
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
          <h2>Consultar equipos</h2>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
          <h2>Consultar componentes</h2>
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
        <div class='col-6'>

          <label>Buscar Equipos por área o tipo</label>
          <input class='form-control' list="sel" id="selection" type="text">
          <datalist id="sel" class="invList">
            </datalist>
          </div>
          <!-- <select id="selection" class="invList">
            <option disabled selected>Selecciona el area</option>
            <option value="%_%">todas las areas</option>
          </select> -->
        <div class="respuesta">
        </div>
      </div>
      <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
        <label for="detail">Buscar equipo por ID para consultar su información</label>
        <input type="text" name="detail" id="search">
        <input class="btn btn-danger"  type="button" value="Buscar" id="detailed">
      <div id="componentes">

      </div>

      </div>
      <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
        <form class="tarjeta" id="nuevo_equipo">
          <fieldset class="eq col-12 text-center">
          <legend>Formulario para la adición de equipos</legend>
            <label for="area">Área a la que se agregara el equipo</label> <br>
              <select class="invList my-3"  name="area">
                <option value="">Seleccione una opción</option>
              </select>
              <br>
              <label for="nombre_equipo">Nombre del equipo</label>
              <input type="text" name="nombre_equipo">
              <br>
          </fieldset>
          <div class="row mt-3 justify-content-between">

            <fieldset class="col-12 col-lg-5">
              <legend>CPU</legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="caracteristicas">Características</label>
                  <label class="label-inventario" for="tipo_cpu">RAM</label>
                  <label class="label-inventario" for="tipo">Tipo</label>
                  <label class="label-inventario" for="marca_cpu">Marca</label>
                  <label class="label-inventario" for="modelo_cpu">Modelo</label>
                  <label class="label-inventario" for="serie_cpu">Número de serie</label>
                </div>
                <div class="col-6">
                  <input type="text" name="caracteristicas" value="">
                  <input type="text" name="ram" value="">
                  <select name="tipo_cpu">
                      <option selected value="">Seleccione una opción</option>
                      <option value="mpc">Mpc - Desktop</option>
                      <option value="ml">Ml - Laptop</option>
                      <option value="mao">Mao - All In One</option>
                      <option value="mac">Mac</option>
                  </select>
                  <input type="text" name="marca_cpu" value="">
                  <input type="text" name="modelo_cpu" value="">
                  <input type="text" name="serie_cpu" value="">
                </div>
              </div>
            </fieldset>

            <fieldset disabled class="mn col-12 col-lg-5">
              <legend>
                Monitor 
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_mn">Marca</label>
                  <label class="label-inventario" for="modelo_mn">Modelo</label>
                  <label class="label-inventario" for="num_serie_mn">Número de serie</label>
                  
                </div>
                <div class="col-6">
                  <input type="text" name="marca_mn" value="">
                  <input type="text" name="modelo_mn" value="">
                  <input type="text" name="num_serie_mn" value="">
                </div>
              </div>
              <br><!-- 
              <br>
              <br> -->
            </fieldset>
            
          </div>



          <div class="row mt-3 justify-content-between">
            <fieldset disabled class="m col-12 col-lg-5">
              <legend>Mouse <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_m">Marca</label>
                  <label class="label-inventario" for="modelo_m">Modelo</label>
                  <label class="label-inventario" for="num_serie_m">Número de serie</label>
                </div>
                <div class="col-6">
                  <input type="text" name="marca_m" value="">
                  <input type="text" name="modelo_m" value="">
                  <input type="text" name="num_serie_m" value="">
                </div>
              </div>
              <!-- <br>
              <br>
              <br> -->
            </fieldset>

            <fieldset disabled class="b col-12 col-lg-5">
              <legend>Bocinas <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_b">Marca</label>
                  <label class="label-inventario" for="modelo_b">Modelo</label>
                  <label class="label-inventario" for="num_serie_b">Número de serie</label>
                  
                </div>
                <div class="col-6">
                  <input type="text" name="marca_b" value="">
                  <input type="text" name="modelo_b" value="">
                  <input type="text" name="num_serie_b" value="">
                  
                </div>
              </div>
              <!-- <br> -->
              <!-- <br>
              <br> -->
            </fieldset>
            
          </div>
          <div class="row mt-3 justify-content-between">
            <fieldset disabled class="col-12 col-lg-5">
              <legend>Teclado <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_t">Marca</label>
                  <label class="label-inventario" for="modelo_t">Modelo</label>
                  <label class="label-inventario" for="num_serie_t">Número de serie</label>
                  
                </div>
                <div class="col-6">
                  <input type="text" name="marca_t" value="">
                  <input type="text" name="modelo_t" value="">
                  <input type="text" name="num_serie_t" value="">
                  
                </div>
              </div>
              <!-- <br>
              <br>
              <br> -->
            </fieldset>

            <fieldset disabled class="nb col-12 col-lg-5">
              <legend>No Break <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_nb">Marca</label>
                  <label class="label-inventario" for="modelo_nb">Modelo</label>
                  <label class="label-inventario" for="num_serie_nb">Número de serie</label>
                  
                </div>
                <div class="col-6">
                  
                  <input type="text" name="marca_nb" value="">
                  <input type="text" name="modelo_nb" value="">
                  <input type="text" name="num_serie_nb" value="">
                </div>
              </div>
              <!-- <br>
              <br>
              <br> -->
            </fieldset>
            
          </div>

          <div class="row mt-3 justify-content-between">
            
            <fieldset disabled class="c col-12 col-lg-5">
              <legend>Cargador <label class="switch">
                                  <input type="checkbox">
                                  <span class="slider round"></span>
                                </label>
              </legend>
              <div class="row">
                <div class="col-6">
                  <label class="label-inventario" for="marca_c">Marca</label>
                  <label class="label-inventario" for="modelo_c">Modelo</label>
                  <label class="label-inventario" for="num_serie_c">Número de serie</label>
                  
                </div>
                <div class="col-6">
                  <input type="text" name="marca_c" value="">
                  <input type="text" name="modelo_c" value="">
                  <input type="text" name="num_serie_c" value="">
                  
                </div>
              </div>
              <!-- <br>
              <br> -->
              <!-- <br> -->
            </fieldset>
          </div>
          
            <input class="btn btn-danger btn-lg" id="crear_equipo" type="button" value="Crear">
        </form>
        
      </div>
    </div>
<!--  Bootstrap navs -->
  </section>

</body>
</html>
