<?php include "../php/config.php"?>
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=400;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
if (isset($_GET["id_trab"])){ 
	$id = $_GET["id_trab"];
	$nombre = $_POST["nombre"]; 
	$cliente = $_POST["cliente"]; 
	$servicio = $_POST["servicio"];
	$peticion = "SELECT * FROM trabajos WHERE id_trab=".$id."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		if($_POST['servicio']!='Proyectos'){
			
			
			
		}
	}
	$des = $_POST["des"]; 
	$des_corta = $_POST["des_corta"]; 
	$enlace = $_POST["enlace"]; 
	$detalle = $_POST["detalle"]; 
	$alt = $_POST["alt"]; 
	if($imagen!=''){
		$peticion = "SELECT * FROM trabajos WHERE id_trab=".$id."";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){
			$ruta = "../../fotos/".$fila['imagen'];
				if (file_exists($ruta)){
				unlink("../../fotos/".$fila['imagen']."");
				}else{
					echo"Imagen ya no existe!";
				}
		}
		if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
			$ruta = "../../fotos/".$imagen;
				if (!file_exists($ruta)){
					move_uploaded_file($temp,$ruta);
				}else{
					echo $imagen . ", este archivo ya existe";
				}
			$peticion = "UPDATE trabajos SET imagen='".$imagen."', alt='".$alt."' WHERE id_trab=".$id."";
			$resultado = mysqli_query($conexion, $peticion);
		}
		else{
			echo $imagen. ", Este tipo de archivo no es admitido";
		}
	}else{
		$peticion = "UPDATE trabajos SET nombre='".$nombre."',cliente='".$cliente."', servicio='".$servicio."', detalle='".$detalle."', des='".$des."', des_corta='".$des_corta."', enlace='".$enlace."' WHERE id_trab=".$id."";
		$resultado = mysqli_query($conexion, $peticion);
	}
}
mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='5; url=../editarprod.php?id_trab=".$id."'>
	" ;
?>

