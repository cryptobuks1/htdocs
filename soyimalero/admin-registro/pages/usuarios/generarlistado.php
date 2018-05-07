<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Bogota'); 
header("Content-Type: application/vdn.ms-excel");
header('Content-Disposition: attachment;filename=Usuarios.xls');
header('Cache-Control: max-age=0'); 
require ("PHPExcel.php");
$excel = new PHPExcel();

$excel->getProperties()->setCreator('Lupa')->setLastModifiedBy('Lupa')->setTitle('Usuarios');

$excel->setActiveSheetIndex(0);

$excel->getActiveSheet()->setTitle('Usuarios');

$excel->getActiveSheet()->setCellValue('A1','ID');
$excel->getActiveSheet()->setCellValue('B1','NOMBRE');
$excel->getActiveSheet()->setCellValue('C1','EMAIL');
$excel->getActiveSheet()->setCellValue('D1','FECHA DE NACIMIENTO');
$excel->getActiveSheet()->setCellValue('E1','CELULAR');
$excel->getActiveSheet()->setCellValue('F1','LUGAR DONDE TRABAJA');
$excel->getActiveSheet()->setCellValue('G1','DIRECCION');
$excel->getActiveSheet()->setCellValue('H1','CIUDAD');
$excel->getActiveSheet()->setCellValue('I1','COMO SE ENTERO');
$excel->getActiveSheet()->setCellValue('J1','DETALLES');
$excel->getActiveSheet()->setCellValue('K1','PUNTOS');
$excel->getActiveSheet()->setCellValue('L1','FACTURAS');

$fila=2;
$row="'".implode("','", $_POST['id'])."'";
//$conexion = mysqli_connect('localhost', 'root', '', 'soyimalero');
$conexion = mysqli_connect('localhost', 'soyimale_wp120', '3SV10pM-j]', 'soyimale_registros');
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM users WHERE id_user IN (".$row.")";
$resultado = mysqli_query($conexion, $peticion);
if($resultado){
   while($users = mysqli_fetch_array($resultado)){
        $excel->getActiveSheet()->setCellValue('A'.$fila, $users['id_user']);
		$excel->getActiveSheet()->setCellValue('B'.$fila, $users['nombre']);
		$excel->getActiveSheet()->setCellValue('C'.$fila, $users['email']);
		$excel->getActiveSheet()->setCellValue('D'.$fila, $users['nacimiento']);
		$excel->getActiveSheet()->setCellValue('E'.$fila, $users['celular']);
		$excel->getActiveSheet()->setCellValue('F'.$fila, $users['taller']);
		$excel->getActiveSheet()->setCellValue('G'.$fila, $users['residencia']);
		$excel->getActiveSheet()->setCellValue('H'.$fila, $users['ciudad']);
		$excel->getActiveSheet()->setCellValue('I'.$fila, $users['enteraste']);
		$excel->getActiveSheet()->setCellValue('J'.$fila, $users['detenteraste']);
		$excel->getActiveSheet()->setCellValue('K'.$fila, $users['puntos']);
		$excel->getActiveSheet()->setCellValue('L'.$fila, $users['facturas']);

       	$fila++;
   }
}

foreach(range('A','L') as $columna){
	$excel->getActiveSheet()->getColumnDimension($columna)->setAutosize(true);
}
$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
$objWriter->save('php://output'); ?>