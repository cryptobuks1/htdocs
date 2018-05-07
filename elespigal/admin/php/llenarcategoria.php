<?php 
@session_start();
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");
if($_GET['marca']!=''){
	$peticion = "SELECT * FROM marca WHERE nombre='".$_GET['marca']."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		$id_marca = $fila['id_marca'];
	}
	$peticion = "SELECT * FROM categorias WHERE id_marca='".$id_marca."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			echo "<option>".$fila['titulo_es']."</option>";
	}
}else{
echo"Seleccione marca";	
}
?>
