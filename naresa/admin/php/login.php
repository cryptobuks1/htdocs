<?php
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd)or die (mysqli_error());
$peticion = "SELECT * FROM usuarios WHERE user='".$_REQUEST['mail']."' AND pass = '".$_REQUEST['pass']."'";
$resultado = mysqli_query($conexion, $peticion);
$fila = mysqli_fetch_array($resultado);
$url = $_SERVER['HTTP_REFERER'];
if($fila['user']==$_REQUEST['mail'] && $fila['user']!='' ){
	$usuario=array(
			'id'=>$fila['id_user'],
			'm'=>$fila['user'],
			'n'=>$fila['nombre'],
			'p'=>$fila['priv']
			);
	$_SESSION['usuario']=$usuario;
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Ingreso correctamente</h1></div>";
			echo "<meta http-equiv='refresh' content='1; url=../index.php'>";
}else{
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Usuario no existe o contraseña incorrecta</h1></div>";
	echo "
		<meta http-equiv='refresh' content='5; url=".$url."'>
	
	" ;
}

mysqli_close($conexion);
?>
