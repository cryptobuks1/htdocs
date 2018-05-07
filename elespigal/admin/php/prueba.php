<?php
@session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "config.php";
$passcod=md5($_REQUEST['pass']);
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
$peticion = "SELECT * FROM usuarios WHERE mail='".$_REQUEST['mail']."' AND pass = '".$passcod."'";
$resultado = mysqli_query($conexion, $peticion);
$fila = mysqli_fetch_array($resultado);
if(isset($_GET['url'])){
$urlfinal = $_GET['url'];
}else{
$urlfinal=$_SERVER['HTTP_REFERER'];
}
if($fila['mail']==$_REQUEST['mail'] && $_REQUEST['mail']!='' && $fila['pass']==$passcod && $_REQUEST['pass']!='' ){
	$usuario=array(
			'id'=>$fila['id_user'],
			'm'=>$fila['mail'],
			'pa'=>$fila['pass'],
			'n'=>$fila['nombre'],
			'a'=>$fila['apellidos'],
			'r'=>$fila['ruc'],
			'd'=>$fila['direccion'],
			't'=>$fila['telefono'],
			'p'=>$fila['privilegios'],
			'c'=>$fila['ciudad'],
			'u'=>$fila['url']
			);
	$_SESSION['user']=$usuario;
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Ingreso correctamente</h1></div>";
			echo "<meta http-equiv='refresh' content='0.001; url=".$urlfinal."'>" ;
	}else{
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Usuario no existe o contraseña incorrecta</h1></div>";
	echo "
		<meta http-equiv='refresh' content='0.001; url=".$urlfinal."'>
	
	" ;
}

mysqli_close($conexion);
?>
