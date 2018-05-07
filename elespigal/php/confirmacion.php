<?php 
@session_start();
include "config.php";
$pedido=$_SESSION['carrito'];
$cii = $_POST['ci'];
$cici=$_POST['cic'];
$caracteres = array("-", " ", "/", "*", "_", "+", ".", ",", ";", ":", "&");
$ci = str_replace($caracteres,"",$cii); 
$cic = str_replace($caracteres,"",$cici); 
$nombre= $_POST['nombre'];
$dir=$_POST['dir'];
$tel=$_POST['tel'];
$telcon=$_POST['telcon'];
$mail=$_POST['mail'];
$ref=$_POST['ref'];
$coment=$_POST['coment'];
$pro=$_POST['pro'];
$local = $_POST['local'];
$pago = $_POST['pago'];
$ter =  $_POST['ter'];
$cupon =  $_POST['cupon'];
$valorcupon =  $_POST['valorcupon'];

if($cupon=='Si'){
    $cuponinfo=$cupon.' ('.$valorcupon.')';
}else{
     $cuponinfo=$cupon;
}
$detpedido=array(
            'local'=>$local,
            'come'=>$coment,
            'pago'=>$pago,
            'cupon'=>$cuponinfo,
            'pro'=>$pro            
            );
$_SESSION['detalles']=$detpedido;
ini_set('date.timezone','America/Bogota');
$cont = 0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");



if($_POST['control']=='nuevo'){
	$peticion = "SELECT * FROM usuarios WHERE ci='".$ci."'";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
	    $cont++;
	} 
	if($cont==0){	
                    
        if($local=='-' || $ter=='false'){
            echo 2;
        }else{
            //if($ter=='true'){
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
                include "mensaje.php";
                @mail($to,$tema,utf8_decode($mensaje),$from);
                
                echo 0;
            /*}else{
                echo 3;
            }*/            
        }
    
    }else{
        include "mensaje.php";
        @mail($to,$tema,utf8_decode($mensaje),$from); 
        echo 0; 
    }
}else{
    $modify=$_POST['modify'];
   
               
        if($modify=='per'){
            $peticion = "UPDATE usuarios SET nombre='".$nombre."', mail='".$mail."' , dir='".$dir."' , tel='".$tel."' , referencia='".$ref."' WHERE ci=".$ci."";
            $resultado = mysqli_query($conexion, $peticion);
        }
        if($local=='-' || $ter=='false'){
            echo 2;
        }else{
            //if($ter=='true'){
            $usuario=array(
                    'c'=>$ci,
                    'n'=>$nombre,
                    'd'=>$dir,
                    't'=>$tel,
                    'm'=>$mail,
                    'r'=>$ref

                    );
            $_SESSION['usuario']=$usuario;
            include "mensaje.php";
            mail($to,$tema,utf8_decode($mensaje),$from);
            echo 0;
            /*}else{
               echo 3; 
            }*/
        
        }

}
		
	mysqli_close($conexion);
?>
        
