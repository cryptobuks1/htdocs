<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recordar Contraseña</title>
	<meta property="og:url" content="http://" />
	<meta property="og:site_name" content="El Espigal" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="http://" />
    <title>El Espigal</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="icon" type="../image/png" href="favicon.png" />
	<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<script src="../js/html5shiv.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/efectos.js"></script>
<script type="text/javascript" src="../js/load.js"></script>
</head>

<body style='padding:0px; margin:0px; width:100%; height:100%; background:#DBCEB2;'>
	<center class="logologinadmin"><img src="../../imagenes/logo-01.png"/></center>
    <center class="titulologinadmin">Recordar Contraseña</center>
    <div class="contform">
        <div class="mail_resert_error">
        <h5 class="mail_resert-mensaje"></h5>
        </div>
        <form action="resertpass.php" method="POST">
        	<label>Ingrese E-mail registrado</label>
            <input type="text" name="mail" placeholder="E-mail registrado"/>
            <input type="hidden" name="url" value="<?php echo"".$_SERVER['REQUEST_URI']."";?>"/>
            <input type="submit" value="Resetear contraseña" class="boton boton_ini" />
        </form>
        <a href="../index.php"><button class="botonresetpass boton boton_ini">Cancelar</button></a>
    </div>
</body>
</html>