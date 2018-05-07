<?php 
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd)or die (mysql_error());
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
	<div class="bannerserv">
    	<div class="tituloserv">
        	<h1>Servicios</h1>
        </div>
    	<img src="images/servbanner.jpg" alt=""/>
    </div>
    <div class="grindserv">
    	<div class="serv">
            <div class="servasesoria">
                <h1>Rotulación
                </h1>
            </div>
            <div class="contserv">
            	<p>La rotulación es el arte de dibujar. Es toda perfección que se consigue cuando se está trazando las literales del mismo. 
                Se distinguen dos tipos principales de rotulado: manual y digital. El rotulado manual se realiza mediante pincel y brocha, 
                mientras que en el rotulado digital se emplea un plóter de recorte o de inyección de tinta en caso de lonas. Legibilidad es 
                término empleado en el diseño tipográfico de rotulación, para definir una cualidad deseable en la impresión de las letras del
                texto. Algo legible es la facilidad o complejidad de la lectura de una letra.</p>
            </div>
            <div class="enlaceserv">
            	<ul>
                   <li><a href="index.php"/><font>Ver Trabajos</font><i></i></a></li>
                    <li><a href="index.php"/><font>Solicitar Proforma</font><i></i></a></li>
                </ul>
            </div>
        </div>
        <div class="serv">
            <div class="servasesoria">
                <h1>Rótulos y letras corpóreas
                </h1>
            </div>
            <div class="contserv">
                <p>Los rótulos constituyen uno de los elementos principales de señalización del punto de venta y permiten identificar los establecimientos.
                   Un rótulo es una señal que debe servir como elemento de identificación del local. En su diseño, por tanto, debe tenerse en cuenta que además de servir como
                   elemento de denominación es un factor determinante de la imagen que se desea dar globalmente a la tienda.</p>
            </div>
            <div class="enlaceserv">
            	<ul>
                   <li><a href="index.php"/><font>Ver Trabajos</font><i></i></a></li>
                    <li><a href="index.php"/><font>Solicitar Proforma</font><i></i></a></li>
                </ul>
            </div>
        </div>
        <div class="serv">
            <div class="servasesoria">
                <h1>Vallas
                </h1>
            </div>
            <div class="contserv">
            	<p>Las llamadas gigantografías son pósters o cartel impresos en gran formato, generalmente más grandes que el estándar póster de 100x70. 
                En los años 50 y 60 estuvo muy de moda empapelar una pared con una foto gigante (de un bosque, playa, etc), estas fotos no eran de muy 
                buena calidad, porque la tecnología no permitía la alta definición que hoy día se puede obtener.</p>
            </div>
            <div class="enlaceserv">
            	<ul>
                   <li><a href="index.php"/><font>Ver Trabajos</font><i></i></a></li>
                    <li><a href="index.php"/><font>Solicitar Proforma</font><i></i></a></li>
                </ul>
            </div>
        </div>
        <div class="serv">
            <div class="servasesoria">
                <h1>Vehículos
                </h1>
            </div>
            <div class="contserv">
            	<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. 
                Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus 
                senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod 
                consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit 
                veritus placerat per.</p>
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
