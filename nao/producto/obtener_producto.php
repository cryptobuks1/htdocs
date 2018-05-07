<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */
require 'Productos.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar petición GET
    $productos = Productos::getAll();
    $productosArea=array();
    for ($i = 0; $i < count($productos);$i++) {
        $areas=Productos::getAreas($productos[$i]["idArea"]);
        $union=array_merge($productos[$i],$areas);
        array_push($productosArea, $union);
    }
    if ($productos) {
        $datos["estado"] = 1;
        $datos["productos"] = $productosArea;
        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}

