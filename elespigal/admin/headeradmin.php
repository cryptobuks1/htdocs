<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Panel de administracion tienda B Ghost</title>
	<meta property="og:url" content="http://" />
	<meta property="og:site_name" content="El Espigal" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
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
<script type="text/javascript" src="js/validarform.js"></script>
<script type="text/javascript" src="js/validarformnuevoprod.js"></script>
<style>
.mensajeImagen{
    margin: 0 auto;
    padding: 10px 20px;
   
    /* float: left; */
    width: 60%;
    background: #D70729;
    color: #fff;
    font-weight: bold;
}
.mensajeImagen a{
    font-size: 10px;
    background:#fff;
    display:block;
    color:#D70729;
}
.mensajeImagen a:hover{
    opacity: 1;

}
.tablauser{
    font-size:13px;
    margin-left:1% !important;
}
</style>
</head>

<body>
<header>
	<div class="encabezado">
    	<div>
        	<a href="index.php"><img src="../imagenes/logo-01.png"/></a>
            <h3><em>Bienvenido 
			<?php
			echo"".$_SESSION['user']['n']."";?> al Panel de Administración</em></h3>
    
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
            <li id="me"><a href="index.php"><span class="iconosg icon-house"></span>Inicio</a></li>
            <li id="me"><a href="categorias.php"><span class="iconos icon-vcard"></span>Categorías</a></li>
            <li id="pro">
            	<a href="productos.php"><span class="iconosg icon-ticket"></span>Productos</a>
               <ul class="submenuadmin" id="submenupro">
        	<?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
                  
                  <li><a href="nuevoproducto.php">Crear producto</a></li>
                  <?php }?>
              </ul>
            </li>
            <li id="me"><a href="adicionales.php"><span class="iconos icon-vcard"></span>Adicionales</a></li>
            <li id="user">
                <a href="list_usuarios.php"><span class="iconosg icon-user"></span>Usuarios</a>
        	<?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
               <ul class="submenuadmin" id="submenuuser">
                  <li><a href="nuevousuario.php">Crear usuario</a></li>
              </ul>
            <?php }?>
            </li>
            <?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
            <?php }?>
        </ul>
    </div >
</header>
</body>
</html>