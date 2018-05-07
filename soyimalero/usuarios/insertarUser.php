<?php
/**
 * Insertar un nuevo producto en la base de datos
 */
include 'config.php';
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $peticion = "INSERT INTO users VALUES('','".$_POST['nombre']."','".$_POST['email']."','".$_POST['nacimiento']."','".$_POST['celular']."','".$_POST['taller']."','".$_POST['residencia']."','".$_POST['ciudad']."','".$_POST['enteraste']."','".$_POST['detenteraste']."','".$_POST['puntos']."','".$_POST['facturas']."')";
    $resultado = mysqli_query($conexion, $peticion);
      
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}