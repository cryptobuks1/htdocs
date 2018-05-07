
<?php include "config.php"?>
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if(isset($_POST['estado'])){
	$e=$_POST['estado'];
	$url='../verpedido.php?id_pedido="'.$_GET["id"].'"';
}else{
	$e=$_GET['e'];
	$url='pedidos.php';
}
$id=$_GET['id'];
switch($e){
	case "Activo":$estado=0;break;
	case "Despachado":$estado=1;break;
	case "Anulado":$estado=2;break;
}
$peticion = "UPDATE pedidos SET estado='".$estado."' WHERE id_pedido= ".$id."";
$resultado = mysqli_query($conexion, $peticion);
/*$peticion = "SELECT * FROM pedidos WHERE id_pedido= ".$_GET['id']."";
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){*/
echo"<script>
window.location='".$url."'
</script>";
mysqli_close($conexion);
?>

