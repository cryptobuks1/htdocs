
<?php @session_start();
include 'header.php';?>
    <script  type="text/javascript" async src="js/cargar_adicionales.js"></script> 
    <script>
    function justNumbers(e)
      {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
         
        return /\d/.test(String.fromCharCode(keynum));
      }
    </script>
    <div class='section-producto'>
    <div class='diareg'>
        
    <?php 	
    echo "
    
    
    
    <form class='formres'>

            <div class='infoUser'>
            	<div class='titulo-registrado'>
            		<h4>Datos de envio</h4>
            	</div>
               
                <div class='campo-cedula'>
                    <label><span class='asterisco floatnone'>*</span>Ingrese su N° de cédula</label>                    
                    <input class='inputres ci req' onkeypress='return justNumbers(event);' id='cedula' type='tel' placeholder='Ingrese No. de su cedula'/><span class='invalid invalidposr'></span>
                    <div class='boton btnver'>Verificar</div>
                </div>
            	

            	
                <section class='cambio-datos'>
                        
                </section>           	
            
            
            </div>
            ";	
          
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
                                                <article><input type='radio' value='Domicilio' data-price='1.50'><label>Domicilio <i>(+ $1.50)</i></label></article>
                                                <article><input type='radio' value='Recoger' data-price='0.00' checked><label>Recoger <i>(sin costo)</i></label></article>
                                            </div>";
                                         }else{
                                            echo"
                                            
                                            <div class='selecdeliv '>
                                                <article><input type='radio' value='Domicilio' data-price='1.50'  checked><label>Domicilio <i>(+ $1.50)</i></label></article>
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
                                        <label>Comentarios de pedido: <small>(opcional)</small></label>
                                        <input type='text' class='coment' name='coment' placeholder='Sin cebolla, con aji...'>
                                    </div> 
                                    <div class='comentarios'>
                                        <label>Planificar Pedido: <small>(opcional)</small></label>
                                        <input type='text' class='pro' name='pro' placeholder='Pedidos para otra fecha, Ejemplo: Enviar el Lunes 18 Marzo 2015 entre 10 y 11 am'>
                                    </div> 
                                    <div class='localp'>
                                        <div class='mensajelocal'><span class='invalid invalidposr'></span></div>
                                        <h4 class='localt'><span class='asterisco'>*</span><div>Seleccione <font>EL ESPIGAL</font> más cercano a Ud.</div></h4>
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
                    <input class='terminosinput' type='checkbox' name='terminos' checked>
                    <a class='terminosleer'>He leido y Acepto terminos y condiciones</a>
                    <div class='condiciones'>La persona se hace cargo de los items seleccionados en este pedido y acepta los valores a pagar.</div>
                </div>
            </div>
            ";
                                        
                                      
             /* cierre info pedido*/
            echo" 
              
            <div class='footer-ordenc'>
                <a href='producto.php' class='boton cancelp'><i class='fa fa-pencil'></i>Editar Pedido</a>
                <div class='btnconpedido boton'><span class='icon-car carbtn'></span>Enviar Pedido $<span class='totalbtnpedido' data-valor='".$_SESSION['total']."'>".$_SESSION['total']." </span><div class='cargando'><i class='fa fa-spinner fa-pulse'></i></div></div>
                <div class='horariopedido'><big>Horario pedidos:</big></br> Lun / Sab  9am a 2pm / 5pm a 9pm</div>
            </div>   
            </form>
    
    </div>    
    </div>";

  include 'footer.php';

  echo"</body>
</html> ";      

?>
