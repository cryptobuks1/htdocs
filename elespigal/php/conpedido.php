<?php 
@session_start();
echo "
    <script>
        $('.cancelp').click(function(){
	    $('.confirmacion').fadeOut();
            $('.diareg').fadeIn();
	});
        $('.btnconpedido').click(function(){
            var lo = $('.localp select').val(); 
            var local = encodeURI(lo);
            if(local!='-'){
                $('.confirmacion').load('php/grabarpedido.php?local='+local);
                $('.confirmacion').delay(4000).fadeOut();;
                $('.modal-overlay').delay(4000).fadeOut();
                $('.itemCart').load('php/vaciar.php');  
                $('.totalcarrito').load('php/actualizarvalor.php');
            }else{                
                $('.mensajelocal').fadeIn().animate({'margin-top':'-3px'}).html('<center>Debe seleccionar un local.</center>').delay(4000).fadeOut().animate({'margin-top':'0px'});            
            }
        });
    </script>
    <div class='conpedido'>
        <h4 class='titulo-confp'>Último paso: Su pedido es..</h4>
        <div class='menenvio'></div> 	          
    </header>
	<div id='scrollContainer'>
        <div id='scrollContent'>
            <ul>
                <li>
                    <div class='itemCart'>";
                        if(isset($_SESSION['carrito'])){
                            $datos=$_SESSION['carrito'];
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
                   echo "<div class='det-delivery'>
                            <div class='tdetde'>Su pedido es para ".$_SESSION['delivery']['delv']."</div>
                            <div class='valordetde'>";
                            if($_SESSION['delivery']['v']==0){
                                echo "";                                
                            }else{
                                echo "Valor $".$_SESSION['delivery']['v']."";                                
                            }
                            echo"</div>
                        </div>
                        <div class='localp'>
                            <div class='mensajelocal'></div>
                            <h4>Seleccione el local de su preferencia</h4>
                            <select>
                                <option>-</option>
                                <option>Centro</option>
                                <option>Sector Mall Andes</option>
                            </select>
                        </div>
                    </div>
                    <div class='btnconfp'>
                        <button class='boton cancelp'>Cancelar</button>
                        <button class='boton btnconpedido'>Confirmar Pedido $<span>".$_SESSION['total']." </span></button>                                            
                    </div>       
                <li>
            </ul>
        </div>

    </div>
</div>";
?>
   

