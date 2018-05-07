<?php 
@session_start(); 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="El Espigal: gran variedad de sandwiches y cafetería, ahora puede hacer su pedido en línea (servicio delivery)."/>    
        <link rel="stylesheet" href="css/stylos.css" type="text/css" />
        <link rel="stylesheet" href="css/responsive.css" type="text/css" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="css/scroll.css" rel="stylesheet" type="text/css" media="handheld, only screen and (max-width: 768px)" />
        <script  type="text/javascript" src="lib/jquery.js"></script> 
        
        <script  type="text/javascript"  src="js/espigal.js"></script>
        <script  type="text/javascript"  src="js/jquery.mCustomScrollbar.js"></script> 
        <!--<script  src = "https://www.google.com/recaptcha/api.js"  ></script>-->
        <script>   
            $('.cantCart').load('php/actualizarcantidad.php');  
        </script>      


        <title>EL ESPIGAL: Sánduches - Cafés - Postres - Bebidas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    </head>
  <body>
    <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3&appId=323459701184127";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
  <header>
    <div class="sub-emp">
      <a href="index.php" class="home"><span class="icon-home"></span><aside>Inicio</aside></a>
      <h1 class="titulopag"><em>Los mejores Sanduches de Ambato!</em></h1>
      <a href="sugerencias.php" > <span class="icon-sug"></span><aside>sugerencias</aside></a><span class="separador"></span>
      <a href="empleo.php"><span class="icon-work"></span><aside>empleo</aside></a>
    </div>
    <a href="contacto.php" class="linkdomic"> 
      <div class="domic"><img src="imagenes/domicilio-01.png"/></div>
    </a>

    <div class="menuprincipal">

    	<ul class="menu">
            <li><a class="lin" href="index.php"><div class="logo"></div></a> </li>
            
            <li><a class="lin" href="nosotros.php"><div class="icon-users"></div> NOSOTROS</a></li>
            <li><a class="lin" href="menu.php"><div class="icon-food"></div>MENU</a>
              <ul class="subMenu">
                <li><a href="menu.php">Menú</a></li>
                <?php 
                include 'php/config.php';
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
                mysqli_set_charset($conexion, "utf8");
                $peticion = "SELECT * FROM categoria ORDER BY posicion";
                $resultado = mysqli_query($conexion, $peticion);
                while($fila = mysqli_fetch_array($resultado)){?>
                    <li><a href="producto.php?id_cat=<?php echo $fila['id_cat']?>&p=<?php echo $fila['posicion']?>"><?php echo $fila['nombre']?></a></li>
                <?php } ?>
                
              </ul>
            </li>
            <li><a class="lin" href="locales.php"><div class="icon-location"></div>LOCALES</a></li>
            <!---<li><a class="lin" href="promos.php"><div class="icon-off"></div>PROMOS</a></li>-->
            <li><a class="lin" href="catering.php"><div class="icon-catering"></div>CATERING</a></li>
            <li><a class="lin" href="contacto.php"><div class="icon-contacts"></div>CONTACTOS</a></li>
            <li><a class="lin" href="producto.php"><div class="icon-car iconCartCon"><aside class="cantCart"></aside></div>COMPRAR</a></li>
        </ul>
        <div class="menutop"> 
            
            <aside class="menuhome"><a href="index.php" class="homemovil"><span class="icon-home"></span></a></aside> 
            <aside class="menubar"><a class="lin"><i class="fa fa-bars"></i></a></aside>
            <aside class="cartabrir"><a class="lin"><div class="icon-car iconCartCon"><aside class="cantCart"></aside></div></a></aside>
            <aside class="cartlink"><a class="lin" href="producto.php"><div class="icon-car iconCartCon"><aside class="cantCart"></aside></div></a></aside>
        </div> 
       <ul class="menumovil">
            
            <li><a class="lin" href="nosotros.php"><div class="icon-users"></div> NOSOTROS</a></li>
            <li><a class="lin" href="menu.php"><div class="icon-food"></div>MENU</a>
             <!-- <ul class="subMenu">
                <li><a href="menu.php">Menú</a></li>
                <?php 
                include 'php/config.php';
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
                mysqli_set_charset($conexion, "utf8");
                $peticion = "SELECT * FROM categoria ORDER BY posicion";
                $resultado = mysqli_query($conexion, $peticion);
                while($fila = mysqli_fetch_array($resultado)){?>
                    <li><a href="producto.php?id_cat=<?php echo $fila['id_cat']?>&p=<?php echo $fila['posicion']?>"><?php echo $fila['nombre']?></a></li>
                <?php } ?>
                
              </ul>-->
            </li>
            <li><a class="lin" href="locales.php"><div class="icon-location"></div>LOCALES</a></li>
            <li><a class="lin" href="promos.php"><div class="icon-off"></div>PROMOS</a></li>
            <li><a class="lin" href="catering.php"><div class="icon-catering"></div>CATERING</a></li>
            <li><a class="lin" href="contacto.php"><div class="icon-contacts"></div>CONTACTOS</a></li>
            <li><a class="lin" href="producto.php"><div class="icon-car iconCartCon"><aside class="cantCart"></aside></div>COMPRAR</a></li>
        </ul>
                  
            <?php //include "cart.php"; ?>
        </div>
    </div>

 
          
   
      <div class="testing"><a href="index.php"><img src="imagenes/logo-01.png" alt="El Espigal"></a></div>
    <div class="menuprincipaldeb">

    </div>
    <!--Menu-->
</header>

<!--<div class="logo">
                    <img src="imagenes/logo.png" width="200" alt="El Espigal">
                </div>-->
