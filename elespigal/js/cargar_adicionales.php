<?php
echo "$(window).ready(function(){
    function Orden(nombre, cant, valor){ 
        this.nombre = nombre;
        this.cant = cant;
        this.valor = this.cant*valor;                     
    } 
        
    function adicional(nombre_ad, cant_ad, valor_ad){
        this.nombre_ad = nombre_ad;
        this.cant_ad = cant_ad;
        this.valor_ad = this.cant_ad*valor_ad;
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
    var cantidad ='';
    
    var orden = new Orden('','','');";
    $hola = "hola";
    
    echo"$('.btn_comprar').click(function(){
        alert(".$hola.");
        var v1 = $(this).attr('prod');
        valorp = $('.ad-'+v1 +' h2').attr('data-valor');
        nombrep = $('.ad-'+v1 +' h3').text();
        cantidad = $('#prod-'+v1 +' input').val();
        orden = new Orden(nombrep,cantidad,valorp);
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
        $('.valor-ad h2').text('$ '+orden.valort);
        $('.cant-adicional').attr('max', orden.cant);      
        
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
                                         

                  }else{

                  }
              }
        });
        $('.icon-cancel').click(function(){
        $('.ad-'+v1).fadeOut(10);
    });
    });
  var theadic = [];

  
  $('.dialog .adicional').change(function(){
      
      var pos = $(this).parent().parent().parent().attr('id-data');
      var valora = $(this).data('price');
      var nombrea = $(this).data('name');
      var canta =  $(this).siblings('input').val(); 
      var nombre = $(this).data('name');
      
      var adi = new adicional(nombrea, canta ,valora); 
         
      Object.defineProperties(adi,{
        cantad: {
          get: function(){
            return this.cant_ad;
          
          },
          set: function(value){
            this.cant_ad = value;
          }
        }
      }); 
      theadic[nombre]=adi;   
      $(this).siblings('.dinero').text('$ '+theadic[nombre].valor_ad);
      if($(this).is(':checked')){
             
        orden.valort = parseFloat(orden.valor)+parseFloat(theadic[nombre].valor_ad);
      }else{
        orden.valort = parseFloat(orden.valor)-parseFloat(theadic[nombre].valor_ad);
        
          theadic[nombre]='';
          alert('hola');       
      }      
      $('.valor-ad h2').text('$ '+orden.valort);

      
   
  });
  $('.cant-adicional').change(function(){
      var index = $(this).data('name');
      theadic[index].cant_ad = $(this).val();
      alert(theadic[index].valor_ad);
      theadic[index].valor_ad = theadic[index].cant_ad*1.35;
      alert(theadic[index].valor_ad);
      $(this).siblings('.dinero').text('$ '+theadic[index].valor_ad)
     
  });


});";
?>