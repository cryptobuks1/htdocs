
<div class="carrito" >
    
    <header class="totales">

        <h4>Mi Pedido</h4>
        <div id="cancelCart" class="show" title="Cancelar pedido">
            <a >
                <span class="icon-trash-01">
                </span>
                Cancelar pedido
            </a>
        </div>
        <div id="cancelCartNote" class="note">
            <span style="display:block">¿Seguro que deseas cancelar tu pedido?</span>
            <button id="cancelCartYes" type="button" class="button none">Sí</button> |
            <button id="cancelCartNo" type="button" class="button none">No</button>
        </div>
		
        </article>
        
    </header>

	<div id="scrollContainer">
        <div id="scrollContent">
            <ul>
                <li>
                    <div class="itemCart">
                        <?php 
                        if(isset($_SESSION['carrito'])){
                            $datos=$_SESSION['carrito'];
                            for($i=0;$i<count($datos);$i++){
                            
                            echo"
                        
                               <div class='itemCartscroll'>";
                                if($datos[$i]['option']!=0){
                                echo"<div class='detalleItem'>
                                    <h4>".$datos[$i]['nombre']."</h4>";
                                    for($j=0;$j<count($datos[$i]['option']);$j++){
                                            echo "<p>".$datos[$i]['option'][$j]['grupo'].": 
                                            ".$datos[$i]['option'][$j]['namead']."</p>
                                            ";
                                    }
                                echo"</div>";
                                }else{
                                    echo"<div class='detalleItem'>
                                            Sin adiciones
                                    </div>";
                                }

                                echo"<div class='productQuantity dropdown '>
                                    <div class='cont-qua'>
                                        <span class='masitem icon-arrow-mas' data-id_prod='".$datos[$i]['id']."' data-det='";
                                        $detalle='';
                                        for($j=0;$j<count($datos[$i]['option']);$j++){
                                            
                                            $detalle=$detalle.$datos[$i]['option'][$j]['namead'];
                                            
                                        } 
                                        echo "".$detalle."'></span><span> ".$datos[$i]['cant']."</span>
                                        <span class='menositem icon-arrow-menos' data-id_prod='".$datos[$i]['id']."' data-det='".$detalle."'></span>    
                                    </div>
                                </div>
                                <div class='name'>
                                    ".$datos[$i]['nombre']."
                                </div>
                                
                                <div class='price'>
                                    ".number_format($datos[$i]['price']*$datos[$i]['cant'],2)."
                                </div>
                                <div class='remove'>
                                    <a class='quitar icon-cancel' data-id_prod='".$datos[$i]['id']."' data-det='".$detalle."'></a>
                                </div>
                            </div>";
                        
                            }
                        }else{
                            echo"<center>No hay productos</center>";
                        } ?>
                    </div>
                    <div class="totalcarrito">
                    <?php 
                    $domicilio = number_format(1.5, 2);
                    if($_SESSION['total']!=$domicilio){?>
                        <section id="subtotal" class="prefooterinfo ">
                            <div class="description ttotalcart">Total</div>
                            <div class="totalGlobal totalcart">$<span><?php echo $_SESSION['suma']?> </span></div>
                        </section>
                        <section class="delivery" class="prefooterinfo">
                            <?php if($_SESSION['delivery']['delv']=='Domicilio'){ ?>


                            <div class="recoger">
                                <input type="radio"  name="delive" value="0" data-deliv="Recoger"/>
                                <div class="tideliv">Para recoger</div>
                            </div>
                            <div class="deliv">
                                <input type="radio"  name="delive" value="<?php echo $domicilio?>" data-deliv="Domicilio" checked/>
                                <div class="tideliv">Domicilio <i>$</i><span><?php echo $_SESSION['delivery']['v']?></span></div>
                            </div>
                            <?php }else{ ?>

                            <div class="recoger">
                                <input type="radio"  name="delive" value="0" data-deliv="Recoger"  checked/>
                                <div class="tideliv">Para recoger</div>
                            </div>
                            <div class="deliv">
                                <input type="radio"  name="delive" value="<?php echo $domicilio?>" data-deliv="Domicilio"/>
                                <div class="tideliv">Domicilio   <i>$</i><span><?php echo $_SESSION['delivery']['v']?></span></div>
                            </div>
                            <?php } ?>
                        </section>
                        <div class="mensajedelivery"></div>
                        <section id="total" class="prefooterinfo">
                            <div class="description">Total + Domicilio</div>
                            <div class="total totalGlobal">$<span><?php echo $_SESSION['total'] ?></span></div>
                        </section>
                       <?php if($_SESSION['suma']>-1){
                        echo"<a href='carrito.php' class='boton rpedido'><span class='icon-car carbtn'></span>Realizar Pedido<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></a>";
                        }else{
                            echo"<a href='carrito.php' class='boton  rpedido'>Realizar Pedido (<small>mínimo $8</small>)</a>";
                        }?>
                        
                        <?php
                    }else{?>

         
                        <a href="menu.php" class="btnsinp rpedido">Realizar Pedido<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></a>
                        <div class="eligeloque">
                        <img src='imagenes/elige.jpg' alt='Elige lo que más te guste'/>";
                        </div>
                   <?php }?>
                    </div>       
                <li>
            </ul>
        </div>
        <div class="mensajedepago">*Lo pagas en casa</div>
    </div>
</div>