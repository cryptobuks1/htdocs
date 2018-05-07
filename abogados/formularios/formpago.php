<?php 

$a = session_id();
if(empty($a)){ 
  @session_start();
    
  if($_SESSION['logueado']){

    require_once ('../db.class.php');


    //GUARDAR ESTOS DATOS EN LA DB
    //$llave_encripcion = "1111111111111111"; //llave de encripción que se usa para generar la fima
    /*$llave_encripcion = "13eae268e79"; //llave de encripción que se usa para generar la fima
    //$usuarioId = "2"; //código único del cliente
    $usuarioId = $_REQUEST['usuarioId']; //código único del cliente
    $refVenta = time(); //referencia que debe ser única para cada transacción
    //$iva=36000; //impuestos calculados de la transacción
    //$baseDevolucionIva=300000; //el precio sin iva de los productos que tienen iva
    $baseDevolucionIva=$_REQUEST['baseDevIva']; //el precio sin iva de los productos que tienen iva
    //$valor=486000; //el valor total
    $valor=$_REQUEST['valor']; //el valor total
    $iva_calc = $_REQUEST['iva']; //impuestos calculados de la transacción
    $iva = $iva_calc * $valor /100;
    $valor_total = $valor + $iva;
    $moneda ="COP"; //la moneda con la que se realiza la compra
    //$prueba = "1"; //variable para poder utilizar tarjetas de crédito de prueba
    $prueba = $_REQUEST['prueba']; //variable para poder utilizar tarjetas de crédito de prueba
    $descripcion = $_REQUEST['descripcion']; //descripción de la transacción
    //$url_respuesta = "http://ayuda.pagosonline.com/pruebas/respuesta.php";
    $url_respuesta = "http://lupapublicidad.com/abogados/pagos_test/respuesta.php";
    $url_validacion = "http://lupapublicidad.com/abogados/pagos_test/validacion.php";
    $url_aprobada = "http://lupapublicidad.com/abogados/pagos_test/aprobada.php";
    $url_rechazada = "http://lupapublicidad.com/abogados/pagos_test/rechazada.php";
   //$url_action = "https://gateway2.pagosonline.net/apps/gateway/index.html";
   $url_action = "https://gateway.pagosonline.net/apps/gateway/boton_simplificado.html";
    $emailComprador=$_REQUEST['email']; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
    $firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma
    $firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha*/
 
    $url_action = "https://gateway.pagosonline.net/apps/gateway/index.html";
    //$valor = 30000.0;
    $idComprador = $_REQUEST['usuarioId'];
    $valor = $_REQUEST['valor'];
    $emailComprador = $_REQUEST['email'];
    $descripcion = $_REQUEST['descripcion'];
    $iva_calc = $_REQUEST['iva']; //impuestos calculados de la transacción
    //$iva_calc = $_REQUEST['iva']; //impuestos calculados de la transacción
    $iva = $iva_calc * $valor /100;
    $valor_total = $valor + $iva;
    $moneda =COP;
    $refVenta = time();
    $llave_encripcion = "13eae268e79";
    $usuarioId = 101345;
    $firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor_total~$moneda"; //concatenación para realizar la firma
    //echo $firma_cadena;
    $firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha
    $serviceType = md5($firma_cadena); //creación de la firma con la cadena previamente hecha
    $paid = 0;
   

    
    $query = "INSERT INTO user_forms (user_id, email, service_type, ref_venta, paid,insert_time)
        VALUES (:idComprador, :emailComprador,:serviceType,:refVenta,:paid, NOW())";

    $stmt = DB::getStatement($query);
    $stmt->bindParam(":idComprador", $idComprador, PDO::PARAM_STR);
    $stmt->bindParam(":emailComprador", $emailComprador, PDO::PARAM_STR);
    $stmt->bindParam(":refVenta", $refVenta, PDO::PARAM_STR);
    $stmt->bindParam(":serviceType", $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(":paid", $paid, PDO::PARAM_INT);



    if($stmt->execute()) {

    DB::getConnection()->lastInsertId();

    }    
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Abogados Web" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abogadosweb.com.co" />
<meta property="og:site_name" content="Abogados Web consultas en linea" />
<meta property="fb:admins" content="612842103" />

<link href="../css/stylos.css" rel="stylesheet" type="text/css" />
<link href="../css/formpagos.css" rel="stylesheet" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="file:///D|/CLIENTES WEB/PROYECTOS/ABOGADOSWEB/pantallazos/menu/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="file:///D|/CLIENTES WEB/PROYECTOS/ABOGADOSWEB/pantallazos/menu/sprite.js"></script> 

</head>
<body>
<div class="actualizardatos">
    <div class="login">
    	<div class="logo2">
        	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>
		
        <div class="inicio">
			<a href="../consultoriojuridico.php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
			<a href="../consultoriojuridico.php"> Volver</a>
		</div>
    </div>
    <?php
	/*$llave_encripcion = "13eae268e79"; //llave de encripción que se usa para generar la fima
	$usuarioId = "18841"; //código único del cliente
	$refVenta = time(); //referencia que debe ser única para cada transacción
	$iva=4800; //impuestos calculados de la transacción
	$baseDevolucionIva=30000; //el precio sin iva de los productos que tienen iva
	$valor=34800; //el valor total
	$moneda ="COP"; //la moneda con la que se realiza la compra
	$prueba = "1"; //variable para poder utilizar tarjetas de crédito de prueba
	$descripcion = "Pruebas de Generacion de Firmas"; //descripción de la transacción
	$url_respuesta = "http://ayuda.pagosonline.com/pruebas/respuesta.php";
	$emailComprador="info@mail.com"; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
	$firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma
	$firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha*/
	?>
	<div class="titulo_pagos">
        	Si esta correta la información del pago presione enviar,</br>
            de lo contrario puede ir atras en volver.
            </br>
	</div>
    <div class="ac_datos">
            <!--<form method="post" action="https://gateway.pagosonline.net/apps/gateway/index.html">-->
            
           
                
                
                <form method="post" action="<?php echo $url_action ?>">

                    <label>Descripción</label>
                    <input align="right" name="descripcionForm" type="text" value="<?php echo $descripcion ?>"></br>
                    <label>Referencia</label>
                    <input align="right" name="refVentaForm" readonly="readonly" type="text" value="<?php echo $refVenta ?>"></br>
                    <label>Valor</label>
                    <input align="right" name="baseDevolucionIvaForm " readonly="readonly" type="text" value="$ <?php echo $valor ?>"></br>
                    <label>IVA</label>
                    <input align="right" name="ivaForm" readonly="readonly" type="text" value="$ <?php echo $iva ?>"></br>
                    <label>Valor total</label>
                    <input align="right" name="valorForm" readonly="readonly" type="text" value="$ <?php echo $valor_total ?>"></br>
                    <label>Tipo de monena</label>
                    <input align="right" name="monedaForm" readonly="readonly" type="text" value="<?php echo $moneda ?>"></br>

                    <input name="usuarioId" type="hidden" value="<?php echo $usuarioId ?>">
                    <input name="usuario_id" type="hidden" value="<?php echo $idComprador ?>">
                    <input name="firma" type="hidden" value="<?php echo $firma ?>">
                    <input name="emailComprador" type="hidden" value="<?php echo $emailComprador ?>">
                    <input name="descripcion" type="hidden" value="<?php echo $descripcion ?>">
                    <input name="valor" type="hidden" value="<?php echo $valor_total ?>">
                    <input name="moneda" type="hidden" value="<?php echo $moneda ?>">
                    <input name="refVenta" type="hidden" value="<?php echo $refVenta ?>">
                    <input name="lng" type="hidden" value="es">
                    <input name="prueba" type="hidden" value="1">
                    <input name="iva" type="hidden" value="<?php echo $iva ?>">
                    <input name="baseDevolucionIva" type="hidden" value="<?php echo $valor ?>">
                    <input name="url_respuesta" type="hidden" value="http://abogadosweb.com.co/beta/pagos_test/respuesta.php">
                    <input name="url_confirmacion" type="hidden" value="http://abogadosweb.com.co/beta/pagos_test/validacion.php">

          
                <input name="Submit" type="submit" value="Enviar">
            </form>
    </div>
</div>
</body>
</html>
<?php
}else{
    header('Location: ../index.php');

  }
}  
?>