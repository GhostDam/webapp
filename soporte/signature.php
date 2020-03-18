<?php include "./header.php" ?>
<?php $li7='active'; ?>
<?php include "./ul.php" ?>

  <script src="fn/signature.js"></script>

  <section>

    <div class='card'>
        <h5 class="card-header">
            Firmar reporte
        </h5>
            <div class="row mb-3 align-items-center">
                <div class="col-lg-2 col-md-12 text-right">
                    <span>Id del reporte</span>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="input-group">
                        <input name="num" class="form-control" placeholder="Área o usuario" aria-label="Usuario" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button id="consulta" class='input-group-text btn-small btn-outline-secondary'>
                                Consult
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </div>







       <form class='firmar text-center hide'>
        <label>Reporte a firmar</label>
        <input type="text" id='toSign' readonly>  

        <hr>
        <h3>En general,¿Qué tan satisfecho esta usted con el servicio?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="calidad" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
        </div>

        <hr>

        <h3>¿Cuál fue el nivel de atención del servicio?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="atencion" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
        </div>

        <hr>

        <h3>¿Cómo calificaría el tiempo de respuesta?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="profesion" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
            </div>

            <hr>

        <h3>¿Su problema o duda se resolvió?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="excelente">
            <label class="form-check-label" for="Excelente">Excelente</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="bueno">
            <label class="form-check-label" for="Bueno">Bueno</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="regular">
            <label class="form-check-label" for="Regular">Regular</label>
            </div>

            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tiempo" value="malo">
            <label class="form-check-label" for="Malo">Malo</label>
            </div>

        <br>
        <hr>

        
        <h3>¿Tu problema o duda se resolvió?</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="solucion" value="si">
            <label class="form-check-label" for="Regular">Si</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="solucion" value="no">
            <label class="form-check-label" for="Malo">No</label>
          </div>

      <!--Canvas-->
        <canvas id="canvas">Su navegador no soporta canvas :( </canvas>
        <div class="buttons text-center">
          <button id="limpiar" type='button' class="btn btn-danger">Limpiar firma</button>
          <button id="download" type="button" class="btn btn-danger">Guardar firma</button>
        </div>
      <!--Canvas-->
    </form>

</section>

</body>
</html>
