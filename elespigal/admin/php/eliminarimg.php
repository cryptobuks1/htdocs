<?php include "../php/config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM imgproducto WHERE id_img=".$_GET['id_img']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$id=$fila['id_prod'];
	$ruta = "../../fotos/".$fila['imagen'];
	  if (file_exists($ruta)){
		  unlink($ruta);
	  }else{
		  echo"Imagen ya no existe!";
	  }
}
$peticion = "DELETE FROM imgproducto WHERE id_img=".$_GET['id_img']."";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
window.location="../editarprod.php?id_prod=<?php echo "".$id."";?>";
</script>

