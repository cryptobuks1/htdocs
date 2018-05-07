<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
@session_start();
$url = $_SERVER['HTTP_REFERER'];
if($_SESSION['user']){
unset($_SESSION['user']);
echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Cerro sesión exitosamente</h1></div>";
echo "
	<meta http-equiv='refresh' content='0.001; url=../loguinadmin.php'>
" ;
}
?>
