$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
    /*$('.generar').click(function(){
      var row=[];
      $('.idUser').each(function(index, e){
          row.push($(e).data('id'));
      });
      $.ajax({       
          type: 'POST',
          url: 'usuarios/generarlistado.php',
          data: {
            "row":row
          },
          dataType: 'html',
          error: function(){
            alert('error petición ajax');
          },
          success:function(data){
            alert(data);
            
          }
      });*/ 
    });
    $('.enviarRegistro').click(function(){
        
        $('.enteraste').each(function(index,e){
          if($(this).prop('checked')){
            enteraste=$(this).val();
          }        
        });
        $.ajax({       
          type: 'POST',
          dataType: "html",
          url: 'usuarios/actualizar_user.php',
          data: {
            'id':$('#id').val(),
            'nombre': $('#name').val(),
            'email':$('#mail').val(),
            'nacimiento':$('#fecha').val(),
            'celular':$('#telefono').val(),
            'taller': $('#taller').val(),
            'residencia':$('#residencia').val(),
            'ciudad':$('#ciudad').val(),
            'enteraste':enteraste,
            'detenteraste':$('.detenteraste').val(),
            'puntos':$('#puntos').val(),
            'facturas':$('#facturas').val()
          },
          error: function(){
            alert('error petición ajax');
          },
          success:function(data){
              if(data==1){
                 $('.mensaje-respuesta').fadeIn().html('<div style="border:1px solid green; color:green;" clas="exito">Registro editado</div>').delay(3000).fadeOut();
              }else{
                 $('.mensaje-respuesta').fadeIn().html('<div style="border:1px solid red; color:red;" class="error">Upps! algo salio mal</div>').delay(3000).fadeOut();
              }
          }
        }); 
    });
});
