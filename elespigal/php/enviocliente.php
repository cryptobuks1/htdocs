<?php
	@session_start();
	include "config.php";
	$pedido=$_SESSION['carrito'];
	include "mensajecliente.php";	
	@mail($toc,$temac,utf8_decode($mensajec),$from);
	unset($_SESSION['carrito']);
	unset($_SESSION['detalles']);
	$_SESSION['total']=1.00;
	echo "<meta http-equiv='refresh' content='1; url=../confirmado.php'>";
?>