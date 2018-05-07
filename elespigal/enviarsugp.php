<?php

ini_set('date.timezone','America/Bogota'); 
$sug = $_POST['sug'];
$asunto = 'Sugerencia sobre la página';
    if($sug!=''){
           
        $from  = 'MIME-Version: 1.0' . "\r\n";
        $from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $from .= 'To:elespigal@hotmail.com' . "\r\n";
        $from .= 'From: Do_Not_reply@elespigal.com' . "\r\n";
        $mensaje = "<h2>Asunto: ".$asunto."</h2>
        <p><strong>La sugerencia es:</strong> " . $sug . " </p>

        ";

        $para = 'elespigal@hotmail.com';


        mail($para, $asunto, utf8_decode($mensaje), $from);
        echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:#d5cea6; color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Sugerencia Enviada</h1></div>";
        echo "<meta http-equiv='refresh' content='1; url=producto.php'>";
            
    }else{
        echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:#d5cea6; color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>El campo no puede estar vacio</h1></div>";
        echo "<meta http-equiv='refresh' content='1; url=" . $_SERVER['HTTP_REFERER'] . "'>";
    }

?>
