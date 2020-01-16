$(document).ready(function(){
  /*Color Sessions*/
   //ver administradores
   if (type == 'master') {
     console.log(type)
     listAd();
     listTec();
     function listAd(){
     $.ajax({
       url: 'fn/config.php',
       type: 'POST',
       dataType: 'html',
       data: {action: 'lista_admins'}
     })
     .done(function(consAd) {
       $("#listaAdmn").html(consAd)
     })
   }

   function listTec(){
     $.ajax({
       url: 'fn/config.php',
       type: 'POST',
       dataType: 'html',
       data: {action: 'lista_tecnicos'}
      })
      .done(function(tecn) {
        $("#listTec").html(tecn)
      })
    }



  }
 //ver administradores
 //==================================Agregar Administrador====================================
/*validacion*/
$(document).on("focusout", ".form-val", function(){
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
  var inputs = $(".form-val")
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
$("#addmin").click(function(){
  var nameadm = $("input[name='name_adm']").val()
  var useradm = $("input[name='usuario_admin']").val()
  var pass = $("input[name='pass_admin']").val()
  var rankadm = $("select[name='type']").val()

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
      title:"Agregar Administrador",
      text: `Nombre: ${nameadm}
             Permisos: ${rankadm}`,
      icon:'info',
      buttons:[
        'Cancelar',
        'Confirmar'
      ],
    }).then(function(conf){
      if (conf) {
        $.post("fn/config.php", {action:'agregar_admin', nameadm:nameadm, useradm:useradm, pass:pass, rankadm:rankadm},function(data){
          swal(data, '', 'success');
          listAd();
        })
      }
    })
})
//adddmins
//demins
$(document).on("click", ".delete", function(){
  var delid = $(this).attr("name")
  swal({
    title: "Borrar",
    text: `¿Eliminar Administrador?`,
    icon: "warning",
    buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
    function (valid) {
      if (valid) {
        $.post("fn/config.php", {action:'borrar_admin', delete:delid},function(data){
          swal(data, '', 'success')
          listAd()
        })
      }
  })
})
//demins
//tecnicos

//guardado de tecnicos
$("#agregar_tecnico").click(function(){
  var nombreTecnico = $("input[name='nombre_tecnico']").val()
  var tipoTecnico = $("select[name='tipo_tecnico']").val()

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
      title:"Agregar técnico",
      text: `Nombre: ${nombreTecnico}
             Tipo: ${tipoTecnico}`,
      icon:'info',
      buttons:[
        'Cancelar',
        'Confirmar'
      ],
    }).then(function(conf){
      if (conf) {
        $.post("fn/config.php", {action:'agregar_tecnico', tipoTecnico, nombreTecnico},function(data){
          swal(data, '', 'success');
          listTec();

        })
      }
    })
})

//borrado de tecnicos
$(document).on("click", ".borrar_tecnico", function(){
  var delid = $(this).attr("name")
  swal({
    title: "Borrar",
    text: `¿Eliminar técnico?`,
    icon: "warning",
    buttons: [
      'cancelar',
      'Si!'
    ],
  }).then(
    function (valid) {
      if (valid) {
        $.post("fn/config.php", {action:'borrar_tecnico', delete:delid},function(data){
          swal(data, '', 'success')
          listTec();
        })
      }
  })
})


 //tecnicos

});
