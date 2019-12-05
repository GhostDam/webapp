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

//*Firma
$( document ).ready(function() {
	$("#btnClearSign").on('click', function(){
		console.log("canvas!!!");
	});
	$("#btnSubmitSign").on('click', function(){
		var data = document.getElementById("canvas").toDataURL('image/png');
		$.post('conexion.php',{data: data},function(data){console.log(data);})
		console.log(data);
	})
})
// !Stuff raro que no se que pedo
// var canvas = document.querySelector( 'canvas' ),
//     c = canvas.getContext( '2d' ),
//     mousedown = false;

// var link = document.createElement('a');
//     link.innerHTML = 'download image';
// link.addEventListener('click', function(ev) {
//     link.href = canvas.toDataURL();
//     link.download = "mypainting.png";
// }, false);
// document.body.appendChild(link);

// href = document.getElementById('Canvas1').toDataURL();
