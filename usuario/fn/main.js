$(document).ready(function(){
/*Carga de areas al cargar página*/
    $(load());
    function load() {
        $.ajax({
            type: 'post',
            url: 'fn/reporte.php',
            data: {'accion':'cargar_areas'},
            dataType: 'html',
        })
        .done(function(respuesta) {
            // console.log(respuesta)
            $("#opt").append(respuesta)
        })
        .fail(function(res){
            console.log(res)
        })
    }
/*Carga de areas al cargar página*/



/*Cargar responsable de area e id de area*/
    var area_id = '';
    function setRs(responsable) {
        $.ajax({
            url: 'fn/reporte.php',
            type: 'POST',
            dataType: 'html',
            data: {'accion': 'cargar_responsable', responsable},
        })
        .done(function(resp) {
            $("#encargado").val(resp.split("-")[0])
            area_id = resp.split("-")[1];
        })
    }

    $(document).on('input', '.areaList', function(){
    var valor =$("#opt").val();
    if (valor != ""){
        setRs(valor);
    }
    });
/*Cargar responsable de area e id de area*/


/*Cargar usuarios por area*/
    function cargarUsuarios(usuarios) {
        $.ajax({
            url: 'fn/reporte.php',
            type: 'POST',
            dataType: 'json',
            data: {'accion':'cargar_usuarios', usuarios},
        })
        .done(function(use) {
            console.log(use);
            $("#usuario").html(use[0])
            $("#opt_nombre").html(use[1])
        })
        .fail((err)=>(console.log(err)))
    }

    $(document).on('input', '#opt', function(){
        $("form").find(".error").removeClass("error")
        setTimeout(function(){
            var valor = area_id;
            console.log(valor);
            if (valor != ""){
            cargarUsuarios(valor);
            }
        },500);
    });
/*Cargar usuarios por area*/

/*Cargar equipos por usuario*/
    function equipos(equip) {
        $.ajax({
            url: 'fn/reporte.php',
            type: 'POST',
            dataType: 'json',
            data: { 'accion':'cargar_equipos',equip},
        })
        .done(function(pc) {
            console.log(pc)
            $("#inventario").val(pc[0][0])
            $("#modelo").val(pc[0][1])
            $("#no_serie").val(pc[0][2])
            $("#marca").val(pc[0][3])
        })
        .fail(function(res){
            console.log(res)
        })
    }
    $(document).on('change', '#usuario', function(){
    var valor = $(this).find('option:selected').attr("name");
        if (valor != ""){
            equipos(valor);
        }
    });
    })
/*Cargar equipos por usuario*/

/*Funciones de validacion de entrada*/
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
      title:"Verifique el formulario",
      text:"El formulario está vacío, incompleto o contiene carácteres no válidos",
      icon:"error",
    })
    $($(".error:visible")).focus();
    return false;
  }
  swal({
    title: "¿Crear Reporte?",
    text: `Su reporte se enviará al área de soporte técnico.`,
    icon: "info",
    buttons: [
      'Cancelar',
      'Aceptar'
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
          $('form#n_reporte')[0].reset();
          swal('Listo!', echo, 'success')
          .then(function(result){
            console.log(result)
            // if(result){
            //   window.location.href = "index.php";
            // }
          })
        })
      }
    })


  console.log(data)
})
