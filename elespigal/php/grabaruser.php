<?php 
@session_start();
include "config.php";
$cii = $_POST['ci'];
$caracteres = array("-", " ", "/", "*", "_", "+", ".", ",", ";", ":", "&");
$ci = str_replace($caracteres,"",$cii);  
$nombre= $_POST['nombre'];
$dir=$_POST['dir'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$ref=$_POST['ref'];
$cont=0;
ini_set('date.timezone','America/Bogota');
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM usuarios WHERE ci='".$ci."'";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
    $cont++;
} 
if($cont==0){	        
    $peticion = "INSERT INTO usuarios VALUES('','".$ci."','','".$nombre."','".$dir."','".$tel."','".$mail."','".$ref."','','')";
    $resultado = mysqli_query($conexion, $peticion);
    $usuario=array(
            'c'=>$ci,
            'n'=>$nombre,
            'd'=>$dir,
            't'=>$tel,
            'm'=>$mail,
            'r'=>$ref
            );
    $_SESSION['usuario']=$usuario;
        
        
    echo 1;
    

}else{
    echo 0;
}

?>
        
