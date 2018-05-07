

$(window).ready(function(){
  function cargarSelect(clase){
    for(var i=1;i<100;i++) {
      
        $(clase).append('<option>'+i+'</option>');
    }
  }
  function Orden(nombre, cant, valor, detalle){ 
      this.nombre = nombre;
      this.cant = cant;
      this.valor = valor;
      this.det = det;                     
  } 
      
  function adicional(nombre_ad, cant_ad, valor_ad, check, group, max){
      this.nombre_ad = nombre_ad;
      this.cant_ad = cant_ad;
      this.valor_ad = valor_ad;
      this.check = check;
      this.group = group;
      this.max = max;
  }
  function combo(nombre_co, valor_co, gaseosa){
      this.nombre_co = nombre_co;
      this.valor_co = valor_co;
      this.gaseosa = gaseosa;
  }
  function valortotal(valor_ad, valor_co){
      this.valor += parseInt(valor_ad) + parseInt(valor_co);
      return this.valor;
  }

  var valorp = '';
  var nombrep = '';
  var cantidad =0;
  var det='';
  var cantaddi = 0;
  var v1 = '';
  var orden = new Orden('','','');
  var adi = new adicional('','','','','');
  var theadic = [];  
  var ordenes=[];
  var valortotal=0; 
  $('.btn_comprar').click(function(){  
      cargarSelect('.cant-orden');    
      v1 = $(this).attr('prod');     
      valorp = $('.ad-'+v1 +' h2').attr('data-valor');
      nombrep = $('.ad-'+v1 +' h3').text();
      cantidad = $('#prod-'+v1 +' .cant-orden').val();
      orden = new Orden(nombrep,1,valorp,det);
      Object.defineProperties(orden,{
        valort: {
          get: function(){
            return this.valor;
          
          },
          set: function(value){
            this.valor = value;
          }
        }
      });
      valortotal=orden.valor;
      $('.valor-ad h2').text('$ '+orden.valort);
      $('.cant-adicional').attr('max', orden.cant);      
      
      $('.ad-'+v1 +' .adicional').each(function(i){
        var valora = $(this).data('price');
        var nombrea = $(this).data('name');
        var nombre = $(this).data('name');
        var estado = $(this).is(":checked");
        var group = $(this).data('group');      
        adi = new adicional(nombrea, cantidad ,valora, estado, group, orden.cant);            
        Object.defineProperties(adi,{
          cantad: {
            get: function(){
              return this.cant_ad;
            
            },
            set: function(value){
              this.cant_ad = value;
              this.valor_ad = value;
            }
          }
        }); 
        theadic[nombre]=adi; 
        
      }); 
      $.ajax({
            type: "POST",
            url: "php/comprobar_ad.php",
            data: {
                      "id_producto" : v1
            },
            dataType: "html",
            error: function(){
                alert("error petición ajax");
            },
            success:function(data){
                if(data == "true"){
                    $('.ad-'+v1).fadeIn(150);
                    $('.ad-'+v1).siblings('.modal-overlay').fadeIn();
                                       

                }else{

                }
            }
      });
      $('.icon-cancel').click(function(){
      $('.ad-'+v1).fadeOut(10);
      $('.ad-'+v1).siblings('.modal-overlay').css({'visibility':'hidden'});
    });
  });
  $('.cant-orden').change(function(){
    var cantOr=$(this).val();
    orden.cant=cantOr;
    alert(orden.cant);
    valortotal=parseFloat(orden.valor) * parseFloat(orden.cant);
    orden.valor=valortotal
    $('.valor-ad h2').text('$ '+valortotal);
    $('.ad-'+v1 +' .dinero').each(function(i){
        var valora = $(this).data('price')*orden.cant;
        var nombrea = $(this).data('name');   
        var estado = $(this).is(":checked");                    
        adi2 = new adicional(nombrea, orden.cant ,valora, estado, theadic[nombrea].group, orden.cant);            
        
        theadic[nombrea]=adi2; 
        $(this).text('+ '+theadic[nombrea].valor_ad);
    }); 
    
  });
  $('.cant-adicional').change(function(){      
      var index = $(this).data('name');
      var v = $(this).val();
      var valora = $(this).siblings('.adicional').data('price');
      theadic[index].cant_ad = v;
      theadic[index].valor_ad = theadic[index].cant_ad*valora;
      if(v>0){
        theadic[index].check=true;
        $(this).siblings('.dinero').text('$ '+theadic[index].valor_ad.toFixed(2));
        
      }else{
        theadic[index].check=false;        
      }
      $(this).siblings('.adicional').prop("checked", theadic[index].check);         
  });
  
  $('.dialog .adicional').change(function(){
    var index = $(this).data('name');
    $('.bebidas').each(function(i,e){
      var pos = $(e).data('name');
      if(pos!=index){
        theadic[pos].check=false;
      }
    });
      if($(this).is(':checked')){  

        theadic[index].check=true;
        if(theadic[index].group=='combos'){ 
            $('.zbebidas input').attr('disabled', false);
        }     
                     
        $(this).siblings('.cant-adicional').attr('value','1'); 
        theadic[index].cant_ad = 1; 
        
              
        //orden.valort = parseFloat(orden.valor)+parseFloat(theadic[nombre].valor_ad);
      }else{

        if(theadic[index].group=='combos'){ 
          $('.zbebidas input').attr('disabled', true);
          $(this).siblings('.cant-adicional').attr('value','0');
          theadic[index].cant_ad = 0;
        }
        theadic[index].check=false;
        
        $(this).siblings('.cant-adicional').attr('value','0');
        theadic[index].cant_ad = 0;
        
      } 

      
  });
  
  $('.addi').click(function(){
    var valoraddi = 0;   
    var detorden = '';

    for(i in theadic){          
      if(theadic[i].check==true){ 
        valoraddi = valoraddi + theadic[i].valor_ad; 
        detorden=detorden+'  '+theadic[i].nombre_ad;               
      }else{

      }
    }    
    alert(valoraddi);
    valortotal = parseFloat(orden.valor) + parseFloat(valoraddi);  
      
    $('.valor-ad h2').text('$ '+valortotal);   
    orden.det=detorden;
  });

  var o = 0; 
  $(".al_carrito, .icon-car").click(function(){
    ordenes[o] = orden;
    $('.modal-overlay').fadeOut();
    $('.dialog').fadeOut();
      $.ajax({
            type: "POST",
            url: "php/cargarcarro.php",
            data: {
                      "nombre_or" : ordenes[o].nombre,
                      "cant_or" : ordenes[o].cant,
                      "price_or" : ordenes[o].valor,
                      "det_or" : ordenes[o].det,
                      "index" : o
            },
            dataType: "html",
            error: function(){
                alert("error petición ajax");
            },
            success:function(data){
                $('.itemCart').html(data);



            }
      });
    o++;
    $('.addi input').prop("checked", false); 
    $('.zbebidas input').attr('disabled', true);
    for(i in theadic){
      theadic[i].check=false;
    }

    var prod = $(this).val();
      var ad = "";
        $('.adicionales input').each(function(index, e) {      
          if($(this).attr('checked', true)){
            ad+=$(this).attr('name');
          }
        });
    
    $('.al_carrito').mouseleave(function(){
      $('.alerta').remove()
    });
  });
  $('.cerrar-cart').click(function(){
    $('.carrito').animate({top:'100px'}).fadeOut();
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
  $("#cancelCart").click(function(){
    alert('vaciar');
    $(".itemCart").load("php/vaciar.php");
    $(".cantidadt").load("php/actualizarcantidad.php");
    $(".totalGlobal").load("php/actualizarvalor.php");
    $(".enlacevalidar").load("php/actualizarenlace.php");
  });
    $(".enlacevalidar").load("php/actualizarenlace.php");
  $(".al_carrito").click(function(){
    $(".enlacevalidar").load("php/actualizarenlace.php");
  });
  $('.masitem').click(function(){
    var nombre = $(this).data('index');
    var det = $(this).data('det');  
    $.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-mas' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
        }); 
    $('.cantidadt').load('php/actualizarcantidad.php');
    $('.totalGlobal').load('php/actualizarvalor.php');
  });
    $('.menositem').click(function(){
    var nombre = $(this).data('index');
    var det = $(this).data('det');  
    $.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-menos' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
        }); 
    $('.cantidadt').load('php/actualizarcantidad.php');
    $('.totalGlobal').load('php/actualizarvalor.php');
    $('.enlacevalidar').load('php/actualizarenlace.php');
  });
  function(){
  $('.quitar').click(function(){    
    var nombre = $(this).data('index');
    var det = $(this).data('det');  
    $.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-delete' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
        }); 
    $('.cantidadt').load('php/actualizarcantidad.php');
    $('.totalGlobal').load('php/actualizarvalor.php');
  });    
/*cierre añadir al carro*/
  
});