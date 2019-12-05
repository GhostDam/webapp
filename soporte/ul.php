<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
    <meta name="viewport">
<!--bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<title>Barra de menú</title>
</head>
  <body>
    <div class="wrapper">
      <nav id="sidebar">
     <div class="sidebar-header">
       <h3>Barra de navegacion</h3>
            </div>
   <ul class="list-untyled components">
    <li class="active">
      <a href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">home</a>
      <ul class="collapse list-navbar" id="homesubmenu">

      <li>
          <a href="index.php">Reporte</a>
      </li>
        <li>
        <a href="usuarios.php">">Usuarios</a>
        </li>
         <li>
        <a href="Inventarios.php">Inventario</a>
        </li>
      <li>
    <a href="Personal.php">Personal</a>
        </li>
      <li>
        <a href="signature.php">Signature</a>
      </li>
    <li>
        <a href="config.php">configuraciones</a>
      </li>
    <li>
        <a href="estadisticas.php">Estadisticas</a>
      </li>
        </ul>
      </li>

<!--<div class="beside">
  <nav class="navbar">-->
    <ul class="list-navbar">
      <li><i class="icon icon-menu <?= $li1; ?>"></i><a href="index.php">Inicio</a></li>
      <li><i class="icon-design-graphic-tablet-streamline-tablet <?= $li2 ?>"></i><a href="reporte.php">Reporte<small class="vrep"></small></a></li>
      <li><i class="icon icon-users <?= $li3 ?>"></i><a href="usuarios.php">Usuario</a></li>
      <li><i class="icon icon-clipboard-pencil <?= $li4 ?>"></i><a href="Inventarios.php">Inventario</a></li>
      <li><i class="icon-torso <?= $li6 ?>"></i><a href="Personal.php">Personal</a></li>
      <li><i class="icon icon-pen-streamline-1 <?= $li7 ?>"></i><a href="signature.php">Signature</a></li>
      <li><i class="icon icon-settings-streamline-1 <?= $li5 ?>"></i><a href="config.php">Sistema</a></li>
      <li><i class="icon-caret-right <?= $li8 ?>"></i><a href="estadisticas.php">Estadisticas</a></li>
    </ul>
  </nav>
</div>

<!--<div class="notes">
  <h3>Notas</h3>
  <div id="notas">-->

  </div>
</div>
