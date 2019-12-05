/*load areas*/
$(document).ready(function(){
$(load());
function load() {
  $.ajax({
    type: 'post',
    url: 'fn/reporte.php',
    data: {'caso':'loadArea'},
    dataType: 'html',
  })
  .done(function(optarea) {
    $("#opt").html(optarea)
  })
  .fail(function(res){
    console.log(res)
  })
}
/*load areas*/
/*Set responsable and area*/
var area_id = '';
function setRs(responsable) {
  $.ajax({
    url: 'fn/reporte.php',
    type: 'POST',
    dataType: 'html',
    data: {responsable: responsable},
  })
  .done(function(resp) {
    $("#encargado").val(resp.split("-")[0])
    area_id = resp.split("-")[1];
  })
}
$(document).on('input', '#area', function(){
  var valor =$("#area").val();
  if (valor != ""){
    setRs(valor);
  }
});
/*Set responsable and area*/
/*Set users*/
function users(usuarios) {
  $.ajax({
    url: 'fn/reporte.php',
    type: 'POST',
    dataType: 'json',
    data: {usuarios: usuarios},
  })
  .done(function(use) {
    console.log(use);
    $("#usuario").html(use[0])
    $("#opt_nombre").append(use[1])
  })
}
$(document).on('input', '#area', function(){
  $("form").find(".error").removeClass("error")
  setTimeout(function(){
    var valor = area_id;
    console.log(valor);
    if (valor != ""){
      users(valor);
    }
  },500);
});
/*Select equipos*/
var inventario, modelo, no_serie, marca ='';
function equipos(equip) {
  $.ajax({
    url: 'fn/reporte.php',
    type: 'POST',
    dataType: 'html',
    data: {equip: equip},
  })
  .done(function(pc) {
    $("#inventario").val(pc.split("/")[0])
    $("#modelo").val(pc.split("/")[1])
    $("#no_serie").val(pc.split("/")[2])
    $("#marca").val(pc.split("/")[3])

    inventario = pc.split("/")[0];
    modelo = pc.split("/")[1];
    no_serie = pc.split("/")[2];
    marca = pc.split("/")[3];
    console.log(inventario, modelo, no_serie, marca)
  })
}
$(document).on('change', '#usuario', function(){
    var valor = $(this).find('option:selected').attr("name");
    if (valor != ""){
      equipos(valor);
    }
  });
})
function vald(){
  var inputs = $("input, select, textarea")
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
$(document).on('input', "input, select, textarea", function(){
  var char = /[!"#$%&/=?¡"]/g;
  $($(this)).each(function(){
    if ($(this).val()=='') {
      $(this).addClass("error")
    }
    else if($(this).val().match(char)){
      $(this).addClass("error")
    }else {
    $(this).removeClass("error")
    }
  })
})

$(document).on('click', "#sbmt", function(){
  vald();

  var data = $("#n_reporte").serialize()

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
    title: "¿Crear Reporte?",
    text: `Se enviará el reporte al área de soporte técnico`,
    icon: "info",
    buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
    function (valid) {
      if (valid) {
        let n_reporte=$("form#n_reporte").serialize();
        n_reporte+='&to=crear'
        console.log(n_reporte);
        $.ajax({
          url:"fn/save.php",
          type: "POST",
          data: data
        })
        .done(function(echo){
          swal('Listo!', echo, 'success')
          $('form#n_reporte')[0].reset();
        })
      }
})


  console.log(data)
})
