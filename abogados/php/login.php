<?php

session_start();

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$host='localhost';
$user='root';
$password='123';

$conexion = mysql_connect($host,$user,$password);
mysql_select_db('abogadosweb',$conexion);

$consulta = mysql_query("SELECT nombre FROM usuarios
WHERE usuario LIKE '$usuario' and pass LIKE
'$pass'",$conexion);
$dato= mysql_fetch_array ($consulta);
$cambia= $dato['usuario'];
echo "<hr size = 10 color = ffffff width = 50% align = left>";
if ($dato =="usuario,pass")
{
echo $dato;
echo "Los datos no son correctos, <a
href=../index.php>Volver</a>";
}
else
{
echo $dato;
echo "<STRONG>Bienvenido a nuestra web
$cambia</STRONG><a href=../index.php>Volver</a>";
}
?>
