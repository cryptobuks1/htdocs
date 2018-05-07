<?php
session_start();
unset($_SESSION['carrito']);
$_SESSION['total']=1.50;
echo"<center>No hay productos</center>";
echo "<meta http-equiv='refresh' content='3; url=../producto.php'>";
?>