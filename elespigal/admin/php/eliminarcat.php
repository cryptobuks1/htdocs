<?php include "config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM categoria WHERE id_cat=".$_GET['id_cat']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$ruta = "../../fotos/".$fila['imagen'];
		if (file_exists($ruta)){
		unlink("../../fotos/".$fila['imagen']."");
		}else{
			echo"Imagen ya no existe!";
		}
}


$peticion = "DELETE FROM categoria WHERE id_cat=".$_GET['id_cat']."";
$resultado = mysqli_query($conexion, $peticion);


mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.01; url=../categorias.php'>
	" ;
?>

