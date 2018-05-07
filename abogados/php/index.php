<?php session_start();

  /*var_dump($_SESSION['logueado']);
  var_dump($_SESSION['email']);
  var_dump($_SESSION['name']);*/
          
  if($_SESSION['logueado']){
    $links = '
      <a href="#" id="usuarios" title="Ingreso y registro"> Bienvenido(a) '. $_SESSION['name'].' </a> | 
       <a href="actualizardatos.php">Mi cuenta </a> | 
      <a href="php/logout.php">Salir</a>';
  }else{
    $links = '<a href="#" id="usuarios" title="Ingreso y registro"> Login | Registro</a> ';

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

		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" /> <!-- carga estilo nivo-slider.css -->
		<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" /> <!-- carga estilo default.css -->
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script> <!-- carga plugin jquery.nivo.slider.pack.js -->
		<script type="text/javascript">
		

$(window).load(function() {
    			$('#slider').nivoSlider({
				slices: 1, // Cantidad de cortes de dicho efecto
					boxCols: 8,
					boxRows: 4,
					animSpeed: 200, // Velocidad de la transición
					pauseTime: 3000, // Tiempo de espera para mostrar otra transicion
					startSlide: 0, // Orden de imagen a mostar cuando se carga el slider (0=index)
					directionNav: true, // Permite true/false la navegación manual, usando los arrows
					directionNavHide: true, // Muestra los arrows sólo cuando el cursor esté sobre el slider.
					controlNav: false, // 1,2,3... Permite navegar usando los bullets de la parte inferior.
					keyboardNav: true, // Usa las flechas izquierda y derecha del teclado
					pauseOnHover: true, // Detener la transición cuando el cursor esté sobre el Slide
					manualAdvance: false, // Forzar a que sea sólo manualmente la transición
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
        </script> <!-- carga el slider al cargar el navegador -->
        
<script type="text/javascript" src="js/ventanas.js"></script> 
<title>Abogados Web Consultas en linea</title>
<link rel="icon" type="image/png" href="favicon.ico" />
<Link href = "http://fonts.googleapis.com/css?family = Domine: 400.700" rel = "estilo" type = "text / css">
</head>

<body onload="MM_preloadImages('img/twitterhover-01.png','img/facehover-01.png')">
<div class="cortina" id="cortina">
</div>
<div class="zonaUsuaria" id="zona">
    <div class="login" id="login">
    	<div>
        	<img src="imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>
        <div class="form">
        	<form action="php/login.php" method="POST">
            	<table height="50px">
                	<tr>
                    	<td><p>Correo electrónico</p></td><td><p>Contraseña</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="correo" value="" /></td>
                        <td><input type="text" name="pass" value=""/></td>
                        <td><input type="submit" value="Entrar"/></td>
                    </tr>
                    <tr>
                    	<td>¿Olvidasdete tu contraseña?</td>
                    </tr>
            	</table>    
        	</form>
        </div>
    </div>
    <div class="registro" id="registro">
    	<div class="publicidad">
        </div>
        <form action="" method="POST">
        	<div>
            	Registrate
        	</div>
            <table width="380" border="0" cellspacing="0">
                  <tr>
                    <td><span>Nombre</span></td><td><span>Apellido</span></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="nombre" size="40" value=""/></td>
					<td><input type="text" name="apellido" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Dirección</span></td><td><span>Teléfono</span></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="direccion" size="40" value=""/></td>
					<td><input type="text" name="telefono" size="40" value=""/></td>
				  </tr>
                  <tr>
                    <td><span>Usuario</span></td><td><span>Correo</span></td>
                  </tr>
                  <tr>
                    <td><input type="text" name="usuario" size="40" value=""/></td>
					<td><input type="email" name="correo" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Contraseña</span></td><td><span>Nuevamente la contraseña</span></td>
                  </tr>
                  <tr>
                    <td><input type="password" name="pass" size="40" value=""/></td>
					<td><input type="password" name="repass" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Fecha de Nacimiento</span></td>
                  </tr>
                  <tr>
                    <td><input type="date" name="fecha"  size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><p> Al enviar el registro muestra conformidad
                     con las <a href="#" >condiciones y restricciones.</a></p></td>
                  </tr>
                  <tr>
                    <td><input type="submit" name="enviar" width="170" height="50" value="Enviar registro"/></td>
                  </tr>
                </table>
    	</form>
        <?php
			if(isset($_POST['enviar'])){
				include ("php/registro.php");
			}
		?>
       	<a href="#" id="cerrar"><img src="img/cerrar-01.png"/></a>
    </div>
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
         <img src="imagenes/logo-01.png" width="261" height="87" alt="Logo Abogados Web" />
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
            <li><a class="contact" href="#"></a></li>
            <li><a class="ayuda" href="#"></a></li>
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
<div class="contenedor">
	<section class="slider">
		<div id="wrapper">			    
        	<div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                <img src="images/slider1.jpg" alt="" data-transition="slideInLeft"  />
                <a href="http://web.tursos.com/"><img src="images/slider2.jpg" alt="" data-transition="slideInLeft" title="hola" /></a> <!--Imagen link con titulo simple-->
                <img src="images/slider3.jpg" alt="" data-transition="slideInLeft" />
   		  		</div>
            </div>
    	</div>
        <div class="theme-default nivo-controlNav a a.active">
               <a class="theme-default nivo-controlNav a a.active" href="#"></a> <a class="theme-default nivo-controlNav a a.active" href="#"></a> <a class="theme-default nivo-controlNav a a.active" href="#"></a> <a class="theme-default nivo-controlNav a a.active" href="#"></a>
       </div>
       <div class="fondoslider">
       <img src="imagenes/sliderfondo-01.jpg" width="1360" height="320" />
       </div>
       <div class="sombra">
       </div>

    </section>
    <section class="informativo">
    	<div class="iconoslegales">
        	<p align="center"><strong>HAGA SU CONSULTA YA, FACIL Y EN CUALQUIER RAMA</strong></p>
         	<table width="926" border="0" align="center">
              <tr>
                <td>
                	<div class="ramos">
                        <div> 
                        	<img src="imagenes/familia41.jpg"/>
                            <div class="franja">
                        	</div>
                        </div>
                        <div class="boton">
                        	<img src="img/boton1-01.png"/>
                            <div>Derecho <br />de Familia</div>
                            <p><img src="img/flecha1-01.png"/></p>
                        </div>
                  	</div>
                </td>
                <td >
                	<div class="ramos">
                        <div> 
                        	<img src="imagenes/civil-01.jpg"/>
                            <div class="franja">
                        	</div>
                        </div>
                        <div class="boton">
                        	<img src="img/boton1-01.png"/>
                            <div>Derecho <br />Civil</div>
                            <p><img src="img/flecha1-01.png"/></p>
                        </div>
                  	</div>
                </td>
                <td>
                	<div class="ramos">
                        <div> 
                        	<img src="imagenes/penal-01.jpg"/>
                            <div class="franja">
                        	</div>
                        </div>
                        <div class="boton">
                        	<img src="img/boton1-01.png"/>
                            <div>Derecho <br />Penal</div>
                            <p><img src="img/flecha1-01.png"/></p>
                        </div>
                  	</div>
                </td>
                <td>
                	<div class="ramos">
                        <div> 
                        	<img src="imagenes/laboral-01.jpg"/>
                            <div class="franja">
                        	</div>
                        </div>
                        <div class="boton">
                        	<img src="img/boton1-01.png"/>
                            <div>Derecho <br />Laboral</div>
                            <p><img src="img/flecha1-01.png"/></p>
                        </div>
                  	</div>
                </td>
                <td>
                	<div class="ramos">
                        <div> 
                        	<img src="imagenes/admon-01.jpg"/>
                            <div class="franja">
                        	</div>
                        </div>
                        <div class="boton">
                        	<img src="img/boton1-01.png"/>
                            <div>Derecho <br />Administrativo</div>
                            <p><img src="img/flecha1-01.png"/></p>
                        </div>
                  	</div>
                </td>
              </tr>
            </table>

  	</div>
        <div class="abogadosAsesoriaOnline">
        	<div class="abogadosinfo">
                <div class="parteizq">
                    <P>Abogados Web</P>
                    <p style="margin-left:40px;"><span style="font-size:20px; font-family: Verdana, Geneva, sans-serif; line-height:18pt; margin-top:-40px;">Asesoría legal ON LINE</br> en Derecho de</br> 
        Familia, Civil, Penal,</br> Laboral y Administrativo</span> </P>
                    <table  cellspacing="20">
                    	<tr>
                        	<td>  
                            	<p style="font-size:35px; margin-left:30px;">Solo en 3 pasos...</p>
                            </td>
                            <td >
                            	<img src="imagenes/flechapasos-01.png" alt="flecha"/>
                            </td>
                    </table>
                </div> 
                <div class="parteder">
                	<table cellspacing="20">
                    	<tr>
                        	<td>
                            	<img src="imagenes/paso1-01.png" width="51" height="54" alt="paso uno" />
                            </td>
                            <td>
                                    <p>Realice su pago por la <span class="colorazul"><strong>CONSULTA ONLINE</strong></span> mediante los canales de pago que ofrecemos haciendo <span class="colorazul"><a href="#">Click aquí</a>.</span></p>
                            </td>
                        </tr>
                    	<tr>
                        	<td>
                            	<img src="imagenes/paso2-01.png" alt="paso dos" />
                            </td>
                        	<td>
                            	<p>Realizando el pago efectué su consulta jurídica de forma clara y resumida.</p>
                            </td>
                        </tr>
                    	<tr>
                        	<td>
                            	<img src="imagenes/paso3-01.png" alt="paso tres" />
                            </td>
                        	<td>
                            	<p>En un término de 48 horas se brindará la asesoría según su caso vía correo electrónico.</span></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>          
        </div>
    </section>
</div>

<footer>
    <table width="1100" border="0" align="center" cellspacing="15">
      <tr>
        <td><p>© 2013 Todos los derechos reservados Abogados Web</ P></td>
        <td style=" font-size:10px"><p><a href="index.php" title="Pagina de inicio">Inicio</a> | <a href="#" title="Consulta en linea">Consulta</a> | <a href="#" title="Obtener minutas personalizadas">Minutas Personalizadas</a> | <a href="#" title="Descargue minutas prediseñadas">Minutas para Descargar</a> | <a href="#" title="Sobre nuestra firma de abogados">Quienes Somos</a> | <a href="#" title="Ayuda hacer su consulta">Ayuda</a></p> </td>
        <td>
            <div style="position:relative"><a href="#arriba"><img src="imagenes/flecha3-01.png" alt="flecha"</div></a>
            <div  style="position:relative; margin-left:-35px; alignment-baseline:baseline;" >Diseño y Desarrollo<img  style=" margin-top:15px; margin-left:10px;"src="imagenes/logolupa-01.png" atl="Lupa Agencia de Diseño Web y Publicitario"/></div>
        </td>
      </tr>
    </table>
</footer>


</body>
</html>