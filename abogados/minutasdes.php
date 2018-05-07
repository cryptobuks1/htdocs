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

<body onload="MM_preloadImages('img/twitterhover-01.png','img/facehover-01.png')">
<div class="cortina" id="cortina">
</div>
<div class="zonaUsuaria" id="zona">
    <div class="login" id="login">
    	<div align="">
        	<img src="imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>
        <div class="form">
        	<form action="php/login.php" method="POST">
            	<table height="50px">
                	<tr>
                    	<td><p>Correo electr�nico</p></td><td><p>Contrase�a</p></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="correo" value="" /></td>
                        <td><input type="text" name="pass" value=""/></td>
                        <td><input type="submit" value="Entrar"/></td>
                    </tr>
                    <tr>
                    	<td>�Olvidasdete tu contrase�a?</td>
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
                    <td><span>Direcci�n</span></td><td><span>Tel�fono</span></td>
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
                    <td><span>Contrase�a</span></td><td><span>Nuevamente la contrase�a</span></td>
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
         <a href="index.php"><img src="imagenes/logo-01.png" width="261" height="87" alt="Logo Abogados Web" /></a>
        </div>
        <div class="usuarios">
     		<a href="#" id="usuarios" title="Ingreso y registro">Login | Registro</a> | <a href="actualizardatos.php">Mi cuenta</a>
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
            <li><a class="about" href="minutasdes.php"></a></li>
            <li><a class="contact" href="quienessomos.php"></a></li>
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
<div class="sombra_header">
</div>
<div class="contenedor_consultorio">
	<div class="contSeccion">
		<div align="center" class="seccion1des">
			<div></div>
		</div>
		<div class="seccion2des">
			<div class="descarga">
            	<div class="destitulo">
                    <img src="imagenes/icodes-01.png" alt="descargas"/>
                    <p>Descargue gratis</p>
                </div>
				<hr height="20%" class="lineablanca">
				<span>
				<div align="justify">Tenemos una variedad de minutas estandar que puede descargar sin costo, pero tambien tiene la posibilidad de tener la minuta que necesite personalizada.</br></br>

<strong style="font-size:16px">Importante!</strong><br/>Abogadosweb.com.co no se responsabiliza del contenido de esta minuta. El uso de este formato y sus modificaciones dependen exclusivamente de las necesidades que tenga el usuario.  <span></div> 
			</div>		
			<div class="contper">
            	<p align="center" valign="middle" id="personalizar"><a href="consultoriojuridico.php"><span>Click aqui</span></br>para personalizar su minuta</a></p>
			</div>
		</div>
		<div class="seccionarchivos">
        	<div class="archivos">
            	<div class="infarchivo" align="center">
                	<p>Contrato de arrendamiento<br/> 
local comercial</p>
                    <img src="imagenes/word-01.png" alt="Contrato de arrendamiento local comercial"/>
                </div>
                <div class="linkdes">
                	<h1><a href="descargas/localcomercial.docx">Descargar</h1><img src="imagenes/icodes2-01.png"/><a/>
                </div>
            </div>
        	<div class="archivos">
            	<div class="infarchivo" align="center">
                	<p>Contrato de arrendamiento<br/> 
vivienda urbana</p>
                    <img src="imagenes/word-01.png" alt="Contrato de arrendamiento vivienda urbana"/>
                </div>
                <div class="linkdes">
                	<h1><a href="descargas/viviendaurbana.docx">Descargar</h1><img src="imagenes/icodes2-01.png"/><a/>
                </div>
            </div>
        	<div class="archivos">
            	<div class="infarchivo" align="center">
                	<p>Poder especial<br/> para
venta de inmueble</p>
                    <img src="imagenes/word-01.png" alt="Poder especial para venta de inmueble"/>
                </div>
                <div class="linkdes">
                	<h1><a href="descargas/ventainmueble.docx">Descargar</h1><img src="imagenes/icodes2-01.png"/><a/>
                </div>
            </div>
		</div>
        <div class="sombarchivo">
            <img src="imagenes/sombArchivo-01.png" width="223" height="26"/>
            <img src="imagenes/sombArchivo-01.png" width="223" height="26"/>
            <img src="imagenes/sombArchivo-01.png" width="223" height="26"/>
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