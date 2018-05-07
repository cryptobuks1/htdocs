<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    $to="proyectos@lupaweb.com, ".$body['email'];
    $from  = 'MIME-Version: 1.0' . "\r\n";
    $from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $from .= 'To:'.$body['nombreCli'].'' . "\r\n";
    $from .= 'From: Do_Not_reply@nuestroaliado.com' . "\r\n";
    date_default_timezone_set('America/Bogota');
    $subject="Solicitud visita | Nuestro Aliado Outsourcing";
    $mensaje="<div style='background:E5E5E5; padding:20px'>
            <center><img src='http://nuestroaliado.com/wp-content/uploads/2017/01/logo.png'></center>
            <h1 style='background:#1A237E; padding:10px 20px; color:#fff;text-align:center'><trong>SOLICITUD DE VISITA</strong></h1>
            <h3  style='text-align:center; font-size:19px'><strong>Nombre: </strong>".$body['nombreCli']."</h3>
            <h3  style='text-align:center; font-size:19px'><strong>Teléfono: </strong>".$body['tel']."</h3>
            <h3  style='text-align:center; font-size:19px'><strong>Correo: </strong>".$body['email']."</h3>
            <h3  style='text-align:center; font-size:19px'><strong>Empresa: </strong>".$body['cia']."</h3>
            <h3  style='text-align:center; font-size:19px'><strong>Fecha para la visita: </strong>".$body['fecha']."</h3><h3  style='text-align:center; font-size:19px'><strong> Hora para la visita: </strong>".$body['hora']."</h3>
            <h3  style='text-align:center; font-size:16px'><strong>Descripción: </strong>".$body['obs']."</h3>                
            </div>
            
            <div style='background:#1A237E;color:#fff; padding:10px 0 10px 20px; font-size:18px'>
            <p>Si tiene dudas contactenos por Whatsapp: +057 316 865 58 36 | + 057 315 372 59 37 </p>
            <p>Visítenos en nuestro sitio web <a href='http://nuestroalido.com'>nuestroaliado.com<a></p>
            <p>Descargue nuestra App en Play Store de Google <a href='http://nuestroalido.com'>NAO<a></p></div>";


    mail($to, $subject, utf8_decode($mensaje), $from);
    $json_string = json_encode(array("estado" => 1));
    echo $json_string;
}
?>

