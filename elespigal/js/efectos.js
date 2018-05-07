
	
$(window).ready(function(){

  $('.llevarenviar a[href*=#], .subirmenu[href*=#], .submenudom a[href*=#], .subir[href*=#], .navG a[href*=#], slidershow a[href*=#] ').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body')
        .stop().animate({scrollTop: targetOffset-110}, 1000, 'easeInOutExpo');
       return false;
      }
    }
  });

	$(window).scroll(function(){

		
		//var top = [$(this).offset().top];
		if($(this).scrollTop() > 200 ){
			alert((this).scrollTop());
			$('.menu-cat div h4').css({'marginTop':'100px'});
		
		}else{
	
		}
		
	});





	$('.thumb').click(function(){
		var pos = $(this).index();
		$('.promo:eq('+pos+') .contenido').animate({marginTop:-80},100);	
		$('.promo:eq('+pos+') .titulo').animate({marginTop:30},1000);	
		$('.promo:eq('+pos+') .image').animate({marginTop:30},1000);	
		$('.promo:eq('+pos+') .valor').animate({marginTop:-130},1000);
		$('.promo:eq('+pos+')').animate({backgroundPosition:60}).fadeIn();
		$('.promo').each(function(index, e) {
            if(pos==index){
			}else{
			$(e).fadeOut();
			}
        });
	});


	$('.subirpromo-btn').click(function(e){
		$('.promo-min').animate({height:0},500).fadeOut(10);
		$('.btn-promo').animate({height:36},500);
		$('.btn-promo img').fadeOut(10);
		$('.btn-promo p').fadeOut(10);
		e.stopPropagation()
	});
	$('.btn-promo').mouseenter(function(e){
		$('.promo-min').animate({height:260},500).fadeIn(10);
		$('.btn-promo').animate({height:335},500);
		$('.btn-promo img').fadeIn(10);
		$('.btn-promo p').fadeIn(10);
		e.stopPropagation()
	});
	$('.subirpromo').click(function(){
		$('.cont-promo').animate({height:0},500).fadeOut(10);
	});
	
	$(".btn-promo").click(function(){
		$('.cont-promo').animate({height:0},500).fadeOut(10);
		$('.promo:eq(0) .contenido').animate({marginTop:-80},100);	
		$('.promo:eq(0) .titulo').animate({marginTop:30},1000);	
		$('.promo:eq(0) .image').animate({marginTop:30},1000);	
		$('.promo:eq(0) .valor').animate({marginTop:-130},1000);
		$('.promo:eq(0)').animate({backgroundPosition:60}).fadeIn();
		$('.cont-promo').fadeIn(10).animate({height:600+"px"},500);
	});
	
	actual=1;
	$(".right").click(function(){
		if(actual!=5){
			$('.slider').animate({marginLeft:-100*actual+"%"},500);
			actual++;
		}else{
			actual=1;
			$('.slider').animate({marginLeft:-100*(actual-1)+"%"},300);
		}
	});

	$(".left").click(function(){
		if(actual==1){
			actual=5;
			$('.slider').animate({marginLeft:-100*(actual-1)+"%"},300);
		}else{
			$('.slider').animate({marginLeft:(-100*(actual-1))+100+"%"},500);
			actual--;
		}
	});
	$('.domiciliopizza:eq(0) .continput').fadeIn();
	$('.domiciliopizza:eq(0) .flechactiva').fadeIn();
	$('.flechabajo').click(function(){
		var pos = $(this).parent().parent().index();
		$('.domiciliopizza:eq('+pos+') .continput').fadeIn();
		$('.domiciliopizza:eq('+pos+') .flechabajo').fadeOut(1);
		$('.domiciliopizza:eq('+pos+') .flechactiva').fadeIn();
	});
	$('.flechactiva').click(function(){
		var pos = $(this).parent().parent().index();
		$('.domiciliopizza:eq('+pos+') .continput').fadeOut();
		$('.domiciliopizza:eq('+pos+') .flechactiva').fadeOut(1);
		$('.domiciliopizza:eq('+pos+') .flechabajo').fadeIn(1);
	});

	$('input[type*="number"]').change(function(){
		var pos2= $(this).parent().parent().attr('id');
		var val = $(this).val();
		$('#'+pos2+' input[type*="checkbox"]').attr('checked', true);
	});
	$('.valor1').click(function(){
		var pos= $(this).index();
		var pos2= $(this).parent().parent().attr('id');
		switch(pos) {
			case 0:
				$('#'+pos2+' .tipo').attr('value','Pequeña');
				break;
			case 1:
				$('#'+pos2+' .tipo').attr('value','Mediana');
				break;
			case 2:
				$('#'+pos2+' .tipo').attr('value','Familiar');
				break;
			case 3:
				$('#'+pos2+' .tipo').attr('value','Gigante');
				break;
		}		
	});
/**********************formulario de contacto****************/
             
function captcha(){
    var v1 = $("#recaptcha_challenge_field").val();
    var v2 = $("#recaptcha_response_field").val();

    $.ajax({
          type: "POST",
          url: "validarrecaptcha.php",
          data: {
                    "recaptcha_challenge_field" : v1,
                    "recaptcha_response_field" : v2
          },
          dataType: "html",
          error: function(){
                alert("error petición ajax");
          },
          success:function(data){
                                  if(data == 0){
                                                $("#menscaptcha").html("<p>El código de seguridad introducido es incorrecto.</p>");
                                                $('#errorcaptcha').fadeIn();
                                                $("#errorcaptcha").animate({width:180 + "px"});
                                                Recaptcha.reload(); //recarga Recaptcha.

                                  }else if(data == 1){
                                                $(".formDomicilio").submit();
                                  }
          }
    });
             
}
       
      $(".btn-primary").click(captcha);
    
	$(".formDomicilio input").focusin(function(){
		$(this).addClass('campo_activo');

    });
	$(".formDomicilio input[type*='text']").focusout(function(){
		var ati = $(this).attr('value');
		var str = ati.length;
		var l = $(".form contacto input").hasClass('campo_vacio');
		$(this).removeClass('campo_activo');
		if(str > 0 && l == false){
			$("#mensaje").remove();
		}
		if(str==0){
			$(this).addClass('campo_vacio');
			if($("#mensaje").length == 0){
			$('.formDomicilio .datosdom').append("<div id='mensaje' style='padding:5px 7%; font-size:14px; width:80% !important; margin-left:0%; margin-bottom:-40px' class='campo_vacio'>Todos los campos con asterisco son obligatorios<div>");
			}
		}else{
			$(this).removeClass('campo_vacio');
		}
    });

	$(".formDomicilio input[name*='mail']").focusout(function(){
		var p = $(this).attr('value');
		$("#mensmail").load("validarform.php?mail="+p);
		$('#errormail').fadeIn();
		$("#errormail").animate({width:200 + "px"});
	});	
/**********************formulario de contacto****************/

	$('.linku:eq(0)').click(function(){
		$('.datosata').fadeOut();
		$('.datosficoa').fadeIn();
		$('.pinkubi').fadeIn().animate({right:'21%'});
	
	});
	$('.linku:eq(1)').click(function(){
		$('.datosficoa').fadeOut();
		$('.datosata').fadeIn();
		$('.pinkubi').fadeIn().animate({right:'13%'});
	
	});
	
});
