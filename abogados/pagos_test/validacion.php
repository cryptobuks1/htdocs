<?php
date_default_timezone_set('America/Bogota');

//$llave="1111111111111111";/////llave de usuario de pruebas 2
$llave="13eae268e79";/////llave de usuario de pruebas 2
$usuario_id=$_REQUEST['usuario_id'];
$ref_venta=$_REQUEST['ref_venta'];
$valor=$_REQUEST['valor'];
$moneda=$_REQUEST['moneda'];
$estado_pol=$_REQUEST['estado_pol'];
$firma_cadena= "$llave~$usuario_id~$ref_venta~$valor~$moneda~$estado_pol";
$firmacreada = md5($firma_cadena);//firma que generaron ustedes
$firma =$_REQUEST['firma'];//firma que envía nuestro sistema
$fecha_procesamiento=$_REQUEST['fecha_procesamiento'];
$ref_pol=$_REQUEST['ref_pol'];
$cus=$_REQUEST['cus'];
$extra1=$_REQUEST['extra1'];
$banco_pse=$_REQUEST['banco_pse'];
if($_REQUEST['estado_pol'] == 6 && $_REQUEST['codigo_respuesta_pol'] == 5)
{$estadoTx = "Transacci&oacute;n fallida";}
else if($_REQUEST['estado_pol'] == 6 && $_REQUEST['codigo_respuesta_pol'] == 4)
{$estadoTx = "Transacci&oacute;n rechazada";}
else if($_REQUEST['estado_pol'] == 12 && $_REQUEST['codigo_respuesta_pol'] == 9994)
{$estadoTx = "Pendiente, Por favor revisar si el d&eacute;bito fue realizado en el Banco";}
else if($_REQUEST['estado_pol'] == 4 && $_REQUEST['codigo_respuesta_pol'] == 1)
{$estadoTx = "Transacci&oacute;n aprobada";}
else
{$estadoTx=$_REQUEST['mensaje'];}
?>