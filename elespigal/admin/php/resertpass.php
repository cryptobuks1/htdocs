<?php
@session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$para = $_POST['mail'];
$contador = 0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
$peticion = "SELECT * FROM usuarios WHERE mail='".$para."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	$contador++;
}
if($contador==0 ){
		echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Debe ingresar un E-mail registrado.</h1></div>";
		echo "
			<meta http-equiv='refresh' content='2; url=".$_SERVER['HTTP_REFERER']."'>
		
		" ;
}else{
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
$peticion = "UPDATE usuarios SET pass='".$passcod."' WHERE mail='".$para."'";
$resultado = mysqli_query($conexion, $peticion);

if($para!=''){
  $message = "Su contraseÃ±a es:<strong> ".$newPass." </strong> <br>";
  $message .= "<a href='http://elespigal.com/admin'>Ingresar</a>";
  $message .= "<h2>No conteste este correo</h2>";
  $subject = "El Espigal recuperaciÃ³n de contraseÃ±a";
  //$from = 'no-reply@elespigal.com';
  //$headers  = "From: ".$from."\r\n";
  //$headers .= "Reply-To: ".$from."\r\n";
  $headers  = "MIME-Version: 1.0\r\n"; 
  $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
  $headers .= "X-Mailer: PHP/".phpversion();

  mail($para, $subject, utf8_decode($message), $headers);
}
echo $newPass;
echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>La contraseÃ±a fue reseteada y enviada al correo registrado.<br/>Si no llega el correo revise spam o correo no deseado.</h1></div>";
echo "
	<meta http-equiv='refresh' content='1; url=../index.php'>
" ;
}
mysqli_close($conexion);
?>

