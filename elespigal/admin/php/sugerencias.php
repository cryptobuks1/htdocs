<?php 
 include "config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user";
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$nombre[]=$fila['nombre'];
			$apellidos[]=$fila['apellidos'];
			$ruc[]=$fila['ruc'];
			$fecha[]=$fila['fecha'];
	}
if(isset($_GET["n"])){
	$n=$_GET["n"];
	if (strlen($n) > 0){
		$hint="";
			for($i=0; $i<count($nombre); $i++){
				$comparar = strtolower(substr($nombre[$i],0,strlen($n)));
				if (strtolower($n)==$comparar){
					$hint="nombre In ('".$nombre[$i]."') ORDER BY nombre ASC";
				}
			}
	}else{
		$hint = "";
	}
}else{
$hint="";
}
if(isset($_GET["a"])){
	$a=$_GET["a"];
	if (strlen($a) > 0){
		$hint="";
		for($i=0; $i<count($apellidos); $i++){
		  	$comparar = strtolower(substr($apellidos[$i],0,strlen($a)));
		  	if (strtolower($a)==$comparar){
					$hint="apellidos In ('".$apellidos[$i]."') ORDER BY apellidos ASC";
			}
		}
	}else{
		$hint = "";
	}
}
if(isset($_GET["c"])){
	$c=$_GET["c"];
	$hint="ciudad = '".$c."' ORDER BY fecha DESC";
}
if(isset($_GET["e"])){
	$e=$_GET["e"];
	switch($e){
	case "Activo": $estado = 0; break;
	case "Despachado": $estado = 1; break;
	case "Anulado": $estado = 2; break;
	}
	$hint="estado In ('".$estado."') ORDER BY fecha DESC";
}


if(isset($_GET["vi"]) && isset($_GET["vf"])){
	if($_GET["vi"] !='' && $_GET["vf"]!=''){
		$vi=$_GET["vi"];
		$vf=$_GET["vf"];
		$hint="valor >= ".$vi." AND valor <= ".$vf." ORDER BY valor ASC";
	}else{		
		if($_GET["vi"]!=''){
		$vi=$_GET["vi"];
		$hint="valor >= ".$vi." AND valor <= 100000000.00 ORDER BY valor ASC";
		}
		if($_GET["vf"]!=''){
			$vf=$_GET["vf"];
			$hint="valor >= 0.00 AND valor <= ".$vf." ORDER BY valor ASC";
		}
	}
}
if(isset($_GET["fi"]) && isset($_GET["ff"])){
	if($_GET["fi"] !='' && $_GET["ff"]!=''){
		$fi=$_GET["fi"];
		$ff=$_GET["ff"];
		$hint="fecha >= '".$fi."' AND fecha <= '".$ff."' ORDER BY fecha DESC";
	}else{		
		if($_GET["fi"]!=''){
		$fi=$_GET["fi"];
		$hint="fecha >= '".$fi."' AND fecha <= '".date("j")."/".date("m")."/".date("Y")."' ORDER BY fecha DESC";
		}
		if($_GET["ff"]!=''){
			$ff=$_GET["ff"];
			$hint="fecha >= '01/01/1970' AND fecha <= '".$ff."' ORDER BY fecha DESC";
		}
	}
}
if(isset($_GET["ca"])){
	$orden=$_GET["ca"];
	switch($orden){
		case 0:$ordenpor = "ORDER BY fecha DESC";break;
		case 2:$ordenpor = "ORDER BY nombre ASC"; break;
		case 4:$ordenpor = "ORDER BY valor ASC"; break;
		case 6:$ordenpor = "ORDER BY estado ASC"; break;
	}
$hint="";
}

if($hint==""){
		echo"     <tr>
        <th>No.</th><th>FECHA</th><th>CIUDAD</th><th>NOMBRE DE CLIENTE</th><th>VALOR</th><th>ESTADO</th><th>DESPACHADO</th><th>ANULAR</th>
    </tr>
";
		
		?>
		<?php
		$peticion = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user ".$ordenpor."";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){
		$estado = $fila['estado'];
		//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
			switch($estado){
				case 0:$diestado = "Activo";break;
				case 1:$diestado = "Despachado"; break;
				case 2:$diestado = "Anulado"; break;
			}
			
			echo "<tr";
			
			switch($estado){
				case 0:echo " style='background:#ccddff'"; break;
				case 1:echo " style='background:#EAEAEA'"; break;
				case 2:echo " style='background:#fff'";break;
			}
			echo ">
			<td>".$fila['id_pedido']."</td>
			<td>".$fila['fecha']."</td>
			<td>".$fila['ciudad']."</td>
			<td>".$fila['nombre']." ".$fila['apellidos']."</td>
			<td>".$fila['valor']."</td>
			<td>".$diestado."</td>
			<td ><a href='verpedido.php?id_pedido=".$fila['id_pedido']."'><button>Ver pedido</button></a></td>
			<td ><a href='php/borrarpedido.php?id=".$fila['id_pedido']."'><button>Eliminar</button></a></td>
			</tr>";
			
			}
}else{
  $response=$hint;
}
echo"   
     <tr>
        <th>No.</th><th>FECHA</th><th>CIUDAD</th><th>NOMBRE DE CLIENTE</th><th>VALOR</th><th>ESTADO</th><th>DESPACHADO</th><th>ANULAR</th>
    </tr>
";
$peticion = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user WHERE ".$response."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$estado = $fila['estado'];
//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
	switch($estado){
		case 0:$diestado = "Activo";break;
		case 1:$diestado = "Despachado"; break;
		case 2:$diestado = "Anulado"; break;
	}
	
	echo "<tr ";
	
	switch($estado){
		case 0:echo " style='background:#ccddff'"; break;
		case 1:echo " style='background:#EAEAEA'"; break;
		case 2:echo " style='background:#fff'";break;
	}
//if($estado == 0){echo " style='background:#cccccc'";}else{echo " style='background:#b7er56'";}
echo ">
			<td>".$fila['id_pedido']."</td>
			<td>".$fila['fecha']."</td>
			<td>".$fila['ciudad']."</td>
			<td>".$fila['nombre']." ".$fila['apellidos']."</td>
			<td>".$fila['valor']."</td>
			<td>".$diestado."</td>
			<td ><a href='verpedido.php?id_pedido=".$fila['id_pedido']."'><button>Ver pedido</button></a></td>
			<td ><a href='php/borrarpedido.php?id=".$fila['id_pedido']."'><button>Eliminar</button></a></td>
			</tr>";

}
mysqli_close($conexion);
?>
