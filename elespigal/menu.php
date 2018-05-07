<!DOCTYPE html>
<html lang="es">

<?php include 'header.php';
include 'php/config.php';?>
<script async type="text/javascript" src="js/cargar_adicionales.js"></script>
<section class="section-menu">
    <div class="menuall"><a href="producto.php"><i class="icon-menu"></i><span>VER TODO EL MENU</span></a></div>
    
    <div class="hortuto">

       <a href="producto.php"><img src="imagenes/horario-tuto.jpg" alt="explicación de como pedir en linea y horario de atención"></a>
       
    </div>  
    <div class="titulo-categoria "><h1 class="categoria-t font-t">Menu</h1></div>

    <div class="productos">
        <?php  $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
        mysqli_set_charset($conexion, "utf8");
        $peticion = "SELECT * FROM categoria ORDER BY posicion";
	    $resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){?>
		
            <article class='titulocat' >
                <a href="producto.php?id_cat=<?php echo $fila['id_cat'] ?>&p=<?php echo $fila['posicion'] ?>">
                <figure>
                    <img src='fotos/<?php echo $fila['imagen']?>' alt="foto de categorias del menu"/>
                    
                    <div class="cortina-cat">
                        <button>Haga su pedido</button>
                    </div>
                </figure>  
                <h3 class="font-t2"><?php echo $fila['nombre']?></h3> 
                </a> 
                <div class="borde-bottom"></div>            
            </article>
            <?php }?>
            <?php mysqli_set_charset($conexion, "utf8");
            $peticion = "SELECT * FROM categoria ORDER BY posicion";
            $resultado = mysqli_query($conexion, $peticion);
            while($fila = mysqli_fetch_array($resultado)){?>
            <div class='titulocatmovil' >
                <a href="producto.php?id_cat=<?php echo $fila['id_cat'] ?>&p=<?php echo $fila['posicion'] ?>">
                    <figure>
                        <img src='fotos/<?php echo $fila['imagen']?>' alt="foto de categorias del menu"/>
                        
                    </figure>  
                    <h3 class="font-t2"><?php echo $fila['nombre']?></h3> 
                </a> 
                
            </div>

        
		<?php }?>
   </div>
</section>

 <?php mysqli_close($conexion);
include 'footer.php';  ?>
</body>
</html>
