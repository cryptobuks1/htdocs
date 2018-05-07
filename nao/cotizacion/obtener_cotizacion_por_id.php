<?php
/**
 * Obtiene el detalle de un cotizacion especificado por
 * su identificador "idcotizacion"
 */
require 'Cotizaciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['idCotizacion'])) {
        // Obtener parámetro idcotizacion
        $parametro = $_GET['idCotizacion'];
        // Tratar retorno
        $retorno = Cotizaciones::getById($parametro);
        if ($retorno) {
            $cotizacion["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $cotizacion["cotizacion"] = $retorno;
            // Enviar objeto json del cotizacion
            print json_encode($cotizacion);
        } else {
            // Enviar respuesta de error general
            print json_encode(
                array(
                    'estado' => '2',
                    'mensaje' => 'No se obtuvo el registro'
                )
            );
        }
    } else {
        // Enviar respuesta de error
        print json_encode(
            array(
                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'
            )
        );
    }
}
