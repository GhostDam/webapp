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
											swal(res['mensaje'], '' , "error")
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
//*ADDONS*/
$(document).on('submit', "#servicio", function(e){
	e.preventDefault();

	var idreporte = $('input[name="idreporte"]').val(); //id **
	var resolucion = $('select[name="resolucion"]').val(); //solucion **

	var calidad = $('input[name="calidad"]:checked').val(); //calidad **
	var atencion = $('input[name="atencion"]:checked').val(); //atencion **
	var nivel = $('input[name="nivel"]:checked').val(); //profesional
	var respuesta = $('input[name="respuesta"]:checked').val(); //tiempo **

	var img = document.getElementById("canvas").toDataURL('image/png');

	swal({
		title: "¿Firmar y cerrar reporte?",
		text: `Una vez firmado se cerrara por completo el reporte`,
		icon: "info",
		buttons: [
			'Cancelar',
			'Aceptar'
		],
	}).then(
		function (confirm) {
			if (confirm) {

				$.ajax({
					url: 'querys.php',
					type: 'post',
					data: {idreporte:idreporte, resolucion:resolucion, calidad:calidad, atencion:atencion, nivel:nivel, respuesta:respuesta, img:img}
				})
				.done(function(respuesta) {
					swal({
						title: respuesta,
						text: "La firma se guardo exitosamente.",
						icon: "success",
						timer: 1500
					})
					.then(function(done){
						window.location.href="./../";
					})
				})
				.fail(function(data){
					console.log(data)
				})

			}
})





















})
//*ADDONS*/
//*Firma
$( document ).ready(function() {
	$("#btnClearSign").on('click', function(){
		console.log("canvas!!!");
	});
})
//*Firma
