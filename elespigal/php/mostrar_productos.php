<head>
      <meta charset="utf-8">
      <meta name="description" content="El Espigal: gran variedad de sandwiches y cafetería, ahora puede hacer su pedido en línea (servicio delivery)."/>
      <link rel="stylesheet" href="../css/stylos.css" type="text/css" />
      <script async type="text/javascript" src="../lib/jquery.js"></script>
      <script async type="text/javascript" src="../lib/modernizr.js"></script>
      <script async type="text/javascript" src="../js/espigal.js"></script>
      <script async type="text/javascript" src="../js/cargar_productos.js"></script>
      <!--inicio slider-->
      <link rel='stylesheet' id='style-css'  href='slider/diapo.css' type='text/css' media='all'>
        <script type='text/javascript' src='slider/scripts/jquery.min.js'></script>
        <!--[if !IE]><!--><script type='text/javascript' src='slider/scripts/jquery.mobile-1.0rc2.customized.min.js'></script><!--<![endif]-->
        <script type='text/javascript' src='slider/scripts/jquery.easing.1.3.js'></script>
        <script type='text/javascript' src='slider/scripts/jquery.hoverIntent.minified.js'></script>
        <script type='text/javascript' src='slider/scripts/diapo.js'></script>

       
      <title>El Espigal: sandwiches, cafés, postres y bebidas</title>
  </head>
<?php
include '../config.php';
 $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
                  mysqli_set_charset($conexion, "utf8");
                   $peticion = "SELECT * FROM productos WHERE id_cat=".$_REQUEST['id_cat']."";
				$resultado = mysqli_query($conexion, $peticion);
				while($fila = mysqli_fetch_array($resultado)){?>
					<article class='tituloprod'><?php echo $fila['nombre']?>
                                               <br> <img src='fotos/<?php echo $fila['imagen']?>'/>
                                        </article>
				<?php }?>


  