<?php
session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=200;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
	if($_POST['nombre']!='' &&$_POST['valor']!='' && $_POST['grupo']!=''){
            if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
			$ruta = "../../fotos/".$imagen;
				if (!file_exists($ruta)){
					move_uploaded_file($temp,$ruta);
				}else{
					echo $imagen . ", este archivo ya existe";
				}
				
		}
		else{
			//echo $imagen. ", Este tipo de archivo no es admitido";
		}
		$peticion = "INSERT INTO adicionales VALUES (NULL,'".$_POST['nombre']."','".$_POST['valor']."','','".$_POST['grupo']."','')";
		$resultado = mysqli_query($conexion, $peticion);
   }else{
		  echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Todos los campos son obligatorios.</h1></div>";
   }

	mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.5; url=../adicionales.php'>
	" ;
?>

