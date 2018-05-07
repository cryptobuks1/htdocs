<?php
/**
 * Insertar un nuevo producto en la base de datos
 */
require 'Cotizaciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Insertar Cotizacion
    //inserta cliente
    $clipormail=  Cotizaciones::obtenerCliEmail($body['email']);
    if($clipormail){
        $cliente=  Cotizaciones::updateCli($clipormail['idCliente'],utf8_encode($body['nombreCli']), $body['tel'], $body['email'], utf8_encode($body['cia']),'');
    }else{
         $cliente=  Cotizaciones::insertCli(utf8_encode($body['nombreCli']), $body['tel'], $body['email'], utf8_encode($body['cia']), '');
    }
    $ucliente= Cotizaciones::obtenerUltimoCli();
    
    $retorno = Cotizaciones::insert($ucliente,$body['fecha'],utf8_encode($body['descrip']),0,0,0,$body['total']);
        /*$body['subtotal'],$body['impuesto'],$body['descuento'],$body['total']*/
    $ucotizacion = Cotizaciones::obtenerUltimoCot();
    $productos=array();
    for($i=0;$i<count($body['prod']);$i++){
        $reglones= Cotizaciones::insertRenglon($ucotizacion['idCotizacion'], $body['prod'][$i]['idProducto'], 0, $body['prod'][$i]['cantidad'], 0);
        if(count($productos)!=0){
            $producto=Cotizaciones::getPById($body['prod'][$i]['idProducto']);
            array_push($productos, $producto);
        }else{
            $productos[$i]= Cotizaciones::getPById($body['prod'][$i]['idProducto']);
        }
    }  
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
        echo $json_string;
        
        $to="".$body['email']."";
	$from  = 'MIME-Version: 1.0' . "\r\n";
	$from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$from .= 'To:'.$body['nombreCli'].'' . "\r\n";
	$from .= 'From: Do_Not_reply@nuestroaliado.com' . "\r\n";
	date_default_timezone_set('America/Bogota');
        $subject="Cotización Nuestro Aliado Outsourcing";
        $mensaje="<div style='background:E5E5E5; padding:20px'>
                <center><img src='http://nuestroaliado.com/wp-content/uploads/2017/01/logo.png'></center>
                <h1 style='background:#1A237E; padding:10px 20px; color:#fff;text-align:center'><trong>COTIZACION DE NUESTRO ALIADO OUTSOURCING</strong></h1>
                <h3  style='text-align:center; font-size:19px'><strong>Cotización No. </strong>".$ucotizacion['idCotizacion']."</h3>
                <center style='margin-bottom:20px; font-size:16px'><table style='width-min:600px'>
                <table>
                <tr>
                <td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'><strong>Nombre Cliente: </strong></td><td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'>".$body['nombreCli']."</td>
                 <td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'><strong>Fecha: </strong></td><td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'>".$body['fecha']."</td>
                </tr>
                <tr>
                <td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'><strong>Correo: </strong></td><td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'>".$body['email']."</td>
                 <td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'><strong>Teléfono: </strong></td><td style='font-size:19px; padding:5px 20px; border:1px solid #1A237E'>".$body['tel']."</td>
                </tr>
                </table>
                </center>
                <h3  style='text-align:center; font-size:19px'><strong>Descripción de la Cotización: </strong>".$body['descrip']."</h3>                
                </div>
                <center style='margin-bottom:20px; font-size:16px'><table style='width-min:600px'>
                <tr style='background:#1A237E;color:#fff'>
                <th style='background:#1A237E;padding:5px 20px'>Item</th>
                <th style='background:#1A237E;padding:5px 20px'>Descripción</th>
                <th style='background:#1A237E;padding:5px 20px'>Cantidad</th>
                <th style='background:#1A237E;padding:5px 20px'>V. Unitario</th>
                <th style='background:#1A237E;padding:5px 20px'>Total</th>
                </tr>";
               $totalCot=0;
               $totalIvaCot=0;
               $netoCot=0;
               for($i=0;$i<count($productos);$i++){
               $totalR=$body['prod'][$i]['cantidad']*$productos[$i]['valor'];
               $totalIvaR=$body['prod'][$i]['cantidad']*$productos[$i]['iva'];
               $netoR=$body['prod'][$i]['cantidad']*$productos[$i]['vneto'];
               $totalCot=$totalCot+$totalR;
               $totalIvaCot=$totalIvaCot+$totalIvaR;
               $netoCot=$netoCot+$netoR;
        $mensaje.="<tr><td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>".$productos[$i]['ref']."</td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>".$productos[$i]['nomProducto']."</td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>".$body['prod'][$i]['cantidad']."</td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>".$productos[$i]['valor']."</td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>$".$totalR."</td>
                </tr>";
                
               }
        $mensaje.="<tr style='font-size:18px'>
                <td colspan='3' style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'><strong>Observaciones</strong></td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px; text-align:right'><strong>Subtotal</strong></td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'><strong>$".$totalCot."</strong></td>
                </tr>";
        $mensaje.="<tr style='font-size:18px'>
                <td colspan='3' rowspan='2' style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'>".$body['descrip']."</td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px; text-align:right'><strong>Iva</strong></td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'><strong>$".$totalIvaCot."</strong></td>
                </tr>";
        $mensaje.="<tr style='font-size:18px'>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px; text-align:right'><strong>Total</strong></td>
                <td style='background:#eeeeee;border:solid #E8EAF6 1px; padding:5px 20px'><strong>$".$netoCot."</strong></td>
                </tr>
                </table></center>
                <div style='background:#1A237E;color:#fff; padding:10px 0 10px 20px; font-size:18px'>
                <p>Si tiene dudas contactenos por Whatsapp: +057 316 865 58 36 | + 057 315 372 59 37 </p>
                <p>Correos de contacto: gerencia@nuestroaliado.com, nuestroaliadosas@gmail.com</p>
                <p>Visítenos en nuestro sitio web <a style='color:#e8e8e8' href='http://nuestroalido.com'>nuestroaliado.com<a></p>
                <p>Descargue nuestra App en Play Store de Google <a style='color:#e8e8e8' href='https://play.google.com/store/apps/details?id=com.nuestroaliado'>NAO<a></p></div>";
        
        mail($to, $subject, utf8_decode($mensaje), $from);
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		echo $json_string;
    }
}

?>