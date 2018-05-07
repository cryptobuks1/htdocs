// JavaScript Document
$(window).ready(function(){

	$(".checkordenprod").click(function(){
		var dis = $('').css("background-color");
		var pos = $(this).parent().index();
			$( ".checkordenprod").each(function(index, e) {
					$(e).css({"background":"#fff"});
			});		
		$(".titulofiltro ul li").eq(pos).children().css({'background':'#666'});
		$('.renglonespro table').load('php/sugerenciaspro.php?ca='+pos);
	});

	$('.claseimg option').mouseenter(function(){
		 var pos = $(this).index();
		alert(pos);
	});
	/***********categorias ejemplos***********/
			$('.cambioestados').click(function(){
			 document.estado.submit();
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
	});	$("#errormail").fadeIn();

	$(".formRegistro input[name*='mail']").focusout(function(){
		var p = $(this).attr('value');
		$("#mensmail").load("validar.php?mail="+p);
		$("#errormail").animate({width:23 + "%"});
	});	$("#errormail").fadeIn();

	$(".imagen img:eq(0)").css({
		"display":"block",
		"opacity":1});
/*****************filtros**********************/

/*******************filtro de producto*****************/
	$("#botonfvalorpro").click(function(){
		var valori = $('.valorinicial').val();
		var valorf = $('.valorfinal').val();
		if(valori=='' && valorf==''){
			$('#botonfvalorpro').append('<div class="alerta" style="margin-top:5px; margin-left:-260px;">Escriba almenos un valor</div>')
		}else{
		$('.renglonespro table').load('php/sugerenciaspro.php?vi='+valori+'&vf='+valorf);
		}
	});
		$('#botonfvalorpro').mouseleave(function(){
			$('.alerta').remove()
		});

	$("#botoncat").click(function(){
		var cat = $('#filtrociudad font').text();
		if(cat=='Categoría'){
			$('#botoncat').append('<div class="alerta" style="margin-top:5px; margin-left:-260px; z-index:100">Debe seleccionar una Categoría</div>')
		}else{
			$('.renglonespro table').load('php/sugerenciaspro.php?c='+cat);	
		}
		$('#botoncat').mouseleave(function(){
			$('.alerta').remove()
		});
	});

	$("#botoninv").click(function(){
		var invi = $('.invinicial').val();
		var invf = $('.invfinal').val();
		if(invi=='' && invf==''){
			$('#botoninv').append('<div class="alerta" style="margin-top:5px; margin-left:-260px; z-index:100">Escriba almenos un número de inventario.</div>')
		}else{
		$('.renglonespro table').load('php/sugerenciaspro.php?ii='+invi+'&if='+invf);
		}
	});

	$('#botoninv').mouseleave(function(){
		$('.alerta').remove()
	});


	$("#botonestadopro").click(function(){
		var estado = $('#filtroestado font').text();
		if(estado=='Estado'){
			$('#botonestadopro').append('<div class="alerta" style="margin-top:-35px; margin-left:40px;">Debe seleccionar un Estado</div>')
		}else{
			$('.renglonespro table').load('php/sugerenciaspro.php?e='+estado);	
		}
		$('#botonestadopro').mouseleave(function(){
			$('.alerta').remove()
		});
	});
/*****************submenu header************************/


	$("#pro").mouseenter(function(){
		$("#submenupro").css({"display":"block"});
		$("#submenupro").animate({opacity:1});
	});
	$("#pro").mouseleave(function(){
		$("#submenupro").fadeOut();
		$("#submenupro").animate({opacity:0});
	});

/*****************************************************/	

	$('.servicio').change(function(){
		$('.cat option').remove()
		var valor=$(this).val()
		switch(valor){
			case 'Equipamiento': 
				$('.cat').append('<option>Seleccione Categoría</option><option>Hogar</option><option>Oficina</option><option>Educacional</option><option>Estética y Belleza</option><option>Comercial</option>')
			break;
			case 'Asesoría': 
				$('.cat').append('<option>Seleccione Categoría</option><option>Paredes</option><option>Pisos</option><option>Techos</option>')
			break;
		}
	});

	$('.cat').change(function(){
		$('.subcat option').remove()
		var valor=$(this).val()
		switch(valor){
			case 'Hogar': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Cocinas</option><option>Closets</option><option>Vestidores</option><option>Baños</option><option>Dormitorios</option><option>Taburetes</option>')
			break;
			case 'Oficina': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Sillonería</option><option>Estaciones de trabajo</option><option>Archivación</option><option>Mesas</option><option>Counter</option><option>Divisiones de ambiente</option>')
			break;
			case 'Educacional': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Sillonería</option><option>Mesas</option><option>Pupitres</option><option>Pizarrones</option><option>Franelógrafos</option>')
			break;
			case 'Estética y Belleza': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Sillas de Corte</option><option>Sillas Lavacabellos</option><option>Modulares</option>')
			break;
			case 'Comercial': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Islas y Tiendas</option><option>Cafeterías / Restaurantes</option>')
			break;
			case 'Paredes': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Piedra</option><option>Pintura</option><option>Papel Tapiz</option><option>Divisiones de Gypsum</option><option>Tablero</option>')
			break;
			case 'Pisos': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Cerámica</option><option>Piso Flotante</option>')
			break;
			case 'Techos': 
				$('.subcat').append('<option>Seleccione Subcategoría</option><option>Gypsum y Pintura</option><option>Iluminación</option>')
			break;
		}
	});
	$('.subcat').change(function(){
		$('.estilo option').remove()
		var valor=$(this).val()
		switch(valor){
			case 'Cocinas': 
				$('.estilo').append(' <option>Accesorios</option><option>Clásicas</option><option>Contemporáneas</option>')
			break;
			case 'Closets': 
				$('.estilo').append(' <option>Clásicos</option><option>Contemporáneos</option>')
			break;
			case 'Vestidores': 
				$('.estilo').append(' <option>Clásicos</option><option>Contemporáneos</option>')
			break;
			case 'Baños': 
				$('.estilo').append(' <option>Clásicos</option><option>Contemporáneos</option>')
			break;
			case 'Comercial': 
				$('.estilo').append(' <option>Clásicos</option><option>Contemporáneos</option>')
			break;
			case 'Dormitorios': 
				$('.estilo').append(' <option>Clásicos</option><option>Contemporáneos</option>')
			break;
			case 'Sillonería': 
				$('.estilo').append(' <option>Confidente</option><option>Operativas</option><option>Ejecutivas</option><option>Presidente</option><option>Tandems</option>')
			break;
			case 'Estaciones de trabajo': 
				$('.estilo').append(' <option>Escritorios</option><option>Sistemas</option>')
			break;
			case 'Archivación': 
				$('.estilo').append(' <option>Archivadores</option><option>Credenzas</option><option>Bibliotecas</option></option><option>Rodarchivo</option>')
			break;
			case 'Mesas': 
				$('.estilo').append(' <option>De centro</option><option>Reunión</option><option>Estudiantil</option>')
			break;
			case 'Counter': 
				$('.estilo').append(' <option>Recto</option><option>Curvo</option>')
			break;
		}
	});
});



