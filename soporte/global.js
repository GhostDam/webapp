//==================================Reportes====================================
$( document ).ready(function() {
/*Ver reportes al cargar-document*/
  $(document).load("fn/global.php",function(data){
    $(".vrep").html(data);
  });
/*Ver reportes al cargar-doc*/
/*Actualizacion y notificacion de reportes-document*/
})/*document.ready*/
setInterval(function(){
  count = $(".vrep").html();
  $(document).load("fn/global.php",function(data){
    nrep= data
    if (nrep>=1){
      $(".vrep").html(nrep);
    }
    count2 = $(".vrep").html();
    if (count2>count) {
      $('body').append('<embed src="md/xb.mp3" type="audio/mp3" autostart="true" hidden="true" loop="false">');
      swal("Nuevo reporte", "", "info")
    }
  });
},5000);
/*Actualizacion y notificacion de reportes-document*/
//==================================Reportes====================================
