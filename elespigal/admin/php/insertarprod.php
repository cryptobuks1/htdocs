<?php 
session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
/*if($_POST['nombre']!=''){
	$peticion = "SELECT * FROM categorias WHERE titulo_es='".$_POST['categoria']."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		$id_categoria = $fila['id_categoria'];
	}
	$peticion = "INSERT INTO productos VALUES(NULL,'".$id_categoria."','".$_POST['nombre']."','".$_POST['ref']."','".$_POST['detalle']."','".$_POST['inventario']."','".$_POST['estado']."','".$_POST['valor']."')";
	$resultado = mysqli_query($conexion, $peticion);
}
	$peticion = "SELECT * FROM productos ORDER BY id_prod DESC LIMIT 1";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		$id = $fila['id_prod'];
		$producto=array(
		'id'=>$id
		);
	$_SESSION['producto']=$producto;

	}
*/
$permitidos=array("image/jpg", "image/jpeg", "image/gif", "image/png", "image/JPG", "image/JPEG", "image/GIF", "image/PNG");
$maximo_kb=800;
$imagen=$_FILES['imagen']['name'];
$type=$_FILES['imagen']['type'];
$size=$_FILES['imagen']['size'];
$temp=$_FILES['imagen']['tmp_name'];

$peticion = "SELECT id_cat FROM categoria WHERE nombre = '".$_POST['titulo']."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
    $id_cat=$fila['id_cat'];
}

if($_POST['nombre']!='' && $imagen!='' && $_POST['valor']!='' && $_POST['detalle']!='' && $id_cat!=''){
            if(in_array($type, $permitidos) && $size <= $maximo_kb * 1024){
					$ruta = "../../fotos/".$imagen;
						if (!file_exists($ruta)){
							move_uploaded_file($temp,$ruta);
						}else{
							echo $imagen . ", este archivo ya existe";
						}
					$peticion = "INSERT INTO productos VALUES (NULL,'".$id_cat."','".$_POST['pos']."','".$_POST['nombre']."','".$_POST['titulo_p']."','".$_POST['detalle']."','".$_POST['valor']."','".$imagen."')";
					$resultado = mysqli_query($conexion, $peticion);
				}
				else{
                                        
					echo $imagen. ", Este tipo de archivo no es admitido";
				}
  }else{
		  echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Todos los campos son obligatorios.</h1></div>";
  }

	$rs = mysqli_query($conexion, "SELECT MAX(id_producto) AS id FROM productos");
        if ($row = mysqli_fetch_row($rs)) {
        $id = trim($row[0]);
        }

        mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='1; url=../agregar_adicionales_a_prod.php?id_producto=".$id."'>
	" ;
    



?>

