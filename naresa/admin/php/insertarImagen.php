<?php 
session_start();
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

if($_FILES['imagen']['name']!='' && $_POST["alt"]!=''){
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=400;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
$alt= $_POST["alt"];
		if($imagen!='' || $alt!=''){
				if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
					$ruta = "../../fotos/".$imagen;
						if (!file_exists($ruta)){
							move_uploaded_file($temp,$ruta);
						}else{
							echo $imagen . ", este archivo ya existe";
						}
				}
				else{
					echo $imagen. ", Este tipo de archivo no es admitido";
				}
				$peticion = "UPDATE trabajos SET imagen='".$imagen."', alt='".$alt."' WHERE id_trab=".$_SESSION['producto']['id']."";
;
				$resultado = mysqli_query($conexion, $peticion);
		}
unset($_SESSION['producto']); 
}

mysqli_close($conexion);
echo "
	<meta http-equiv='refresh' content='5; url=../nuevoproducto.php'>

" ;

