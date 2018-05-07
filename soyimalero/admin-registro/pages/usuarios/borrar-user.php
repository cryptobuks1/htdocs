<?php
include 'config.php';
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $peticion ="DELETE FROM users WHERE id_user=".$_GET['id']."";
	$resultado = mysqli_query($conexion, $peticion);
	//echo 'antes de entrar';
    if ($resultado) {  
        echo  "
        <center class='menexitoso'>Registro eliminado</center>
        <meta http-equiv='refresh' content='1;url=../index.php'>";
    }else{
        echo "<center class='menexitoso'>Upps! ocurrio un error</center>
        <meta http-equiv='refresh' content='1;url=../index.php'>";
    }
}
?>