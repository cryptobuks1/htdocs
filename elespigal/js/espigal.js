
$(window).ready(function(){
   /*validar pedido*/
    $('.terminosleer').click(function(){
        $('.condiciones').fadeIn().delay(6000).fadeOut();       
    });
    

    $('.aplicar').click(function(){
        var campo = $('.campocupon').val();            
        var cupon = 0;  
        if(campo=='0710'){             
            $('.detallecupon').fadeIn();
            $(this).fadeOut();
            $('.cupon input').attr('data-cupon','Si');
            $('.cupon input').css({'opacity':'0'});
                
        }else{
            $('.cupon .invalid').fadeIn();
            $('.cupon input').attr('data-cupon','No');
           
        }                                   
    });
    /*********************/
    /*cambio de envio a domicilio o recoger*/
    $('.selecdeliv input').click(function(){
            var valor = $('.deliveryvalor').text()
            var pos = $(this).parent().index();
            var del = $(this).val();
            var p = $(this).attr('data-price'); 
            if(valor=='$ '+p){}else{        
                $('.selecdeliv article').each(function(e,index){
                    if(pos!=e){

                        $(this).find('input').prop('checked', false);
                      
                    }

                }); 
                $('.deliveryvalor').load('php/actdomicilio.php?del='+del+'&p='+p);
                $('.valortotaltitulo span, .totalbtnpedido').load('php/acttotal.php?del='+del+'&p='+p); 
               
            } 
            
        });
    /************************/
    /**confirmar pedido*/
    $('.btnconpedido').click(function(){  
        
        var ci = $('.ci').val();
        var nombre = $('.nombre').val();  
        var dir = $('.dir').val();  
        var cic = $('.cic').val();  
        var tel = $('.tel').val();  
        var telcon = $('.telcon').val();  
        var mail = $('.mail').val();  
        var ref = $('.ref').val(); 
        var pago = $('.pago').val();
        var control = $('.control').val(); 
        var modify='';
        var arriba = $(window).scrollTop();
        var local = $('.localp select').val(); 
        var coment = $('.coment').val(); 
        var pro = $('.pro').val(); 
        var cupon = $('.cupon input').data('cupon');
        var valorcupon = $('.detallecupon').text();
        var ter = $('.terminosinput').is(':checked');
        $('.modify').each(function(){
            if($(this).is(':checked')){
                modify = $(this).val();
            }
        }); 
        var validado=0;
        var cedula=0;
        var telefono=0;
        var campos=0;
        var correo=0;
        if(cic==ci){
            cedula=2;
        }else{
            $('html, body').scrollTop(150);
            $('.cic, ci').siblings('.invalid').fadeIn().delay(4000).fadeOut();
        }
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        //Se utiliza la funcion test() nativa de JavaScript
        if (regex.test(mail) || mail=='') {
            correo=1;
        }else{
            $('html, body').scrollTop(150);
            $('.mail').siblings('.inmail').fadeIn().delay(4000).fadeOut();
        }
        if(tel==telcon ){
            telefono=1;
        }else{
            $('html, body').scrollTop(150);
            $('.telcon, .tel').siblings('.invalid').fadeIn().delay(4000).fadeOut();            
        }
        if(ter==true){
            
            telefono= telefono+1;
        }else{  
                    
            $('.terminos .invalid').fadeIn().delay(4000).fadeOut();
        }
        if(local!='-'){
            telefono= telefono+1;
        }else{
            var anchobody = $('body').css('width');
            var ancho = anchobody.split('px');  
            var alto = $('.diareg').height();            
            if(ancho[0]<641){
                $('html, body').scrollTop(alto-500);
            }
            $('.mensajelocal .invalid').fadeIn().delay(4000).fadeOut();
            $('.mensajelocal').fadeIn().animate({'margin-top':'0px'}).html('<center>Debe seleccionar un local.</center>').delay(4000).fadeOut().animate({'margin-top':'0px'});                      
            
        }
        var vacio =0;
        var cantidad = $('.req').length;
        $('.req').each(function(){
            if($(this).val()==''){
                $('html, body').scrollTop(150);
                $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();
                
            }else{
               vacio=vacio+1; 
            }
        });
      
        if(vacio==cantidad){
            campos=4;
        }
        
        validado=cedula+telefono+campos+correo;
        
        if(validado==10){   
        $('.cargando').fadeIn();    
        $.ajax({
                type: 'POST',
                url: 'php/confirmacion.php',
                data: {
                        'ci' : ci,
                        'nombre' : nombre,
                        'dir':dir,
                        'cic':cic,
                        'tel':tel,
                        'telcon':telcon,
                        'mail':mail,
                        'ref':ref,
                        'control': control,
                        'modify':modify,
                        'local':local,
                        'pago':pago,
                        'coment':coment,
                        'pro':pro,
                        'ter':ter,
                        'cupon':cupon,
                        'valorcupon':valorcupon
                },
                dataType: 'html',
                error: function(){
                    alert('error petición ajax');
                },
                success:function(data){
                        
                        if(data==3){                             
                             
                        }else{
                        /*if(data==2 ){
                            $('.terminos .invalid').fadeIn().delay(4000).fadeOut();
                            $('.mensajelocal .invalid').fadeIn().delay(4000).fadeOut();
                            $('.mensajelocal').fadeIn().animate({'margin-top':'0px'}).html('<center>Debe seleccionar un local.</center>').delay(4000).fadeOut().animate({'margin-top':'0px'});  */                       
                        /*}else{*/
                            if(data==4){
                                $('html, body').scrollTop(150);
                                //$('.inmail').fadeIn().delay(4000).fadeOut();
                            }else{
                                if(data==0){                                                                                                                                
                                         
                                        location.href="php/enviocliente.php";
                                                            
                                }else{                            
                                    if(data==1){
                                        $('html, body').scrollTop(150);
                                        if($('.formres textarea').val()==''){
                                            $('.formres textarea').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                        }
                                        $('.cambio-datos div').find('input').each(function(){
                                            if($(this).val()==''){
                                                $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                            } 
                                        });
                                    }else{ 
                                        $('html, body').scrollTop(200);
                                        $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                    }  
                                }
                            }
                        //}
                        }
                        $('.cargando').fadeOut();
                                                
                }
            }); 
        }
    });
        
    /*************************************/

    $('.fa-bars').click(function(){
        if($('.menumovil').css('display')=='block'){
            $('.menumovil').fadeOut();
        }else{
            $('.menumovil').fadeIn();
        }               
    });
    var anchobody = $('body').css('width');
    var ancho = anchobody.split('px');  
    //alert(ancho[0]);
    if(ancho[0] < 768){       
        var alto = $('header').css('height');
        $('.section-producto, .menu-cat, .section-home, .cont-locales, .cont-nosotros, .section-menu, .section-promo, .section-catering, .section-contact, .cont-productos, .cont-formularios').css({'top':alto});
        $('footer').css({'top':alto});
        var proporcion = ancho[0]*0.311;
        var altoslide = ancho[0]-proporcion;
        $('.pix_diapomovil').css({'height':altoslide+'px'});
        /*$(window).scroll(function(){
            var alto = $(this).scrollTop();
            if(alto>100){
           
                switch(true){
                    case ancho[0] > 480:
                    $('.menu-cat').css({'top':alto-110});                    
                    break;
                    case  ancho[0] > 320 && ancho[0] < 481:
                    $('.menu-cat').css({'top':alto-115});
                    break;                  
                    case ancho[0] < 321:
                    $('.menu-cat').css({'top':alto-130});
                    break;
                }
                $('.carrito').fadeOut();
                $('.panelcartmovilabrir').fadeIn();
                $('.menu-cat').css({'height':'50px'});
                $('.panelcartmovilcerrar').fadeOut();
            }else{
                $('.menu-cat').css({'top':'10px'});
                $('.carrito').fadeIn();
                $('.menu-cat').css({'height':'580px'});
                $('.panelcartmovilabrir').fadeOut();
                $('.panelcartmovilcerrar').fadeIn();
            }           
        });
        $('.icon-cerrar-carrito').click(function(){
            $('.carrito').fadeOut();
            $('.panelcartmovilabrir').fadeIn();
            $('.panelcartmovilcerrar').fadeOut();
            $('.menu-cat').css({'height':'50px'});
        });
        $('.icon-abrir-carrito').click(function(){
            $('.carrito').fadeIn();
            $('.panelcartmovilabrir').fadeOut();
            $('.panelcartmovilcerrar').fadeIn();
            $('.menu-cat').css({'height':'580px'});
        });*/
         function actvaloresmovil(){
            $('.totalbtnpedido').load('php/acttotalmovil.php');
          }
        $('.panelcartmovilabrir').click(function(){
            $('.menu-cat').css({'height':'90%'});
            $('.contcart').fadeIn();
            $(this).fadeOut(1);
            $('.panelcartmovilcerrar').fadeIn();
        });
        $('.iconCartCon').click(function(){
            $('.menu-cat').css({'height':'90%'});
            $('.contcart').fadeIn();
            $('.panelcartmovilabrir').fadeOut(1);
            $('.panelcartmovilcerrar').fadeIn();
        });
        $('.panelcartmovilcerrar').click(function(){
            $('.menu-cat').css({'height':'8%'});
            $('.contcart').fadeOut();
            $(this).fadeOut(1);
            $('.panelcartmovilabrir').fadeIn();
            actvaloresmovil();
        });  

    }
    
    
   
	
	function captcha(){
    var v1 = $("#recaptcha-token").val();
    var v2 = $("#g-recaptcha-response").val();

	    $.ajax({
			type: "POST",
			url: "validarrecaptcha.php",
			data: {
			        "recaptcha-token" : v1,
			        "g-recaptcha-response" : v2
			},
			dataType: "html",
			error: function(){
			    alert("error petición ajax");
			},
			success:function(data){
				if(data == 0){
		            $(".mensaje").html("<p>El código de seguridad introducido es incorrecto.</p>");
		            $('#errorcaptcha').fadeIn();
		            $("#errorcaptcha").animate({width:180 + "px"});
		            Recaptcha.reload(); //recarga Recaptcha.

				}else if(data == 1){
				    $(".form-cont").submit();
				}
	        }
	    });
             
	}
       
      /*$(".btn-primary").click(function(){
      	$('.recaptcha-checkbox').addClass('hola');
      	if($('#recaptcha-anchor').attr('aria-checked')==true){
      		$(".form-cont").submit();
      	}else{
      		
      	}
      });*/
        $(".enviar-cont").click(function(){
            var name = $('.form-cont input[name*="name"]').val();
            var tel = $('.form-cont input[name*="tel"]').val();
            var mail = $('.form-cont input[name*="mail"]').val();
            var mensaje = $('.form-cont textarea').val();
            
            $.ajax({
                    type: "POST",
                    url: "enviarcont.php",
                    data: {
                            "name" : name,
                            "tel" : tel,
                            "mensaje" : mensaje,
                            "mail" : mail
                            
                    },
                    dataType: "html",
                    error: function(){
                        alert("error petición ajax");
                    },
                    success:function(data){		
                        if(data=='0'){

                            $(".mensaje-ok").html('<center style="font-size:20px; color: green ">Su mensaje ha sido enviado</center>');
                            $('.mensaje-ok').fadeIn().delay(4000).fadeOut();
                            jQuery.fn.reset = function () {
                                $(this).each (function() { this.reset(); });
                            }
                            $('.form-cont').reset();
                           

                        }else{                           
                            if(data=='1'){
                                if($('.form-cont textarea').val()==''){
                                     $('.name-field textarea').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                }                                                                
                                $('.form-cont input').each(function(){
                                   if($(this).val()==''){                                      
                                    $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();                                    
                                   } 
                                });                                
                            }else{                                              
                                $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                            }  
                        }
                        
                    }
            });

      	});
		$(".enviar-sug").click(function(){
      		var name = $('.form-cont input[name*="name"]').val();
      		var tel = $('.form-cont input[name*="tel"]').val();
      		var mail = $('.form-cont input[name*="mail"]').val();
      		var mensaje = $('.form-cont textarea').val();
            var grecaptcharesponse = $('.form-cont .g-recaptcha-response').val();
            $.ajax({
                type: "POST",
                url: "enviarsug.php",
                data: {
                        "name" : name,
                        "tel" : tel,
                        "mensaje" : mensaje,
                        "mail" : mail,
                        "g-recaptcha-response" : grecaptcharesponse

                },
                dataType: "html",
                error: function(){
                    alert("error petición ajax");
                },
                success:function(data){
                   
                    if(data==0){

                        $(".mensaje-ok").html('<center style="font-size:20px; color: green ">Su mensaje ha sido enviado</center>');
                        $('.mensaje-ok').fadeIn().delay(4000).fadeOut();
                        jQuery.fn.reset = function () {
                            $(this).each (function() { this.reset(); });
                        }
                        $('.form-cont').reset();
                        grecaptcha.reset ();

                    }else{                           
                        if(data==1){
                            if($('.mensaje').val()==''){
                                 $('.mensaje').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                            }                                                                
                                                  
                        }else{                                              
                            $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                        }  
                    }
                    $('.invalid').delay(4000).fadeOut();	            		
                }
            });
      	});
      	$(".enviar-em").click(function(){
      		var nombre = $('.form-cont input[name*="nombre"]').val();
      		var direccion = $('.form-cont input[name*="direccion"]').val();
      		var ciudad = $('.form-cont input[name*="ciudad"]').val();
            var niveleducativo = $('.form-cont select[name*="nivel-educativo"]').val();
            var exp = $('.form-cont select[name*="exp"]').val();
            var cargo = $('.form-cont select[name*="cargo"]').val();
            var email = $('.form-cont input[name*="correo"]').val();
            var edad = $('.form-cont input[name*="edad"]').val();
            var hojadevida = $('.form-cont input[name*="hojadevida"]').val();
            //var grecaptcharesponse = $('.form-cont .g-recaptcha-response').val();
            
            $.ajax({
                
                type: "POST",
                url: "enviaremp.php",
                data: {
                    "nombre" : nombre,
                    "direccion" : direccion,
                    "ciudad" : ciudad,
                    "niveleducativo" : niveleducativo,
                    "exp" : exp,
                    "cargo" : cargo,
                    "email" : email,
                    "edad" : edad,
                    "hojadevida" : hojadevida
                    
                },
                dataType: "html",
                error: function(){
                    alert("error petición ajax");
                },
                success:function(data){		
                    if(data==0){

                        $(".mensaje-ok").html('<center style="font-size:20px; color: green ">Su mensaje ha sido enviado</center>');
                        $('.mensaje-ok').fadeIn().delay(4000).fadeOut();
                        jQuery.fn.reset = function () {
                            $(this).each (function() { this.reset(); });
                        }
                        $('.form-cont').reset();
                        grecaptcha.reset ();

                    }else{                           
                        if(data==1){
                            if($('.form-cont textarea').val()==''){
                                 $('.name-field textarea').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                            }                                                                
                            $('.form-cont input').each(function(){
                               if($(this).val()==''){                                      
                                $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();                                    
                               } 
                            }); 
                            $('.form-cont select').each(function(){
                               
                               if($(this).val()==''){ 
                                 
                                $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();                                    
                               } 
                            }); 
                        }else{ 
                            
                            $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                        }  
                    }
                    $('.invalid').delay(4000).fadeOut();
                }
            });

      	});
    
});
