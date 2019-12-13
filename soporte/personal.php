<?php
@session_start();
if(!isset($_SESSION["usuario"])) header("location: login.php");
?>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.4.0.js" integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="global.js"></script>
  <script src="fn/person.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata&display=swap&subset=latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Alata|Sulphur+Point&display=swap&subset=latin-ext" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Personal</title>
</head>
<body>
  <?php include "./header.php" ?>
  <?php $li6 = "active";?>
  <?php include "./ul.php" ?>
  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Lista de personal</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Agregar</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Editar</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <div id="direcciones">
            </div>
          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <form id="n_personal">
            <label for="dirList">A que dirección se agregará</label>
              <select class="dirList" name='direccion'>
                <option value="">Seleccione una opción</option>
              </select> <br>
              <label for="nuevo_empleado">Nombre del personal</label>
              <input type="text" name="nuevo_empleado"> <br>
              <label for="tipo_empleado">Tipo de personal</label>
              <select class="tipo_empleado" name="tipo_empleado">
                <option value="">Seleccione una opción</option>
                <option value="base">Base</option>
                <option value="becario">Becario</option>
                <option value="encargado">Encargado</option>
              </select>
              <div class="nuevo_responsable hide">
                <label for="areas">De que área sera responsable</label>
                <select class="areaList" name="nuevo_responsable">
                  <option value="">Seleccione una opción</option>
                </select>

              </div>
              <br>
            <button type="button"  class="btn btn-info" id="agregar_personal">Guardar</button>
          </form>          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <form id="edit_personal">
              <label for="id">ID de personal</label>
              <input type="text" name="id_editar" value=""> <button type="button" id="carga_edicion">Buscar</button> <br>
              <label for="dirList">A que dirección se agregará</label>
                <select class="dirList" name='direccion'>
                  <option value="">Seleccione una opción</option>
                </select> <br>
                <label for="edit_empleado">Nombre del personal</label>
                <input type="text" name="edit_empleado"> <br>
                <label for="edit_tipo">Tipo de personal</label>
                <select class="tipo_empleado" name="edit_tipo">
                  <option value="">Seleccione una opción</option>
                  <option value="base">Base</option>
                  <option value="becario">Becario</option>
                  <option value="encargado">Encargado</option>
                </select>
                  <div class="nuevo_responsable hide">
                      <label for="areas">De que área sera responsable</label>
                      <select class="areaList" name="nuevo_responsable">
                        <option value="">Seleccione una opción</option>
                      </select>
                  </div>
                <br>
                <button  type="button" class="btn btn-info" id="editar_personal">Editar</button>
            </form>
          </div>
        </div>
    <!--  Bootstrap navs -->
</section>
</body>
</html>
