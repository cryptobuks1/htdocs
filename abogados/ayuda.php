<?php 
$a = session_id();
if(empty($a)){ 
  @session_start();
    
  if($_SESSION['logueado']){
    $links = '
      <a href="#" id="usuarios" title="Ingreso y registro"> Bienvenido(a) '. $_SESSION['name'].' </a> | 
       <a href="php/actualizardatos.php">Mi cuenta </a> | 
      <a href="pantallazos/cierresesionexitosa.php">Salir</a>';
  }else{
    $links = '<a href="#" id="usuarios" title="Ingreso y registro"> Login | Registro</a> ';

  }
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Abogados Web" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abogadosweb.com.co" />
<meta property="og:site_name" content="Abogados Web consultas en linea" />
<meta property="fb:admins" content="612842103" />

<link href="css/stylos.css" rel="stylesheet" type="text/css" />
<link href="menu/style.css" rel="stylesheet" type="text/css" />
<link href="menu/reset.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="menu/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="menu/sprite.js"></script> 
      
<script type="text/javascript" src="js/ventanas.js"></script> 
<title>Abogados Web Consultas en linea</title>
<link rel="icon" type="image/png" href="favicon.ico" />
<Link href = "http://fonts.googleapis.com/css?family = Domine: 400.700" rel = "estilo" type = "text / css">
<style>
footer{
	margin-top:0px;
}
</style>
</head>

<body onload="init(), MM_preloadImages('img/twitterhover-01.png','img/facehover-01.png')">
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
         <a href="index.php"><img src="imagenes/logo-01.png" width="261" height="87" alt="Logo Abogados Web" /></a>
        </div>
        <div class="usuarios">
          <!-- muestro u oculto links si el usuario se loguea -->
       		<?php echo $links; ?> 
        </div>
    	<div class="RedesSociales">
           	<div class="logosFT">  
                <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('elance twitter abogados web','','img/twitterhover-01.png',1)"><img src="img/twitter.png" alt="twitter abogados web" width="32" height="33" id="elance twitter abogados web" /></a> 
            <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('elance facebook abogados web','','img/facehover-01.png',1)">
            <img src="img/face.png" alt="Facebook Abogados Web" width="32" height="33" id="elance facebook abogados web" /></a></div>
            <!--boton me gusta-->
			<div class="fb-like" data-href="http://www.facebook.com/lupa.agencia.cali" data-send="false" data-layout="button_count" data-width="74" data-show-faces="false" data-font="arial">
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
            <li><a class="about" href="#"></a></li>
            <li><a class="contact" href="quienessomos.php">quienessomos.php"</a></li>
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
<div class="contenedor_ayuda">
	<div class="cont_ayuda">
        <div class="formayuda">
            <form action="#" method="post"	>
            <div align="center">
            	<p>Ayuda</p>
                <span>Para más información de cómo<br/> utilizar nuestros servicios, puede<br/> enviarnos un mensaje donde podrá<br/> plantearnos sus dudas y opiniones<br/> acerca de nuestro servicio.</span>
                <input type="submit" name="enviar" value="Enviar mensaje"/>
            </div>
              	<table cellspacing="2px">
                	<tr>
                    	<td style="width:80px;">
                        Nombre
                        </td>
                        <td>
                        <input type="text" name="nombre" size="50" value=""/>
                        </td>
                    </tr>
                    <tr>
                    	<td style="width:80px;">
                        Teléfono
                        </td>
                        <td>
                        <input type="text" name="nombre" size="50" value=""/>
                        </td>
                    </tr>
                	<tr>
                    	<td style="width:80px;">
                        E-mail
                        </td>
                        <td>
                        <input type="text" name="nombre" size="63" value=""/>
                        </td>
                    </tr>
                    <tr>
                    	<td  valign="baseline" style="width:80px;">
                        Mensaje
                        </td>
                        <td>
                        <textarea name="coment" id="f" cols="48" rows="6"></textarea>
                        </td>
                    </tr>
                </table>
            </form> 
            <img src="imagenes/incognita-01.png" atl="Ayuda Abogados Web"/>           
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