<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */
require 'Categorias.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $productos = Productos::getAll();
    if ($productos) {
        $datos["estado"] = 1;
        $datos["productos"] = $productos;
        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}

