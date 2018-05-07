<?php include "config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "SELECT * FROM slider WHERE id_slider=".$_GET['id_slider']."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$ruta = "../../images/".$fila['imagen'];
		if (file_exists($ruta)){
		unlink("../../images/".$fila['imagen']."");
		}else{
			echo"Imagen ya no existe!";
		}
}


$peticion = "DELETE FROM slider WHERE id_slider=".$_GET['id_slider']."";
$resultado = mysqli_query($conexion, $peticion);


mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.01; url=../admin_slider.php'>
	" ;
?>

