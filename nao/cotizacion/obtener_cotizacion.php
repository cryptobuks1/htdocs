<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */
require 'Cotizaciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $cotizaciones = Cotizaciones::getAll();
    $datos["cotizaciones"] = $cotizaciones;
    for($i=0;$i<count($cotizaciones);$i++){
        $renglones = Cotizaciones::getAllRenglones($cotizaciones[$i]['idCotizacion']);       
        $datos["cotizaciones"][$i]['renglones']=$renglones;       
    }
    if ($cotizaciones) { 
        $datos["estado"] = 1;
        
        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}

