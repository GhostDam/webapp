//*Service worker
if('serviceWorker' in navigator){
	console.log('Puedes usar los serviceWorker en tu navegador');

	navigator.serviceWorker.register('./sw.js')
							.then(res => console.log('serviceWorker cargado correctamente', res))
							.then(function(reg){
								console.log("Se logro");
							})
							.catch(err => console.log('No se ha podido regsitrar el serviceWorker', err));

}else{
	console.log('No tienes acceso a los serviceWorker en tu navegador');
}
//*Service worker
//*Evento de Instalador en Desktop
// let deferredPromt;
// const addBtn = document.querySelector('.add-Button');
// addBtn.style.display = 'none';
// window.addEventListener('beforeinstallprompt', (e) => {
//     e.preventDefault();
//     deferredPromt = e;
//     showInstallPromotion();
//     addBtn.style.display = 'block';
//     addBtn.addEventListener('click', (e) => {
//         addBtn.style.display = 'none';
//         deferredPromt.prompt();
//         deferredPromt.userChoice.then((choiceResult) => {
//             if (choiceResult.outcome === 'accepted') {
//                 console.log('Se acepto el A2HS prompt');
//             } else {
//                 console.log('User')
//             }
//             deferredPromt = null;
//         });
//     });
// });
//consulta
$(document).ready(function(){
    $("#folio-reporte").on('submit', function(e){
        e.preventDefault();
        var data = $("#folio-reporte").serialize();
				data +="&action=consulta";
        $.ajax({
		            url: "php/main.php", // verificar registros existentes
		            method: "POST",
								dataType:'JSON',
		            data: data
        			})
							.done(function(res){
								console.log(res)
										if (res['mensaje']=='Número de reporte inexistente') {
											swal(res['mensaje'], "","error")
										}else if(res['firma']!=''){
											swal(res['mensaje'], res['firma'] , "error")
										}else{
											window.location.href =`php/calificacion.php?reporte=${res['id']}`;
										}
							})
							.fail(function(res){
								console.log(res)
							})

    })
})
//consulta
//guardado de calificacion
// $(document).ready(function(){
// 		$("#servicio").on('submit', function(e){
// 				e.preventDefault();
// 				var data = new FormData($("#servicio")[0]);
// 				$.ajax({
// 						url: "querys.php", //registro guardado
// 						method: "POST",
// 						data: data,
// 						dataType: "json",
// 						contentType: false,
// 						processData: false,
// 						cache: false,
// 						success: function(respuesta){
// 								console.log(respuesta);
// 								// alert(respuesta.mensaje);
// 								// window.location.href="../index.php";
// 						},
// 						error: function(e){
// 								console.log(e);
// 						}
//
// 				})
// 		})
// })
//guardado de calificacion
//*ADDONS*/
$(document).on('submit', "#servicio", function(e){
	e.preventDefault();

	var idreporte = $('input[name="idreporte"]').val(); //id
	var resolucion = $('select[name="resolucion"]').val(); //solucion

	var calidad = $('select[name="calidad"]').val(); //calidad
	var atencion = $('select[name="atencion"]').val(); //atencion
	var nivel = $('select[name="nivel"]').val(); //profesional
	var respuesta = $('select[name="respuesta"]').val(); //tiempo

	var img = document.getElementById("canvas").toDataURL('image/png');


	// form = $("#servicio").serialize();
	// var img = document.getElementById("canvas").toDataURL('image/png');
	//
	// form+="&img="+img;

	// console.log(img)
	// console.log(form)

	console.log(idreporte, resolucion, calidad, atencion, nivel, respuesta, img);
	$.ajax({
  url: 'querys.php',
  type: 'post',
  data: {idreporte:idreporte, resolucion:resolucion, calidad:calidad, atencion:atencion, nivel:nivel, respuesta:respuesta, img:img}
  })
  // $.ajax({
  // url: 'querys.php',
  // type: 'post',
  // data: data
  // })
  .done(function(respuesta) {
    console.log(respuesta);
		
	})
  .fail(function(data){
    console.log(data)
  })
})
//*ADDONS*/
//*Firma
$( document ).ready(function() {
	$("#btnClearSign").on('click', function(){
		console.log("canvas!!!");
	});
	// $("#btnSubmitSign").on('click', function(){
	// 	var data = document.getElementById("canvas").toDataURL('image/png');
	// 	$.post('conexion.php',{data: data},function(data){console.log(data);})
	// 	console.log(data);
	// })
})
//*Firma
