//*Service worker
if('serviceWorker' in navigator){
	navigator.serviceWorker.register('./sw.js')
							.then(res => console.log('serviceWorker cargado correctamente', res))
							.then(function(reg){
								console.log("Se logro");
							})
							.catch(err => console.log('No se ha podido regsitrar el serviceWorker', err));

}else{
	console.log('No tienes acceso a los serviceWorker en tu navegador');
}
//consulta reportes
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
						window.location.href =`calificacion.php?reporte=${res['id']}`;
					}
		})
		.fail(function(res){
			console.log(res)
		})
    })
})
//consulta reportes
//consulta de tecnicos
$(document).ready(function(){
		 $.ajax({
					  url: "php/main.php", // verificar registros existentes
					  method: "POST",
					  dataType:'JSON',
					  data: {action: 'consulta_tecnicos'}
					 })
		  .done(function(res){
			$('#atendio').append(res)
			console.log(res)

			for (var i = 0; i < res.length; i++) {
				$("#atendio").append(`<option value='${res[i]}'>${res[i]}</option>`)
			 }
		
			})
		  .fail(function(res){
			  console.log(res)
		  })
})



//guardado de calificacion
//*Envio de información*/
$(document).on('submit', "#servicio", function(e){
	e.preventDefault();

	var idreporte = $('input[name="idreporte"]').val(); //id **
	var resolucion = $('select[name="resolucion"]').val(); //solucion **

	var calidad = $('select[name="calidad"]').val(); //calidad **
	var atencion = $('select[name="atencion"]').val(); //atencion **
	var nivel = $('select[name="nivel"]').val(); //profesional
	var respuesta = $('select[name="respuesta"]').val(); //tiempo **
	var atendio =$('select[name="atendio"]').val(); //técnico que atendio

	var img = document.getElementById("canvas").toDataURL('image/png');

	swal({
		title: "¿Firmar reporte?",
		text: "Una vez firmado este reporte, se dará por concluido",
		icon: "info",
		buttons: [
					'Cancelar',
					'Aceptar'
				],
			})
	.then(function(confirm){
		if (confirm) {
			$.ajax({
				url: 'php/querys.php',
				type: 'post',
				data: {idreporte:idreporte, 
						 resolucion:resolucion, 
						 calidad:calidad, 
						 atencion:atencion, 
						 nivel:nivel, 
						 respuesta:respuesta, 
						 atendio:atendio, 
						 img:img}
			  })
			  .done(function(respuesta) {
				swal({
					title: respuesta,
					text: "La firma se guardo exitosamente.",
					icon: "success",
				 })
				.then(function(done){
					//  window.location.href="./../";
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
	init_Sign_Canvas()

	$("#btnClearSign").on('click', function(){
		init_Sign_Canvas()
	});
})
//*Firma
