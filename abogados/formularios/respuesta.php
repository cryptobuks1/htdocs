<?php
$llave="1111111111111111";/////llave de usuario de pruebas 2
$usuario_id=$_REQUEST['usuario_id'];
$ref_venta=$_REQUEST['ref_venta'];
$valor=$_REQUEST['valor'];
$moneda=$_REQUEST['moneda'];
$estado_pol=$_REQUEST['estado_pol'];
$firma_cadena= "$llave~$usuario_id~$ref_venta~$valor~$moneda~$estado_pol";
$firmacreada = md5($firma_cadena);//firma que generaron ustedes
$firma =$_REQUEST['firma'];//firma que env�a nuestro sistema
$ref_venta=$_REQUEST['ref_venta'];
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
if(strtoupper($firma)==strtoupper($firmacreada)){//comparacion de las firmas para comprobar que los datos si vienen de Pagosonline
?>

<table width="%100" border="1">
<tr>
<td>Nombre de la empresa</td>
<td>Pagosonline (Cambia nombre)</td>
</tr>
<tr>
<td>NIT</td>
<td>######### (Cambiar de NIT)</td>
</tr>
<tr>
<td>Fecha de procesamiento</td>
<td><?php echo $fecha_procesamiento; ?></td>
</tr>
<tr>
<td>Estado de la transaccion</td>
<td><?php echo $estadoTx; ?> </td>
</tr>
<tr>
<td>referencia de la venta </td>
<td><?php echo $ref_venta; ?> </td> </tr>
<tr>
<td>Referencia de la transaccion </td>
<td><?php echo $ref_pol; ?> </td>
</tr>
<tr>
<?php
if($banco_pse!=null){
?>
<tr>
<td>cus </td>
<td><?php echo $cus; ?> </td>
</tr>
<tr>
<td>Banco </td>
<td><?php echo $banco_pse; ?> </td>
</tr>
<?php
}
?>
<tr>
<td>Valor total</td>
<td><?php echo number_format($valor); ?> </td>
</tr>
<tr>
<td>moneda </td>
<td><?php echo $moneda; ?></td>
</tr>
<tr>
<td>Descripci�n:</td>
<td><?php echo ($extra1); ?></td>
</tr>
</table>


<input type="button" name="imprimir" value="Imprimir Recibo" onclick="window.print();"><br />
Si tiene alguna duda acerca de esta transacci&oacute;n por favor cumun&iacute;quese con nuestro servicio al cliente al tel&eacute;fono XXX. <br /> <br />
Por favor personalizar est� p�gina con logos de la empresa y por lo menos debe existir un link que este enlazado con el inicio.

<?php
}
?>
