<?php include "./header.php" ?>
<?php $li6 = "active";?>
<?php include "./ul.php" ?>
<script src="fn/person.js"></script>
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
              <div class="col-6">
              <select class="dirList form-control" name='direccion'>
                <option value="">Seleccione una opción</option>
              </select> <br>
            </div>
              <label for="nuevo_empleado">Nombre del personal</label>
              <div class="col-6">
              <input class="form-control" type="text" name="nuevo_empleado"> <br>
            </div>
              <label for="tipo_empleado">Tipo de personal</label>
              <div class="col-6">
              <select class="tipo_empleado form-control" name="tipo_empleado">
                <option value="">Seleccione una opción</option>
                <option value="base">Base</option>
                <option value="becario">Becario</option>
                <option value="externo">Externo</option>
                <option value="encargado">Encargado</option>
              </select> </div>
              <div class="nuevo_responsable hide">
                <label for="areas">De que área sera responsable</label>
                <select class="areaList" name="nuevo_responsable">
                  <option value="">Seleccione una opción</option>
                </select>
              </div>
              <br>
            <button type="button"  class="btn btn-danger" id="agregar_personal">Guardar</button>
           </form>          
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <form id="edit_personal">
              <label for="id">ID de personal</label>
              <div class="col-6">
                <input  class="form-control" type="text" name="id_editar" value="">
                <button class="btn btn-danger" type="button" id="carga_edicion">Buscar</button>
              </div>
              <label for="dirList">A que dirección se agregará</label>
                <div class="col-6">
                  <select class="dirList form-control" name='direccion'>
                    <option value="">Seleccione una opción</option>
                  </select>
                </div>
                <label for="edit_empleado">Nombre del personal</label>
                <div class="col-6">
                 <input class="form-control" type="text" name="edit_empleado">
                </div>
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
                <button type="button" class="btn btn-danger" id="editar_personal">Editar</button>
            </form>
      </div> <!-- cierre bloque -->
  </div>
    <!--  Bootstrap navs -->
</section>
</body>
</html>
