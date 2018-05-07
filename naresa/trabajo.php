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
<title>Diseño y Equipamiento | Arquitectónico | Skema</title>
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
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> <!-- carga estilo nivo-slider.css -->
<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" /> <!-- carga estilo default.css -->
<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script> <!-- carga plugin jquery.nivo.slider.pack.js -->
<script type="text/javascript">
$(window).load(function() {
    			$('#slider').nivoSlider({
					slices: 2, // Cantidad de cortes de dicho efecto
					boxCols: 3,
					boxRows: 3,
					animSpeed: 500, // Velocidad de la transición
					pauseTime: 6000, // Tiempo de espera para mostrar otra transicion
					startSlide: 1, // Orden de imagen a mostar cuando se carga el slider (0=index)
					directionNav: true, // Permite true/false la navegación manual, usando los arrows
					directionNavHide: true, // Muestra los arrows sólo cuando el cursor esté sobre el slider.
					controlNav: true, // 1,2,3... Permite navegar usando los bullets de la parte inferior.
					keyboardNav: true, // Usa las flechas izquierda y derecha del teclado
					pauseOnHover: true, // Detener la transición cuando el cursor esté sobre el Slide
					manualAdvance: true, // Forzar a que sea sólo manualmente la transición
					captionOpacity: 0.8, // Opacidad del caption
					prevText: 'Prev',
					nextText: 'Next',
					randomStart: false, // Inicio de una transicion al azar
					beforeChange: function(){}, // Se ejecuta o activa antes de una transición
					afterChange: function(){}, // Se ejecuta o activa despues de una transición
					slideshowEnd: function(){}, // Se ejecuta o activa despues de que todas las imagenes hallan sido mostradas
					lastSlide: function(){}, // Se ejecuta o activa despues que la última imagen ha sido mostrada
					afterLoad: function(){} // Se ejecuta o activa cuando el slider ha sido cargado
				});
		});
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script> 




<?php include "map.php";?>
</head>
<body onload="initialize()">
<?php include "header.php";?>
<div class="cont_inicio">
<?php $peticion = "SELECT * FROM trabajos WHERE id_trab=".$_GET['id_trab']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){?>

	<div class="contMenuTrabajo">
    	<div class="menuTrabajo">
        	<h2><?php echo $fila['nombre']?></h2>
        </div>
    </div>
    <div class="grind">
        <div class="slider">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                    <?php 
                    mysqli_set_charset($conexion, "utf8");
                    $peticion2 = "SELECT * FROM imgtrabajo WHERE id_trab=".$fila['id_trab']." ";
                    $resultado2 = mysqli_query($conexion, $peticion2);
                    while($fila2 = mysqli_fetch_array($resultado2)){?>
                   		<img src="fotos/<?php echo $fila2['imagen']?>" alt="" data-transition="slideInLeft" title="">
                    <?php }?>
                    </div>
                </div>
        </div>
        <div class="infotrab">
        	<div class="infoizq">
            	<h2><span><?php echo $fila['nombre']?></span></h2>
                <p><?php echo $fila['des_corta']?></p>
                <p><?php echo $fila['des']?></p>
            </div>
            <div class="infoder">
            	<h2><span>Detalles</span></h2>
                <p><?php echo $fila['detalle']?></p></p>
            </div>
        </div>
    </div>
   <?php } ?>

</div>
<?php 
mysqli_close($conexion);
include"footer.php";?>
</body>
</html>
