<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de administracion tienda B Ghost</title>
	<meta property="og:url" content="http://" />
	<meta property="og:site_name" content="Sanduches, cafés..." />
	<meta property="og:title" content="Sanduches, cafés..." />
	<meta property="og:description" content="Sanduches, cafés..." />
	<meta property="og:image" content="http://" />
    <title>B Ghost</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="icon" type="image/png" href="favicon.png" />
	<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/load.js"></script>
</head>

<body style='padding:0px; margin:0px; width:100%; height:100%; background:#DBCEB2;'>
    <center class="logologinadmin"><img class="log" src="../imagenes/logo-01.png"/></center>
    <center class="titulologinadmin">Módulo de Administración</center>
    <div class="contform">
        <form action="php/login.php" method="POST">
        	<label>Correo electrónico</label>
            <input type="text" name="mail" placeholder="E-mail registrado"/>
        	<label>Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña"/>
            <input type="hidden" name="url" value="<?php echo"".$_SERVER['REQUEST_URI']."";?>"/>
            <input type="submit" value="Inicio de Sesión" class="boton boton_ini"/>

        </form>
        <a href="php/recordarpass.php"><button class="botonresetpass boton boton_ini">Olvidó su contraseña?</button>
    </div>
</body>
</html>