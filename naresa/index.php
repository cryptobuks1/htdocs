<?php 
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd)or die (mysqli_error());
//$conexion = mysql_connect("skemadis.com", "skemadis_dani", "nm-$~x)[;#bQ", "skemadis_datos")or die (mysql_error());
mysqli_set_charset($conexion, "utf8");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
<meta name="description" content="Diseño arquitectonico de interiores, equipamiento y mobiliario de oficina, hogar, educacional, comercial."/>
<meta name="keywords" content="Arquitectura, diseño, mobiliario, equipamiento, oficinas, sistemas, sillas, panelería, diseño de interior, acabados, cocinas, baños, closets, dormitorios"/>
<meta name="generator" content="7.4.30.244"/>
<title>Rotulos | Publicidad | Naresa</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />


<link rel="icon" type="image/png" href="favicon.ico" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<!--<link href="css/main.less" rel="stylesheet/less" type="text/css" />-->
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/efectos.js"></script>
<script type="text/javascript" src="js/load.js"></script>
<script type="text/javascript" src="js/less.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<?php include "map.php";?>
</head>
<body onload="initialize()">
<?php include "header.php";?>
<div class="cont_inicio">
	<?php include'menu.php';?>
    <div class="grind">
    	
        <ul class="cont-trabajos">
              <?php 
              $peticion = "SELECT * FROM trabajos WHERE enlace='Si' ORDER BY servicio";
              $resultado = mysqli_query($conexion, $peticion);
			  
              while($fila = mysqli_fetch_array($resultado)){
			   /*if($fila['cat']==""){?>*/
			   if(1==1){?>
	              <li class="servicio item" id-data="WHERE servicio='<?php echo "".$fila['servicio']?>'">
              	<?php }else{?>
			  		<li class="servicio item" id-data="WHERE servicio='<?php echo $fila['servicio'] ?>'">
				<?php }?>
                  <div>
                      <div class="imgItem" >
                  		<div class="catImg">
                        	<h1><?php  echo "".$fila['des_corta']."";?></h1>
                        </div>
                          <img src="fotos/<?php echo $fila['imagen']?>" alt="<?php echo $fila['alt']?>"/>
							
                        <span class="pantalla"></span>
                        <?php echo "<h2 class='cliente'>".$fila['cliente']."</h2>" ?>
                        <h2 class="cliente"></h2><h3 class="nombre"></h3>
                      </div>
                  </div>
              </li>
             <?php } ?>
        </ul>
    </div>
</div>
<?php 
mysqli_close($conexion);
include"footer.php";?>

</body>
</html>
