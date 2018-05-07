<?php
/*Actualiza un cotizacion especificado por su identificador*/
require 'Cotizaciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Actualizar cotizacion
    $clipormail=  Cotizaciones::obtenerCliEmail($body['email']);
    if($clipormail){
        $cliente=  Cotizaciones::updateCli($clipormail['idCliente'],$body['nombreCli'], $body['tel'], $body['email'], $body['cia'],'');
    }else{
        $cliente=  Cotizaciones::insertCli($body['nombreCli'], $body['tel'], $body['email'], $body['cia'], '');
    }
    $retorno = Cotizaciones::update($body['total'],$body['descrip'],$body['idCotizacion']);
    //se consultan los renglones existentes
    $rexistentes = Cotizaciones::getAllidRenglones($body['idCotizacion']);
    $idRenglon= array();
    for($i=0;$i<count($rexistentes);$i++){
       array_push($idRenglon, $rexistentes[$i]['idRenglon']);
    }
    
    for($i=0;$i<count($body['renglones']);$i++){
        for ($j=0;$j<count($idRenglon);$j++){
            if($idRenglon[$j]==$body['renglones'][$i]['idRenglon']){
                unset($idRenglon[$j]);               
            }
        }
        if($body['renglones'][$i]['idRenglon']==0 || $body['renglones'][$i]['idRenglon']==null){
            $renglones[$i]=  Cotizaciones::insertRenglon($body['idCotizacion'], $body['renglones'][$i]['idProd'], 0, $body['renglones'][$i]['cantidad'], 0);
        }else{
            $renglones[$i]=  Cotizaciones::updateRenglones($body['renglones'][$i]['idRenglon'],$body['renglones'][$i]['cantidad']);       
        }
        
    }
    for($i=0;$i<count($idRenglon);$i++){
        $delete=Cotizaciones::deleteRen($idRenglon[$i]);
    }
    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Actualizacion correcta"));
		echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se actualizo el registro"));
		echo $json_string;
    }
}
?>
