<header>
  <!-- <img src="md/imjuve.png" alt=""> -->
  <nav class="session">
    <li> Bienvenido: <?php echo $_SESSION["usuario"]; ?>  </li>
    <li> <a href="fn/close.php">Cerrar Sesión</a> </li>
  </nav>
</header>
<script>
  var type = '<?php echo $_SESSION['tipo_admin']; ?>';

  if ('<?php echo $_SESSION['tipo_admin']; ?>' == 'master') {
    $(document).ready(function(){
      $(".index .admin").show();
    })
  }else {
    $(document).ready(function(){
      $("div .admin").remove();
    })
  }
//tested
</script>
