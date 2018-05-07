<?php 
@session_start();
include "config.php";?>

<?php
$nombre=$_POST['nombre'];
$cliente=$_POST['cliente'];
$servicio=$_POST['servicio'];
$des=$_POST['des'];
$des_corta=$_POST['des_corta'];
$detalles=$_POST['detalles'];
$enlace=$_POST['enlace'];
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");
if($_POST['nombre']!=''){
	$peticion = "INSERT INTO trabajos VALUES(NULL,'".$detalles."','".$cliente."','".$nombre."','".$servicio."','".$des_corta."','".$des."','".$enlace."','','')";
	$resultado = mysqli_query($conexion, $peticion);
	$peticion = "SELECT * FROM trabajos ORDER BY id_trab DESC LIMIT 1";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		$id = $fila['id_trab'];
		$producto=array(
		'id'=>$id
		);
	$_SESSION['producto']=$producto;

	}
}

mysqli_close($conexion);
echo "
	<meta http-equiv='refresh' content='1; url=../nuevoproducto.php'>

" ;
