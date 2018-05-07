<?php
$a = session_id();
if(empty($a)){ 
  @session_start();
  if($_SESSION['logueado']){

    $links = '
      <a href="#" id="usuarios" title="Ingreso y registro"> Bienvenido(a) '. $_SESSION['name'].' </a> | 
       <a href="php/actualizardatos.php">Mi cuenta </a> | 
      <a href="pantallazos/cierresesionexitosa.php">Salir</a>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Consultas juridicas online y descarga de minutas "/>
<meta name="keywords" content="consulta, juridico, abogado, abogados, minuta, caso, derecho, penal, laboral, familiar, civil, administrativo, justicia, reclamo, queja, derecho de petición, tutela"/>
<meta name="robots" content="index, fllow" />
<meta name="lenguage" content="es"/>
<meta property="og:title" content="Abogados Web" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abogadosweb.com.co" />
<meta property="og:site_name" content="Abogados Web consultas en linea" />
<meta property="fb:admins" content="612842103" />

<link href="css/stylos.css" rel="stylesheet" type="text/css" />
<link href="menu/style.css" rel="stylesheet" type="text/css" />
<link href="menu/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilosconsultorio.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="menu/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="menu/sprite.js"></script> 

		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> <!-- carga estilo nivo-slider.css -->
		<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" /> <!-- carga estilo default.css -->
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script> <!-- carga plugin jquery.nivo.slider.pack.js -->
        
<script type="text/javascript" src="js/ventanas.js"></script> 
<title>Abogados Web Consultas en linea</title>
<link rel="icon" type="image/png" href="favicon.ico" />
        
<script>
$(document).ready(function(){
	$('#comprar').hover(function(){
		$('#comprar a').css("color:#2b4c9d");
	});
 });
</script>
</head>

<body onload="init();">
    <div id="loading" style="position:absolute; width:100%; text-align:center;
 	height:100%; background-color:#fff; z-index:19000; padding-top:300px">
<img src="img/loading.gif" width="80" height="80" border=0><br/><p style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#91C8F0; font-size:14px">Loading...</p></div>
     <script>
	 var ld=(document.all);
	  var ns4=document.layers;
	 var ns6=document.getElementById&&!document.all;
	 var ie4=document.all;
	  if (ns4)
		ld=document.loading;
	 else if (ns6)
		ld=document.getElementById("loading").style;
	 else if (ie4)
		ld=document.all.loading.style;
	
	  function init(){
	  	var intro=document.getElementById("cont");
		 if(ns4){ld.visibility="hidden";}
		 else 
		 	if (ns6||ie4){ 
	 		ld.display="none";
		 	}
	 	}
		
	 </script>
<div class="cortina" id="cortina">
</div>
<div class="zona" id="zona">
    <?php include("form_log_resg.html"); ?>
</div>
<!--boton me gusta-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--cierre codigo boton me gusta-->

<header>
	<a name="arriba" id="arriba"></a>
  <div class="line_logo"
    </div>
  	<div class="LogoRedes">
        <div class="logo">
         <a href="index.php" title="Home"><img src="imagenes/logo-01.png" width="261"height="87" alt="Logo Abogados Web" /></a>
        </div>
        <div class="usuarios">
     		<!-- muestro u oculto links si el usuario se loguea -->
          <?php echo $links; ?>
        </div>
    	<div class="RedesSociales">
           	<div class="logosFT">  
                <a href="https://twitter.com/ABOGADOSWEBC" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('elance twitter abogados web','','img/twitterhover-01.png',1)"><img src="img/twitter.png" alt="twitter abogados web" width="32" height="33" id="elance twitter abogados web" /></a> 
            <a href="https://www.facebook.com/pages/Abogadoswebcomco/156730014488936?fref=ts" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('elance facebook abogados web','','img/facehover-01.png',1)">
            <img src="img/face.png" alt="Facebook Abogados Web" width="32" height="33" id="elance facebook abogados web" /></a></div>
            <!--boton me gusta-->
			<div class="fb-like" data-href="https://www.facebook.com/pages/Abogadoswebcomco/156730014488936?fref=ts" data-send="false" data-layout="button_count" data-width="74" data-show-faces="false" data-font="arial">
            </div>
			<!--cierre codigo boton me gusta--> 
        </div>
    </div>
    <!--Menu-->
  <div id="nav">
   	<ul id="navigation">
            <li><a class="home" href="index.php"></a></li>
            <li><a class="services" href="consultoriojuridico.php"></a></li>
            <li><a class="portfolio" href="consultoriojuridico.php"></a></li>
            <li><a class="about" href="minutasdes.php"></a></li>
            <li><a class="contact" href="quienessomos.php"></a></li>
            <li><a class="ayuda" href="ayuda.php"></a></li>
   	</ul>
  </div>
  
  <!--cierre Menu-->
    
<!--    <div class="menu">
    	<table class="itemsMenu" bgcolor="#00448b" width="1048" border="2" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>

  </div>-->
</header>
<div class="sombra_header">
</div>
<div class="contenedor_consultorio">
	<div class="contSeccion">
		<div align="center" class="seccion1">
			<div></div>
		</div>
		<div class="seccion2">
			<div class="consultas">
				<p>Cosultas</p>
				<hr height="20%" class="lineablanca">
				<span>
				<div align="justify">Tiene la posibilidad de hacer una consulta de forma detallada  para satisfacer su inquietud o problema jurídico.<span></div> 
			</div>		
			<div class="minutas">
				<p>Minutas Personalizadas</p>
				<hr height="20%" class="lineablanca">
				<span align="justify">
				<div align="justify">Mediante Abogadosweb.com.co usted podrá solicitar la elaboración de escritos y/o documentos de tipo jurídico como: derechos de petición, quejas y reclamos autorizaciones, y solicitudes, los cuales se utilizan de forma frecuente ante las entidades públicas y privadas para realizar sus trámites y hacer valer sus derechos ante las mismas.
				  
				  Si está actualmente interesado en que elaboremos una Minuta Personalizada, diligencie el siguiente formulario: 
				  <span></div> 
			</div>
		</div>
		<div class="seccionitems">
			<div class="tablaitems">
				<div class="barratitulo">
					<p>Producto</p><p>Precio único</p>
				</div >
				<div class="renglon">
					<p style="width:395px; padding-left:50px" >Consulta jurídica (<SPAN style="font-size:10px">Derecho Familiar, Civil, Penal, Laboral, Administrativo</SPAN>)</p><p style="width:176px; padding-left:0px" align="center">$ 30.000 + IVA</p><p align="center" valign="middle" id="comprar"><a href="formularios/formpago.php?valor=30000.00&usuarioId=<?php echo $_SESSION['idUsuario'] ?>&iva=16.00&prueba=1&email=<?php echo $_SESSION['email'] ?>&descripcion=Consulta">COMPRAR AHORA</a></p>
				</div>
				<div class="renglon">
					<p style="width:395px; padding-left:50px" >Minuta Personalizada (<SPAN style="font-size:10px">Derecho de petición, Quejas, Reclamaciones</SPAN>)</p><p style="width:176px; padding-left:0px" align="center">$ 50.000 + IVA</p><p align="center" valign="middle" id="comprar"><a href="formularios/formpago.php?valor=50000.00&usuarioId=<?php echo $_SESSION['idUsuario'] ?>&iva=16.00&prueba=1&email=<?php echo $_SESSION['email'] ?>&descripcion=Minuta Personalizada">COMPRAR AHORA</a></p>
				</div>
			</div>
		</div>		
	</div>
</div>
<footer>
    <table width="1100" border="0" align="center" cellspacing="15">
      <tr>
        <td><p>© 2013 Todos los derechos reservados Abogados Web</ P></td>
        <td style=" font-size:10px"><p><a href="index.php" title="Pagina de inicio">Inicio</a> | <a href="#" title="Consulta en linea">Consulta</a> | <a href="#" title="Obtener minutas personalizadas">Minutas Personalizadas</a> | <a href="#" title="Descargue minutas prediseñadas">Minutas para Descargar</a> | <a href="#" title="Sobre nuestra firma de abogados">Quienes Somos</a> | <a href="#" title="Ayuda hacer su consulta">Ayuda</a></p> </td>
        <td>
            <div style="position:relative"><a href="#arriba"><img src="imagenes/flecha3-01.png" alt="flecha"</div></a>
            <div  style="position:relative; margin-left:-35px; alignment-baseline:baseline;" >Diseño y Desarrollo<a href="http://lupaweb.com" target="blanck"><img  style=" margin-top:15px; margin-left:10px;"src="imagenes/logolupa-01.png" atl="Lupa Agencia de Diseño Web y Publicitario"/></a></div>
        </td>
      </tr>
    </table>
</footer>

</body>
</html>
<?php
}else{
?>  
 <script type="text/javascript">
 window.location.href="index.php";
 alert("Debe iniciar sesión para ingresar a esta pagina o entre para registrarse");
 </script>
<?php    
  }
}  
?>