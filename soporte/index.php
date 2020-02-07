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
  <script src="fn/index.js" charset="utf-8"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
    <title>MENÚ</title>
 </head>
<body>

  <?php include "./header.php"?>
    <?php $li1 = "active";?>
    <?php include "./ul.php" ?>
  <section>

<!--  Bootstrap navs -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <!--<a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">-->
          <h2>Crear reporte</h2>
        </a>
      </li>
    </ul>
    <!--navs -->
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
        <div class="form-group alert alert-primary">
            <label for="nombre" class="col-sm-12 col-form-label">Ingrese el usuario que reporta:</label>
            <input type="text" list='lista' class="form-control col-12" id="usr" name="nombre" required autocomplete="off" placeholder="Ejemplo: SISTEMAS3">
            <datalist id="lista">
            </datalist>
        </div>
        <form action='fn/fnindex.php'  id="n_reporte" autocomplete="off">
          <legend>Datos de reporte</legend>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Usuario: </label>
                <input name='nombre' list='empleado' class="form-control" placeholder="Ingrese el nombre del empleado"required>
                  <datalist id="empleado">
                  </datalist>
              </div>
              <div class="form-group col-md-6">
                <label for="asunto">Asunto: </label>
                <input name='asunto' class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción: </label>
              <textarea name='descripcion' class="form-control" required></textarea>
            </div>

            <!-- <div class="form-row">
              <div class="form-group col-md-6">
                <label for="treporte">Tipo de reporte: </label>
                  <select name='treporte' class="form-control" required>
                    <option value="" selected>Seleccione una opción</option>
                    <option value="incidencia">Incidencia</option>
                    <option value="eventos">Evento</option>
                    <option value="cambio">Cambio</option>
                  </select>
                  <div class="hide">
                    <input type="text" name="to" value="crear">
                  </div>
              </div>
              <div class="form-group col-md-6">
                <label for="tservicio">Tipo de servicio: </label>
                <select name='tservicio' class="form-control" required>
                  <option value="" selected>Seleccione una opción</option>
                  <option value="Hardware">Hardware</option>
                  <option value="software">Software</option>
                  <option value="telefonia">Telefonía</option>
                </select>
              </div>
            </div>
 -->
            <legend>Usuario</legend>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="area">Área</label>
                <input list="opt" type="text" id="area" name="area" placeholder="Autollenado" class="form-control" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="encargado">Encargado de área</label>
                <input type="text" id="encargado" name="encargado" readonly placeholder="Autollenado" class="form-control" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Usuario</label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Autollenado" readonly required>
              </div>
              <div class="form-group col-md-6">
                <label for="provedor">Proveedor de servicio: </label>
                <select name='provedor' class="form-control" required>
                  <option value="" selected>Seleccione una opción</option>
                  <option value="imjuve">IMJUVE</option>
                  <option value="externo">Externo</option>
                </select>
              </div>
            </div>
            <legend>Equipo</legend>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="marca">Marca: </label>
              <input type="text"  id="marca" name="marca" class="form-control" placeholder="Autollenado" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label for="modelo">Modelo: </label>
              <input type="text"  id="modelo" name="modelo" class="form-control" placeholder="Autollenado" readonly required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="no_serie">Número de serie: </label>
              <input type="text"  id="no_serie" name="serie" class="form-control" placeholder="Autollenado" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label for="inventario">Nombre del equipo: </label>
              <input type="text"  id="inventario" name="inventario" class="form-control" placeholder="Autollenado" readonly required>
            </div>
          </div>
            <button type="submit" id="btnSubmit" class="btn btn-danger">Guardar</button>

        </form>
      </div>
    </div>
<!--  Bootstrap navs -->
</body>
</html>
