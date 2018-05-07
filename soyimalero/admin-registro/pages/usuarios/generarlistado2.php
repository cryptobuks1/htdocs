<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','ID')
			->setCellValue('B1','NOMBRE')
			->setCellValue('C1','EMAIL')
			->setCellValue('D1','FECHA DE NACIMIENTO')
			->setCellValue('E1','CELULAR')
			->setCellValue('F1','LUGAR DONDE TRABAJA')
			->setCellValue('G1','DIRECCION')
			->setCellValue('H1','CIUDAD')
			->setCellValue('I1','COMO SE ENTERO')
			->setCellValue('J1','DETALLES')
			->setCellValue('K1','PUNTOS')
			->setCellValue('L1','FACTURAS');

// Miscellaneous glyphs, UTF-8
$fila=2;
$row='"6","7","8"';
//include 'config.php';
$conexion = mysqli_connect('localhost', 'root', '', 'soyimalero');
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM users WHERE id_user IN (".$row.")";
$resultado = mysqli_query($conexion, $peticion);
$users[]=$f = mysqli_fetch_array($resultado);
for($i=0; $i<count($users); $i++){
		$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.($i+2), $users[$i]['id_user'])
	->setCellValue('B'.($i+2), $users[$i]['nombre'])
	->setCellValue('C'.($i+2), $users[$i]['email'])
	->setCellValue('D'.($i+2), $users[$i]['nacimiento'])
	->setCellValue('E'.($i+2), $users[$i]['celular'])
	->setCellValue('F'.($i+2), $users[$i]['taller'])
	->setCellValue('G'.($i+2), $users[$i]['residencia'])
	->setCellValue('H'.($i+2), $users[$i]['ciudad'])
	->setCellValue('I'.($i+2), $users[$i]['enteraste'])
	->setCellValue('J'.($i+2), $users[$i]['detenteraste'])
	->setCellValue('K'.($i+2), $users[$i]['puntos'])
	->setCellValue('L'.($i+2), $users[$i]['facturas']);

}
			
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Usuarios.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
