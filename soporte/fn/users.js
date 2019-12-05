$(document).ready(function(){
//==================================Ver Lista Usuarios====================================
//carga de areas
  $(load());
  function load() {
    $.ajax({
      url: 'fn/users.php',
      type: 'POST',
      dataType: 'html',
      data: { action:'load_area'}
    })
    .done(function(optarea) {
      $(".areaList").append(optarea)
      $("datalist#sel option").removeAttr("value");
    })
  }
//carga de areas
//visualizar usuarios
  $("#selection").change(function viewUsers(){
      var area = $(this).val()
      $.ajax({
        url: 'fn/users.php',
        type: 'POST',
        dataType: 'html',
        data: {action:'load_users', area:area}
      })
      .done(function(dis) {
        $(".respuesta").html(dis)
        var  total =  $("table").find(".usr").length
        $("table").find(".total").html(`total ${total}`)
      })
   })
   //visualizar usuarios
//==================================Ver Lista Usuarios====================================

//==================================Agregar Usuarios====================================
   /*validacion*/
   $(document).on("input", "input:visible, select:visible", function(){
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
     // var inputs = $("#n_reporte").find('input, textarea, select')
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
   }
   /*validacion*/
   //cargar equipos
   $("#adicion, #edicion_area").on('input', function(){
       var required = $(this).val()
       var ask = $(this)[0].id

           $.ajax({
             url: 'fn/users.php',
             type: 'POST',
             dataType: 'html',
             data: {action:'load_pc', required:required}
           })
           .done(function(equipos) {
             switch (ask) {
               case 'adicion':
                $('#disponibles').html(equipos)
                 break;
               case 'edicion_area':
                $('#edicion_equipo').html(equipos)
                 break;
             }
           })
           .fail(function(){
             console.log(equipos)
           })
         })
     //cargar equipos
     //Crear Usuario
    $("#crearUsuario").click(function(){
      var createarea = $("#adicion").val()
      var createuser = $("input[name='user']").val()
      var createnombre = $("input[name='person']").val()
      var createequipo = $("#disponibles").val()

      vald();
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
      title: "¿Crear usuario?",
      text: `Nombre Usuario ${createuser}
             Responsable ${createnombre}`,
      icon: "info",
      buttons: [
          'cancelar',
          'Si!'
        ],
      }).then(
         function (del) {
           if (del) {
             $.ajax({
               url: 'fn/users.php',
               type: 'POST',
               data: {action:'save_user', createarea: createarea, createuser: createuser, createnombre: createnombre, createequipo: createequipo},
             })
             .done(function(respuesta) {
               swal(respuesta);
             })
             .fail(function(){
               console.log(data)
             })
           }
        })
    });
   //Crear Usuario
   //borrar usuario
   $(document).on("click","button.delete", function(){
     var id = $(this).prop("value")
     swal({
     title: "Eliminar Usuario",
     text: `Eliminar Usuario con Id ${id}`,
     icon: "warning",
     buttons: [
         'cancelar',
         'Si!'
       ],
     }).then(
        function (del) {
          if (del) {
            $.ajax({
              url: 'fn/users.php',
              type: 'POST',
              data: {action:'del_user', delete: id},
            })
            .done(function(respuesta) {
              swal(respuesta);
            })
            .fail(function(){
              console.log(data)
            })
          }
       })
   })
   //borrar usuario
//==================================Agregar Usuarios====================================
//==================================Editar Usuarios====================================
//mandar a edicion
$(document).on('click', '.editar', function(){
  var id_usuario = $(this).attr('value')
  swal({
  title: "Editar Usuario",
  text: `Editar Usuario con Id ${id_usuario}`,
  icon: "info",
  buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
     function (del) {
       if (del) {
         $('#user_to_edit').val(id_usuario)
         $('#cargarEdicion').trigger('click')
         $('#index-3').trigger('click')
       }
    })
})
//cargar datos de edicion
$(document).on('click', '#cargarEdicion', function(){
  var cargar_datos = $('#user_to_edit').val()
  $.ajax({
    url: 'fn/users.php',
    type: 'POST',
    dataType:'json',
    data: {action:'load_edit', id: cargar_datos},
  })
  .done(function(respuesta) {
  $("form").find(".error").removeClass("error")

    if (respuesta == 'No Existe el id ingresado') {
      swal(respuesta, '', 'error')
    }else {
    $("input[name='edicion_nombre']").val(respuesta['nombre_usuario'])
    $(`#edicion_area option[value=${respuesta['id_area']}]`).prop('selected',true)
    $("input[name='edicion_responsable']").val(respuesta['nombre_responsable'])
    $("#edicion_equipo").html(`<option value=${respuesta['id_equipo']}>${respuesta['nombre_equipo']}</option>`)
  }
    console.log(respuesta);
  })
  .fail(function(data){
    console.log(data)
  })
})
//cargar datos de edicion
//actualizar datos
$("#editUser").click(function(){
  let id_edicion = $('#user_to_edit').val();
  let nombre_edicion = $("input[name='edicion_nombre']").val()
  let area_edicion =  $(`#edicion_area`).val()
  let responsable_edicion =  $("input[name='edicion_responsable']").val()
  let equipo_edicion =  $("#edicion_equipo").val()

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
  title: "¿Guardar cambios?",
  text: `Se actualizara el Usuario ${id_edicion}`,
  icon: "info",
  buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
     function (edit) {
       if (edit) {
         $.ajax({
           url: 'fn/users.php',
           type: 'POST',
           dataType:'html',
           data: {action:'guardar_edicion',
           id: id_edicion,
           nombre_edicion:nombre_edicion,
           area_edicion:area_edicion,
           responsable_edicion:responsable_edicion,
           equipo_edicion:equipo_edicion
         },
       })
       .done(function(response){
         $('form#editar_usuario')[0].reset()
         swal(response)
       })

       }
    })
})
//actualizar datos

//==================================Editar Usuarios====================================

});
