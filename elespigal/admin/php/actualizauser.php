<?php include "../php/config.php"?>

<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE usuarios SET nombre='".$_POST['nombre']."',apellidos='".$_POST['apellidos']."',mail='".$_POST['mail']."',ruc='".$_POST['ruc']."',privilegios='".$_POST['privilegios']."',direccion='".$_POST['direccion']."',telefono='".$_POST['telefono']."',pais='".$_POST['pais']."',provincia='".$_POST['provincia']."',ciudad='".$_POST['ciudad']."' WHERE id_user=".$_GET['id_user']."";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
window.location="../editaruser.php?id_user=<?php echo"".$_GET['id_user']."";?>"
</script>

