<?php include "config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM productos WHERE id_producto=".$_GET['id_producto']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$ruta = "../../fotos/".$fila['imagen'];
		if (file_exists($ruta)){
		unlink("../../fotos/".$fila['imagen']."");
		}else{
			echo"Imagen ya no existe!";
		}
}

$peticion = "DELETE FROM productos WHERE id_producto=".$_GET['id_producto']."";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
window.location="../productos.php"
</script>

