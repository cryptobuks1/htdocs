<?php 
$row='"6","7","8"';
include 'config.php';
date_default_timezone_set('America/Bogota'); 
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_Fechas_Ingreso.csv"');

// SALIDA DEL ARCHIVO
$salida=fopen('php://output', 'w');
// ENCABEZADOS
fputcsv($salida, array('Id Alumno', 'Nombre', 'Carrera', 'Grupo', 'Fecha de Ingreso'));
// QUERY PARA CREAR EL REPORTE
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM users WHERE id_user IN (".$row.")";
$resultado = mysqli_query($conexion, $peticion);
if($resultado){
   while($users = mysqli_fetch_array($resultado)){
        fputcsv($salida, array($users['id_user'],
        	$users['nombre'],
        	$users['email'],
        	$users['nacimiento'],
        	$users['celular'],
        	$users['taller'],
        	$users['residencia'],
        	$users['ciudad'],
        	$users['enteraste'],
        	$users['detenteraste'],
        	$users['puntos'],
        	$users['facturas']));
		
   }
}
	
?>