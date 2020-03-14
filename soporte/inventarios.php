<?php include "./header.php" ?>
<?php $li4 = "active";?>
<?php include "./ul.php" ?>

  <script src="fn/inventory.js"></script>

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
    <div class="tab-content shadow" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
        <div class='col-6'>
          <label>Buscar Equipos por área o tipo</label>
          <input class='form-control' list="sel" id="selection" type="search">
          <datalist id="sel" class="invList">
            </datalist>
          </div>
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
              <select class="invList form-control col-6 mx-auto"  name="area">
                <option value="">Seleccione una opción</option>
              </select>
              <br>
              <label for="nombre_equipo">Nombre del equipo</label>
              <input class='form-control col-5 mx-auto' type="text" name="nombre_equipo">
              <br>
          </fieldset>

          <div class='row'> 
          <fieldset class='col-md-6'>
            <legend>
              CPU
            </legend>
              <div class="form-group row">
                <label for="caracteristicas" class="col-sm-4 col-form-label">Características</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="caracteristicas" name='caracteristicas'>
                </div>
              </div>
              <div class="form-group row">
                <label for="ram" class="col-sm-4 col-form-label">RAM</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="ram" name='ram'>
                </div>
              </div>
              <div class="form-group row">
                <label for="tipo_cpu" class="col-sm-4 col-form-label">Tipo</label>
                <div class="col-sm-8">
                <select class='form-control' name="tipo_cpu">
                      <option selected value="">Seleccione una opción</option>
                      <option value="mpc">Mpc - Desktop</option>
                      <option value="ml">Ml - Laptop</option>
                      <option value="mao">Mao - All In One</option>
                      <option value="mac">Mac</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="marca_cpu" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_cpu" name='marca_cpu'>
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_cpu" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_cpu" name='modelo_cpu'>
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_cpu" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_cpu" name='serie_cpu'>
                </div>
              </div>
            </fieldset>

            <fieldset class='col-md-6' disabled>
            <legend>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="check_monitor">
                <label class="custom-control-label" for="check_monitor">Monitor</label>
              </div>
            </legend>

              <div class="form-group row">
                <label for="marca_mn" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_mn" name="marca_mn">
                </div>
              </div>

              <div class="form-group row">
                <label for="modelo_mn" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_mn" name="modelo_mn">
                </div>
              </div>

              <div class="form-group row">
                <label for="serie_mn" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_mn" name="num_serie_mn">
                </div>
              </div>
            </fieldset>
          </div>

        <div class="row">
            <fieldset class="col-md-6" disabled>
              <legend>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="check_mouse">
                  <label class="custom-control-label" for="check_mouse">Mouse</label>
                </div>
              </legend>
              <div class="form-group row">
                <label for="marca_m" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_m" name="marca_m">
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_m" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_m" name="modelo_m">
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_m" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_m" name="num_serie_m">
                </div>
              </div>
            </fieldset>
            <fieldset class="col-md-6" disabled>
              <legend>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="check_bocinas">
                  <label class="custom-control-label" for="check_bocinas">Bocinas</label>
                </div>
              </legend>
              <div class="form-group row">
                <label for="marca_b" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_b" name="marca_b">
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_b" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_b" name="modelo_b">
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_b" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_b" name="num_serie_b">
                </div>
              </div>
            </fieldset>
        </div>

        <div class="row">
            <fieldset class="col-md-6" disabled>
              <legend>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="check_teclado">
                  <label class="custom-control-label" for="check_teclado">Teclado</label>
                </div>
              </legend>
              <div class="form-group row">
                <label for="marca_t" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_t" name="marca_t">
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_t" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_t" name="modelo_t">
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_t" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_t" name="num_serie_t">
                </div>
              </div>
            </fieldset>
            <fieldset class="col-md-6" disabled>
              <legend>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="check_nbrake">
                  <label class="custom-control-label" for="check_nbrake">No Brake</label>
                </div>
              </legend>
              <div class="form-group row">
                <label for="marca_nb" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_nb" name="marca_nb">
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_nb" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_nb" name="modelo_nb">
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_nb" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_nb" name="num_serie_nb">
                </div>
              </div>
            </fieldset>
        </div>

        <div class='row'>
        <fieldset class="col-md-6" disabled>
              <legend>
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="check_cargador">
                  <label class="custom-control-label" for="check_cargador">Cargador</label>
                </div>
              </legend>
              <div class="form-group row">
                <label for="marca_c" class="col-sm-4 col-form-label">Marca</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="marca_c" name="marca_c">
                </div>
              </div>
              <div class="form-group row">
                <label for="modelo_c" class="col-sm-4 col-form-label">Modelo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="modelo_c" name="modelo_c">
                </div>
              </div>
              <div class="form-group row">
                <label for="serie_c" class="col-sm-4 col-form-label">Número de serie</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="serie_c" name="num_serie_c">
                </div>
              </div>
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
