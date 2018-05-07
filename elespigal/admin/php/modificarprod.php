<?php include "../php/config.php" ?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "UPDATE productos SET nombre='".$_POST['nombre_prod']."',pos='".$_POST['pos']."',titulo='".$_POST['titulo_p']."',valor='".$_POST['valor']."',detalle='".$_POST['detalle']."' WHERE id_producto=".$_GET['id_producto']."";
$resultado = mysqli_query($conexion, $peticion);

$peticion = "SELECT id_cat FROM categoria WHERE nombre='".$_POST['titulo']."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$id_cat=$fila['id_cat'];
}

$peticion = "UPDATE productos SET id_cat=".$id_cat." WHERE id_producto=".$_GET['id_producto']."";
$resultado = mysqli_query($conexion, $peticion);

/*--------actualizar imagen de producto------------------*/
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png", "image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=300;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];


  if (isset($_GET["id_producto"])){
		$id = $_GET["id_producto"];
		if($imagen!=''){
			$peticion = "SELECT * FROM productos WHERE id_producto=".$id."";
			$resultado = mysqli_query($conexion, $peticion);
			while($fila = mysqli_fetch_array($resultado)){
				$ruta = "../../fotos/".$fila['imagen'];
					if (file_exists($ruta)){
					unlink("../../fotos/".$fila['imagen']."");
					}
				}
			
			if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
				$ruta = "../../fotos/".$imagen;
				if (!file_exists($ruta)){
					move_uploaded_file($temp,$ruta);
				}
				$peticion = "UPDATE productos SET imagen='".$imagen."' WHERE id_producto=".$id."";
				$resultado = mysqli_query($conexion, $peticion);
			}
			else{
				echo $imagen. ", Este tipo de archivo no es admitido";
			}
			
		}
   }
   else{
       echo "no entro al if cambiador de imagen";
   
}
mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.5; url=../agregar_adicionales_a_prod.php?id_producto=".$_GET['id_producto']."'>
	" ;
?>

