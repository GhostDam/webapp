$(document).ready(function(){
//carga de areas
  $(load());
  function load() {
    $.ajax({
      url: 'fn/inventory.php',
      dataType: 'html',
      type: 'POST',
      data: {action:'load_area'},
    })
    .done(function(optarea) {
      $(".invList").append(optarea)
      $("datalist#sel option").removeAttr("value");
    })
    .fail(function(err){
      console.log(err)
    })
  }
//carga de areas
//visualizar equipos
  $("#selection").change(function(){
    var area = $(this).val()
        $.ajax({
          url: 'fn/inventory.php',
          type: 'POST',
          dataType: 'html',
          data: {action:'tabla_equipos', area:area}
        })
        .done(function(dis) {
          $(".respuesta").html(dis)
        var total = $("table").find(".items").length
        $("table").find(".total").html(`Total ${total}`)
        })
   })
  //visualizar equipos
//trigger details
$(document).on("click", ".detalles", function(){
  var id = $(this).val()
  $("#search").val(id);
  $("#detailed").trigger("click");
  $("#index-2").trigger("click");
})
//trigger details
  //detalles de inventario por equipo
  $("#detailed").click(function(){
    var id_equipo = $("#search").val();
    $.ajax({
      url: "fn/inventory.php",
      dataType: "html",
      type: "post",
      data: {action:'detalles', detalles: id_equipo}
    })
    .done(function(respuesta){
      $("#componentes").html(respuesta)
    })
  })
  //detalles de inventario por equipo
});
//agregar nuevo equipo


//control display form agregar inventario
$(document).ready(function(){
  $("input[type='checkbox']").click(function(){
    var field = $(this).closest('fieldset')

    if ($(field).prop('disabled')) {
      $(field).removeAttr('disabled')
    }else {
      $(field).prop('disabled', true)
      $(field).find('input').removeClass("error")
    }
  })
})
//validaciones
$(document).on("input", "input, select", function(){
  var char = /[!"#$%&/=?¡"]/g

  if ($(this).val()=='') {
    $(this).addClass("error")
  }else if ($(this).val().match(char)) {
    $(this).addClass("error")
  }else {
    $(this).removeClass("error")
  }
})

function vald(){
  var inputs = $("input:enabled:visible[type='text'], select")
  var char = /[!"#$%&/=?¡"]/g

  $(inputs).each(function(){
    if ($(this).val()=='') {
      $(this).addClass("error")
    }
    else if($(this).val().match(char)){
      $(this).addClass("error")
    }else {
    $(this).removeClass("error")
    }
  })
}


$(document).on('click', '#crear_equipo', function(){
  let serial = $("form#nuevo_equipo").serialize(); //array con el contendido del form
  serial+="&action=nuevo_equipo";                  //append {data:'value'}

  vald()
  if ($(".error:visible").length>0) {
    swal({
      title:"verifica el formulario por favor",
      text:"El formulario esta vacío o contiene carácteres no válidos",
      icon:"error",
    })
    $($(".error:visible")).focus();
    return false;
  }
  swal({
    title: "Crear Equipo",
    text: `¿Agregar un nuevo equipo al inventario?`,
    icon: "info",
    buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
    function (valid) {
      if (valid) {
        // let serial=new FormData($("form#nuevo_equipo")[0]);
        // serial.append('action','nuevo_equipo');
        // console.log(serial);

        $.ajax({
          url: "fn/inventory.php",
          dataType: "html",
          type: "post",
          // processData: false,  // tell jQuery not to process the data FormData
          // contentType: false,   // tell jQuery not to set contentType FormData
          data: serial
        })
        .done(function(respuesta){
          $('form#nuevo_equipo')[0].reset()
          swal(respuesta)
          console.log(respuesta)
        })
      }
    })
})
