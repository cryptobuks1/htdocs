<?php 
include("Connections/order.php");

// array con el nuevo orden de nuestros registros
$articulos_ordenados 	= $_POST['registro'];

$pos = 1;
foreach ($articulos_ordenados as $key) {
	
	// actualizamos el campo orden_articulo
	$query = "UPDATE tbl_productos_cat SET orden = " . $pos . " WHERE id = " . $key;
	mysql_query($query);
	
	$pos++;
}

echo '
<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<strong>Los registros se ordenaron con exito</strong> .
									</div>';
?>