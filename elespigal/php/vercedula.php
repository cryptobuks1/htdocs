
<?php
@session_start();
include "config.php";
echo"
<script>
$(window).ready(function(){
    $('.guardar').click(function(){
        var ci = $('.ci').val();
        var cic = $('.cic').val();  
        var mail = $('.mail').val();  
        var ref = $('.ref').val(); 
        var tel = $('.tel').val();  
        var telcon = $('.telcon').val(); 
        var nombre = $('.nombre').val();
        var dir = $('.dir').val();  

        var validado=0;
        var cedula=0;
        var telefono=0;
        var campos=0;
        var correo=0;
        if(cic==ci){
            cedula=2;
        }else{
           
            $('.cic, ci').siblings('.invalid').fadeIn().delay(4000).fadeOut();
        }
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
 
        //Se utiliza la funcion test() nativa de JavaScript
        if (regex.test(mail) || mail=='') {
            correo=2;
        }else {
           
            $('.mail').siblings('.invalidcupon').fadeIn().delay(4000).fadeOut();
        }
        if(tel==telcon ){
            telefono=2;
        }else{
          
            $('.telcon, .tel').siblings('.invalid').fadeIn().delay(4000).fadeOut();                       
        }
        var vacio =0;
        var cantidad = $('.req').length;
        $('.req').each(function(){                        
            if($(this).val()==''){
               
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
            $.ajax({
                type: 'POST',
                url: 'php/grabaruser.php',
                data: {
                        'ci' : ci,
                        'nombre' : nombre,
                        'mail':mail,
                        'dir':dir,
                        'tel':tel,
                        'ref':ref
                },
                dataType: 'html',
                error: function(){
                    alert('error petición ajax');
                },
                success:function(data){  
                    if(data==1) {                
                        $('.guardado').fadeIn().html('<span style=green>Usuario Guardado</span>').delay(2000).fadeOut();
                        $('.guardar').fadeOut();
                        $('.campouno input').removeAttr('disabled');
                        $('.editarguardado').fadeIn();
                    }else{
                        $('.guardado').fadeIn().html('<span style=red>Usuario ya Existe</span>').delay(2000).fadeOut();
                        $('.guardar').fadeOut();
                        $('.editarguardado').fadeIn();
                    }
                }
            });
            $('.campouno input').attr('disabled', 'true');

        }     
    });
    $('.editarguardado').click(function(){
        var ci = $('.ci').val();  
        var mail = $('.mail').val();  
        var ref = $('.ref').val(); 
        var tel = $('.tel').val();  
        var telcon = $('.telcon').val(); 
        var nombre = $('.nombre').val();
        var dir = $('.dir').val();  
        var validado=0;
        var cedula=0;
        var telefono=0;
        var campos=0;
        var correo=0;
        
        var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
 
        //Se utiliza la funcion test() nativa de JavaScript
        if (regex.test(mail) || mail=='') {
            correo=4;
        }else {
           
            $('.mail').siblings('.invalidcupon').fadeIn().delay(4000).fadeOut();
        }
        if(tel==telcon ){
            telefono=2;
        }else{
          
            $('.telcon, .tel').siblings('.invalid').fadeIn().delay(4000).fadeOut();                       
        }
        var vacio =0;
        var cantidad = $('.req').length;
        $('.req').each(function(){                        
            if($(this).val()==''){
               
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
            $.ajax({
                type: 'POST',
                url: 'php/editaruser.php',
                data: {
                        'ci' : ci,
                        'nombre' : nombre,
                        'mail':mail,
                        'dir':dir,
                        'tel':tel,
                        'ref':ref
                },
                dataType: 'html',
                error: function(){
                    alert('error petición ajax');
                },
                success:function(data){                               
                    $('.guardado').fadeIn().html('<span style=green>Usuario editado</span>').delay(2000).fadeOut();    
                }
            });
            $('.campouno input').attr('disabled', 'true');

        }     
    });
    $('.editar').click(function(){
        $('.campouno input').removeAttr('disabled');
        $('.edicion').fadeIn();     
    });
});
</script>";
$placae = $_GET["ci"];
$caracteres = array("-", " ", "/", "*", "_", "+", ".", ",", ";", ":", "&");
$ci = str_replace($caracteres,"",$placae);


$contador=0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
ini_set('date.timezone','America/Bogota'); 
	$peticion = "SELECT * FROM usuarios WHERE ci='".$ci."'";
	$resultado = mysqli_query($conexion, $peticion);
	$contador= mysqli_num_rows($resultado);   
	if($contador==0){
            
        echo"  
                                           
            <div class='resgistro'>
            
            <div class='titulo-usuario'>
                    <h4>Registrate por única vez! <font style='color:#000'>Para tus próximos pedidos</font></h4>
            </div>
            <div class='confcedula'>
                <label><span class='asterisco floatnone '>*</span>Confime su número de cédula:</label>                   
                <div><input class='cic ' type='tel' name='cic'  placeholder='1755555555'/><span class='invalid invalidposr'></span></div>
            </div>   
            <input class='control' type='hidden' value='nuevo'/>
            <div class='campouno'>
                <label><span class='asterisco floatnone'>*</span>Nombre y Apellidos:</label>
                <div><input class='nombre req' type='text' name='cliente' placeholder='Nombre y Apellido'/><span class='invalid invalidcupon'></span></div>
            </div>
            <div class='campouno'>
                <label>E-mail <span style='color:#a6010c'>(para confirmación)<span></label>
                <div><input class='mail' type='mail' name='mail' placeholder='tumail@gmail.com'/><span class='inmail invalid invalidcupon'></span></div>
            </div>
            <div class='campouno'>
                <label><span class='asterisco floatnone'>*</span>Dirección / Barrio:</label>
                <div><input class='dir req' type='text' name='dir' placeholder='Ovitos 16-21 y Almendras / Barrio Ficoa'/><span class='invalid invalidcupon'></span></div>
            </div>
            <div class='campouno'>
                <label><span class='asterisco floatnone'>*</span>Referencia de Dirección:</label>
                <div><input class='ref req' name='ref' placeholder='Frente a... Al lado de... Color casa'><span class='invalid invalidcupon'></span></div>
            </div>
            
            <div class='campouno'>    
                <label><span class='asterisco floatnone'>*</span>Teléfono:</label>               
                <div><input class='tel req' type='tel' name='tel' placeholder='Teléfono para confirmar'/><span class='invalid invalidcupon'></span></div>
            </div>
            <div class='campouno'>    
                <label><span class='asterisco floatnone'>*</span>Confirmación Teléfono:</label>
                <div><input class='telcon req' type='tel' name='telcon' placeholder='Confirme número teléfono'/><span class='invalid invalidcupon'></span></div>
            </div>  
            <div class='temporal'>
                <div class='boton guardar'>Guardar</div>
                <div class='boton editar editarguardado'><i class='fa fa-pencil'></i>Editar Datos</div>
                <!--<div class='boton editar'><i class='fa fa-pencil'></i>Editar</div>-->
                <div class='guardado'></div>
                <input class='modify' name='modifi' type='hidden'  value='new' checked/>            
            </div>                    

        </div>";
    }else{	
        $peticion = "SELECT * FROM usuarios WHERE ci='".$ci."'";
        $resultado = mysqli_query($conexion, $peticion);
        while($fila=mysqli_fetch_array($resultado)){		
            echo"
                <input class='cic' type='hidden' name='cic' value='".$ci."'  />
                <div class='resgistro'>
                <div class='titulo-usuario'>
                        <h4>Hola! ".$fila['nombre']."</h4>
                </div>
                <input class='control' type='hidden' value='editar'/>
                <div class='campouno'>
                    <label><span class='asterisco floatnone'>*</span>Nombre y Apellidos:</label>
                    <div><input class='nombre req' type='text' name='cliente' value='".$fila['nombre']."' placeholder='Ingrese su nombre completo' disabled/><span class='invalid invalidcupon'></span></div>
                </div>
                <div class='campouno'>
                    <label>E-mail <span style='color:#a6010c'>(para confirmación)<span></label> 
                    <div><input class='mail' type='mail' name='mail' value='".$fila['mail']."' placeholder='tumail@gmail.com'  disabled/><span class='inmail invalidcupon'></span></div>
                </div>
                <div class='campouno'>
                    <label><span class='asterisco floatnone'>*</span>Dirección / Barrio:</label>
                    <div><input class='dir req' type='text' name='dir' value='".$fila['dir']."' placeholder='Ovitos y Almendras / Barrio Ficoa' disabled/><span class='invalid invalidcupon'></span></div>
                </div>
                <div class='campouno'>
                    <label><span class='asterisco floatnone'>*</span>Referencia de Dirección:</label>
                    <div><input class='ref req' name='ref' value='".$fila['referencia']."' placeholder='Frente a... Al lado de... Color casa' disabled><span class='invalid invalidcupon'></span></div>
                </div>
                
                
                <div class='campouno'>    
                    <label><span class='asterisco floatnone'>*</span>Teléfono:</label>               
                    <div><input class='tel req' type='tel' name='tel' value='".$fila['tel']."' placeholder='Teléfono para confirmar' disabled/><span class='invalid invalidposr'></span></div>
                </div>
                <div class='campouno'>    
                    <label><span class='asterisco floatnone'>*</span>Confirmación Teléfono:</label>
                    <div><input class='telcon req' type='tel' name='telcon' value='".$fila['tel']."' placeholder='Confirme número teléfono'  disabled/><span class='invalid invalidposr'></span></div>
                </div>
                
                <div class='boton editar'><i class='fa fa-pencil'></i>Editar Datos</div>
                <div class='edicion'>
                    <article class='tipo-cambio'>
                        <div class='temporal'>
                            <input class='modify' name='modifi' type='radio'  value='tem' checked/> <span class='invalid invalidposr'></span>
                            <label>Temporal</label>
                            <small>(Cambiar datos temporalmente)</small>
                        </div>
                        <div class='perma'>
                            <input class='modify' name='modifi' type='radio'  value='per' /> <span class='invalid invalidposr'></span>                      
                            <label>Permanente</label>
                            <small>(Cambiar datos permanentemente)</small>
                        </div>
                    </article>
                </div>

            </div>";
        }
    }
           
?>
