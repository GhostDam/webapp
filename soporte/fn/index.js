//==================================Crear Reporte====================================
/*info a partir de usuario*/
$(document).on("change", "#usr", function(){
  var usr = $(this).val()
  if (usr.length >0) {
      $.ajax({
        url:"fn/fnindex.php",
        type: "post",
        dataType:"json",
        data:{to:'fill', usr:usr}
      })
      .done(function(response){
        //clear
        swal({
          title: 'Datos encontrados',
          text: 'Autollenando formulario',
          icon:'success',
          timer: 1500,
          })

        $("form").find(".error").removeClass("error")
        if (response==="Usuario no econtrado") {
          swal({
            title:'Datos incorrectos',
            text: response,
            icon: 'error',
          })
        }
        console.log(response)//datos
        //for (var i = 0; i < response[1].length; i++) {
        for(var i in response[1]){
          $("#empleado").append(`<option value='${response[1][i]}'>${response[1][i]}</option>`)
        }
        //datos usuario
        $("#area").val(response[0]['area'])
        $("#encargado").val(response[0]['responsable_area'])
        $("#usuario").val(response[0]['nombre_usuario'])
        //datos equipo
        $("#marca").val(response[0]['marca'])
        $("#modelo").val(response[0]['modelo'])
        $("#no_serie").val(response[0]['num_serie'])
        $("#inventario").val(response[0]['nombre_equipo'])

      })//ajax done
      .fail(function(data){
        console.error(data.responseText);
      });
  }
})
/*info a partir de usuario*/
/*validacion*/
$(document).on("input", "input, textarea, select", function(){
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
/*confirmar nuevo reporte*/
  $(document).on("click", "#btnSubmit", function(e){
    e.preventDefault();
    vald();
    if ($(".error:visible").length>0) {
      swal({
        title:"Verifique el formulario",
        text:"El formulario está vacío, incompleto o contiene carácteres no válidos",
        icon:"error",
      })
      $($(".error:visible")).focus();
      return false;
    }
    form = $("form#n_reporte")
    swal({
      title: "Crear reporte",
      text: `¿Agregar nuevo reporte?`,
      icon: "info",
      buttons: [
        'Cancelar',
        'Aceptar'
      ],
    }).then(
      function (valid) {
        if (valid) {
          // form.submit();
          let n_reporte=$("form#n_reporte").serialize();
          n_reporte+='&to=crear'
          console.log(n_reporte);
          $.ajax({
            url:"fn/fnindex.php",
            type: "POST",
            data: n_reporte
          })
          .done(function(echo){
            swal(echo)
            $('form#n_reporte')[0].reset();
          })
        }
  })
});
/*confirmar nuevo reporte*/
//==================================Crear Reporte====================================
//==================================cargar usuarios====================================
/*nueva nota*/
$(document).ready(function(){

      $.ajax({
        url:"fn/fnindex.php",
        type: "POST",
        dataType: 'JSON',
        data: {to:"cargar_usuarios"}
      })
      .done(function(usuarios){
        for(var i in usuarios){
          // console.log(usuarios[i][0])
          $("#lista").append(`<option>${usuarios[i][0]}</option>`)
        }
      })
      .fail(function(err){
        console.log(err)
      })
})
