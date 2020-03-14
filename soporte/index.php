
<?php include "./header.php"?>
<?php $li1 = "active";?>
<?php include "./ul.php" ?>
<!--  page scripts -->
    <script src="fn/index.js" charset="utf-8"></script>
    <section>

    <!--navs -->
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
        <div class="form-group alert alert-primary">
            <label for="nombre" class="col-sm-12 col-form-label">Ingrese el usuario que reporta:</label>
            <input type="search" list='lista' class="form-control col-12" id="usr" name="nombre" required autocomplete="off" placeholder="Ejemplo: SISTEMAS3" />
            <datalist id="lista">
            </datalist>
        </div>
        <form class='shadow p-5 text-center' action='fn/fnindex.php'  id="n_reporte" autocomplete="off">
          <h3 class=''>Datos de reporte</h3>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Persona que reporta: </label>
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
