<?php
/**
 * Insertar un nuevo producto en la base de datos
 */
require 'Usuarios.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json

    // Insertar Alumno'
    $retorno = Usuarios::insert(
        $_POST['nombre'],
        $_POST['email'],
        $_POST['nacimiento'],
        $_POST['celular'],
        $_POST['taller'],
        $_POST['residencia'],
        $_POST['ciudad'],
        $_POST['enteraste'],
        $_POST['detenteraste'],
        $_POST['puntos'],
        $_POST['facturas']
        );
        
    if ($retorno) {
        echo 1;
    } else {
        echo 2;
    }
}