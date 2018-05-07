<?php
session_start();
include "config.php";?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
//echo $_POST['opcion'];

$peticion = "DELETE FROM adicional_producto WHERE id_producto = '".$_GET['id_producto']."'";
$resultado = mysqli_query($conexion, $peticion);

if(isset ($_POST['opcion'])){
    $chequeados=$_POST['opcion'];

    for ($i=0;$i<count($chequeados);$i++){
        $id_adicional =$chequeados[$i];
            $peticion = "INSERT INTO adicional_producto VALUES (NULL,'".$_GET['id_producto']."','".$id_adicional."')";
            $resultado = mysqli_query($conexion, $peticion);

    }
    echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>Adicionales añadidos al producto satisfactoriamente.</h1></div>";
    }else{
         echo"<div style='padding:0px; margin:0px; width:100%; height:100%; background:url(../admin/image/bg.png); color:#434142; text-align:center; vertical-align:middle; font-family:Helvetica, Arial, sans-serif;'><h1 style='padding:200px 0 0 0;'>No escogió adicionales.</h1></div>";
}



        


	/*$rs = mysqli_query($conexion, "SELECT MAX(id_producto) AS id FROM productos");
        if ($row = mysqli_fetch_row($rs)) {
        $id = trim($row[0]);
        }*/

        mysqli_close($conexion);
	echo "
		<meta http-equiv='refresh' content='1; url=../productos.php'>
	" ;

?>