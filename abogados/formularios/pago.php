<?php
$llave_encripcion = "1111111111111111"; //llave de encripción que se usa para generar la fima
$usuarioId = "2"; //código único del cliente
$refVenta = time(); //referencia que debe ser única para cada transacción
$iva=36000; //impuestos calculados de la transacción
$baseDevolucionIva=300000; //el precio sin iva de los productos que tienen iva
$valor=486000; //el valor total
$moneda ="COP"; //la moneda con la que se realiza la compra
$prueba = "1"; //variable para poder utilizar tarjetas de crédito de prueba
$descripcion = "Pruebas de Generacion de Firmas"; //descripción de la transacción
$url_respuesta = "http://ayuda.pagosonline.com/pruebas/respuesta.php";
$emailComprador="info@mail.com"; //email al que llega confirmación del estado final de la transacción, forma de identificar al comprador
$firma_cadena = "$llave_encripcion~$usuarioId~$refVenta~$valor~$moneda"; //concatenación para realizar la firma
$firma = md5($firma_cadena); //creación de la firma con la cadena previamente hecha
?>
Como podemos ver el siguiente botón apunta a nuestro servidor de pruebas.<br />
<form method="post" action="https://gateway2.pagosonline.net/apps/gateway/index.html" target="_self">
<input name="usuarioId" type="hidden" value="<?php echo $usuarioId?>">
<input name="descripcion" type="hidden" value="<?php echo $descripcion ?>" >
<input name="extra1" type="hidden" value="<?php echo $descripcion ?>" >
<input name="refVenta" type="hidden" value="<?php echo $refVenta ?>">
<input name="valor" type="hidden" value="<?php echo $valor ?>">
<input name="iva" type="hidden" value="<?php echo $iva ?>">
<input name="baseDevolucionIva" type="hidden" value="<?php echo $baseDevolucionIva ?>" >
<input name="firma" type="hidden" value="<?php echo $firma?>">
<input name="emailComprador" type="hidden" value="<?php echo $emailComprador?>">
<input name="prueba" type="hidden" value="1">
<input name="url_respuesta" type="hidden" value="<?php echo $url_respuesta?>">
<input name="Submit" type="submit" value="Prueba de pago">
</form>

<br />
<br />

Una vez esté satisfechos con todas las pruebas que necesite puede apuntar al servidor de producción eliminando la siguiente línea <s><<strong>form</strong> method="post" action="https://gateway2.pagosonline.net/apps/gateway/index.html" target="_self"></s> Y remplazarla por <<strong>form</strong> method="post" action="https://gateway.pagosonline.net/apps/gateway/index.html" target="_self">

<br />
<br />

Finalmente debe eliminar la variable de prueba <s><<strong>input</strong> name="prueba" type="hidden" value="1"></s>