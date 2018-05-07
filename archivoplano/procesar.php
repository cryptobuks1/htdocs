<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");	
$nombre_archivo = "registros.txt"; 
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$nino = $_POST['nino'];
$asunto = 'Registro Vacaciones Recreativas';
$fp = fopen('registros.txt','a');
fwrite($fp, $nombre." | ".$nino." | ".$telefono." | ".$email . PHP_EOL);
fclose($fp);
$fp = fopen('registros.txt','r');
if (!$fp) {echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; exit;}
$loop = 0; // contador de líneas
while (!feof($fp)) { // loop hasta que se llegue al final del archivo
	$line = fgets($fp); // guardamos toda la línea en $line como un string
	$field[$loop] = explode ('|', $line);
	$loop++;
	$fp++; // necesitamos llevar el puntero del archivo a la siguiente línea
	echo explode ('|', $line);
}
$i=$loop-1;

if($i<=70){
	ini_set('date.timezone','America/Bogota'); 	
	//if($rec!=''){
    if($nombre!='' && $email!='' && $telefono!='' && $nino!='' ){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $from  = 'MIME-Version: 1.0' . "\r\n";
            $from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $from .= 'To: elespigalcafeteria@gmail.com' . "\r\n";
            $from .= 'From: Do_Not_reply@elespigal.com' . "\r\n";

            $mensaje="De: ".$nombre."
            <p><strong>Fecha:</strong> " . date('d/m/Y', time())."</p>
	        Asunto: Suscripción Vacaciones Recreativas
	        <div style='color:#fff; background:#104e87; padding:10px 20px'>
	        <div>
	        <table><tr>
	        <th style='padding:0 15px'><h2>scripción Vacaciones Recreativas</h2></th>
	        </tr>
	        </table>
	        </div>
	        <table style='background:#fff; color:#104e87'>
	        <tr><th colspan='4' style='font-size:18px'><strong>Suscriptor</strong></th></tr>
	        <tr>
	        <th style='padding:5px 20px; border:solid 1px #104e87'><strong>Nombre de acudiente:</strong></th>
	        <th style='padding:5px 20px; border:solid 1px #104e87'><strong>Nombre del niño/niña:</strong></th>
	        <th style='padding:5px 20px; border:solid 1px #104e87'><strong>Teléfono:</strong></th>
	        <th colspan='2' style='padding:5px 20px; border:solid 1px #104e87'><strong>Correo:</strong></th>
	        </tr>
	        <tr>
	        <td style='padding:5px 20px; border:solid 1px #104e87'>".$nombre."</td>
	        <td style='padding:5px 20px; border:solid 1px #104e87'>".$nino."</td>
	        <td style='padding:5px 20px; border:solid 1px #104e87'>".$telefono."</td>
	        <td style='padding:5px 20px; border:solid 1px #104e87'>".$email."</td>

	        </tr>

	        </table>
	        <table><tr>
	        <th colspan='2'><img src='http://www.chipichape.com.co/new/wp-content/uploads/2017/06/logochipitines.png'/></th>
	        <th colspan='2'><img src='http://www.chipichape.com.co/new/wp-content/uploads/2017/06/logochipichape.png/></th>
	        </tr>
	        </table>
	        </div>
	        Este e-mail se ha enviado vía formulario de contacto desde Centro Comercial Chipichape (http://www.chipichape.com.co)";

            $para = 'lupaproyectos@gmail.com';
            $asunto = $asunto;

            mail($para, $asunto, utf8_decode($mensaje), $from);
        }else{
            echo 2;
        }

    }else{
        echo 1;
    }
}else{
	echo 0;
}
?>