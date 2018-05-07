$(window).ready(function(){
  var anchobody = $('body').css('width');
    var ancho = anchobody.split('px');

   if(ancho[0] > 768){
        if($('.carrito').css('height')>'500px'){
            $('.menu-cat').css({'position':'absolute'});
            $('.ircarrito').fadeIn();
        }else{
            $('.menu-cat').css({'position':'fixed'});
            $('.ircarrito').fadeOut();
        }
    }  
      $('.ircarrito a[href*=#]').click(function() {
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
    function cargarSelect(clase){
    for(var i=1;i<100;i++) {
      
        $(clase).append('<option>'+i+'</option>');
    }
  }
  function hora(){
    var fecha = new Date()
    var hora = fecha.getHours()
    var minuto = fecha.getMinutes()
    var segundo = fecha.getSeconds()
    if (hora < 10) {hora = "0" + hora}
    if (minuto < 10) {minuto = "0" + minuto}
    if (segundo < 10) {segundo = "0" + segundo}
    var horita = hora + ":" + minuto + ":" + segundo
    return horita;
    
  }
  var v1 = 0;  
  var cantidad = 1;
  var valorin=0;
  var valorunit=0;
  var valortotal=0;
  var orden =[];
  var optionGroup=[];
  var option=[]; 
  /*se da click en el btn ordenar del producto*/
  
  $('.btn_comprar').click(function(){           
      cargarSelect('.cant-orden');   
      v1 = $(this).data('id');
      $('.ad-'+v1+' .sabores input').eq(0).prop("checked", true);
      $('.ad-'+v1+' .al_carrito').attr('data-total', valorunit.toFixed(2));
       $('.ad-'+v1).fadeIn();

       $('.ad-'+v1).siblings('.modal-overlay').fadeIn();
      valorin=$('.ad-'+v1+' h2').data('valor'); 
      valortotal=$('.ad-'+v1+' h2').data('valor'); 
      valorunit = $('.ad-'+v1+' h2').data('valor');
  });

  $('.icon-cancel').click(function(){
    $('.ad-'+v1).fadeOut(10);
    $('.ad-'+v1).siblings('.modal-overlay').css({'visibility':'hidden'});
  });
  /*cierre boton ordenar en el produto*/
  
  /*check en un extra*/
  var cantact = 1;
  $('.cant-orden').click(function(){
    cantact = $('.ad-'+v1+' .cant-orden').val();
    valorin=$('.ad-'+v1+' h2').attr('data-valor');  
    
    $('.itemAddi').each(function(){
        if($(this).is(':checked')){      
        }     
    });
  });
  $('.combo').change(function(){ 
     
    if($(this).is(':checked')){
      $('.ad-'+v1+' .zbebidas').fadeIn();
      $('.ad-'+v1+' .titulo-bebidas').fadeIn();
      $('.ad-'+v1+' .zbebidas input').attr('disabled', false);
      $('.ad-'+v1+' .zbebidas input').eq(0).prop("checked", true);
    }else{
        $('.ad-'+v1+' .zbebidas').fadeOut();
        $('.ad-'+v1+' .titulo-bebidas').fadeOut();
        $('.ad-'+v1+' .zbebidas input').attr('disabled', true);
        $('.ad-'+v1+' .zbebidas input').eq(0).prop("checked", false);
    }
  });
  $('.cant-orden').change(function(){     
    cantidad = $('.ad-'+v1 +' .cant-orden').val();
    if(cantact<cantidad){
      var difcant = cantidad-cantact;
      var valordif = valorin*difcant;
      valortotal = parseFloat(valortotal)+parseFloat(valordif);    
    }else{
      var difcant = cantact-cantidad;
      var valordif = valorin*difcant;
      valortotal = parseFloat(valortotal)-parseFloat(valordif);
    }
    valororden();
  });
  $('.combos .no').change(function(){
    if($(this).is(':checked')){
       $('.ad-'+v1+' .zbebidas').fadeOut();
       $('.ad-'+v1+' .titulo-bebidas').fadeOut();
       $('.ad-'+v1+' .zbebidas input').attr('disabled', true);
       $('.ad-'+v1+' .zbebidas input').prop("checked", false);
    }
  });
  $('.no').change(function(){
    var grupo = $(this).data('group');
    if($(this).is(':checked')){
      
        $('.'+grupo+' .itemAddi').each(function(e){

          if($(this).is(':checked')){
            var suma = $(this).data('price');
            var sumad = suma*cantidad;
            valorunit -= suma;
            valortotal-=sumad;
            $(this).prop("checked", false);
            
          }
        });

    } 
    valororden();   

  });

  $('.itemAddi').change(function(){
      var form = $(this).data('form');
      var suma = $(this).data('price');  
      $('.'+form+' .no').prop("checked", false); 
      if($(this).is(':checked')){  
        
        var sumad = suma*cantidad; 
        valorunit = parseFloat(valorunit)+parseFloat(suma);        
        valortotal=parseFloat(valortotal)+parseFloat(sumad);                
      }else{ 
          
        var sumad = suma*cantidad;
        valorunit = parseFloat(valorunit)-parseFloat(suma); 
        valortotal=parseFloat(valortotal)-parseFloat(sumad);
      } 
      valororden();  
  });

  /* cierre check extra*/
  /*actualizacion de valores*/
 var optionphp=[];
 var ordenphp=[];
  
  function grupos(clase){
    var id_g = $(clase).data('idgroup');
    var name_g = $(clase).data('nameg');
    var group = $(clase).data('group');  
    if(optionGroup.length==0){ 
      optionGroup.push({'id_g':id_g, 'group':group, 'name_g':name_g, 'option':[]});
      
    }else{
      if(optionGroup.id_g!=id_g){      
        optionGroup.push({'id_g':id_g, 'group':group, 'name_g':name_g, 'option':[]}); 
      } 
      
    }
  }
  function valororden(){
    $('.ad-'+v1+' .al_carrito span').text(valortotal.toFixed(2));
    $('.ad-'+v1+' .al_carrito').attr('data-total', valorunit.toFixed(2));
    $('.ad-'+v1+' h2').attr('data-valor',valorunit.toFixed(2));  
    
    //$('.ad-'+v1+' h2 span').text(valorunit.toFixed(2));  
    
  }
  
  function actvalores(){
      $('.totalcarrito').load('php/actualizarvalor.php');
  } 
 
    function ini_valores(){
        valorin=$('.ad-'+v1+' h2 span').text();
        valorunit=0;
        valortotal=0;
        cantidad=1;
        valororden();  
        option=[];
        orden = [];
        $('.ad-'+v1+' .cant-orden').val('1');
        $('.ad-'+v1+' .zbebidas').fadeOut();
        $('.ad-'+v1+' .titulo-bebidas').fadeOut();
        $('.ad-'+v1+' .al_carrito span').text(valorin);
        $('.itemAddi').prop("checked", false);
        $('.no').prop("checked", true);
    }
  function actcant(){
      $('.cantCart').load('php/actualizarcantidad.php');
  } 
  actcant();
  $(".al_carrito").click(function(){
    $('.cargando').fadeIn(); 
    var det='';
    if($('.ad-'+v1+' .itemAddi').length>0){
        $('.ad-'+v1+' .itemAddi').each(function(){
          if($(this).is(':checked')){
            var id_ad = $(this).data('id');
            var name = $(this).data('name');  
            var price = $(this).data('price'); 
            var grupo = $(this).data('group');
            option.push({'id_pGroup':id_ad, 'grupo':grupo, 'namead':name, 'quality':1, 'valor':price,});
            det = det+name; 
          }        
        
        }); 
    }
    
     
     console.log(option);
      /*grupos('.item-group');
      for(i in option){
        for(j in optionGroup){
          if(option[i].grupo==optionGroup[j].group){
            optionGroup[j].option.push(option[i]);

          }

        }
      }*/      
      var valorpt = $(this).find('span').text();       
      var nombrep = $('.ad-'+v1 +' h3').text();
      var cantidad = $('.ad-'+v1 +' .cant-orden').val();
      var delivery = $('.delivery span').text();
      var valorp = valorpt/cantidad;
 
      $.ajax({            
            type: "POST",
            url: "php/cargarcarro.php",
            data: {
                      'delivery':delivery,
                      "id_prod":v1,
                      "nombre":nombrep,
                      "cantidad":cantidad,
                      "valor":valorp,
                      "hora":hora(),
                      "deta":det,
                      "deliv":'Domicilio',
                      "option":option 
                                           
            },
            dataType: "html",
            error: function(){
                alert("error petición ajax");
            },
            success:function(data){
             
                $('.itemCart').html(data);
                 $('.cargando').fadeOut();
                 ini_valores();
                $('.ad-'+v1).fadeOut(10);
                $('.ad-'+v1).siblings('.modal-overlay').fadeOut();
                location.reload();                              
            }
      });
      
     
      
  });
  $('.masitem').click(function(){  
    $('.cargando').fadeIn(); 
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
              'delivery':delivery,
              'id-mas' : id_prod,
              'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);  
        $('.cargando').fadeOut();

      }
        }); 
      actcant();
      actvalores();
  });  
  $('.menositem').click(function(){  
    $('.cargando').fadeIn(); 
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
              'delivery':delivery,
              'id-menos' : id_prod,
              'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);
        $('.cargando').fadeOut();

      }
    }); 
      actcant();
      actvalores();

  });
  $('.quitar').click(function(){   
    $('.cargando').fadeIn(); 
    var id_prod = $(this).data('id_prod');
    var det = $(this).data('det');
    var delivery = $('.delivery span').text();
      $.ajax({
      type: 'POST',
      url: 'php/cargarcarro.php',
      data: {
              'delivery':delivery,
              'id-delete' : id_prod,
              'det' : det                     
      },
      dataType: 'html',
      error: function(){
        alert('error petición ajax');
      },
      success:function(data){
        $('.itemCart').html(data);  
        $('.cargando').fadeOut();

      }
        }); 
      actcant();
      actvalores();
  });   
