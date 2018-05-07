<?php
	$host='localhost';
	$user='root';
	$password='123';
	$db='abogadosweb';
	
	$conexion = mysql_connect($host,$user,$password);
	if(!$conexion){
		die('<strong>No pudo conectarse:</strong> ' . mysql_error());
		}
	mysql_select_db($db,$conexion) or die(mysql_error($conexion));
?>