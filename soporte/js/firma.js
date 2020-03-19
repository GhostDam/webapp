$(document).ready(function() {    
    //consulta
    $(document).ready(function(){
      $("#consulta").on('click', function(e){
          var data = $("input[name='num']").val();
          $.ajax({
                  url: "fn/signature.php", // verificar registros existentes
                  method: "POST",
                  dataType:'JSON',
                  data: {data:data, to:'consulta'}
                })
                .done(function(res){
                  console.log(res)
                      if (res['mensaje']=='Número de reporte inexistente') {
                        swal(res['mensaje'], "","error")
                      }else if(res['firma']!=''){
                        swal(res['mensaje'], '' , "error")
                      }else{
                        swal("Reporte existente", "Abriendo formulario", "success")
                        $('#toSign').val(res.id)
                        $("form").show();
                      }
                })
                .fail(function(res){
                  console.log(res)
                })
      })
    })
    //consulta
    
    //*ADDONS*/
    $("#download").on('click', function(){
      var num = $("input[id='toSign']").val();
      var sol = $("#resolucion").val();
      var cal = $("#calidad").val();
      var atn = $("#atencion").val();
      var prf = $("#nivel").val();
      var tmp = $("#respuesta").val();

      var img = document.getElementById("canvas").toDataURL('image/png');
      var to = "guardar_firma";
    
      console.log('fim', num, "calidad:", cal, "atn:", atn, "prof:", prf, "tiem:" ,tmp, "sol:", sol)

    
      swal({
        title:'¿Guardar firma?',
        text:'Una vez guardada la firma, se dará por terminado el reporte',
        icon:'info',
            buttons: [
          'Cancelar',
          'Aceptar'
        ]
      })
      .then(function(save){
        if (save) {
          console.log('si')
          // var pat = nombre;
          $.ajax({
          url: 'fn/signature.php',
          type: 'post',
          data: {num: num, cal: cal, atn: atn, prf: prf, tmp: tmp, sol:sol, img: img, to:to}
          })
          .done(function(respuesta) {
            console.log(respuesta);
            swal("Firma guardada", respuesta, "success")
            .then(function(done){
              window.location.href = "index.php";
            })
          })
          .fail(function(){
            console.log(data)
          })
        }else{
          console.log('no')
        }
      })
    
    
    
    
    
    
    })
    
})/*document.ready*/
