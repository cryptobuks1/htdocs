<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Abogados Web" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abogadosweb.com.co" />
<meta property="og:site_name" content="Abogados Web consultas en linea" />
<meta property="fb:admins" content="612842103" />

<link rel="icon" type="image/png" href="../favicon.ico" />
<link href="../css/stylos.css" rel="stylesheet" type="text/css" />
<link href="../css/validarform.css" rel="stylesheet" type="text/css" />
<script src="../js/funciones.js"></script> 

</head>
<body>
<div class="actualizardatos">
    <div class="login">
    	<div class="logo2">
        	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>
		
        <div class="inicio">
			<a href="../index.php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
			<a href="../index.php"> Volver</a>
		</div>
    </div>
	<div class="cont_re">
        <div class="titulo_re" >
                ¿Ha olvidado su contraseña?
        </div>
        <div id="text">
        <p>Ingrese la dirección de correo electrónico con<br/>
        la que se registró. <br> Le será enviada a su correo, una contraseña aletoria que deberá cambiar accediendo a "Mi cuenta" después de haberse logueado.</p>
        </div>
        <div class="re_datos">
            <form action="cambiopass.php" method="POST">
                <table width="380" border="0" cellspacing="0">
                     
                      <tr>
                        <td><span>Dirección de correo electrónico:</span></td>
                      </tr>
                      <tr>
                        <td><input class="email" type="email" name="direccion" size="68" value=""/></td>
                        
                      </tr>
                      
                                  
                      <tr>
                        <td><input align="right" class="btrecordar" type="submit" name="enviar" width="170" height="50" value="Restablecer contraseña"/></td>
                      </tr>
                </table>
            </form>
        </div>
     </div>
</div>
</body>
</html>