<?php
@session_start();
include "config.php";
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
ini_set('date.timezone','America/Bogota');
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");		
    if($ci!='' && $nombre!='' && $dir!='' && $ref!='' ){

        if($ci==$cic){
            if($tel==$telcon){
                if (filter_var($mail, FILTER_VALIDATE_EMAIL) || $mail=='') {
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


                    echo 0;
                }else{
                    echo 2;
                }

            }else{
                echo ".tel, .telcon";
            }
        }else{
            echo ".ci, .cic";
        }                            
            
    }else{
        echo 1;
    }	      	
?>

