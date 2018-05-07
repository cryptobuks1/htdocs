<?php
@session_start();
?>
<meta charset="utf-8"><?php
include "config.php";
$pass = $_POST['pass'];
$passcod = md5($pass);
$existe=0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM usuarios WHERE mail='".$_POST['mail']."' AND pass = '".$passcod."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$existe=1;
}

if($existe==1){
	$peticion = "SELECT * FROM usuarios WHERE mail='".$_POST['mail']."' AND pass = '".$passcod."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
		$usuario=array(
				'id'=>$fila['id_user'],
				'm'=>$fila['mail'],
				'pa'=>$passcod,
				'n'=>$fila['nombre'],
				'p'=>$fila['tipo_user'],
				'u'=>$fila['url']
				);
		$_SESSION['user']=$usuario;
		echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Ingreso correctamente</h1></div>";
		echo "<meta http-equiv='refresh' content='1; url=../index.php'>";
	}
}else{
	$url = $_SERVER['HTTP_REFERER'];
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Usuario no existe o contraseÃ±a incorrecta.</h1></div>";
	echo "
		<meta http-equiv='refresh' content='1; url=".$url."'>
	
	" ;
}

mysqli_close($conexion);
?>