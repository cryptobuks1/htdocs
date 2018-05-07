<?php
session_start();
if(isset($_SESSION['carrito'])){
	if(isset($_GET['e']) && isset($_GET['col']) && isset($_GET['tal'])){
		$arreglo=$_SESSION['carrito'];
		$color=$_GET['col'];
		$talla=$_GET['tal'];
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['id']==$_GET['e'] && $arreglo[$i]['t']=="".$talla."" && $arreglo[$i]['co']=="".$color.""){
				$arreglo[$i]['c']++;
			}
		}
	}
}
?>
