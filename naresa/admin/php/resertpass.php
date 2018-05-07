<?php
@session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

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
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE usuarios SET pass='".$passcod."' WHERE mail='".$_GET['mail']."'";
$resultado = mysqli_query($conexion, $peticion);
if($_GET['mail']!==''){
  $message = "Su contraseña provisional es:<strong> ".$newPass." </strong> <br>";
  $message .= "No olvide cambiarla al ingresar a su cuenta<br>";
  $message .= "<a href='http://bghostplatinum.com/beta/index.php'>Ingresar</a>";
  $message .= "<h2>No conteste este correo.</h2>";
  $subject = "B`ghost recuperación de contraseña";
  $from = 'no-reply@manufacturasbghost.com';
  $headers  = "From: ".$from."\r\n";
  $headers .= "Reply-To: ".$from."\r\n";
  $headers  .= "MIME-Version: 1.0\r\n"; 
  $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
  $headers .= "X-Mailer: PHP/".phpversion();

  mail($_GET['mail'], $subject, $message, $headers);
}
echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>La contraseña fue reseteada y enviada al correo registrado ".$newPass."</h1></div>";
			echo "
				<meta http-equiv='refresh' content='2; url=".$_SERVER['HTTP_REFERER']."'>
			" ;
mysqli_close($conexion);
?>

