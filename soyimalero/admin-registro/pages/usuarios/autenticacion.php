<?php
/**
 * Obtiene todas las alumnos de la base de datos
 */
require 'Usuarios.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejar petición GET
    $body = json_decode(file_get_contents("php://input"), true);
    $usuarios = Usuarios::getByEmail($body['email']);
    if ($usuarios) {
        if($usuarios['pass']==$body['pass']){
            $datos["email"] = $usuarios['email'];
            $datos["nombre"] = $usuarios['nombre'];
            $datos['imagen']=$usuarios['imagen'];
        print json_encode($datos);
        
        }else{
           print json_encode(array("mensaje" => "Password incorrecta")); 
        }
    } else {
        print json_encode(array("mensaje" => "Usuario no existe"));
    }
}

