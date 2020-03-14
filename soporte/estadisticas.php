  <?php include "./header.php" ?>
  <?php $li8='active'; ?>
  <?php include "./ul.php" ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.js" integrity="sha256-xWq811jWtpNFuV8sXFtLWGYcNdTdHKe4phSg0svZIt0=" crossorigin="anonymous"></script>
  <script src="fn/stats.js"></script>
  
  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Totales</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Fechas</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Áreas</h2>
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-4" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">
              <h2>Personalizadas</h2>
            </a>
          </li>-->
        </ul>
        <!--navs -->
          <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <div id="total">
            </div>
          </div>
          <div class="tab-pane fade " id="section-2" role="tabpanel" aria-labelledby="index-2">
            <label for="date1">Fecha inicial: </label>
            <div class="col-6">
            <input class="form-control" type="date" name="init" value="">
           </div>
            <br>
            <label for="date2">Fecha final: </label>
            <div class="col-6">
            <input class="form-control" type="date" name="fin" value="">
            </div>
            <br>
            <input class="btn btn-danger" type="button" id="consulta_fecha" value="Buscar por rango de fechas">
            <div id="rango">
            </div>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">
            <select id="areaList" name="">
              <option value="">Seleccione una opción</option>
            </select>
              <div id="stats_area">
              </div>
          </div>
          <!--sin funcionalidad por el momento-->
          <!--<div class="tab-pane fade" id="section-4" role="tabpanel" aria-labelledby="index-4">
            cuatlo
          </div>-->
        </div>
    <!--  Bootstrap navs -->
</section>
</body>
</html>
