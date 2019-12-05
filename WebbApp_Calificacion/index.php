<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Meta etiquetas PWA -->
    <meta name="theme-color" content="#e9d8bd">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-webb-app-capable" content="yes">
    <meta name="apple-mobile-webb-app-status-bar-style" content="black-translucent">
    <!-- Manifiesto de la PWA -->
    <link rel="manifest" href="manifest.json">
    <title>Calificacion de Reporte</title>
    <link rel="shortcut icon" type="image/png" href="img/imjuve/Logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
    <header class="header-principal">
        <div class="#">
            <h1>Bienvenido al  Sistema de Calificación de Reportes</h1>
        </div>
    </header>

    <div class="principal">
        <div class="imagen-imjuve"></div>
        <div class="registro">
             <!--<form class="folio-reporte" id="folio-reporte" action="php/calificacion.php" method="get">-->
            <form class="folio-reporte" id="folio-reporte"> 
                <!--<a href="calificacion.html"></a>-->
                <fieldset>
                    <label for="reporte">Por favor ingresa tu número de Reporte:</label>
                     <input type="number" name="reporte" id="reporte" required>
                     <input type="submit" class="button" value="Continuar">
                </fieldset>
            </form>
        </div>
    </div>  

    <footer class="site-footer">
        <div class="contenedor">
            <h3>Aclaraciones</h3>
            <p>Si tienes dudas sobre tu reporte, comunicate con el Departamento de Soporte Técnico a la Ext: 1465</p>
        </div>
    </footer>



</body>
</html>
<script src="js/jquery-3.4.1.js"></script>
<script src="main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#folio-reporte").on('submit', function(e){
            e.preventDefault();
            var data = new FormData($("#folio-reporte")[0]);
            $.ajax({
                url: "php/vregistro.php", // verificar registros existentes
                method: "POST",
                data: data,
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                success: function(resp){
                    console.log(resp);
                    if(resp.existe){
                        alert(resp.mensaje);
                        window.location("../index.php");
                    }else{
                        window.location.href ="php/calificacion.php?reporte="+resp.id;
                    }
                }, 
                error: function(e){
                    console.log(e);
                }
            })
        })
    })

</script>