$(".delivery input").click(function(){     
    var deliv = $(this).data('deliv');
    var v = $(this).val();
     $('.totalcarrito').load('php/actualizarvalor.php?deliv='+deliv+'&v='+v);
});
$("#cancelCart").click(function(){ 
     $('.cargando').fadeIn();
    $(".itemCart").load("php/vaciar.php", function(){
        $('.cargando').fadeOut();
    });
    actvalores();
    actcant();  

});
$(".cancel-ad").click(function(){
    ini_valores();
    location.reload();       
});



$('#cedula').focusout(function(){   
  var ci=$(this).val();
  $('.cargando').fadeIn();
  $('.cambio-datos').load('php/vercedula.php?ci='+ci, function(){
      $('.cargando').fadeOut();        
  });
});
$('.btnver').click(function(){   
  var ci=$('#cedula').val();
  $('.cargando').fadeIn();
  $('.cambio-datos').load('php/vercedula.php?ci='+ci, function(){
      $('.cargando').fadeOut();        
  });
});
$(".cancel-envio, .omitir").click(function(){
    $('.diacedula').fadeOut(10);
    $('.diareg').fadeOut(10);
    $('.confirmacion').fadeOut(10);
    $('.modal-overlay').fadeOut();
    location.reload();
});
$('.confirmacion .enviar').click(function(){
    var sug = $('.sugpedido input').val();
     $.ajax({       
        type: 'POST',
        url: 'enviarsugp.php',
        data: {
                'sug':sug
                               
        },
        dataType: 'html',
        error: function(){
          alert('error petición ajax');
        },
        success:function(d){
            if(d==0){
                $('.mensaje-sug').fadeIn().delay(4000).fadeOut();
                $('.mensaje-sug').html('<center style="color:green">Sus sugerencias fueron enviadas</center>');  
                $('.confirmacion').fadeOut(10);
                $('input').val('')
                $('.modal-overlay').fadeOut();
            }else{
                $('.invalid').fadeIn().delay(4000).fadeOut();
               
            }
            
          
        }
      }); 
    
});
$(".atras-envio").click(function(){
    $('.diareg').fadeOut(10);
    $('.formres').text(''); 
});

$(".cancel-cedula, .atras-cart").click(function(){
    $('.diacedula').fadeOut(10);
    $('.modal-overlay').fadeOut();
    location.reload();
});
$(".editar-datos").click(function(){
    $('.cambio-datos').animate({height:'230px'},1000);
    $('.datosreg').animate({height:'0'},500);
    $('.refubi').animate({height:'0'},500);
});

/*cierre actualizacion de valores*/

});