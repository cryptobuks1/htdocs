<?php
@session_start();
include "config.php";
$placae = $_GET["letras"];
$caracteres = array("-", " ", "/", "*", "_", "+", ".", ",", ";", ":", "&");
$placa = str_replace($caracteres,"",$placae);
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
ini_set('date.timezone','America/Bogota'); 
	if($placa!='-'){
	$peticion = "SELECT * FROM usuarios WHERE ci LIKE '%".$placa."%'";
	$resultado = mysqli_query($conexion, $peticion);
	$contador= mysqli_num_rows($resultado);
	$fila=mysqli_fetch_array($resultado);
		if($contador==0){
			echo"<center class='noresul'><h2>No hay resultados para esta busqueda</h2></center>";
		}else{
				echo "
                                    <h3>Usuarios</h3>";
                                    $peticion1 = "SELECT * FROM usuarios WHERE ci = ".$fila['ci']."";
                                    $resultado1 = mysqli_query($conexion, $peticion);
                                    echo"<article class='resulest' id='estindex'>
                                                <table cellspacing='0' width='100%'>
                                    <tr><th>CI</th><th>TIPO_USER</th><th>NOMBRES</th><th>DIR</th><th>TELEF</th><th>MAIL</th><th>REF</th></tr>";
                                    while($fila1 = mysqli_fetch_array($resultado1)){
                                                echo "
                                    <tr>
                                    <td>".$fila1['ci']."</td><td>".$fila1['tipo_user']."</td><td>".$fila1['nombre']."</td><td>".$fila1['dir']."</td><td>".$fila1['tel']."</td><td>".$fila1['mail']."</td><td>".$fila1['referencia']."</td>
                                    </tr>
                                    ";
                                    }
                                                echo"
                                                </table>
                                                </article>";
                                                


                                                
		}
	}else{
			echo"<center class='noresul'><h2>Ingrese datos de busqueda.</h2></center>";
	}
?>