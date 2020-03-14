<?php include "./header.php"; $li2 = "active"; ?>
<?php include "./ul.php" ?>
  <!-- page scripts -->
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
 <script src="fn/report.js" charset="utf-8"></script>
 
  <section>
    <!--  Bootstrap navs -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary active" id="index-1" data-toggle="pill" href="#section-1" role="tab" aria-controls="section-1" aria-selected="true">
              <h2>Pendientes</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-2" data-toggle="pill" href="#section-2" role="tab" aria-controls="section-2" aria-selected="false">
              <h2>Atender</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-3" data-toggle="pill" href="#section-3" role="tab" aria-controls="section-3" aria-selected="false">
              <h2>Historial</h2>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-primary" id="index-4" data-toggle="pill" href="#section-4" role="tab" aria-controls="section-4" aria-selected="false">
              <h2>Detalles</h2>
            </a>
          </li>
        </ul>
        <!--navs -->
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="section-1" role="tabpanel" aria-labelledby="index-1">
            <table id="pendientes" width=100% class="table">
            </table>

          </div>
          <div class="tab-pane fade" id="section-2" role="tabpanel" aria-labelledby="index-2">
            <div id="edicion" class="">
              <div class="col-6">
                    <label for="buscador">Atender por ID de reporte:</label>
                        <input type="text" class="form-control" id="buscador" name="buscador" placeholder="####">
                        <button id="editar"  class="btn btn-danger" name="" value="buscar">Buscar</button>
                      </div>
            </div>
            <div id="atender" class="">
            </div>
          </div>
          <div class="tab-pane fade" id="section-3" role="tabpanel" aria-labelledby="index-3">

            <table id="historial" style='width : 100%!important'>
            </table>


          </div>
          <div class="tab-pane fade" id="section-4" role="tabpanel" aria-labelledby="index-4">

            <div class="col-6">
              <label for="buscador">Buscar en el historial por ID de Reporte:</label>
              <input type="text" class="form-control" id="buscarh" name="buscador" placeholder="####">
              <input type="button" class="btn btn-danger" id="verhist" name="" value="Buscar">
            </div>

            <div id="detalles">
            </div>
          </div>
        </div>
    <!--  Bootstrap navs -->
</section>
</div>
</body>
</html>
