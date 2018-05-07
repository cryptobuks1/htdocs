<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../css/stylos.css" rel="stylesheet" type="text/css" /> 
<link href="../css/estilosconsultorio.css" rel="stylesheet" type="text/css" />
<link href="../css/validarform.css" rel="stylesheet" type="text/css" /> 
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
<script src="../js/funciones.js"></script> 
<title>Abogados Web Consultas en linea</title>
<link rel="icon" type="image/png" href="../favicon.ico" />
</head>

<body  style="width:100%; height:100%" onload="MM_preloadImages('../img/twitterhover-01.png','../img/facehover-01.png')">
	<div class="login">
    	<div class="logo2">
        	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>		
        <div class="inicio">
			<a href="index.-php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
			<a href="../index.php"> Volver</a>
		</div>
    </div>

	<div class="formconsulta">	
		<form action="../php/processforms.php" method="POST">
        	<div class="titulo2">
				Consulta Jurídica
				<p>Ahora puede hacer su consulta, recuerde ser breve y concreto. Le daremos respuesta, en un plazo máximo de 48 horas</p>
        	</div>
            <table width="380" border="0" cellspacing="0">
                  <tr>
                    <td><span>Nombre*</span></td>
                  </tr>             
                  <tr>
                    <td><input class="nombre" type="text" name="nombre" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Apellido*</span></td>
                  </tr>     
                   <tr>
					<td><input class="apellido" type="text" name="apellido" size="40" value=""/></td>
                  </tr>
                  <tr>
                   <td><span>Teléfono*</span></td>
                  </tr>
                  <tr>
					<td><input class="tel" type="text" name="telefono" size="40" value=""/></td>
				  </tr>
                  <tr>
                   <td><span>Correo*</span></td>
                  </tr>
                  <tr>
					<td><input class="email" type="email" name="correo" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Comentario*</span></td>
                  </tr>
                  <tr>
                   <td><textarea class="mensaje" name="coment" id="f" cols="40" rows="7"></textarea></td>
                  </tr>
                  <tr>
                    <td><input class="boton" type="submit" name="enviar" width="170" height="50" value="Enviar"/></td>
                  </tr>
                </table>
                </br>Los campos con * son requeridos
                <input type="hidden" name="query" value="1">
    	</form>
	</div>	
<footer style="margin-top:0px">
    <table width="1100" border="0" align="center" cellspacing="15">
      <tr>
        <td><p>@2013 Todos los derechos reservados Abogados Web</ P></td>
        <td style=" font-size:10px"><p><a href="../index.php" title="Pagina de inicio">Inicio</a> | <a href="../consultoriojuridico.php" title="Consulta en linea">Consulta</a> | <a href="../consultoriojuridico.php" title="Obtener minutas personalizadas">Minutas Personalizadas</a> | <a href="../minutasdes.php" title="Descargue minutas prediseñadas">Minutas para Descargar</a> | <a href="../quienessomos.php" title="Sobre nuestra firma de abogados">Quienes Somos</a> | <a href="../ayuda.php" title="Ayuda hacer su consulta">Ayuda</a></p> </td>
        <td>
            <div style="position:relative"><a href="#arriba"><img src="../imagenes/flecha3-01.png" alt="flecha"</div></a>
            <div  style="position:relative; margin-left:-35px; alignment-baseline:baseline;" >Diseño y Desarrollo<a href="http://www.lupapublicidad.com" target="_blank" ><img  style=" margin-top:15px; margin-left:10px;"src="../imagenes/logolupa-01.png" atl="Lupa Agencia de Dise?o Web y Publicitario"/></a></div>
        </td>
      </tr>
    </table>
</footer>


</body>
</html>