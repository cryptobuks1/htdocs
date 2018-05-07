// JavaScript Document
$(window).ready(function(){
	$(".menufuncional ul li").hover(function(e){
		var largomenu = $(".menus").width();
		var actual = $(this).index();
		var left = $(this).position().left;
		var positiony = e.target.id;
		$(".selector").css({"background":"#8899ff"});
		if(positiony == ""){
			$(".selector").animate({
				marginLeft: 38 + "px",
				width :96 + "px"
			},100);
		}else{
			if(actual==4 || actual==5){
				var longitud = (($(this).width()/largomenu )*100) + 4.7;
				var left = ($(this).position().left/largomenu)*100 - 0.2;
			}else{
				var longitud = (($(this).width()/largomenu )*100) + 2.8;
				var left = ($(this).position().left/largomenu)*100 - 0.2;
			}
			$(".selector").animate({
				marginLeft: left - 28 + "%",
				width :longitud + "%"
			},100);
		}
	});
	
	$("#ninos").hover(function(e){
		var largomenu = $(".menus").width();
		var longitud = (($(this).width()/largomenu )*100) + 5;
		var left = ($(this).position().left/largomenu)*100;
		var position = e.target.id;
		$(".selector").css({"background":"#c00b1d"});
	if(position == ""){
		$(".selector").animate({
			marginLeft: 38,
			width :96
		},100);
	}else{
		$(".selector").animate({
			marginLeft: left - 28.2 + "%",
			width :longitud + "%"
		},100);
	}
	});
	
	$("#lo").click(function(){
		$(".loguin").fadeIn(500);
		$(this).addClass("activo");
	});
	$("#cerrar").click(function(){
		$(".loguin").fadeOut(500);
		$("#lo").removeClass("activo");
	});
	
	$("#reg").click(function(){
		$(".form_registro").fadeIn();
		$("#registro").fadeIn();
		$("#reg").fadeOut();
	});
	$("#registro").click(function(){
		$("#reg").fadeOut();
	});
	$("#cerrar").click(function(){
		$(".form_registro").fadeOut();
		$("#reg").fadeIn();
	});
	
	$("#ca").click(function(){
		$(".carrito").animate({
			height:580
		});
		$(".carrito").css({"display":"block"});
		$(this).addClass("activoc");
	
	});
	$(".cerrarc").click(function(){
		$(".carrito").animate({
			height:0
		});
		$(".carrito").fadeOut();
		$("#ca").removeClass("activoc");
	});
	$(".cliente_nuevo input").focusin(function(){
		$(this).addClass('campo_activo');

    });
	$(".cliente_nuevo input").focusout(function(){
		var ati = $(this).attr('value');
		var str = ati.length;
		var l = $(".cliente_nuevo input").hasClass('campo_vacio');
		$(this).removeClass('campo_activo');
		if(str > 0 && l == false){
			$("#mensaje").remove();
		}
		if(str==0){
			$(this).addClass('campo_vacio');
			if($("#mensaje").length == 0){
			$('.form_registro form').append("<div id='mensaje' style='padding:5px 7%' class='campo_vacio'>Campos obligatorios<div>");
			}
		}else{
			$(this).removeClass('campo_vacio');
		}
    });
	$(".cliente_nuevo input[name*='mail']").focusout(function(){
		var p = $(this).attr('value');
		$("#mensmail").load("php/validar.php?mail="+p);
		$("#errormail").animate({width:23 + "%"});
		$("#errormail").fadeIn();
	});	

	$(".formRegistro input[name*='mail']").focusout(function(){
		var p = $(this).attr('value');
		$("#mensmail").load("validar.php?mail="+p);
		$("#errormail").animate({width:23 + "%"});
		$("#errormail").fadeIn();
	});	

	$(".contform input[name*='mail']").focusout(function(){
		var p = $(this).attr('value');
		$("#mensmail").load("validar.php?mailresert="+p);
		$(".mail_resert_error").css({'height':'30px'});
		$("#errormail").fadeIn();
	});	

	$(".datosgeneralesuser input").focusin(function(){
		$(this).addClass('campo_activo');

    });
	$(".datosgeneralesuser input").focusout(function(){
		var ati = $(this).attr('value');
		var str = ati.length;
		var l = $(".datosgeneralesuser input").hasClass('campo_vacio');
		$(this).removeClass('campo_activo');
		if(str > 0 && l == false){
			$("#mensaje").remove();
		}
		if(str==0){
			$(this).addClass('campo_vacio');
			if($("#mensaje").length == 0){
			$('.datosgeneralesuser h4').append("<div id='mensaje' style='padding:5px 7%;' class='campo_vacio'>Campos obligatorios<div>");
			}
		}else{
			$(this).removeClass('campo_vacio');
		}
    });




	$('.buscar').click(function(){
		var buscar=$('.buscar').next().attr('value');
		$('.grid, .grid2').load('php/buscar.php?buscar='+buscar);
	});

	$(".imagen img:eq(0)").css({
		"display":"block",
		"opacity":1});

	$(".selectcolor").click(function(){
		$(".selectcolor ul").css({"display":"block"});
		$(".selectcolor ul").animate({opacity:1});
	});

	$(".selecttalla").click(function(){
		$(".selecttalla ul").css({"display":"block"});
		$(".selecttalla ul").animate({opacity:1});
	
	});
	$(".selectcolor").mouseleave(function(){
		$(".selectcolor ul").fadeOut();
		$(".selectcolor ul").animate({opacity:0});
	
	});
	$(".selecttalla").mouseleave(function(){
		$(".selecttalla ul").fadeOut();
		$(".selecttalla ul").animate({opacity:0});
	
	});
	$(".thumb img").click(function(){
		var dis = $(".imagen img").css("display");
		var pos = $(this).index();
			$( ".imagen img").each(function(index, e) {
				if($(e).css("opacity")==1){
					$(e).css({"display":"none"});
					$(e).animate({opacity:0});
				}
			});		
/*			if($("imagen img").index()!=pos){
			$(".imagen img").css({"display":"none"});
			$(".imagen img").animate({opacity:0});
		}*/
		$(".imagen img").eq(pos).css({"display":"block"});
		$(".imagen img").eq(pos).animate({opacity:1});
	});

	$(".imagen img").hover(function(){
		$(".my-container").fadeIn();
	});
	$(".imagen img").mouseleave(function(){
		$(".my-container").fadeOut();
	});
	
	$('.selecttalla li').click(function(){
		$('.selecttalla font').html($(this).text());
	});
	
	$('.selectcolor li').click(function(){
		$('.selectcolor font').html($(this).text());
	});
	
	$(".check").click(function(){
		var pos = $(this).parent().index();
			if(pos == 0){
				$('.check span').eq(0).fadeIn();
				$('.check span').eq(1).fadeOut();
			}else{
				$(".check span").eq(1).fadeIn();
				$('.check span').eq(0).fadeOut();
			}
	});
	$(".checken").click(function(){
		var pos = $(this).parent().index();
			if(pos == 0){
				$('.checken span').eq(0).fadeIn();
				$('.checken span').eq(1).fadeOut();
			}else{
				$(".checken span").eq(1).fadeIn();
				$('.checken span').eq(0).fadeOut();
			}
	});
	$("#grabarpedido").mouseenter(function(){
		var enl = $(this).attr('href');
		if(enl==''){
			$('.formapago').append('<div class="alerta">Seleccione un opción de pago y envio</div>')
		}else{
		}
		$('#grabarpedido').mouseleave(function(){
			$('.alerta').remove()
		});
	});
	$("#grabarpedido").click(function(){
		var enl = $(this).attr('href');
		if(enl==''){
			alert('Seleccione una opción de pago');
		}
	});

	$('.selectidioma h6').click(function(){
		$('.selectidioma font').html($(this).text());
	});
	$(".selectidioma").click(function(){
		$(".menuidioma").css({"display":"block"});
		$(".menuidioma").animate({opacity:1});
	
	});

	$(".menuidioma").mouseleave(function(){
			$(".menuidioma").fadeOut();
			$(".menuidioma").animate({opacity:0});
	});
	
	$('.id').click(function(){
		var idioma = $('.id').text();
		if(idioma=='CERRAR IDIOMA'){
			$('#google_translate_element').fadeOut();
			$('.id').text('IDIOMA');
			$('header').css({'position':'fixed'});
			$('.contnuevopro').css({'top':'108px'});
			$('.grid, .grid2, .nav').css({'margin-top':'108px'});
		}else{
			$('#google_translate_element').fadeIn();
			$('.id').text('CERRAR IDIOMA');
			$('header').css({'position':'relative'});
			$('.contnuevopro').css({'top':0});
			$('.grid, .grid2, .nav, .contnuevopro').css({'margin-top':0});
		}
	});
});




