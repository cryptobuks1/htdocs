<?php include "../php/config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM detalleproducto WHERE id_detalle=".$_GET['id_detalle']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$id=$fila['id_prod'];
}
$peticion = "DELETE FROM detalleproducto WHERE id_detalle=".$_GET['id_detalle']."";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
window.location="../editarprod.php?id_prod=<?php echo "".$id."";?>";
</script>

