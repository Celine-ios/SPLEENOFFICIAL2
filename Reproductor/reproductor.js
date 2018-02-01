	function mover(e){

if(!medio.paused && !medio.ended) {

	    var maximo = 600;

	   var barra_progreso = document.getElementById('progress-bar');

   			var ratonX=e.pageX-barra_progreso.offsetLeft;

			var nuevoTiempo=ratonX*medio.duration/maximo;

				medio.currentTime=nuevoTiempo;

					$('#progress-bar').css('width',(ratonX/10)+'%');
}
}

function reproducir() {



//Elemento DOM de la pelicula

	   var medio = document.getElementById('medio');

	   // condicional que evalua si la pelicula no esta parada

	     if (!medio.paused) {

	     	   medio.pause();

				$('#button').attr( {

					src: 'play-button-1.svg' 
				});	     		

				  window.clearInterval(bucle);

	     } else {

	     		medio.play();



	      //Establecer el valor del boton en "Pause"

	       $('#button').attr( {

					src: 'pause-1.svg' 
				});

	        //establece un intervalo de un segundo para ejecutar
	        // la funcion estado


	        	var bucle = setInterval(estado,1000);

	     }

	      

}

 function estado() {


 	       if (!medio.ended) {

 	       	  var maximo = 600;


 	       	        var total = parseInt(medio.currentTime*maximo/medio.duration);

 	       	           var total_porcentage = total/10;


 	       	        $('#progress-bar').css('width',total_porcentage+'%');

 	       	            $('#tiempo').text(Math.round(medio.currentTime));
 	       }
 	       else {

					$('#progress-bar').css('width','0%');

					$('#button').attr( {

					src: 'play-button-1.svg' 
				});
					
					window.clearInterval(bucle);
			}
 }

$(document).ready(function() {


			$('#button').click(reproducir);
			$('#progress-bar').click(mover);
			$('video,#controls').mouseover(function() {

					$('#controls').css('visibility','visible');


			});
			$('video,#controls').mouseout(function() {

					$('#controls').css('visibility','hidden');


			});




});
