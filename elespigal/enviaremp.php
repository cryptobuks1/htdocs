<?php
require_once('./AttachMailer.php');
ini_set('date.timezone','America/Bogota'); 

$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$niveleducativo = $_POST['niveleducativo'];
$exp = $_POST['exp'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$edad = $_POST['edad'];
$hojadevida = $_POST['hojadevida'];
$asunto = 'Empleo';

    if($nombre!='' && $direccion!='' && $ciudad!='' && $niveleducativo!='---' && $cargo!='---' && $exp!='---' && $email!='' && $edad!='' && $hojadevida!=''){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $from  = 'MIME-Version: 1.0' . "\r\n";
            $from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $from .= 'To: elespigal@hotmail.com' . "\r\n";
            $from .= 'From: Do_Not_reply@elespigal.com' . "\r\n";

            $mensaje = "<h2>Asunto: ".$asunto."</h2>
            <p><strong>Enviado por:</strong> " . $nombre . " </p>
            <p><strong>Dirección:</strong> " . $direccion . " </p> 
            <p><strong>Ciudad:</strong> ".$ciudad." </p>
            <p><strong>Nivel Educativo:</strong> ".$niveleducativo." </p>
            <p><strong>Cargo:</strong> ".$cargo." </p>
            <p><strong>E-mail:</strong> ".$email." </p>
            <p><strong>Edad:</strong> ".$edad." </p>
            <p><strong>Hoja de Vida:</strong> ".$hojadevida." </p>
            <p><strong>Fecha:</strong> " . date('d/m/Y', time())."</p>";

            $para = 'elespigal@hotmail.com';

            mail($para, $asunto, utf8_decode($mensaje), $from);
            echo 0;
                    
        }else{
            echo '.mail';
        }

    }else{
        echo 1;
    }



    /*$mail = new PHPMailer();
    $mail->From= $email;
    $mail->FromName=$nombre;
    $mail->SetFrom($email);
    $mail->AddReplyTo($email);
    $mail->AddAddress("lupaproyectos@gmail.com");
    $mail->Subject="Envío de email con PHPMailer en PHP";
    $mail->Body='Hola llegamos';

    $mail -> Mailer  =  "smtp" ;
    $mail->IsHTML(true);
    $mail -> SMTPSecure  =  "ssl";
    $mail -> Host = "smtp.gmail.com";
    $mail -> Port = 465;// habilitar SMTP autenticación
    $mail -> SMTPAuth    =  true;
    $mail -> Username    =  "lupaproyectos@gmail.com" ;  // SMTP cuenta nombre de usuario
    $mail -> Password    =  "j94506025";
    $mail -> SMTPKeepAlive  =  true;

    $mail -> IsSMTP();  // diciendo la clase que se utiliza SMTP
                  
    $mail -> CharSet  =  'utf-8' ;
    $mail -> SMTPDebug   =  1;

   
    $mail->AddAttachment('Arriendos.docx');
    
    echo "ksldjf";
    echo $mail->Password;
    echo $mail->Port;
    
    if ($mail->send()){
   echo "Mensaje enviado. Que chivo va vos!!";}
   else{
       echo "error";
   }
*/
//$mailer = new AttachMailer("correo@correo.com", "lupaproyectos@gmail.com", "asunto", "hello contenido del mensaje");
//$mailer->attachFile("garantia.pdf");
//$mailer->send() ? "Enviado": "Problema al enviar";
?>
