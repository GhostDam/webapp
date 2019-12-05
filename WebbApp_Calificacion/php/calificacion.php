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
    <link rel="shortcut icon" type="image/png" href="img/imjuve/Logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
<?php
include_once('conexion.php');

 date_default_timezone_set('America/Mexico_City');
 $fecha=date("Y-m-d  H:i:s");
 $id_reporte = $_GET['reporte'];


 $sql="SELECT * FROM calificacion  WHERE id=$id_reporte";
 $resultado=$conexion->query($sql) or die(mysqli_error($conexion));
 var_dump($resultado);
 if($resultado->num_rows>=1){
    echo "<script language='javascript'>alert('Ya se califico este reporte'); window.location.href='../index.php';</script>";
}
?>

<main>
    <div class="container">
        <h2>Por favor, ayudanos calificando la experiencia de tu servicio.</h2>
        <div class="col-md-12">
            <!-- <form action="querys.php" method="POST"> -->
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
                    <label class="control-label" for="calificacion">Califica como fue tu servicio</label>
                    <select class="form-control" name="calificacion" id="calificacion" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="atencion">Nivel de atención otorgado</label>
                    <select class="form-control" name="atencion" id="atencion" required>
                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label" for="respuesta">El tiempo de respuesta a tu problema fue:</label>
                    <select class="form-control" name="respuesta" id="respuesta" required>

                        <option value="" disabled selected>--Selecciona--</option>
                        <option value="excelente" name="excelente">Excelente</option>
                        <option value="bueno" name="bueno">Bueno</option>
                        <option value="regular" name="regular">Regular</option>
                        <option value="malo" name="malo">Malo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha y hora
                        <input type="datetime" name="fecha" id="fecha" value="<?= $fecha?>" placeholder="<?= $fecha?>">
                    </label>
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
                                <input id="btnSubmitSign" type="button" data-inline="true" data-mini="true" data-theme="b" value="Guardar firma" onclick="fun_submit()"/>
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
<script src="../main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#servicio").on('submit', function(e){
            e.preventDefault();
            var data = new FormData($("#servicio")[0]);
            $.ajax({
                url: "querys.php", //registro guardado
                method: "POST",
                data: data,
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(respuesta){
                    console.log(respuesta);
                    alert(respuesta.mensaje);
                    window.location.href="../index.php";
                    // if(respuesta.guardado){
                    //     window.location("./index.php");
                    // }else{
                    //     window.location.href ="querys.php?reporte="+respuesta.id;
                    // }
                },
                error: function(e){
                    console.log(e);
                }

            })
        })

    })
</script>
