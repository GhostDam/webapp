$(document).ready(function() {

var limpiar = document.getElementById("limpiar");
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var cw = canvas.width = 300,
    cx = cw / 2;
var ch = canvas.height = 300,
    cy = ch / 2;

var dibujar = false;
var factorDeAlisamiento = 1;
var Trazados = [];
var puntos = [];
//estilos de linea
ctx.lineJoin = "round";
ctx.lineWidth = 1;
ctx.strokeStyle = 'black';  //color red***
ctx.fillStyle = 'white';
// ctx.fillRect(0, 0, 300, 300);/*canvas background, conflicto con redibujar*/
/**/
// if(ctx)
// {
//     ctx.fillStyle = "white";
//     ctx.fillRect(0,0,0,200);
//     ctx.fillStyle = "#000";
//     ctx.fillText("x",40,155);
// }
/**/
limpiar.addEventListener('click', function(evt) {
  dibujar = false;
  ctx.clearRect(0, 0, cw, ch);
  Trazados.length = 0;
  puntos.length = 0;
}, false);

canvas.addEventListener('mousedown', function(evt) {
  dibujar = true;
  puntos.length = 0;
  ctx.beginPath();
}, false);

canvas.addEventListener('mouseup', function(evt) {
  redibujarTrazados();
}, false);

canvas.addEventListener("mouseout", function(evt) {
  redibujarTrazados();
}, false);

canvas.addEventListener("mousemove", function(evt) {
  if (dibujar) {
    var m = oMousePos(canvas, evt);
    puntos.push(m);
    ctx.lineTo(m.x, m.y);
    ctx.stroke();
  }
}, false);

function reducirArray(n,elArray) {
  var nuevoArray = [];
  nuevoArray[0] = elArray[0];
  for (var i = 0; i < elArray.length; i++) {
    if (i % n == 0) {
      nuevoArray[nuevoArray.length] = elArray[i];
    }
  }
  nuevoArray[nuevoArray.length - 1] = elArray[elArray.length - 1];
  Trazados.push(nuevoArray);
}

function calcularPuntoDeControl(ry, a, b) {
  var pc = {}
  pc.x = (ry[a].x + ry[b].x) / 2;
  pc.y = (ry[a].y + ry[b].y) / 2;
  return pc;
}

function alisarTrazado(ry) {
  if (ry.length > 1) {
    var ultimoPunto = ry.length - 1;
    ctx.beginPath();
    ctx.moveTo(ry[0].x, ry[0].y);
    for (i = 1; i < ry.length - 2; i++) {
      var pc = calcularPuntoDeControl(ry, i, i + 1);
      ctx.quadraticCurveTo(ry[i].x, ry[i].y, pc.x, pc.y);
    }
    ctx.quadraticCurveTo(ry[ultimoPunto - 1].x, ry[ultimoPunto - 1].y, ry[ultimoPunto].x, ry[ultimoPunto].y);
    ctx.stroke();
  }
}

function redibujarTrazados(){
  dibujar = false;
  ctx.clearRect(0, 0, cw, ch);
  reducirArray(factorDeAlisamiento,puntos);
  for(var i = 0; i < Trazados.length; i++)
  alisarTrazado(Trazados[i]);
}

function oMousePos(canvas, evt) {
  var ClientRect = canvas.getBoundingClientRect();
  return { //objeto
    x: Math.round(evt.clientX - ClientRect.left),
    y: Math.round(evt.clientY - ClientRect.top)
  }
}

//======================================================================
/*CANVAS 1*/
// FUNCIONES
//======================================================================
//
// let miCanvas = document.querySelector('#pizarra');
// let lineas = [];
// let correccionX = 0;
// let correccionY = 0;
// let pintarLinea = false;
//
// let posicion = miCanvas.getBoundingClientRect()
// correccionX = posicion.x;
// correccionY = posicion.y;
//
// miCanvas.width = 300;
// miCanvas.height = 300;
//
// //======================================================================
// // FUNCIONES
// //======================================================================
//
// /**
//  * Funcion que empieza a dibujar la linea
//  */
// function empezarDibujo () {
//     pintarLinea = true;
//     lineas.push([]);
// };
//
// /**
//  * Funcion dibuja la linea
//  */
// function dibujarLinea (event) {
//     event.preventDefault();
//     if (pintarLinea) {
//         let ctx = miCanvas.getContext('2d')
//         // Estilos de linea
//         ctx.lineJoin = ctx.lineCap = 'round';
//         ctx.lineWidth = 5;
//         // Color de la linea
//         ctx.strokeStyle = 'red';
//         // Marca el nuevo punto
//         let nuevaPosicionX = 0;
//         let nuevaPosicionY = 0;
//         if (event.changedTouches == undefined) {
//             // Versión ratón
//             nuevaPosicionX = event.layerX;
//             nuevaPosicionY = event.layerY;
//         } else {
//             // Versión touch, pantalla tactil
//             nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
//             nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
//         }
//         // Guarda la linea
//         lineas[lineas.length - 1].push({
//             x: nuevaPosicionX,
//             y: nuevaPosicionY
//         });
//         // Redibuja todas las lineas guardadas
//         ctx.beginPath();
//         lineas.forEach(function (segmento) {
//             ctx.moveTo(segmento[0].x, segmento[0].y);
//             segmento.forEach(function (punto, index) {
//                 ctx.lineTo(punto.x, punto.y);
//             });
//         });
//         ctx.stroke();
//     }
// }
//
// /**
//  * Funcion que deja de dibujar la linea
//  */
// function pararDibujar () {
//     pintarLinea = false;
// }
//
// //======================================================================
// // EVENTOS
// //======================================================================
//
// // Eventos raton
// miCanvas.addEventListener('mousedown', empezarDibujo, false);
// miCanvas.addEventListener('mousemove', dibujarLinea, false);
// miCanvas.addEventListener('mouseup', pararDibujar, false);
//
// // Eventos pantallas táctiles
// miCanvas.addEventListener('touchstart', empezarDibujo, false);
// miCanvas.addEventListener('touchmove', dibujarLinea, false);
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
  var cal = $("input[name='calidad']:checked").val();
  var atn = $("input[name='atencion']:checked").val();
  var prf = $("input[name='profesion']:checked").val();
  var tmp = $("input[name='tiempo']:checked").val();
  var sol = $("input[name='solucion']:checked").val();
  var img = document.getElementById("canvas").toDataURL('image/png');
  var to = "guardar_firma";



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
//*ADDONS*/

/*save*/
// $("#download").on("click", function(){
//     // var download = document.getElementById("download");
//     var image = document.getElementById("canvas").toDataURL("image/png")
//     .replace("image/png", "image/octet-stream");
//     download.setAttribute("href", image);
// })
    /*save*/

})/*document.ready*/
/*trigger id*/
var url = window.location.pathname;
if (url.indexOf('/soporte/signature.php')) {
  var href = window.location.hash;
  var id = href.replace(/#/g, '')
  function inst(){
    $("#nreporte").val(id)
    $("#editar").trigger("click")
  }
  setTimeout(inst,500)
}
/*trigger id*/
