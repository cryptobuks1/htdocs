<?php 
session_start();
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

if(isset($_FILES['imagen']) && isset($_POST['posicion'])){
	if($_FILES['imagen']['name']!='' && $_POST['posicion']!=''){
		if($_FILES['imagen']['type'] == "image/gif" || $_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
			move_uploaded_file($_FILES['imagen']['tmp_name'],"../../fotos/".$_FILES['imagen']['name']);
			$peticion = "INSERT INTO imgproducto VALUES(NULL,'".$_GET['id_prod']."','".$_POST['alt']."','".$_FILES['imagen']['name']."','".$_POST['posicion']."')";
			$resultado = mysqli_query($conexion, $peticion);
		}
		else{
			echo "Este tipo de archivo no es admitido";
		}
	}
}
	if($_POST['tallas']!='' || $_POST['colores']!=''){
		$peticion = "INSERT INTO detalleproducto VALUES(NULL,'".$_GET['id_prod']."','".$_POST['tallas']."','".$_POST['colores']."')";
		$resultado = mysqli_query($conexion, $peticion);
	}

mysqli_close($conexion);
/*echo "
	<meta http-equiv='refresh' content='0; url=../nuevoproducto.php'>

" ;
*/