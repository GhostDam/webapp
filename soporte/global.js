//==================================Reportes====================================
/*Ver reportes al cargar-document*/
$( document ).ready(function() {
  $(document).load("fn/global.php",function(data){
    $(".vrep").html(data);
  });
})/*document.ready*/
/*Ver reportes al cargar-doc*/

/*Actualizacion y notificacion de reportes-document*/
setInterval(function(){
  count = $(".vrep").html();
  $(document).load("fn/global.php",function(data){
    nrep= data
    if (nrep>=1){
      $(".vrep").html(nrep);
    }
    count2 = $(".vrep").html();
    if (count2>count) {
      swal("Tienes un nuevo reporte", "", "info")      
      // Notification.requestPermission()

      Push.create("Nuevo reporte", {
        body: "Tienes un nuevo reporte",
          //  icon: './md/icon.svg', 
            onClick: function(){
            window.focus();
            this.close();
          }
        });
    }
  });
},5000);
/*Actualizacion y notificacion de reportes-document*/
//==================================Reportes====================================