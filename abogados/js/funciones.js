$(document).ready(function () {
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    $(".boton, .btrecordar").click(function (){
        $(".error").remove();
        if( $(".nombre").val() == "" ){
            $(".nombre").focus().after("<span class='error'>Ingrese su nombre</span>");
            return false;
        }else if( $(".apellido").val() == ""){
            $(".apellido").focus().after("<span class='error'>Ingrese su apellido</span>");
            return false;
		}else if( $(".tel").val() == ""){
            $(".tel").focus().after("<span class='error'>Ingrese un teléfono</span>");
            return false;
		}else if( $(".email").val() == "" || !emailreg.test($(".email").val()) ){
            $(".email").focus().after("<span class='error'>Ingrese un email correcto</span>");
            return false;
		}else if( $(".mensaje").val() == "" ){
            $(".mensaje").focus().after("<span class='error'>Ingrese un mensaje</span>");
            return false;
		}else if( $(".pass").val() == "" || !emailreg.test($(".email").val()) ){
            $(".email").focus().after("<span class='error'>Ingrese su contraseña</span>");
            return false;
		}else if( $(".fecha").val() == "" ){
            $(".mensaje").focus().after("<span class='error'>Fecha de nacimiento</span>");
            return false;
        }
    });
    $(".nombre, .apellido, .tel, .mensaje").keyup(function(){
        if( $(this).val() != "" ){
            $(".error").fadeOut();
            return false;
        }
    });
    $(".email").keyup(function(){
        if( $(this).val() != "" && emailreg.test($(this).val())){
            $(".error").fadeOut();
            return false;
        }
    });
});