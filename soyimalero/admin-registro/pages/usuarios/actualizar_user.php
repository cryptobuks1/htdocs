<?php
/**
 * Actualiza un producto especificado por su identificador
 */
include 'config.php';
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $peticion = "UPDATE users SET nombre='".$_POST['nombre']."', email='".$_POST['email']."', nacimiento='".$_POST['nacimiento']."', celular='".$_POST['celular']."', taller='".$_POST['taller']."', residencia='".$_POST['residencia']."', ciudad='".$_POST['ciudad']."', enteraste='".$_POST['enteraste']."', detenteraste='".$_POST['detenteraste']."', puntos='".$_POST['puntos']."', facturas='".$_POST['facturas']."' WHERE id_user=".$_POST['id']."";
    $resultado = mysqli_query($conexion, $peticion);
      
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
?>
