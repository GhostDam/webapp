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
        <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
          <h2>Crear reporte</h2>
        </a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
          <h2>NOTAS</h2>
        </a>
      </li>-->
    </ul>
    <!--navs -->
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">

        <div class="form-group">
            <label for="nombre" class="col-sm-2 col-form-label">Usuario:</label>
            <input type="text" class="form-control col-6" id="usr" name="nombre" required autocomplete="off" placeholder="Ejemplo: SISTEMAS3">
        </div>

        <form action='fn/fnindex.php'  id="n_reporte" autocomplete="off">
          <legend>Datos de reporte</legend>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Usuario: </label>
                <input name='nombre' list='empleado' class="form-control" placeholder="Seleccion el nombre del empleado"required>
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
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="treporte">Tipo de reporte: </label>
                  <select name='treporte' class="form-control" required>
                    <option value="" selected>Selecciona</option>
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
                  <option value="" selected>Selecciona</option>
                  <option value="Hardware">Hardware</option>
                  <option value="software">Software</option>
                  <option value="telefonia">Telefonia</option>
                </select>
              </div>
            </div>
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
                  <option value="" selected>Tipo de proveedor</option>
                  <option value="imjuve">Imjuve</option>
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
              <label for="no_serie">Serie: </label>
              <input type="text"  id="no_serie" name="serie" class="form-control" placeholder="Autollenado" readonly required>
            </div>
            <div class="form-group col-md-6">
              <label for="inventario">Nombre de equipo: </label>
              <input type="text"  id="inventario" name="inventario" class="form-control" placeholder="Autollenado" readonly required>
            </div>
          </div>
            <button type="submit" id="btnSubmit" class="btn btn-primary">Guardar</button>











          <!-- <fieldset>
           <div class="container">
            <div class="row"> -->
            <!-- <legend>Datos del Reporte</legend> -->
            <!-- <label for="nombre">Persona que Reporta: </label>
            <input name='nombre' list='empleado' class="form-control" placeholder="Seleccion el nombre del empleado"required><br>
              <datalist id="empleado">
              </datalist> -->
            <!-- <label for="asunto">Asunto: </label>
            <input name='asunto' class="form-control" required> -->
            <!-- <label for="descripcion">Descripcion: </label>
            <textarea name='descripcion' class="form-control" required></textarea> -->
            <!-- <label for="treporte">Tipo de Reporte: </label>
              <select name='treporte' class="form-control" required>
                <option value="" selected>Selecciona</option>
                <option value="incidencia">Incidencia</option>
                <option value="eventos">Eventos</option>
                <option value="cambio">Cambio</option>
              </select>
              <div class="hide">
                <input type="text" name="to" value="crear">
              </div> -->
            <!-- <label for="tservicio">Tipo de Servicio: </label>
            <select name='tservicio' class="form-control" required>
              <option value="" selected>Selecciona</option>
              <option value="Hardware">Hardware</option>
              <option value="software">Software</option>
              <option value="telefonia">Telefonia</option>
            </select> -->
            <!-- </div>
          </fieldset>
          <br><br>

          <div class="container">
            <div class="row"> -->
            <!-- <legend>Datos del Usuario</legend> -->
            <!-- <label for="provedor">Provedor del Servicio: </label>
            <select name='provedor' class="form-control" required>
              <option value="" selected>Selecciona un provedor</option>
              <option value="imjuve">Imjuve</option>
              <option value="externo">Externo</option>
            </select> -->

            <!-- <label for="area">Área</label>
            <input list="opt" type="text" id="area" name="area" placeholder="Autollenado" class="form-control" readonly required> -->
              <!-- <datalist id="opt">
              </datalist> -->
            <!-- <label for="encargado">Encargado de área</label>
            <input type="text" id="encargado" name="encargado" readonly placeholder="Autollenado" class="form-control" required> -->
            <!-- <label for="nombre">Usuario</label>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Autollenado" readonly required> -->

          <!-- </div>
      </div>

        <br> -->
          <!-- <fieldset> -->
            <!-- -Se agregan las clases de Boostrap -->
          <!-- <div class="container">
            <div class="row">
             <legend>Datos del Equipo</legend> -->
            <!-- <label for="marca">Marca: </label>
            <input type="text"  id="marca" name="marca" class="form-control" placeholder="Autollenado" readonly required>
            <label for="modelo">Modelo: </label>
            <input type="text"  id="modelo" name="modelo" class="form-control" placeholder="Autollenado" readonly required>
            <label for="no_serie">Serie: </label>
            <input type="text"  id="no_serie" name="serie" class="form-control" placeholder="Autollenado" readonly required>
            <label for="inventario">Nombre del Equipo: </label>
            <input type="text"  id="inventario" name="inventario" class="form-control" placeholder="Autollenado" readonly required> -->
            <!-- </div>
          </div> -->
         <!--  </fieldset> -->
          <!-- <fieldset class='ac'>
            <legend>Actividades</legend>
            <span>Solucion: <select name='solucion' class="form-val" required>
                                <option value="" selected>¿Tuvo solución?</option>
                                <option value='si'>Si</option>
                                <option value='no'>No</option>
                              </select>
            </span>
            <label for="actividad">Actividad: </label>
            <textarea type='textarea' name='actividad' class="form-val" required></textarea>
          </fieldset>
          <fieldset class='cs'>
            <legend>Calificacion del Servicio</legend>
            <span>calidad: </span>
            <span>Atencion: </span>
            <span>Profesional: </span>
            <span>Tiempo Respuesta: </span>
          </fieldset>
          <fieldset class='fm'>
          <legend>Firma </legend>
          </fieldset>
          <fieldset class="cl">
            <legend>Cierre del reporte</legend>
            <span>Persona que atendio: </span>
            <span>Fecha de cierre: </span>
            <span>Hora de cierre: </span>
          </fieldset> -->
          <!-- <div>
            <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg" value="Guardar">Guardar</button>
          </div> -->
        </form>
      </div>
      <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <fieldset class="">
              <legend>Notas</legend>
              <form id="new_note" method="post">
                  <label for="title">Título</label>
                  <input type="text" name="title" value="">
                  <br>
                  <label for="contenido">Contenido</label> <br>
                  <textarea name="contenido" rows="8" cols="80"></textarea> <br>
                  <button type="button" class="btn btn-info" name="button" id="nota">Guardar Nota</button>
              </form>
            </fieldset>
      </div>
    </div>
<!--  Bootstrap navs -->
</body>
</html>