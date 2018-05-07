<?php @session_start();?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "config.php";?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");

function generaPass(){
  $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
  $longitudCadena=strlen($cadena);
  $pass = "";
  $longitudPass=10;
  for($i=1 ; $i<=$longitudPass ; $i++){
    $pos=rand(0,$longitudCadena-1);
    $pass .= substr($cadena,$pos,1);
  }
  return $pass;
}
$newPass = generaPass();
$passcod = md5($newPass);
if(isset($_POST) && $_POST['mail']!=''){

  $message = "Su contraseña provisional es:<strong> ".$newPass." </strong> <br>";
  $message .= "No olvide cambiarla al ingresar a su cuenta<br>";
  $message .= "<a href='http://muebleriarila.com/index.php'>Ingresar</a>";
  $subject = "Mueblería Rila recuperación de contraseña";
  $from = 'no-reply@muebleriarila.com';
  $headers  = "From: ".$from."\r\n";
  $headers .= "Reply-To: ".$from."\r\n";
  $headers  .= "MIME-Version: 1.0\r\n"; 
  $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
  $headers .= "X-Mailer: PHP/".phpversion();

  mail($_POST['mail'], $subject, $message,$headers);
}
$contador = 0;
$url = $_SERVER['HTTP_REFERER'];
$mail = $_POST['mail'];
$cof_mail = $_POST['remail'];
if($mail==$cof_mail && $mail!=''){
	if($_POST['nombre']!='' && $_POST['apellidos']!='' && $_POST['privilegios']!='' && $_POST['direccion']!='' && $_POST['telefono']!='' && $_POST['pais']!='' && $_POST['provincia']!='' && $_POST['ciudad']!='' ){
		$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
		mysqli_set_charset($conexion, "utf8");
		$peticion = "SELECT * FROM usuarios WHERE mail = '".$_POST['mail']."'";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){
			$contador++;
		}
		
		if($contador == 0){
			$peticion = "INSERT INTO usuarios VALUES(NULL,'".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['mail']."','".$passcod."','".$_POST['ruc']."','".$_POST['privilegios']."','".$_POST['direccion']."','".$_POST['telefono']."','".$_POST['pais']."','".$_POST['provincia']."','".$_POST['ciudad']."','".$url."')";
			$resultado = mysqli_query($conexion, $peticion);
			echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Usuario registrado</h1></div>";
		$peticion = "SELECT * FROM usuarios ORDER BY id_user DESC LIMIT 1";
		$resultado = mysqli_query($conexion, $peticion);
			while($fila = mysqli_fetch_array($resultado)){
				$mail = $fila['mail'];
			}
			echo "
				<meta http-equiv='refresh' content='2; url=../usuarios.php'>
			" ;
	mysqli_close($conexion);
		}else{
			echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Usuario o Contraseña ya existe cambie por otro.</h1></div>";
			echo "
				<meta http-equiv='refresh' content='0.001; url=".$url."'>
			" ;
		}
	}else{
		echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Los datos con asterisco son obligatorios</h1></div>";
	echo "
		<meta http-equiv='refresh' content='0.001; url=".$url."'>
	" ;
	}
}else{
	echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Correo o Contraseña no coinsiden</h1></div>";
	echo "
		<meta http-equiv='refresh' content='0.001; url=".$url."'>
	" ;
}
?>

