<?php
include 'config.php';
$id = $_POST['id_producto'];
$cont = 0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion1 = "SELECT * FROM adicional_producto WHERE id_producto=".$id."";
$resultado1 = mysqli_query($conexion, $peticion1);
while($fila1 = mysqli_fetch_array($resultado1)){
    $cont++;
}
if($cont==0){
        echo "false";
 	}else{
     	echo "true";
 	}

mysqli_close($conexion);
?>
