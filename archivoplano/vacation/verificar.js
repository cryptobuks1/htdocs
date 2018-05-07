jQuery(window).ready(function($){
    $('.enviarVacaciones').click(function(){
        $('.ajax-loader').fadeIn();
        var terminos="";
        var email='';
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

        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (regex.test($('.email').val().trim())) {
            email='si';
        }else{
          $('.email').siblings('.help-block').fadeIn().text($('.email').data('validation-required-message')).delay(5000).fadeOut();
        }
        if($('.terminos').is(':checked')){
           terminos='si';
        }else{
            $('.terminos').siblings('.help-block').fadeIn().text($('.terminos').data('validation-required-message')).delay(5000).fadeOut();
        }
        if(campos==cantidadcampos && terminos=='si' && email=='si' ){
         
            $.ajax({       
              type: 'POST',
              dataType: "html",
              url: 'http://lupaweb.com/vacation/procesar.php',
              data: {
                'nombre': $('#name').val(),
                'email':$('#mail').val(),
                'nino':$('#nombre').val(),
                'telefono':$('#tel').val()
              },
              error: function(){
                alert('error petición ajax');
              },
              success:function(data){
                if(data==3){
                  $('.alert').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Usuario ya esta registrado</div>').delay(3000).fadeOut();
                    $('.ajax-loader').fadeOut();
                }else{
                  if(data==0){
                    $('.alert').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Ya se lleno el cupo del curso de vacaciones</div>').delay(3000).fadeOut();
                    $('.ajax-loader').fadeOut();
                  }else{
                    if(data==1){
                        $('.alert').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Todos los campos son obligatorios</div>').delay(3000).fadeOut();
                        $('.ajax-loader').fadeOut();
                    }else{
                      if(data==2){
                          $('.alert').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Correo electrónico errado</div>').delay(3000).fadeOut();
                          $('.ajax-loader').fadeOut();
                      }else{
                          $('.alert').fadeIn().html('<div style="border:1px solid green; color:green;" clas="exito">Usuario Registrado</div>').delay(3000).fadeOut();
                          $('.ajax-loader').fadeOut();
                          $('.req').val('');
                      }
                    }
                  }
                }
              }
            }); 
        }else{
            $('.alert').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Upps! algo salio mal</div>').delay(3000).fadeOut();
            $('.ajax-loader').fadeOut();
        }
    });
});