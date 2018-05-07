<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel de administracion tienda B Ghost</title>
	<meta property="og:url" content="http://" />
	<meta property="og:site_name" content="Manufacturas B Ghost" />
	<meta property="og:title" content="Ropa formal e informal para hombre, mujer y niños" />
	<meta property="og:description" content="Diseñamos ropa formal e informal para hombres, mujeres y niños, ternos, trajes, chequetas, blazer, chaquetas, pantalones, jeans, camisas, camisetas, faldas, vestidos" />
	<meta property="og:image" content="http://" />
    <title>B Ghost</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="icon" type="image/png" href="../favicon.png" />
	<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="../js/efectos.js"></script>
<script type="text/javascript" src="js/efectosadmin.js"></script>
<script type="text/javascript" src="js/load.js"></script>
</head>

<body>
<header>
	<div class="encabezado">
    	<div>
        	<a href="index.php"><img src="image/logoadmin.png"/></a>
            <h3><em>Bienvenido 
			<?php
			echo"".$_SESSION['usuario']['n']."";?> al Panel de Administración</em></h3>
    
            <ul>
            	<li><a href="php/logout.php">Salir</a></li>
                <li><a style="text-decoration:none; color:#fff;" href="../index.php"> Ir a la Tienda</a></li>
                <li><?php 
					ini_set('date.timezone','America/Bogota'); 
					$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 					echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y')." | ".date("g:i A");
				?></li>
            </ul>
        </div>
    </div>
    <div class="menuadmin" >
        <ul>
            <li id="me"><a href="index.php">Inicio</a></li>
            <li id="pro">
            	<a href="productos.php">Trabajos</a>
            </li>
        </ul>
    </div >
</header>
