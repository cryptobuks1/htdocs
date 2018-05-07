<?php
@session_start();
$c=$_SESSION['cantidad'];
if(isset($_SESSION['carrito']) && $c>0){
	echo"<a class='enlacevalidarcarro' href='validarpedido.php'><button>"._('Validar Compra')."</button></a> ";
}else{
	echo"";
}	
?>
