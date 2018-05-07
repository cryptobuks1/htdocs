<?php include "../php/config.php" ?>
<?php
$co=0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM mensajes ";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	if($fila['asunto']!=''){
		$co++;
	}
}

for ($i=0;$i<$co;$i++){
	$id = $_POST["id".$i];
	$mensaje = $_POST["mensaje".$i]; 
	
   if (isset($_POST["mensaje".$i])){ 
		$peticion = "UPDATE mensajes SET mensaje='".$mensaje."' WHERE id_men=".$id."";
		$resultado = mysqli_query($conexion, $peticion);
		
   }
}
mysqli_close($conexion);
	echo "<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>El mensaje ha sido cambiado exitosamente.</h1></div>";

	echo "

		<meta http-equiv='refresh' content='15; url=../mensajes.php'>
	" ;
?>

