<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <script src="../js/jquery-3.4.1.js"></script> -->
    <!-- <script src="../js/sign.js"></script>
    <script src="../js/main.js"></script>-->
    <title>Reporte</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="../img/imjuve/Logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php
  $id_reporte = $_GET['reporte'];
?>

<main>
    <div class="container">
        <h2>Por favor, ayudanos calificando la experiencia de tu servicio.</h2>
        <div class="col-md-12">
            <form class="servicio" id="servicio">
            <div class="contenedor">
                <input type="hidden" name="idreporte" value="<?php echo $id_reporte;?>">
                <div class="form-group col-md-6">
                    <label class="control-label" for="resolucion">¿Se resolvio tu problema?</label>
                    <select class="form-control" name="resolucion" id="resolucion" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="si" name="si">Si</option>
                        <option value="no" name="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="calificacion">Califica como fue tu servicio  // calidad del servicio</label>
                    <select class="form-control" name="calidad" id="calidad" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="atencion">Nivel de atención otorgado //nivel de atencion</label>
                    <select class="form-control" name="atencion" id="atencion" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="atencion">Profesionalismo otorgado //nivel profesional</label>
                    <select class="form-control" name="nivel" id="nivel" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="respuesta">El tiempo de respuesta a tu problema fue: //tiempo de respuesta</label>
                    <select class="form-control" name="respuesta" id="respuesta" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
               </div>
               <h3>Firma de conformidad del usuario</h3>
                <div data-role="popup" id="divPopUpSignContract" class="contenedor">
                    <div data-role="header" data-theme="b">
                        <a data-role="button" data-rel="back" data-transition="slide" class="ui-btn-right" onclick="closePopUp()"></a>
                        <p class="popupHeader">Sign Pad</p>
                    </div>
                    <div class="ui-content popUpHeight">
                        <div id="div_signcontract" class="signcontract">
                            <canvas id="canvas">Canvas is not supported</canvas>
                            <div>
                                <input id="btnSubmitSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Guardar firma"/>
                                <input id="btnClearSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Resetear" onclick="init_Sign_Canvas()"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="enviar">
                    <input type="submit" class="button" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <footer class="site-footer">
        <div class="contenedor">
            <h3>Aclaraciones</h3>
            <p>Si tienes dudas sobre tu reporte, comunicate con el Departamento de Soporte Técnico a la Ext: 1465</p>
        </div>
    </footer>
</main>

</body>
</html>
<!-- <script src="../jquery/jquery.min.js"></script>
<script src="../js/sign.js"></script> -->
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/sign.js"></script>
<script src="../js/main.js"></script>
