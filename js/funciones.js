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

	$('.js-btn-menu').on('click',function(){
		if($('.logo').hasClass('hide')){
			setTimeout(function(){
				$('.logo').removeClass('hide');
			},450);
		} else {
			$('.logo').addClass('hide');
		}
	});

	var valor = $('.active-btn').val();
	if(valor === 'inicio'){
		$('.btn-menu').each(function(){
			$(this).removeClass('active-option');
		});
		$('.btn-menu-inicio').addClass('active-option');
	}
	if(valor === 'articulos'){
		$('.btn-menu').each(function(){
			$(this).removeClass('active-option');
		});
		$('.btn-menu-articulos').addClass('active-option');
	}

	if(valor === 'categorias'){
		$('.btn-menu').each(function(){
			$(this).removeClass('active-option');
		});
		$('.btn-menu-articulos').addClass('active-option');
	}
	if(valor === 'clientes'){
		$('.btn-menu').each(function(){
			$(this).removeClass('active-option');
		});
		$('.btn-menu-clientes').addClass('active-option');
	}
	if(valor === 'ventas'){
		$('.btn-menu').each(function(){
			$(this).removeClass('active-option');
		});
		$('.btn-menu-ventas').addClass('active-option');
	}

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

