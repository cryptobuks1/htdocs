<?php 
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=800;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
$posicion= $_POST["posicion"];
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
		$peticion = "INSERT INTO imgproducto VALUES(NULL,'".$_GET['id_prod']."','".$alt[$i]."','".$imagen[$i]."','".$posicion[$i]."')";
		$resultado = mysqli_query($conexion, $peticion);
		}
		else{
			echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>".$imagen[$i]."</br> ES un tipo de archivo no admitido</h1></div>";
		}
	}
}
/*if($_POST['tallas']!='' || $_POST['colores']!=''){
$tallas= $_POST["tallas"];
$colores= $_POST["colores"];
		for ($i=0;$i<count($tallas);$i++){
				if($tallas[$i]!=0 || $colores[$i]!=''){
					$peticion = "INSERT INTO detalleproducto VALUES(NULL,'".$_GET['id_prod']."','".$tallas[$i]."','".$colores[$i]."')";			
					$resultado = mysqli_query($conexion, $peticion);
				}
		}
}*/
mysqli_close($conexion);
echo "
	<meta http-equiv='refresh' content='5; url=../formulario_mas_img_detalle_prod.php?id_prod=".$_GET['id_prod']."'>
" ;

?>
