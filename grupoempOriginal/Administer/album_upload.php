<?php  
include("funciones.php");

$ds = DIRECTORY_SEPARATOR;
$foldername = "../public";

if (!empty($_FILES)) {
	
	mysql_select_db($database_admin, $admin);
	$query_orden = "SELECT * FROM tbl_fotos WHERE album = '".$_GET['id']."' ORDER BY id DESC";
	$orden = mysql_query($query_orden, $admin) or die(mysql_error());
	$row_orden = mysql_fetch_assoc($orden);
	$totalRows_orden = mysql_num_rows($orden);
	
	$codigounico = date("ymd-His");

    $fileupload = "FOTO-".$codigounico.basename( $_FILES['file']['name']);
    $fileType = $_FILES['file']['type'];
    $fileSize = $_FILES['file']['size'];
	$album = $_GET['id'];
	$orden = ($row_orden['orden']+1);

    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = dirname( __FILE__ ) . $ds. $foldername . $ds;
    $targetFile =  $targetPath. $fileupload;
    move_uploaded_file($tempFile,$targetFile);
	
	$thumb1=new thumbnail("../public/".$fileupload); 
	$thumb1->size_width(800);
	$thumb1->jpeg_quality(90);
	$thumb1->save("../public/".$fileupload);
	
	$insertSQL = "INSERT INTO tbl_fotos (imagen, album, orden) VALUES ('$fileupload', '$album', '$orden')";
  
	mysql_select_db($database_admin, $admin);
	$Result1 = mysql_query($insertSQL, $admin) or die(mysql_error());
   
}
?>