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
<title>Diseño y Equipamiento | Arquitectónico | Quiénes somos</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />

<meta property="og:url" content="http://www.skemadis.com" />
<meta property="og:site_name" content="Sekema Diseño y Equipamiento" />
<meta property="og:title" content="Diseño y Equipamiento | Arquitectónico | Skema" />
<meta property="og:description" content="Diseño arquitectonico de interiores, equipamiento y mobiliario de oficina, hogar, educacional, comercial." />
<meta property="og:image" content="http://www.skema.com/image/logo-01.jpg" />
<link rel="icon" type="image/png" href="favicon.ico" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<!--<link href="css/main.less" rel="stylesheet/less" type="text/css" />-->
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>

<script type="text/javascript" src=" js/jquery.js"></script>
<script type="text/javascript" src=" js/efectos.js"></script>
<script type="text/javascript" src=" js/load.js"></script>
<script type="text/javascript" src=" js/less.js"></script>
<script type="text/javascript" src=" js/jquery.mCustomScrollbar.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<?php include "map.php";?>
</head>
<body onload="initialize()">
<?php include "header.php";?>
<div class="cont_inicio">
	<div class="cortina"></div>
	<div class="banneracerca">
    	<div class="tituloserv">
        	<h1>Quiénes Somos</h1>
        </div>
    	<img src="images/fondo-acerca.jpg" alt=""/>
    </div>
    <div class="grindacerca">
    	<div class="servacerca">
            <div class="servasesoria">
                <h1>SOLUCIONES DIGITALES Y GRÁFICAS
                </h1>
            </div>
            <div class="contserv">
            	<p>Somos una empresa a la vanguardia en todo lo que se refiere a rotulación, asesoramiento y diseño gráfico, con más de 6 años de experiencia, dedicada a satisfacer las expectativas de nuestros clientes incorporando creatividad y funcionalidad a todo nuestro portafolio de servicios, para así brindar soluciones inteligentes a necesidades específicas, con toda la experiencia, responsabilidad, y competitividad que caracteriza a nuestra empresa, estamos prestos a servirle en cualquiera de nuestras áreas.</p>
            </div>
            <div class="enlaceserv">
            	<ul>
                   <li><a href="index.php"/><font>Ver Trabajos</font><i></i></a></li>
                    <li><a href="index.php"/><font>Solicitar Proforma</font><i></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 
mysqli_close($conexion);
include"footer.php";?>
</body>
</html>
