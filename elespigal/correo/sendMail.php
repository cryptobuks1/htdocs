<?php
/**
 * Envio de correo mediante un servidor SMTP
 */

include("phpmailer.php");

$smtp=new PHPMailer();

# Indicamos que vamos a utilizar un servidor SMTP
$smtp->IsSMTP();

# Definimos el formato del correo con UTF-8
$smtp->CharSet="UTF-8";

# autenticación contra nuestro servidor smtp
$smtp->SMTPAuth   = true;
$smtp->SMTPSecure = "tls";
$smtp->Host       = "smtp.zoho.com";
$smtp->Username   = "ceo@lupaweb.com";
$smtp->Password   = "b1756754063";
$smtp->Port       = 587;			// MAIL password

# datos de quien realiza el envio
$smtp->From       = "ceo@lupaweb.com"; // from mail
$smtp->FromName   = "El Espigal cafeteria"; // from mail name

# Indicamos las direcciones donde enviar el mensaje con el formato
#   "correo"=>"nombre usuario"
# Se pueden poner tantos correos como se deseen
$mailTo=array(
    "lupaproyectos@gmail.com"=>"Nombre_1 persona que recibe el correo",
    "correo_2_DondeSeEnviaElMensaje@servidor.info"=>"Nombre_2 persona que recibe el correo",
    "correo_3_DondeSeEnviaElMensaje@servidor.info"=>"Nombre_3 persona que recibe el correo"
);

# establecemos un limite de caracteres de anchura
$smtp->WordWrap   = 50; // set word wrap

# NOTA: Los correos es conveniente enviarlos en formato HTML y Texto para que
# cualquier programa de correo pueda leerlo.

# Definimos el contenido HTML del correo
$contenidoHTML="<head>";
$contenidoHTML.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
$contenidoHTML.="</head><body>";
$contenidoHTML.="<b>Contenido en formato HTML</b>";
$contenidoHTML.="<p><a href='http://www.lawebdelprogramador.com'>http://www.lawebdelprogramador.com</a></p>";
$contenidoHTML.="</body>\n";

# Definimos el contenido en formato Texto del correo
$contenidoTexto="Mensaje enviado desde mi correo corporativo";
$contenidoTexto.="\n\nhttp://www.lawebdelprogramador.com";

# Definimos el subject
$smtp->Subject="Envio de prueba utilizando un servidor SMTP";

# Adjuntamos el archivo "leameLWP.txt" al correo.
# Obtenemos la ruta absoluta de donde se ejecuta este script para encontrar el
# archivo leameLWP.txt para adjuntar. Por ejemplo, si estamos ejecutando nuestro
# script en: /home/xve/test/sendMail.php, nos interesa obtener unicamente:
# /home/xve/test para posteriormente adjuntar el archivo leameLWP.txt, quedando
# /home/xve/test/leameLWP.txt
$rutaAbsoluta=substr($_SERVER["SCRIPT_FILENAME"],0,strrpos($_SERVER["SCRIPT_FILENAME"],"/"));
$smtp->AddAttachment($rutaAbsoluta."/leameLWP.txt", "LeameLWP.txt");

# Indicamos el contenido
$smtp->AltBody=$contenidoTexto; //Text Body
$smtp->MsgHTML($contenidoHTML); //Text body HTML

foreach($mailTo as $mail=>$name)
{
    $smtp->ClearAllRecipients();
    $smtp->AddAddress($mail,$name);

    if(!$smtp->Send())
    {
        echo "<br>Error (".$mail."): ".$smtp->ErrorInfo;
    }else{
        echo "<br>Envio realizado a ".$name." (".$mail.")";
    }
}
?>
