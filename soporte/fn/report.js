//==================================Pendientes====================================
/*cargar pendients*/
  // $(document).ready(function cargar_reporte(){
  //   $.ajax({
  //     url:'fn/report.php',
  //     type:'POST',
  //     dataType:'html',
  //     data:{to:'vrep'}
  //   })
  //   .done(function(vrep){
  //     $("#mostrar").html(vrep)
  //   })
  // })
/*paginar pendients*/
// carga();//total registros
// vista(0);//vista registros

$(document).ready(function cargar_reporte(){
  $.ajax({
    url:'fn/report.php',
    type:'POST',
    dataType:'html',
    data:{to:'vrep'}
  })
  .done(function(vrep){
    pend = vrep/10;
    pend = Math.ceil(pend)
    $("#mostrar").html(vrep)
  })
})
// for (var i = 1; i <= nums; i++) {
//   // $('#pages').append(`<li class=${i-1} page-item>${i}</li>`)
//   $('#pages').append(`<li class='${i-1} page-item'><a class="page-link" href="#">${i}</a></li>`)
//
// //
//
// }
// $("#pages li:first").addClass("active")

//carga de total
//vista
// $(document).on('click', '#pages li', function(){
//   $("#pages li").removeClass("active");
//   $(this).addClass("active")
//   var where = $(this).attr('class');
//   var where = parseInt(where)
//   vista(where*10);
// });
// function vista(start){
//   $.ajax({
//     url: 'fn/report.php',
//     type: 'POST',
//     dataType:'html',
//     data:{to:'view', start:start}
//   })
//   .done(function(vista){
//     $("#historial").html(vista);
//   })
// }
//vista


/*cargar pendients*/
/*enviar a attend*/
  $(document).on("click", ".atender", function(){
    var id = $(this).prop('value');
    //swal
    swal({
    title: "Atender Reporte",
    text: `Atender reporte con ID ${id}`,
    icon: "info",
    buttons: [
        'Cancelar',
        'Aceptar'
      ],
    }).then(
       function (yes) {
         if (yes) {
           $('#buscador').val(id)
           $('#editar').trigger('click')
           $("#index-2").trigger('click')
         }
      })
      //swal
  })
/*enviar a attend*/
/*Enviar a firma reportes por firmar*/
$(document).on("click", ".firmar", function(){
  var url = 'http://localhost/JCF/imjuve/sistema%20soporte/soporte/signature.php'
  var id = $(this).prop('value');
  var redir = `${url}#${id}`
  //swal
  swal({
  title: "Firmar Reporte",
  text: `Firmar reporte con ID ${id}`,
  icon: "info",
  buttons: [
      'Cancelar',
      'Aceptar'
    ],
  }).then(
     function (yes) {
       if (yes) {
         window.location.href=redir
       }
    })
    //swal
})
/*Enviar a firma reportes por firmar*/
//==================================Pendientes====================================
//==================================Atender====================================
/*Edicion de Reportes-consulta*/
$(document).on('click', '#editar', function(){
  var valor =$("#buscador").val();
  atender_reportes(valor);
  function atender_reportes(consulta) {
    $.ajax({
      url: 'fn/report.php',
      type: 'POST',
      dataType: 'html',
      data: {to:'edit', consulta: consulta},
    })
    .done(function(respuesta) {
      $("#atender").html(respuesta);
    })
    .fail(function(){
      console.log("error")
    })
  }
});
$(document).on('click', '#btnEdit', function(e){
  e.preventDefault();
  var inputs = $("input:visible, textarea:visible, select:visible")
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
  if ($(".error:visible").length>0) {
    swal({
      title:"Verifica el formulario",
      text:"El formulario esta vacío, incompleto o contiene carácteres no válidos",
      icon:"error",
    })
    $($(".error:visible")).focus();
    return false;
  }
  form = $("form#edit_reporte")
  swal({
    title: "Editar reporte",
    text: `¿Confirmar?`,
    icon: "info",
    buttons: [
      'Cancelar',
      'Aceptar'
    ],
  }).then(
    function (valid) {
      if (valid) {
        form = $("form#edit_reporte")
        var send = $(form).serialize()
        send+="&to=save_edit";
        console.log(send)

        $.ajax({
          url: 'fn/report.php',
          type: 'POST',
          dataType: 'html',
          data: send,
        })
        .done(function(respuesta) {
          $('form#edit_reporte')[0].reset()
          swal(respuesta);
        })
        .fail(function(){
          console.log("error")
        })
      }
    })

})
/*Edicion de Reportes*/
//==================================Atender====================================
//==================================Historial====================================
//carga de total
carga();//total registros
vista(0);//vista registros

function carga(){
  $.ajax({
    url:'fn/report.php',
    dataType:'html',
    type:'post',
    data:{to:'load'},
  }).done(function(load){ //load = total registros
    nums = load/10;
    nums = Math.ceil(nums)
    for (var i = 1; i <= nums; i++) {
      // $('#pages').append(`<li class=${i-1} page-item>${i}</li>`)
      $('#pages').append(`<li class='${i-1} page-item'><a class="page-link" href="#">${i}</a></li>`)

//

    }
    $("#pages li:first").addClass("active")
  })
}
//carga de total
//vista
$(document).on('click', '#pages li', function(){
  $("#pages li").removeClass("active");
  $(this).addClass("active")
  var where = $(this).attr('class');
  var where = parseInt(where)
  vista(where*10);
});
function vista(start){
  $.ajax({
    url: 'fn/report.php',
    type: 'POST',
    dataType:'html',
    data:{to:'view', start:start}
  })
  .done(function(vista){
    $("#historial").html(vista);
  })
}
//vista
//==================================Historial====================================
//==================================detalles====================================
//ver detalles
$(document).on('click', '#verhist', function(){
  var valor =$("#buscarh").val();
  historial(valor);
  function historial(consulta) {
    $.ajax({
      url: 'fn/report.php',
      type: 'POST',
      dataType: 'html',
      data: {to: 'ask', nrep:consulta},
    })
    .done(function(respuesta) {
      $("#detalles").html(respuesta);
    })
  }
});
//ver detalles
$(document).on("click", ".detalles", function(){
  var id=$(this).val()
  $("#buscarh").val(id);
  $("#index-4").trigger('click');
  $("#verhist").trigger('click');
})
//==================================detalles====================================
