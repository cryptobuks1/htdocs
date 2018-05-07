
  
  <?php
  include 'header.php';
  include "php/config.php";
  $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
  mysqli_set_charset($conexion, "utf8");
  ?>
  <link rel='stylesheet' id='style-css'  href='slider/diapo.css' type='text/css' media='all'>
  <script type='text/javascript' src='slider/scripts/jquery.min.js'></script>
  <!--[if !IE]><!--><script type='text/javascript' src='slider/scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
  <script type='text/javascript' src='slider/scripts/jquery.easing.1.3.js'></script>
  <script type='text/javascript' src='slider/scripts/jquery.hoverIntent.minified.js'></script>
  <script type='text/javascript' src='slider/scripts/diapo.js'></script>
  <script>
    var anchobody = $('body').css('width');
    var ancho = anchobody.split('px');  
    if(ancho[0] > 768){  
      $(function(){
              $('.pix_diapo').diapo();
      });
    }
  </script>
  <link rel='stylesheet' id='style-css'  href='slidermovil/diapo.css' type='text/css' media='all'>
  <script type='text/javascript' src='slidermovil/scripts/jquery.min.js'></script>
  <!--[if !IE]><!--><script type='text/javascript' src='slidermovil/scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
  <script type='text/javascript' src='slidermovil/scripts/jquery.easing.1.3.js'></script>
  <script type='text/javascript' src='slidermovil/scripts/jquery.hoverIntent.minified.js'></script>
  <script type='text/javascript' src='slidermovil/scripts/diapo.js'></script>
  <script>
    var anchobody = $('body').css('width');
    var ancho = anchobody.split('px');  
    if(ancho[0] < 768){  
      $(function(){
            $('.pix_diapomovil').diapo();
      });
    }
  </script>
  <body>
   <section class="section-home">
        <div class="cont-btnpedido">
          <div class="flecha2"><img src="imagenes/flecha-der-01.png"/></div>        
          <div class="btnpedido">
              <a href="producto.php" class="btnpedidohere" >
                  <img src="imagenes/btn-pedido.png">
                  
              </a>
              
          </div>
          <div class="flecha1"><img src="imagenes/flecha-izq-01.png"/></div>
        </div>
        <div class="tuto">
          <img src="imagenes/tuto-01.png">
        </div>
    	<div style="overflow:hidden; margin:0px auto; padding:0 1px">
                <div class="pix_diapo sldesktop">
                    <?php
                
                    $peticion = "SELECT * FROM slider WHERE tipo='desktop'" ;
              			$resultado = mysqli_query($conexion, $peticion);
              			while($fila = mysqli_fetch_array($resultado)) { ?>

                    <div  data-thumb="slider/images/slides/<?php echo $fila['imagen'] ?>">
                        <img src="slider/images/slides/<?php echo $fila['imagen'] ?>">
         
                    </div>
                        <?php } ?>
                   
                    
               </div><!-- #pix_diapo -->
               <div class="pix_diapomovil">
                    <?php
                
                    $peticion = "SELECT * FROM slider WHERE tipo='movil'" ;
                    $resultado = mysqli_query($conexion, $peticion);
                    while($fila = mysqli_fetch_array($resultado)) { ?>

                    <div data-thumb="slider/images/slides/<?php echo $fila['imagen'] ?>">
                        <img class="imgslidemovil" src="slidermovil/images/slides/<?php echo $fila['imagen'] ?>">
         
                    </div>
                        <?php } ?>
                   
                    
               </div><!-- #pix_diapo -->
               <div class="slmovil">
                    <?php
                    
                    
                    $peticion = "SELECT * FROM slider WHERE tipo='movil'" ;
                    $resultado = mysqli_query($conexion, $peticion);
                    while($fila = mysqli_fetch_array($resultado)) { ?>

                    <div >
                        <img src="slider/images/slides/<?php echo $fila['imagen'] ?>">
         
                    </div>
                        <?php } ?>
                    
               </div><!-- #pix_diapo movil -->
               <div class="pedidomovil">
                  <a href="menu.php"><img src="imagenes/pedidomovil.jpg" alt="boton de pedidos en linea móvil"/><span><i class="icon-delivery icon-pedidomovil"></i>PEDIDO <font>ONLINE</font></span></a>
               </div>
               <div class="localmovil">
                  <a href="locales.php"><img src="imagenes/localmovil.jpg"/><span><i class="icon-location icon-locales"></i>CONTACTO <small>(Locales)</small></span></a>
               </div>


      </div>


    </section>
  <?php
  include 'footer.php';
  ?>
  </body>
</html>
