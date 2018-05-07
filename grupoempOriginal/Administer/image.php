<?php
header("Content-type: image/jpeg"); 

include ('lib/WideImage.php'); 

$image = WideImage::load($_GET['img']); 

$image = $image->resize($_GET['w'], $_GET['h'], 'outside')->crop('center', 'center', $_GET['w'], $_GET['h']);

$image->output('jpg', 100);
?>