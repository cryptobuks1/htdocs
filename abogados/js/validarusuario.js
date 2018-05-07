$('#user').focusout( function(){
    if($('#user').val()!= ""){
        $.ajax({
            type: "POST",
            url: "../php/validar.php",
            data: ":user="+$('#user').val(),
            beforeSend: function(){
              $('#mensaje').html('<img src="img/loader.gif"/> verificando...');
            },
            success: function( respuesta ){
              if(respuesta == '1')
                $('#mansaje').html("Disponible");
              else
                $('#mensaje').html("No Disponible");
            }
        });
    }
});