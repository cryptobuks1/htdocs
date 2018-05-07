<?php include "config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "DELETE FROM pedidos WHERE id_pedido=".$_GET['id']."";
$resultado = mysqli_query($conexion, $peticion);

$peticion = "DELETE FROM lineaspedido WHERE id_pedido=".$_GET['id']."";
$resultado = mysqli_query($conexion, $peticion);
mysqli_close($conexion);
?>
<script>
window.location="../pedidos.php"
</script>

