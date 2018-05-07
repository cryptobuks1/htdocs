<?php include "../php/config.php"?>
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png, image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=300;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];
for ($i=0;$i<count($imagen);$i++){
   if (isset($_POST["id_adicional".$i])){
		$id = $_POST["id_adicional".$i];
		$valor = $_POST["valor".$i];
                $nombre = $_POST["nombre".$i];
                $grupo = $_POST["grupo".$i];
                $descripcion = $_POST["descripcion".$i];
		if($imagen[$i]!=''){
			$peticion = "SELECT * FROM adicionales WHERE id_adicional=".$id."";
			$resultado = mysqli_query($conexion, $peticion);
			while($fila = mysqli_fetch_array($resultado)){
				$ruta = "../../fotos/".$fila['imagen'];
					if (file_exists($ruta)){
					unlink("../../fotos/".$fila['imagen']."");
					}else{
						echo"Imagen ya no existe!";
					}
			}
			if(in_array($type[$i], $permitidos) && $size[$i] <= $maximo_kb * 1024){
				$ruta = "../../fotos/".$imagen[$i];
					if (!file_exists($ruta)){
						move_uploaded_file($temp[$i],$ruta);
					}else{
						echo $imagen[$i] . ", este archivo ya existe";
					}
				$peticion = "UPDATE adicionales SET imagen='".$imagen[$i]."' WHERE id_adicional=".$id."";
				$resultado = mysqli_query($conexion, $peticion);
			}
			else{
				echo $imagen[$i]. ", Este tipo de archivo no es admitido";
			}
		}else{
			$peticion = "UPDATE adicionales SET nombre = '".$nombre."', valor='".$valor."', grupo ='".$grupo."', descripcion='".$descripcion."' WHERE id_adicional=".$id."";
			$resultado = mysqli_query($conexion, $peticion);
		}
   }
}
mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='0.5; url=../adicionales.php'>
	" ;
?>