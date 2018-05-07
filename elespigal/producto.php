<?php @session_start();
include 'header.php';?>
<style>
    .cartabrir{
        display:block;
    }
    .cartlink{
        display:none;
    }
</style>
<script  type="text/javascript" async src="js/cargar_adicionales.js"></script> 

<div class="menu-cat" id="carrito">
    <div class="panelmenumovil boton">
    <a href="menu.php"><h2>Menú</h2></a>
    </div>
    <div class="panelcartmovilabrir boton">
        <h2><span class='totalbtnpedido' data-valor='".$_SESSION['total']."'><?php echo $_SESSION['total']?> </span><span>$</span><i class="icon-arrow-menos icon-abrir-carrito"></i>Carrito <small>(abrir)</small><i class="icon-car delivery-car"></i></h2>
    </div>
    <div class="panelcartmovilcerrar boton">
        <h2>Carrito <small>(cerrar)</small><i class="icon-arrow-mas icon-cerrar-carrito"></i></h2>
    </div> 
    <div class="contcart">
        <?php 
       
        include "cart.php"; ?>
    </div>
</div>
<div class="section-producto">
<?php include 'php/config.php';
//include "registro.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");?>

    <div class="section-prod">  
        <div class="ircarrito boton">
            <a href="#carrito"><h2><i class="icon-arrow-mas"></i>Ir al carrito</i></h2></a>
        </div>      
        <div class="cont-productos">
            <div class="titulo-prod">
                <?php if(!isset($_GET['id_cat'])){?>
                    <h1 class="productos-t font-t">
                        Todos los Productos
                    </h1>
                <?php }else{
                    $peticion = "SELECT * FROM categoria WHERE id_cat=".$_REQUEST['id_cat']."";
                    $resultado = mysqli_query($conexion, $peticion);
                    while($fila = mysqli_fetch_array($resultado)){?>
                        <h1 class="productos-t<?php echo $_GET['p']?> font-t">
                             <?php echo $fila['nombre'];?>
                        </h1>
                           
                    <?php }
                }?>
            </div>
            <?php 
            if(!isset($_GET['id_cat'])){
                $peticion = "SELECT * FROM productos";
            }else{
                $peticion = "SELECT * FROM productos WHERE id_cat=".$_REQUEST['id_cat']." ORDER BY pos";
            }
            $resultado = mysqli_query($conexion, $peticion);
            while($fila = mysqli_fetch_array($resultado)){?>
            	<article class='tituloprod' data-id="<?php echo $fila['id_producto']?>" id="prod-<?php echo $fila['id_producto']?>">
                    <h3 class=""><?php echo $fila['nombre']?></h3>
                    <?php if($fila['id_cat']==5){?>
                    <h5 class="ti"><?php echo $fila['titulo']?></h5>
                    <?php }else{ ?>
                    <h5><?php echo $fila['titulo']?></h5>
                    <?php } ?>
                    <figure>   
                        <img src='fotos/<?php echo $fila['imagen']?>' alt="<?php echo $fila['detalle']?>"/>
                    </figure>
                    <p><?php echo $fila['detalle']?></p>
                    <h4 data-valor="<?php echo $fila['valor']?>">$ <?php echo $fila['valor']?></h4>
                    
                   <a class="boton btn_comprar" data-id="<?php echo $fila['id_producto']?>">Ordenar</a>
                   <div class="modal-overlay"></div>
                   <div class="dialog ad-<?php echo $fila['id_producto']?>" id-data="<?php echo $fila['id_producto']?>">
                        <span class="icon-cancel cancel-ad"></span>
                        <div class="header-orden">
                            
                            <h3 ><?php echo $fila['nombre']?> </h3>
                            <div class="valor-ad"><h2 data-valor="<?php echo $fila['valor']?>">$<span> <?php echo $fila['valor']?></span></h2></div>
                            <p class="desadi"><?php echo $fila['detalle']?></p>
                            
                        </div>
                        <div class="renglonadi">
                        <?php
                            $peticionG = "SELECT * FROM adicional_producto LEFT JOIN adicionales ON adicional_producto.id_adicional = adicionales.id_adicional WHERE id_producto = ".$fila['id_producto']." GROUP BY grupo ";
                            $resultadoG = mysqli_query($conexion, $peticionG);
                            while($filaG = mysqli_fetch_array($resultadoG)){
                               
                                if($filaG['grupo']!=''){
            
                                    include "forms/".$filaG['grupo'].".php";
                                }else{
                                   echo "Elija la cantidad";
                                }
                            }
                            //include 'forms/adicional.php';
                            
                        ?>
                        </div>
                       <div class="footer-orden">
                                                       
                            <span class="cant-titulo">Cantidad</span> 
                            <select class="cant-orden" >
                            
                                
                            </select>
                            <div class="al_carrito boton " data-total="<?php echo $fila['valor']?>" > Agregar Pedido ($ <span><?php echo $fila['valor']?></span>) <div class="cargando"><i class="fa fa-spinner fa-pulse"></i></div>
                            </div>
                       </div>

                    </div>
                    <div class="borde-bottom"></div>
                </article>
            <?php }?>
        </div>
        
        
    </div> 
</div>

 <?php mysqli_close($conexion);
 include 'footer.php'; ?>
</body>
</html>
  

