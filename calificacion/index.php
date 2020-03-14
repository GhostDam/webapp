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
    <script src="js/jquery-3.4.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="header-principal">
        <div class="#">
            <h1>Bienvenido al  Sistema de Calificación de Reportes</h1>
        </div>
    </header>
    <div class="principal">
        </div>
        <div class="registro">
            <form class="folio-reporte" id="folio-reporte" method="post" action="post.php">
                <fieldset>
                    <label for="reporte">Ingrese tu número de Reporte:</label>
                     <input type="number" min='0' name="reporte" id="reporte" required>
                     <button type="submit" class="button btn btn-primary" value="Continuar">Continuar</button>
                </fieldset>
            </form>
        </div>
    </div>

    <footer class="site-footer">
        <div class="contenedor">
            <h3>Aclaraciones</h3>
            <p>Si tienes dudas sobre tu reporte, comunícate con el Departamento de Soporte Técnico a la Ext: 1465</p>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>
