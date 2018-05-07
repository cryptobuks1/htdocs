<?php

session_start();


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
$fecha = $_POST['fecha'];
@$ip = getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];

$conexion = mysql_connect('localhost','root','jDhyJGKC7q6RqzNX');
$consulta = "INSERT INTO usuarios VALUES ('".$nombre."','".$apellido."','','','".$correo."','".$usuario."','','".$pass."','".$repass."','','".$fecha."','".$ip."','','".$navegador."')";
$resultado = mysql_query($conexion,$consulta);
mysql_close($conexion);
$_SESSION['usuario'] = $usuario;

echo '<meta http-equiv="REFRESH" content="0,url=../index.php">';

?>
