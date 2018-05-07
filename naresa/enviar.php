<?php

$nombre = $_POST['nombre'];
$email = $_POST['mail'];
$telefono = $_POST['celular'];
$ciudad = $_POST['ciudad'];
$mensaje = $_POST['mensaje'];
if($mensaje!='' && $nombre!='' && $email!='' && $ciudad!='' && $telefono!='' ){
		$header = "From:".$nombre."  \r\n";
		$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
		$header .= "Mime-Version: 1.0 \r\n";
		$header .= "Content-Type: text/plain";
		
		$mensaje = "Este mensaje fue enviado por: " . $nombre . " \r\n";
		$mensaje .= "Su e-mail es: " . $email . " \r\n";
		$mensaje .= "Datos adicionales: 
		Teléfono: ".$telefono."
		Ciudad: ".$ciudad.",\r\n \r\n";
		
		ini_set('date.timezone','America/Bogota'); 
		$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
		$mensaje .= "Enviado el " . date('d/m/Y', time());
		
		$para = 'lupaproyectos@gmail.com';
		$asunto = 'Formulario de Contacto';
		
		mail($para, $asunto, utf8_decode($mensaje), $header);

echo '<center style="font-size:40px">'.$nombre.' '.$email.' '.$telefono.' '.$ciudad.' Mensaje enviado correctamente</center>';
echo '<meta http-equiv="REFRESH" content="3,url='.$_SERVER['HTTP_REFERER'].'">';

}else{
echo '<center style="font-size:40px">'.$nombre.' '.$email.' '.$telefono.' '.$ciudad.' '.$mensaje.' Todos los campos son obligatorios</center>';
echo '<meta http-equiv="REFRESH" content="1,url='.$_SERVER['HTTP_REFERER'].'">';
}
?>