//==================================lista de personal====================================
//cargado de direcciones
$(document).ready(function(){
  $.ajax({
    url:'fn/person.php',
    dataType:'json',
    type:'POST',
    data:{action:'load'}
  })
  .done(function(list){
    for (var i = 0; i < list.length; i++) {
      $("#direcciones").append(`<div class='tardir'><div class='direccion' value='${list[i]['id_direccion']}'>${list[i]['direccion']}</div></div>`)
      $('select[class="dirList"]').append(`<option value='${list[i]['id_direccion']}'>${list[i]['direccion']}</option>`)
    }
  })
})
//cargado de direcciones
//cargado de areas y personal
$(document).on('click', '.direccion', function(){
  var val = $(this).attr('value')
  var div = $(this)
  if ($(this).parent().children().length>1) {
    $(this).nextAll('div').toggle()
    return false;
  }
  $.ajax({
    url:'fn/person.php',
    dataType:'json',
    type:'POST',
    data:{action:'area', area:val}
  })
  .done(function(lista){
    $(div).parent().append(lista[0])
    $(div).parent().append(`<div class='personal'> ${lista[1]} </div>`)
  })
  .fail(function(dsa){console.log(dsa)})
})
//==================================lista de personal====================================
$(document).on('input', 'input, select', function(){
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
  var inputs = $("input:visible, select:visible")
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
//==================================agregar personal====================================
//*carga de areas en encargados*//
$(document).on('change', "select[class='tipo_empleado']", function(){
  console.log($(this).val())
  if ($(this).val()=='encargado') {
    $.ajax({
      url: 'fn/users.php',
      type: 'POST',
      dataType: 'html',
      data: {action:'load_area'}
    })
    .done(function(optarea) {
      $("select[class='areaList']").html(optarea)
    })
    $('.nuevo_responsable').show()
  }else {
    $('.nuevo_responsable').hide()
  }
})
//*carga de areas en encargados*//
$(document).on('click', '#agregar_personal', function(){
  data = $('#n_personal').serialize()
  data += "&action=agregar_usuario";
  vald()
  if ($(".error:visible").length>0) {
      swal("Verifica el formulario",
           "El formulario esta vacío, incompleto o contiene carácteres no válidos",
           "error")
          return false
  }
  swal({
    title: "Personal",
    text: `¿Agregar personal?`,
    icon: "info",
    buttons: [
      'Cancelar',
      'Aceptar'
    ],
  }).then(
    function (valid) {
      if (valid) {
        $.ajax({
          url:'fn/person.php',
          dataType:'html',
          type:'POST',
          data: data
        })
        .done(function(response){
          swal(response, '', 'success')
        })
      }
    })
})
//==================================Editar personal====================================
$(document).on('click', '#carga_edicion', function(){
  var id_edit = $('input[name="id_editar"]').val()
        $.ajax({
          url:'fn/person.php',
          dataType:'JSON',
          type:'POST',
          data: {action:'carga_edicion', id_edit:id_edit}
        })
        .done(function(response){
          $('#edit_personal').find('.error').removeClass('error');
          if (response == 'Id de personal no econtrado') {
            swal(response, '', 'error')
            return false;
          }
          $('input[name="edit_empleado"]').val(response[0]['nombre_personal']);
          $(`.dirList option[value=${response[0]['id_direccion']}]`).prop('selected',true)
          $(`select[name="edit_tipo"] option[value=${response[0]['tipo_personal']}]`).prop('selected',true)
          console.log(response)
        })
})

$(function(){
  $("#editar_personal").click(function(){
    var form= $('#edit_personal').serialize();
    form+='&action=editar_personal'
    vald();
    if ($(".error:visible").length>0) {
        swal("verifica el formulario por favor",
             "El formulario esta vacío, incompleto o contiene carácteres no válidos",
             "error")
            return false
    }
    swal({
      title: "Personal",
      text: `¿Editar personal?`,
      icon: "info",
      buttons: [
        'Cancelar',
        'Aceptar'
      ],
    }).then(
      function (valid) {
        if (valid) {
          console.log(form)
          $.ajax({
            url:'fn/person.php',
            dataType:'html',
            type:'POST',
            data: form
          })
          .done(function(response){
            console.log(response)
            swal(response, '', 'success')
          })
        }
      })

  })
})
//==================================Editar personal====================================
//==================================Borrar personal====================================
$(document).on("click","button.delete", function(){
  var id = $(this).prop("value")
  swal({
  title: "Eliminar usuario",
  text: `Eliminar usuario con ID ${id}`,
  icon: "warning",
  buttons: [
      'Cancelar',
      'Aceptar'
    ],
  }).then(
     function (del) {
       if (del) {
         $.ajax({
           url: 'fn/person.php',
           type: 'POST',
           data: {action:'eliminar_personal', id_eliminar: id},
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
//==================================Editar Personal====================================
//mandar a edicion
$(document).on('click', '.editar', function(){
var id_usuario = $(this).attr('value')
swal({
title: "Editar Usuario",
text: `Editar usuario con ID ${id_usuario}`,
icon: "info",
buttons: [
   'Cancelar',
   'Aceptar'
 ],
}).then(
  function (del) {
    if (del) {
      $('input[name="id_editar"]').val(id_usuario)
      $('#carga_edicion').trigger('click')
      $('.nft').hide()
      $('#pan3').show()
    }
 })
})
