$(function($){
  $('.enteraste').change(function(){
    if($(this).val()=="Otro" || $(this).val()=="Amigo"){
      $('.detenteraste').addClass('req');
    }
  });
  
  $('.enviarRegistro').click(function(){
      var enteraste="";
      var terminos="";
      $('.enteraste').each(function(index,e){
        if($(this).prop('checked')){
            enteraste=$(this).val();
            if(enteraste==''){
              enteraste='N/A';
            }
        }          
      });
      var cantidadcampos=0;
      var campos=0;    
      $('.req').each(function(){
        cantidadcampos++;
        if($(this).val()==""){
          $(this).siblings('.help-block').fadeIn().text($(this).data('validation-required-message')).delay(5000).fadeOut();
        }else{
          campos++;
        }
      });
      if(enteraste==""){
        $('.radiom').find('.help-block').fadeIn().text($('.radiom').data('validation-required-message')).delay(5000).fadeOut();
      }
      if($('.terminos').prop('checked')){}else{
        $('.losterminos').siblings('.help-block').fadeIn().text($('.losterminos').data('validation-required-message')).delay(5000).fadeOut();
      }
      
      if($('.terminos').prop('checked') && campos==cantidadcampos && enteraste!=''){
        $.ajax({       
          type: 'POST',
          dataType: "html",
          url: 'usuarios/insertarUser.php',
          data: {
            'nombre': $('#name').val(),
            'email':$('#mail').val(),
            'nacimiento':$('#fecha').val(),
            'celular':$('#telefono').val(),
            'taller': $('#taller').val(),
            'residencia':$('#residencia').val(),
            'ciudad':$('#ciudad').val(),
            'enteraste':enteraste,
            'detenteraste':$('.detenteraste').val(),
            'puntos':'',
            'facturas':''
          },
          error: function(){
            alert('error petición ajax');
          },
          success:function(data){

              if(data==1){
                 $('.mensaje-respuesta').fadeIn().html('<div style="border:1px solid green; color:green;" clas="exito">Usuario Registrado</div>').delay(3000).fadeOut();
              }else{
                 $('.mensaje-respuesta').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Upps! algo salio mal</div>').delay(3000).fadeOut();
              }
          }
        }); 
      }else{
         $('.mensaje-respuesta').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Upps! algo salio mal</div>').delay(3000).fadeOut();
      }
  });
});