<?php
session_start();
$cupon=$_GET['cupon'];
if($cupon!=0){
    $t=$_SESSION['total']-$cupon;
    
    echo $t;
}else{
    $t=number_format($_SESSION['total'],2);
    echo $t;
}
?>
