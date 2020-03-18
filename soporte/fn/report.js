//==================================Pendientes====================================
$(document).ready(function(){
  $.ajax({
      data:{"action":"vrep"},
      type:"POST",
      dataType:"json",
      url:"fn/report.php"
    }).done(function(data){
      console.log(data) //array
      if (data=='No hay reportes pendientes') {
            $("#pendientes").html(data)
            return false;
      }
      $("#pendientes").DataTable({
          data: data,
        order: [[0, 'desc']],
        columns: [
            { title: "ID", data:"id_reporte" },
            { title: "Fecha", data:"fecha" },
            { title: "Hora", data:"hora" },
            { title: "Persona que reporta", data:"nombre" },
            { title: "Asunto", data:"asunto" },
            { title: "Descripción", data:"descripcion" },
            { title: "Estado actual", data:"status" },
            { title: "Atender", data: "id_reporte", render: function(id){ return `<button class='btn btn-danger atender' value="${id}">Atender</button>`}},

        ],
        "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        })
    })
    .fail(function(err){
      console.log(err);
    });

})
/*cargar pendients*/
/*enviar a attend*/
  $(document).on("click", ".atender", function(){
    var id = $(this).prop('value');
    //swal
    swal({
    title: "Atender reporte",
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
      data: {action:'edit', consulta: consulta},
    })
    .done(function(respuesta) {
      $("#atender").html(respuesta);
    })
    .fail(function(){
      console.log("error");
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
      title:"Verifique el formulario",
      text:"El formulario está vacío, incompleto o contiene carácteres no válidos",
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
        send+="&action=save_edit";
        console.log(send)

        $.ajax({
          url: 'fn/report.php',
          type: 'POST',
          dataType: 'html',
          data: send,
        })
        .done(function(respuesta) {
          $('form#edit_reporte')[0].reset()
          swal("Hecho!" , respuesta, "success");
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
$(document).ready(function(){
    $.ajax({
      url:'fn/report.php',
      dataType:'json',
      type:'post',
      data:{action:'historial'},
    }).done(function(load){ //load = total registros
      console.log(load['id_reporte']) //objeto
      console.log(load[0].id_reporte) //objeto

      if (load=='No hay reportes en el historial.') {
      $("#historial").html(load)

        return false;
      }
      $("#historial").DataTable({
          data: load,
        order: [[0, 'desc']],
        columns: [
          { title: "ID",  data: "id_reporte"  }, //data: "id_reporte"
          { title: "Fecha", data: "fecha" },
          { title: "Descripción", data: "descripcion" },
          { title: "Asunto", data: "asunto" },
          { title: "Persona que reportó" , data: "nombre"},
          { title: "Estado actual", data: "status" },
          { title: "Detalles", data: "id_reporte", render: function(id_reporte){ return `<button class='btn btn-danger detalles' value="${id_reporte}">Detalles</button>`} },
        ],
        // "language": {
        //       "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        //   }
        language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                      "copy": "Copiar",
                      "colvis": "Visibilidad"
                    }
                  }
        })

    })
    .fail(function(err){
      console.log(err)
    })

})
//carga de total
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
      data: {action: 'ask', nrep:consulta},
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
