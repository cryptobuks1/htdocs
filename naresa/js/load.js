$(window).ready(function(e){
	$('.servicio').click(function(){
		var pos =$(this).index();
		
		$(this).css({'color':'#fff', 'background':'#0cf'});
		$('.servicio').each(function(index, e) {
			if(index!=pos){
				$(e).css({'color':'#6E6E6E','background':'transparent'});
			}
        });	
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio='+criterio);
	});

	var url =document.URL;
	url = url.split("/");
	var u = url.length-1
	url = url[u]
  	
  	$(".menupri li a[href*='"+url+"']").addClass('pageActual');
  	
	/*$('.cat').click(function(e){
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio2='+criterio);	
		e.stopPropagation();
	});
	$('.subcat').click(function(e){
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio3='+criterio);	
		e.stopPropagation();
	});
	$('.item').click(function(e){
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio2='+criterio);	
		e.stopPropagation();
	});
	$('.proyecto').click(function(e){
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio2='+criterio);	
		e.stopPropagation();
	});
	$('.estilo').click(function(e){
		var entrada = $(this).attr('id-data');
		var criterio = encodeURI(entrada);
		$('.grind').load('php/sugerenciaspro.php?criterio4='+criterio);	
		e.stopPropagation();
	});*/
});