<?php include "./header.php" ?>
<?php $li5 = "active";?>
<?php include "./ul.php" ?>

<script src="fn/config.js"></script>
  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Administradores</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Agregar Administradores</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Técnicos</h2>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-4" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">
              <h2>Agregar técnicos</h2>
            </a>
          </li>

        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
                  <div id="listaAdmn">

                  </div>
          </div>

          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <label for="name_adm">Nombre Completo</label>
            <div class="col-5">
            <input type="text" name="name_adm" class="form-control" class="form-val " value=""><br>
            <label for="usuario_admin">Usuario</label>
            <input type="text" name="usuario_admin" class="form-control" class="form-val" value=""><br>
          </div>
            <label for="pass_admin">Contraseña</label>
            <div class="col-5">
            <input type="password" name="pass_admin" class="form-control" class="form-val" value=""><br></div>
            <label for="type">Permisos</label>
            <select type="text" name="type" class="form-val" value="">
              <option value="" selected>Permisos</option>
              <option value="master">Super Admininstrador</option>
              <option value="admin">Admininstrador</option>
            </select><br>
            <input type="button" class="btn btn-danger" id="addmin" value="Guardar"><br>
          </div>

          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
                  <div id="listTec">
                  </div>
          </div>

          <div class="tab-pane fade" id="section-4" role="tabpanel" aria-labelledby="index-4">
              <div id="add_tec">
                <form id="n_personal">
                    <div class="col-6">
                      <label for="nombre_tecnico">Nombre del técnico</label>
                      <input type="text" class='form-control form-val' name="nombre_tecnico">
                    </div>
                    <div class="col-6">                      
                      <label for="tipo_tecnico">Tipo del técnico</label>
                      <select class="form-control form-val" name="tipo_tecnico">
                        <option value="">Seleccione una opción</option>
                        <option value="Externo">Externo</option>
                        <option value="Imjuve">Imjuve</option>
                      </select> 
                    </div>
                    <button type="button" class="btn btn-danger" id="agregar_tecnico">Guardar</button>
                </form> 
            </div>
      
          </div>


        </div>
    <!--  Bootstrap navs -->
</section>


</body>
</html>
