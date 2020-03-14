<?php include "./header.php" ?>
<?php $li3='active'; ?>
<?php include "./ul.php" ?>
  <!--  page scripts -->
  <script src="fn/users.js"></script>
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
              <div class="col-5">
                    <label>Buscar por área o usuario</label>
                    <input list="sel" id="selection" class="form-control" type="search" name="" value="">
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
                <label for="user">Asigne nombre de usuario: </label>
                <div class="col-5">
                   <input type="text" name="user" class="form-control">
                </div>
               <br>
                <label for="person">Asigne nombre del responsable: </label>
                <div class="col-5">
                  <input type="text" name="person" class="form-control">
                </div>
                <br>
                 <label for="equipos">Asigne el equipo: </label>
                 <div class="col-5">
                    <select id="disponibles" name="equipos" class="form-control">
                    <option value="" selected>Seleccione una opción</option>
                  </select>
                 </div>
              <br>
              <div class="col-5">
                <button type="button" class="btn btn-danger" id="crearUsuario">Crear usuario</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <form id="editar_usuario">
              <label for="user">Editar ID usuario</label>
              <div class="col-5">
                 <input type="text" class="form-control" id="user_to_edit" name="user">
                  <button type="button" class="btn btn-danger" id="cargarEdicion">Buscar ID</button>
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
                    <button type="button" class="btn btn-danger" id="editUser">Editar usuario</button>
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
