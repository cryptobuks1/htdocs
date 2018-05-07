$(window).ready(function(){
	$(".carrito").load("php/cargarcarro.php");
$(".al_carrito").click(function(){
	$('.carrito').fadeIn().delay(1000).fadeOut();
	var prod = $(this).val();
        var ad = "";
        $('.adicionales input').each(function(index, e) {
            
			if($(this).attr('checked', true)){
                            ad+=$(this).attr('name');
                        }
                    });
	var co= $('.selectcolor font').text();
	var ta= $('.selecttalla font').text();
	if(co=='Color' || ta=='Talla'){
		$('.colorTallaCont').append('<div class="alerta">Debe seleccionar color y talla</div>')
	}else{
		$(".carrito").fadeIn(500);
		$(".carrito").load("php/cargarcarro.php?p="+prod+"&color="+co+"&talla="+ta+"&ad="+ad);
	}
	$('.al_carrito').mouseleave(function(){
		$('.alerta').remove()
	});
});
	$(".cantidadt").load("php/actualizarcantidad.php");
$(".al_carrito").click(function(){
	var prod = $(this).val();
	$(".cantidadt").load("php/actualizarcantidad.php?p="+prod);
});
	$(".totalGlobal").load("php/actualizarvalor.php");
$(".al_carrito").click(function(){
	var prod = $(this).val();
	$(".totalGlobal").load("php/actualizarvalor.php?p="+prod);
});
$(".vaciar").click(function(){
	$(".productos").load("php/vaciar.php");
	$(".cantidadt").load("php/actualizarcantidad.php");
	$(".totalGlobal").load("php/actualizarvalor.php");
	$(".enlacevalidar").load("php/actualizarenlace.php");
});
	$(".enlacevalidar").load("php/actualizarenlace.php");
$(".al_carrito").click(function(){
	$(".enlacevalidar").load("php/actualizarenlace.php");
});
});

