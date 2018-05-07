
<?php
@session_start();
include "config.php";
echo"<script> 	
	$('.editar-datos').click(function(){
	    $('.cambio-datos').animate({'height':'800px', marginTop:'-40px'},1000);
	    $('.otracedula').animate({marginTop:'-40px'},500);
	    $('.datosreg').animate({height:'0'},500);
            $('.refubi').animate({height:'0'},500);
            $(this).fadeOut();
            $('.cancel-edit').fadeIn();
	});
	$('.terminosleer').click(function(){
	    $('.condiciones').fadeIn().delay(6000).fadeOut();	    
	});
	$('.cancel-edit').click(function(){
	    $('.cambio-datos').animate({'height':'0px', marginTop:'-40px'},500);
            $('.otracedula').animate({marginTop:'0px'},500);            
	    $('.datosreg').animate({height:'250px'},1000);
            $('.refubi').animate({height:'35px'},1000);
            $(this).fadeOut();
            $('.editar-datos').fadeIn();
	});
	 $('.cancelp').click(function(){
            $('.diacedula').fadeOut(10);
            $('.diareg').fadeOut(10);
            $('.confirmacion').fadeOut(10);
            $('.modal-overlay').fadeOut();
            location.reload();
	});
        $('.aplicar').click(function(){
            var campo = $('.campocupon').val();            
            var cupon = 0;  
            if(campo=='0710' || campo=='2' || campo=='3' || campo=='4' || campo=='5'){             
                $('.detallecupon').fadeIn();
                $(this).fadeOut();
                $('.cupon input').attr('data-cupon','Si');
                $('.cupon input').css({'opacity':'0'});
                    
            }else{
                $('.cupon .invalid').fadeIn();
                $('.cupon input').attr('data-cupon','No');
               
            }                                   
        });
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
        /*$('.btnconpedido').click(function(){

            if(local!='-'){
                $('.itemCart').load('php/vaciar.php');  
                $('.totalcarrito').load('php/actualizarvalor.php');
            }else{
                
                $('.mensajelocal').fadeIn().animate({'margin-top':'-3px'}).html('<center>Debe seleccionar un local.</center>').delay(4000).fadeOut().animate({'margin-top':'0px'});            
            }
        });*/
	$('.btnconpedido').click(function(){  
            $('.cargando').fadeIn();
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
                             $('.terminos .invalid').fadeIn().delay(4000).fadeOut();
                        }else{
                            if(data==2 ){
                               
                               $('.mensajelocal .invalid').fadeIn().delay(4000).fadeOut();
                               $('.mensajelocal').fadeIn().animate({'margin-top':'0px'}).html('<center>Debe seleccionar un local.</center>').delay(4000).fadeOut().animate({'margin-top':'0px'});                         
                            }else{
                                if(data==4){
                                    $('.diareg').scrollTop(0);
                                    $('.inmail').fadeIn().delay(4000).fadeOut();
                                }else{
                                    if(data==0){                                                         
                                             $('.diareg').fadeOut();
                                             $('.diacedula').fadeOut();                                                                            
                                             $('.itemCart').load('php/vaciar.php');
                                             $('.cantCart').load('php/actualizarcantidad.php');
                                             $('.totalcarrito').load('php/actualizarvalor.php');
                                             $('.confirmacion').fadeIn(); 
                                    }else{                            
                                        if(data==1){
                                            $('.diareg').scrollTop(0);
                                            if($('.formres textarea').val()==''){
                                                $('.formres textarea').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                            }
                                            $('.infoUser div').find('input').each(function(){
                                                if($(this).val()==''){
                                                    $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                                } 
                                            });
                                        }else{
                                            $('.diareg').scrollTop(0);
                                            $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                        }  
                                    }
                                }
                            }
                        }
                        $('.cargando').fadeOut();
                                                
	            }
	        }); 
  	});
        
	$('.otracedula').click(function(){
	    $('.formres').load('php/otracedula.php');
	});
	$('#cedula').focusout(function(){
	    var ci=$(this).val();
	    $('.formres').load('php/llenarform.php?ci='+ci);
	});
