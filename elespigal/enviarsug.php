<?php

ini_set('date.timezone','America/Bogota'); 
//$rec = $_POST['g-recaptcha-response'];
$nombre = $_POST['name'];
//$email = $_POST['mail'];
$telefono = $_POST['tel'];
$mensaje = $_POST['mensaje'];
$asunto = 'Sugerencia';
//if($rec!=''){
    if($mensaje!=''){
        
            //if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $from  = 'MIME-Version: 1.0' . "\r\n";
                      $from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                      $from .= 'To: elespigal@hotmail.com' . "\r\n";
                      $from .= 'From: Do_Not_reply@elespigal.com' . "\r\n";


                       $mensaje = "<h2>Asunto: ".$asunto."</h2>
                       <p><strong>Enviado por:</strong> " . $nombre . " </p>
                       
                       <p><strong>Teléfono:</strong> ".$telefono." </p>
                       <p><strong>Mensaje:</strong> " . $_POST['mensaje'] . "</p>
                       <p><strong>Fecha:</strong> " . date('d/m/Y', time())."</p>";

                       $para = 'elespigal@hotmail.com';


                       mail($para, $asunto, utf8_decode($mensaje), $from);
                       echo 0;
            /*}
            else{
                   echo '.mail';
            }  */    
    }else{
        echo 1;
    }
/*}else{
    echo '.g-recaptcha';
}*/
?>