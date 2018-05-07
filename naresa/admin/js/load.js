$(window).ready(function(){

var val = $('.marca').val()
$('.catcambiar').load('php/llenarcategoria.php?marca='+val);	
$(".marca").change(function(){
	var val = $(this).val()
		$('.estadocambiar, .catcambiar').load('php/llenarcategoria.php?marca='+val);	
	});

$('#cspro').click(function(){
	$(".contprodcrear").fadeIn();
	$(".contprodcrear").animate({opacity:1});
});
$("#cerrar").click(function(){
	$(".contprodcrear").fadeOut(500);
	$(".contprodcrear").animate({opacity:0});
});

$("#resetearpass").click(function(){
	var mail = $(this).attr('data-mail');
	$('.mensajepass').load('php/resertpass.php?mail='+mail);	
});

/*	$(".campoestado, .campoestado span").click(function(){
		var pos = $(this).parent().index();
		$(".campoestado ul").eq(pos-1).css({"display":"block"});
		$(".campoestado  ul").eq(pos-1).animate({opacity:1});
	});
	$(".campoestado").mouseleave(function(){
		$(".campoestado  ul").fadeOut();
		$(".campoestado  ul").animate({opacity:0});
	});
	$('.campoestado li').click(function(){
		var pos = $(this).parents(':eq(3)').index();
		$('.campoestado font').eq(pos-1).html($(this).text());
	});
	$(".campocambiar").click(function(){
		var pos = $(this).parent().index();
		var estado = $('.estadocambiar font').eq(pos-1).text();
		alert(pos);
		$('.renglonesp table').load('php/actualizapedido.php?e='+estado);	
	});
*/
});