</script>
";

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
                <script>
                    $('.diareg').css({'width':'100%', 'margin-left':'-50%', 'left':'50%', 'auto':''});
                    $('.diareg .header-orden').css({'width':'100%'});
                    $('.registrouser').click(function(){ 
                        $('.cargando').fadeIn();
                        var ci = $('.ci').val();
                        var nombre = $('.nombre').val();  
                        var dir = $('.dir').val();  
                        var cic = $('.cic').val();  
                        var tel = $('.tel').val();  
                        var telcon = $('.telcon').val();  
                        var mail = $('.mail').val();  
                        var ref = $('.ref').val();               
                        var arriba = $(window).scrollTop();                        
                        $('.modify').each(function(){
                            if($(this).is(':checked')){
                                modify = $(this).val();
                            }
                        });   
                        
                        $.ajax({
                                type: 'POST',
                                url: 'php/newuser.php',
                                data: {
                                    'ci' : ci,
                                    'nombre' : nombre,
                                    'dir':dir,
                                    'cic':cic,
                                    'tel':tel,
                                    'telcon':telcon,
                                    'mail':mail,
                                    'ref':ref

                                },
                                dataType: 'html',
                                error: function(){
                                    alert('error petición ajax');
                                },
                                success:function(data){
                                   
                                    if(data==0){    
                                            
                                           $('.formres').load('php/llenarform.php?ci='+ci); 
                                    }else{  
                                        if(data==2){
                                            $('.diareg').scrollTop(0);
                                            $('.inmail').fadeIn().delay(4000).fadeOut();
                                        }else{
                                            if(data==1){
                                                $('.diareg').scrollTop(0);                                            
                                                $('.resgistro div div').find('input').each(function(){
                                                    if($(this).val()==''){
                                                        $(this).siblings('.invalid').fadeIn().delay(4000).fadeOut();
                                                    } 
                                                });
                                            }else{
                                                $('.diareg').scrollTop(0);
                                                $(''+data+'').siblings('.invalid').fadeIn().delay(4000).fadeOut()                                       
                                            } 
                                        }
                                    } 
                                     $('.cargando').fadeOut();
                                    
                                }
                            }); 
                    });

                </script>
                <div class='resgistro'>
                    <div class='titulo-registrado'>
                            <h4>Registrese solo por esta vez</h4>
                    </div>
                    <input class='control' type='hidden' value='nuevo'/>
                    <div class='campouno'>
                        <label><span class='asterisco floatnone'>*</span>Nombre y Apellidos:</label>
                        <div><input class='nombre' type='text' name='cliente' placeholder='Ingrese su nombre completo'/><span class='invalid invalidcupon'></span></div>
                    </div>
                    <div class='campouno'>
                        <label><span class='asterisco floatnone'>*</span>Dirección / Barrio:</label>
                        <div><input class='dir' type='text' name='dir' placeholder='Ovitos y Almendras / Barrio Ficoa'/><span class='invalid invalidcupon'></span></div>
                    </div>
                    <div class='campouno'>
                        <label><span class='asterisco floatnone'>*</span>Referencia de Dirección:</label>
                        <div><input class='ref' name='ref' placeholder='Frente a... Al lado de... Color casa'><span class='invalid invalidcupon'></span></div>
                    </div>
                    <div class='campouno'>
                        <label>E-mail <span style='color:red'>(para confirmación)<span></label>
                        <div><input class='mail' type='mail' name='mail' placeholder='tumail@gmail.com'/><span class='inmail invalidcupon'></span></div>
                    </div>
                    <div class='campodoble'>
                        <label><span class='asterisco floatnone '>*</span>Cedula de identidad:</label>                   
                        <div><input class='ci' type='tel' name='ci' value='".$ci."' placeholder='1755555555'/><span class='invalid invalidposr'></span></div>
                    </div>
                    <div class='campodoble'>
                        <label><span class='asterisco floatnone '>*</span>Confirmar Cedula:</label>                  
                        <div><input class='cic' type='tel' name='cic' placeholder='1755555555'/><span class='invalid invalidposr'></span></div> 
                    </div>
                    <div class='campodoble'>    
                        <label><span class='asterisco floatnone'>*</span>Teléfono:</label>               
                        <div><input class='tel' type='tel' name='tel' placeholder='Teléfono para confirmar'/><span class='invalid invalidposr'></span></div>
                    </div>
                    <div class='campodoble'>    
                        <label><span class='asterisco floatnone'>*</span>Confirmación Teléfono:</label>
                        <div><input class='telcon' type='tel' name='telcon' placeholder='Confirme número teléfono'/><span class='invalid invalidposr'></span></div>
                    </div>
                    
                    <div class='registrouser boton'>Registrarse<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></div> 

                </div>
              
                
            ";
        }else{	
            $peticion = "SELECT * FROM usuarios WHERE ci='".$ci."'";
            $resultado = mysqli_query($conexion, $peticion);
            while($fila=mysqli_fetch_array($resultado)){		
            echo "
             <script>
                $('.diareg').css({'width':'100%', 'margin-left':'0%', 'left':'0%'});
                $('.diareg .header-orden').css({'width':'100%'});
                $('html').css({'overflow':'hidden'});

             </script>
            <div class='infoUser'>
            	<div class='titulo-registrado'>
            		<h4>Hola! ".$fila['nombre']."</h4>
            	</div>
            	<section class='datosreg'>
	            	<article class='teldb'>
		            	<h4>Teléfono de confirmación</h4>
		            	<p>".$fila['tel']."</p>
	            	</article>
            		<article>
		            	<h4 class='dirdb'>Dirección de envio</h4>
		            	<p>".$fila['dir']."</p>
	            	</article>
                        <article>
                            <h4>Referencia de Dirección</h4>
                            <p>".$fila['referencia']."</p>
                        </article>                        
            	</section>
               

            	<div class='editar'>
                    <a class='editar-datos links btn-fun'>Editar datos de envio<span class='icon-arrow-mas'></span></a>
                    <div>(Cambiar dirección de envio)</div>
            	</div>
                <section class='cambio-datos'>
                        <div class='links-pedido'>
                            <a class='cancel-edit links btn-fun'>Cancelar edición<span class='icon-arrow-menos'></span></a>
                            <a class='eliminar-user links btn-fun'>Eliminar usuario<span class='icon-cancel'></span></a>
            		</div>
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
                        <input class='control' type='hidden' value='editar'/>
            		<input class='ci' type='hidden' value='".$fila['ci']."'/>
                        <input class='cic' type='hidden' value='".$fila['ci']."'/>
                        <label><span class='asterisco floatnone'>*</span>Nombre y Apellidos:</label>
                        <div><input class='nombre' type='text' name='cliente' value='".$fila['nombre']."' placeholder='Ingrese su nombre completo'/><span class='invalid invalidposr'></span></div>
                        <label>E-mail <span style='color:red'>(para confirmación)</span></label>
                        <div><input class='mail' type='mail' name='mail' value='".$fila['mail']."' placeholder='tumail@gmail.com'/><span class='inmail invalidmail'></span></div>
                        <label><span class='asterisco floatnone'>*</span>Teléfono:</label>
                        <div><input class='tel' type='tel' name='tel' value='".$fila['tel']."' placeholder='Teléfono para confirmar'/><span class='invalid invalidposr'></span></div>
                        <label><span class='asterisco floatnone'>*</span>Confirmación Teléfono:</label>
                        <div><input class='telcon' type='tel' name='telcon' value='".$fila['tel']."' placeholder='Confirme número teléfono'/><span class='invalid invalidposr'></span></div>
                        <label><span class='asterisco floatnone'>*</span>Dirección:</label>
                        <div><input class='dir' type='text' name='dir' value='".$fila['dir']."' placeholder='ingrese calle principal con calle que cruza y sector'/><span class='invalid invalidposr'></span></div>

                        <label><span class='asterisco floatnone'>*</span>Referencia de Dirección:</label>
                        <div><input class='ref' name='ref' value='".$fila['referencia']."' placeholder='Frente a... Al lado de... Color casa'><span class='invalid invalidposr'></span></div>            		                        
                    </section>           	
            
            
            </div>
            ";	
            }
            /* info pedido*/
                echo "
                <div class='titultimopaso'>
                    <h4 class='titulo-confp'>Su pedido es:</h4>
                </div>
                <div class='conpedido'>        
                    <div class='menenvio'></div> 	  
                    <div id='scrollContainer'>
                    <div id='scrollContent'>
                        <ul>
                            <li>
                                <div class='itemPedido'>";
                                    if(isset($_SESSION['carrito'])){
                                        $datos=$_SESSION['carrito'];
                                        echo"
                                            <div class='titulosCart'>
                                                <div class='titulosc '>
                                                    <div class='cont-qua'>
                                                       <span> Cant.</span>
                                                    </div>
                                                </div>
                                                <div class='titulosc'>
                                                    Nombre
                                                </div>         
                                                <div class='titulosc'>                                 
                                                    Detalles                                                                                                        
                                                </div>
                                                <div class='titulosc'>                                 
                                                    Valor                                                                                                       
                                                </div>
                                            </div>";
                                        for($i=0;$i<count($datos);$i++){
                                        echo"
                                        <div class='itemRenglon'>
                                            <div class='productQuantity dropdownc '>
                                                <div class='cont-qua'>
                                                   <span> ".$datos[$i]['cant']."</span>
                                                </div>
                                            </div>
                                            <div class='namec'>
                                                ".$datos[$i]['nombre']."
                                            </div>                       
                                            <div class='itemCartscrollc'>";
                                                    if(count($datos[$i]['option'])!=0){
                                                        echo"<div class='detallespe'>";                                    
                                                            for($j=0;$j<count($datos[$i]['option']);$j++){
                                                                echo "<p>".$datos[$i]['option'][$j]['grupo'].": 
                                                                ".$datos[$i]['option'][$j]['namead']."</p>
                                                                ";
                                                            }                                       
                                                        echo"</div>";
                                                    }else{
                                                echo"<div class='detallespe'>
                                                        Sin adiciones
                                                    </div>";
                                                    }
                                               echo "<div class='pricec'>
                                                        $ ".number_format($datos[$i]['price']*$datos[$i]['cant'],2)."
                                                    </div>

                                                </div>
                                            </div>";

                                        }
                                    }else{
                                        echo"<center>No hay productos</center>";
                                    }

                               echo "                      
                                    <div class='det-delivery'>
                                        <div class='tdetde'>Su pedido es para</div>";
                                        if($_SESSION['delivery']['v']=='0.00'){
                                        echo"
                                            
                                            <div class='selecdeliv '>
                                                <article><input type='radio' value='Domicilio' data-price='1.00'><label>Domicilio <i>(+ $1.00)</i></label></article>
                                                <article><input type='radio' value='Recoger' data-price='0.00' checked><label>Recoger <i>(sin costo)</i></label></article>
                                            </div>";
                                         }else{
                                            echo"
                                            
                                            <div class='selecdeliv '>
                                                <article><input type='radio' value='Domicilio' data-price='1.00'  checked><label>Domicilio <i>(+ $1.00)</i></label></article>
                                                <article><input type='radio' value='Recoger' data-price='0.00'><label>Recoger <i>(sin costo)</i></label></article> 
                                            </div>"; 
                                         }
                                        
                                        echo"<div class='valordetde deliveryvalor'>";
                                        
                                            echo "$ ".$_SESSION['delivery']['v']."";

                                        echo"</div>
                                          
                                    </div>
                                    <div class='cupon'>
                                        
                                        <div class='tcupon'>Cupón </div>
                                         <div class='boton aplicar'>Aplicar</div>
                                        <input type='tel' class='campocupon' name='cupon' placeholder='' data-cupon='No'>
                                        <span class='invalid invalidcupon'></span><div class='detallecupon cuponaplicado'>Postre Gratis!</div>
                                       
                                    </div>
                                     <div class='det-delivery'>
                                        <div class='tdetde'>Total </div>
                                        <div class='valordetde valortotaltitulo'>$ <span> ".$_SESSION['total']."</span>
                                        </div>
                                    </div>
                                    <div class='comentarios'>
                                        <label>Comentarios de pedido:</label>
                                        <input type='text' class='coment' name='coment' placeholder='Sin cebolla, con aji...'>
                                    </div> 
                                    <div class='comentarios'>
                                        <label>Planificar Pedido:</label>
                                        <input type='text' class='pro' name='pro' placeholder='Pedidos para otra fecha, Ejemplo: Enviar el Lunes 15 Sep 2015 entre 10 y 11 am'>
                                    </div> 
                                    <div class='localp'>
                                        <div class='mensajelocal'><span class='invalid invalidposr'></span></div>
                                        <h4 class='localt'><span class='asterisco'>*</span><div>Seleccione el ESPIGAL más cercano</div></h4>
                                        <select>
                                            <option>-</option>
                                            <option>Centro</option>
                                            <option>Sector Mall Andes</option>
                                        </select>
                                        <h4 class='concuanto'>Con cuánto va a pagar <small>(opcional)</small></h4>
                                        <i>$</i>
                                        <input  class='pago' type='tel' placeholder='20'>

                                    </div>
                                </div>

                            <li>
                        </ul>
                    </div>

                </div>
                <div class='cobertura'>
                    Areas de cobertura
                    <article>Sector Centro - Sector Mall - Ficoa - Miraflores</article>
                </div>
                <div class='terminos'>
                    <span class='invalid '></span>
                    <input class='terminosinput' type='checkbox' name='terminos'>
                    <a class='terminosleer'>He leido y Acepto terminos y condiciones</a>
                    <div class='condiciones'>La persona se hace cargo de los items seleccionados en este pedido y acepta los valores a pagar.</div>
                </div>
            </div>
            ";
                                        
                                      
             /* cierre info pedido*/
            echo" 
              
            <div class='footer-orden'>
                <div class='boton cancelp'>Editar Pedido</div>
                <div class='btnconpedido boton'><span class='icon-car carbtn'></span>Enviar Pedido $<span class='totalbtnpedido' data-valor='".$_SESSION['total']."'>".$_SESSION['total']." </span><div class='cargando'><i class='fa fa-spinner fa-pulse'></i></div></div>
                <div class='horariopedido'><big>Horario pedidos:</big></br> Lun / Sab  9am a 1pm / 4:30pm a 9pm</div>
            </div>   
            ";
        }

?>
