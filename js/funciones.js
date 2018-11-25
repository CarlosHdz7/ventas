$(document).ready(function(){
	//Para cambiar de tamaño la imagen al hacer scroll
	$(window).scroll(function() {
			if ($(document).scrollTop() > 100) {
				$('.logo').height(50);
				$('.logo').width(50);

			}
			else {
				$('.logo').height(100);
				$('.logo').width(100);
			}
		}
	);
	
}); //Fin de la funcion ready



/*----------------------------------*/
/*        	funciones		            */
/*----------------------------------*/

function validarFormVacio(formulario){
	datos=$('#' + formulario).serialize();
	d=datos.split('&');
	vacios=0;
	for(i=0;i< d.length;i++){
			controles=d[i].split("=");
			if(controles[1]=="A" || controles[1]==""){
				vacios++;
			}
	}
	return vacios;
}