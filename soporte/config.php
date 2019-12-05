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
  <script src="global.js"></script>
  <script type="text/javascript">
    var session = ("<?php echo $_SESSION["usuario"]; ?>")
  </script>
  <script src="fn/config.js"></script>
 <!-- google fonts -->
 <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">
 <!--<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Alata&display=swap&subset=latin-ext" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Alata|Sulphur+Point&display=swap&subset=latin-ext" rel="stylesheet">-->
 <!-- bootstrap -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <!-- css -->
 <link rel="stylesheet" href="css/master.css">
 <link rel="stylesheet" href="css/styles.css">
  <title>Sistema</title>
</head>
<body>
  <?php include "./header.php" ?>
  <?php $li5 = "active";?>
    <?php include "./ul.php" ?>

  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Cambiar temas</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Administradores</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Agregar administradores</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <fieldset>
            <legend>Seleciona el tema</legend>
              <button id="default">Default</button>
              <button id="theme1">Oscuro</button>
              <button id="theme2">Tulipan</button>

              <button id="guardar">Guardar Cambios</button>
            </fieldset>
            <fieldset>
              <legend>Vista Previa</legend>
                  <label for="">Ejemplo input</label>
                  <input type="text" name="" value="texto de rpueba">
                  <input type="button" name="" value="input buttin">
                  <button type="button" class="btn btn-info" name="button">botton</button>
                  <br>
                  <textarea name="name" rows="8" cols="80">Este es el textp de prueba</textarea>
                  <br>
                  <select class="" name="">
                    <option value="">uno</option>
                    <option value="">uno</option>
                  </select>
                  <br>
                  <table>
                    <thead>
                      <tr>
                        <td>Admin</td>
                        <td>Nombre</td>
                        <td>Tipo</td>
                        <td>Eliminar</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Carolina</td>
                        <td></td>
                        <td></td>
                        <td><button name="1"><i class="icon-trash-o"></i></button></td>
                      </tr>
                      <tr>
                        <td>juan</td>
                        <td></td>
                        <td></td>
                        <td><button name="2"><i class="icon-trash-o"></i></button></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="reporte">
                    <div class="show">
                      <div><span>Asunto: </span>fdsfa</div>
                      <div><span>Fecha: </span>2019-09-20</div>
                      <div><span>Hora: </span>16:22:29</div>
                      <div><span>ID Reporte: </span>19</div>
                      <div><span>Área: </span>Subdireccion de Sistemas</div>
                      <div><span>Usuario: </span>luis</div>
                      <div><span>Descripcion: </span>fdsafefsa</div>
                      <div><span>Status: </span>pendiente</div>
                      <button class="atender" value="19">atender </button>
                    </div>
                  </div>
                  <li><i class="icon-pencil-square"></i>editar</li>
                  <li><i class="icon-check-circle"></i>activo</li>
                  <li><i class="icon-caret-right"></i>derecha</li>
                  <li><i class="icon-caret-down"></i>abajo</li>
          </fieldset>
          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <div id="listaAdmn">

            </div>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <label for="name_adm">Nombre Completo</label>
            <input type="text" name="name_adm" class="form-val" value=""><br>
            <label for="usuario_admin">Usuario</label>
            <input type="text" name="usuario_admin" class="form-val" value=""><br>
            <label for="pass_admin">Contraseña</label>
            <input type="password" name="pass_admin" class="form-val" value=""><br>
            <label for="type">Permisos</label>
            <select type="text" name="type" class="form-val" value="">
              <option value="" selected>Permisos</option>
              <option value="master">Master</option>
              <option value="admin">Admin</option>
            </select><br>
            <input type="button" class="btn btn-info" id="addmin" value="Guardar"><br>
            <small>Solo Master puede agregar mas usuarios</small>
          </div>
        </div>
    <!--  Bootstrap navs -->
</section>


</body>
</html>
