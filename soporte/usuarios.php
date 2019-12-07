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
  <script src="fn/users.js"></script>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Abel|Heebo&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>USUARIOS</title>
</head>
<body>
  <?php include "./header.php" ?>
  <?php $li3='active'; ?>
  <?php include "./ul.php" ?>

  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>LISTA</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>AGREGAR</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>EDITAR</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <div class="buscador">
                <label>Buscar por área o usuario</label>
                <div class="col-5">
                    <input list="sel" id="selection" class="form-control" type="text" name="" value="">
                </div>
                  <datalist id="sel" class="areaList">
                  <option>Seleccione una opción</option>
                </datalist>
              </div><br>
              <div class="respuesta">
              </div>
          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <form id="agregar_usuario">
              <label>Área a la que pertenece</label>
              <div class="col-5">
                <select id="adicion" class="form-control areaList">
                  <option value="" selected>Seleccione una opción</option>
                </select>
              </div>
               <br>
                <label for="user">Asigne nombre de usuario</label>
                <div class="col-5">
                   <input type="text" name="user" class="form-control">
                </div>
               <br>
                <label for="person">Asigne nombre de responsable</label>
                <div class="col-5">
                  <input type="text" name="person" class="form-control">
                </div>
                <br>
                 <label for="equipos">Asigne el equipo</label>
                 <div class="col-5">
                    <select id="disponibles" name="equipos" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                  </select>
                 </div>
              <br>
              <div class="col-5">
                <button type="button" class="btn btn-primary" id="crearUsuario">Crear usuario</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <form id="editar_usuario">
              <label for="user">Editar ID usuario</label>
              <div class="col-5">
                 <input type="text" class="form-control" id="user_to_edit" name="user">
                  <button type="button" class="btn btn-primary" id="cargarEdicion">Editar</button>
              </div>
                   <br>
                     <label for="user">Nombre: </label>
                     <div class="col-5">
                       <input type="text" class="form-control" name="edicion_nombre" class="form-val">
                     </div>
                        <br>
                      <label>Área a la que pertenece</label>
                     <div class="col-5">
                       <select id="edicion_area" class="form-control areaList">
                         <option value="" selected>Seleccione una opción</option>
                       </select>
                    </div>
                  <br>
                    <label for="person">Responsable asignado</label>
                     <div class="col-5">
                      <input type="text" class="form-control" name="edicion_responsable">
                     </div>
                       <br>
                        <label for="equipos">Equipo asignado</label>
                        <div class="col-5">
                          <select id="edicion_equipo" name="equipos" class="form-control">
                           <option value="">Seleccione una opción</option>
                         </select>
                        </div>
                  <br>
                  <div class="col">
                    <button type="button" class="btn btn-primary" id="editUser">Editar usuario</button>
                  </div>
            </form>
                </div>
          </div>
        </div>
    <!--  Bootstrap navs -->
<div class="panels">
    <div class="nft" id="pan3">
 </div>
  </div>
    </section>
  </body>
  </html>
