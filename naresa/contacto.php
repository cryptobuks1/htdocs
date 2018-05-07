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
<title>Diseño y Equipamiento | Arquitectónico | Acerca de Skema</title>
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

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/efectos.js"></script>
<script type="text/javascript" src="js/load.js"></script>
<script type="text/javascript" src="js/less.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<?php include "map.php"?>
</head>
<body onload="initialize()">
<?php include "header.php";?>
<div class="cont_inicio">
	<div class="cortina"></div>
	<div class="banneracerca">
       <div class="contmap">
           <div id="map_canvas" style="width:100%; height:450px"></div>
       </div><!--contmap-->
    </div>
    <div class="grindacerca">
    	<div class="servcontac">
            <div class="servasesoria">
                <h1>INFORMACIÓN DE CONTACTO
                </h1>
            </div>
            <div class="contserv">
            	<ul>
                	<li><font>Direccion:</font> Floreana y Obispo Riera (esquina)</li>
                    <li><font>Localidad:</font> Ambato, Tungurahua</li>
                    <li><font>Teléfonos:</font> 032422875 | 032828197 </li>
                    <li><font>Celular:</font> +593 0993248687</li>
                    <li><font>Sitio Web:</font> www.naresasa.com</li>
                    <li><font>E-mail:</font>dir@ec.com</li>
                </ul>
            </div>
        </div>
    	<div class="servcontac">
            <div class="servasesoria">
                <h1>FORMULARIO DE CONTACTO
                </h1>
            </div>
            <div class="contform">
                <form class="form_contac" action="enviar.php" method="post">
                <input type="text" name="nombre" placeholder="Ingrese su nombre"/>
                <input type="mail" name="mail" placeholder="Ingrese su e-mail"/>
                <input type="text" name="celular" placeholder="Nùmero de telèfono"/>
                <input type="text" name="ciudad" placeholder="Ciudad"/>
                <textarea name="mensaje" placeholder="Mensaje"/></textarea>
                <input class="enlaceenviar" type="submit" value="Enviar"/>
            	</form>   
            </div>
        </div>
    </div>
</div>
<?php 
mysqli_close($conexion);
include"footer.php";?>
</body>
</html>
