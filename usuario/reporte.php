
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Reportes IMJUVE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="css/master.css">
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
    <script src="fn/main.js" charset="utf-8"></script>
  </head>
  <body>
    <main>
      <div class="contenedor">
        <h1>Formulario para reporte de fallos</h1>
        <div class="container-fluid">
          <form id="n_reporte" autocomplete="off">
          <div class="row">
            <div class="col-12 d-flex justify-content-around">
              <div class="form-group">
                <label for="area">Area</label>
                <input class="form-control" list="opt" type="text" id="area" name="area" placeholder="ingresa aqui tu area" required>
                <datalist id="opt">

                </datalist>
              </div>
              <div class="form-group">
                <label for="encargado">Encargado de area</label>
                <input class="form-control" type="text" id="encargado" name="encargado" readonly placeholder="Autollenado" required>
              </div>
            </div>
            <div class="col-12 d-flex align-items-center columna-2 justify-content-around">
              <div class="form-group hide">
                <input class="form-control" type="text" placeholder="marca" id="marca" name="marca">
                <input class="form-control" type="text" placeholder="modelo" id="modelo" name="modelo">
                <input class="form-control" type="text" placeholder="serie" id="no_serie" name="serie">
                <input class="form-control" type="text" placeholder="oc" id="inventario" name="inventario">
              </div>

              <div class="form-group">
                <label for="nombre">Usuario</label>
                <select class="form-control" type="text" id="usuario" name="usuario" required>
                  <option value="" selected>Selecciona tu usuario</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nombre">Persona que reporta</label>
                <input list='opt_nombre' class="form-control" type="text" id="nombre" name="nombre" placeholder="ingresa aqui tu nombre" required>
                <datalist id="opt_nombre">

                </datalist>
              </div>
              <div class="form-group">
                <label for="equipo">Asunto</label>
                <input class="form-control" type="text" id="equipo" name="asunto" placeholder="cual es tu problema" required>
              </div>

            </div>
            <div class="col-12 columna-3">
              <div class="form-group">
                <label for="textarea">Descripcion del problema</label>
                <textarea class="form-control" name="descripcion" required></textarea>
              </div>

              <div class="form-group">
                <input type="button" class="submit btn btn-info" value="Reportar" id="sbmt">
              </div>

            </div>

              </form>
          </div>
        </div>
      </div><!--contenedor-->
    </main>
  </body>
</html>
