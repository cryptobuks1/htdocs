<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="description" content="El Espigal: gran variedad de sandwiches y cafetería, ahora puede hacer su pedido en línea (servicio delivery)."/>
      <link rel="stylesheet" href="css/stylos.css" type="text/css" />
      <script async type="text/javascript" src="lib/jquery.js"></script>
      <script async type="text/javascript" src="lib/modernizr.js"></script>
      <script async type="text/javascript" src="js/espigal.js"></script>
      <!--inicio slider-->
      <link rel='stylesheet' id='style-css'  href='slider/diapo.css' type='text/css' media='all'>
        <script type='text/javascript' src='slider/scripts/jquery.min.js'></script>
        <!--[if !IE]><!--><script type='text/javascript' src='slider/scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
        <script type='text/javascript' src='slider/scripts/jquery.easing.1.3.js'></script>
        <script type='text/javascript' src='slider/scripts/jquery.hoverIntent.minified.js'></script>
        <script type='text/javascript' src='slider/scripts/diapo.js'></script>

      
      <title>El Espigal: sandwiches, cafés, postres y bebidas</title>
  </head>

<?php include "header.php";
              include "config.php";
        ?>
    <section class="wrapper">
		
        <div class="grid2">
        	<div class="prod">
            <?php
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
                mysqli_set_charset($conexion, "utf8");
				//$categoria = $_GET['id_categoria'];
				//$peticion = "SELECT * FROM categoria WHERE id_categoria=".$_GET['id_categoria']."";
                                $peticion = "SELECT * FROM categoria WHERE id_cat=1";
				$resultado = mysqli_query($conexion, $peticion);
				while($fila = mysqli_fetch_array($resultado)){
					echo"<div ";
					//if($_GET['id_marca']==1){
                                        if(1==1){
					echo "class='titulocat'";
					}else{
					echo "class='titulocatt'";
					}echo">".$fila['id_cat']."</div>";
				}
				$peticion = "SELECT * FROM productos WHERE 1=1";
				$resultado = mysqli_query($conexion, $peticion);
				while($fila = mysqli_fetch_array($resultado)){
					$titulo = $fila['nombre'];
					$titulo = strtoupper($titulo);
					echo "";
					$peticion2 = "SELECT * FROM imgproductos WHERE id_prod = ".$fila['id_producto']." LIMIT 1";
					$resultado2 = mysqli_query($conexion, $peticion2);
					while($fila2 = mysqli_fetch_array($resultado2)){
						echo "<div class='contimgarticulo'><img src='fotos/".$fila2['imagen']."' alt='".$fila2['alt']."'/></div>

						";
					}
					echo "";
					echo "<h1>".$fila['valor']." US$</h1></div>
					<button class=''>Comprar</button>";
					echo "</article></a>";
                                        
				}
				mysqli_close($conexion);
			?>
            </div>
    	</div>
    </section>


<?php include"footer.php";?>
</body>
</html>