<?php include "config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

$peticion = "DELETE FROM usuarios WHERE id_user=".$_GET['id_user']."";
$resultado = mysqli_query($conexion, $peticion);
echo"<center>Usuario borrado</center>";
mysqli_close($conexion);
?>
<script>
window.location="../usuarios.php"
</script>

