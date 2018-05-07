<?php 
 include "config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if(isset($_GET["ca"])){
	$orden=$_GET["ca"];
	switch($orden){
		case 0:$ordenpor = "ORDER BY id_trab ASC";break;
		case 2:$ordenpor = "ORDER BY nombre ASC"; break;
		case 4:$ordenpor = "ORDER BY cliente ASC"; break;
		case 6:$ordenpor = "ORDER BY servicio ASC"; break;
		case 8:$ordenpor = "ORDER BY cat ASC"; break;
		case 10:$ordenpor = "ORDER BY subcat ASC"; break;
	}
$hint="";
}

if($hint==""){
		echo"<tr>
			<th>No.</th><th>IMAGEN</th><th>NOMBRE</th><th>CLIENTE</th><th>SERVICIO</th><th>CATEGORIA</th><th>SUBCATEGORIA</th>";if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){
            echo"<th>EDITAR</th><th>ELIMINAR</th>";}
        echo"</tr>";
	$peticion = "SELECT * FROM trabajos ".$ordenpor."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
	//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
		echo "<tr>
	<td width='2%'>".$fila['id_trab']."</td>
	";
	echo"
	<td width='10%'><img src='../fotos/".$fila['imagen']."'/></td>
	<td width='10%'>".$fila['nombre']."</td>
	<td width='10%'>".$fila['cliente']."</td>
	<td width='3%'>".$fila['servicio']."</td>
	<td width='3%'>".$fila['cat']."</td>
	<td width='3%'>".$fila['subcat']."</td>";
	if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){
	echo"<td width='10%'><a href='editarprod.php?id_trab=".$fila['id_trab']."'><button>Editar</button></a></td>
	<td width='10%'><a href='php/borrarproducto.php?id_trab=".$fila['id_trab']."'><button>Eliminar</button></a></td>"; }
	echo"</tr>";
	
	}
}else{
  $response=$hint;
}
mysqli_close($conexion);
?>
