<?php
/**
 * Obtiene el detalle de un producto especificado por
 * su identificador "idproducto"
 */
require 'Productos.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['idProducto'])) {
        // Obtener parámetro idproducto
        $parametro = $_GET['idProducto'];
        // Tratar retorno
        $retorno = Productos::getById($parametro);
        if ($retorno) {
            $producto["estado"] = 1;		// cambio "1" a 1 porque no coge bien la cadena.
            $producto["producto"] = $retorno;
            // Enviar objeto json del producto
            print json_encode($producto);
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
