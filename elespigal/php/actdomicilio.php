<?php
@session_start();
$del=$_GET['del'];
$p=$_GET['p'];
$_SESSION['delivery']['delv']=$del;
$_SESSION['delivery']['v']=$p;
echo "$ ".$_SESSION['delivery']['v'];

?>