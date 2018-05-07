<?php
session_start();
if(!isset($_SESSION['total']) || !isset($_SESSION['carrito'])){
echo"";
}else{
$t=number_format($_SESSION['total'],2);
echo "".$t."";
}
?>