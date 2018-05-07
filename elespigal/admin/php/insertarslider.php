<?php
session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png", "image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=500;
$tipo=$_POST['tipo'];
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
	if($imagen!=''){
				if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
					$ruta = "../../slider/images/slides/".$imagen;
						if (!file_exists($ruta)){
							move_uploaded_file($temp,$ruta);
						}else{
							echo $imagen . ", este archivo ya existe";
						}
					$peticion = "INSERT INTO slider VALUES(NULL,'".$imagen."', '','', '', '', '', '','".$tipo."')";
					$resultado = mysqli_query($conexion, $peticion);
				}
				else{
					echo $imagen. ", Este tipo de archivo no es admitido";
				}
  }else{
		  echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Debe ingresar por lo menos una imagen.</h1></div>";
  }
		
	mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.5; url=../admin_slider.php'>
	" ;
?>

