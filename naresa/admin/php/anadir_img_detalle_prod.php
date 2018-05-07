<?php 
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=300;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
$alt= $_POST["alt"];
for ($i=0;$i<count($imagen);$i++){
	if($imagen[$i]!='' || $posicion[$i]!='' || $alt[$i]!=''){
		if(in_array($type[$i], $permitidos) && $size[$i] <= $maximo_kb * 1024){
			$ruta = "../../fotos/".$imagen[$i];
				if (!file_exists($ruta)){
					move_uploaded_file($temp[$i],$ruta);
				}else{
					echo $imagen[$i] . ", este archivo ya existe";
				}
		$peticion = "INSERT INTO imgtrabajo VALUES(NULL,'".$_GET['id_trab']."','".$imagen[$i]."','".$alt[$i]."')";
		$resultado = mysqli_query($conexion, $peticion);
		}
		else{
			echo $imagen[$i]. ", Este tipo de archivo no es admitido";
		}
	}
}
mysqli_close($conexion);
echo "
	<meta http-equiv='refresh' content='1; url=../formulario_mas_img_detalle_prod.php?id_trab=".$_GET['id_trab']."'>
" ;

?>
