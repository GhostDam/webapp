<header>
   <nav class="session">
    <li> Bienvenido: <?php echo $_SESSION["usuario"]; ?>  </li>
    <a class="btn btn-outline-danger" href="fn/close.php">Cerrar Sesión</a> </li> 
<!--<button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span> cerrar
</button>-->
<!-- <span class="glyphicon glyphicon-off" aria-hidden="true"></span> -->
  </nav>
</header>
<div class="container-fluid">
<script>
  var type = '<?php echo $_SESSION['tipo_admin']; ?>';

  if ('<?php echo $_SESSION['tipo_admin']; ?>' == 'master') {
    $(document).ready(function(){
      $(".admin").show();
    })
  }else {
    $(document).ready(function(){
      $(".admin").remove();
    })
  }
//tested
</script>
