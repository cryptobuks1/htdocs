<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	$servidor='localhost';
	$user='root';
	$pass='';
	$db='naresa';
	
		$s=$this->servidor;
		$u=$this->user;
		$p=$this->pass;
		$d=$this->db;
		$conex=mysqli_connect($s,$u,$p,$d);
		$this->conexion=$conex;
        $consulta=mysql_query("SELECT imagen FROM trabajos WHERE servicio = 'Rotulación'");
		echo '<table>';
		foreach($consulta as $row){
			echo '<tr><td>' . $row['imagen'] . '</td></tr>';
		}
		echo '</table>';
		
	
?>
<body>
</body>
</html>