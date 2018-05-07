<?php 
 include "config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$nombre[]=$fila['nombre'];
			$ref[]=$fila['ref'];
			$inv[]=$fila['inventario'];
			$estado[]=$fila['estado'];
			$id[]=$fila['id_prod'];
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
		for($i=0; $i<count($ref); $i++){
		  	$comparar = strtolower(substr($ref[$i],0,strlen($a)));
		  	if (strtolower($a)==$comparar){
					$hint="ref In ('".$ref[$i]."') ORDER BY ref ASC";
			}
		}
	}else{
		$hint = "";
	}
}
if(isset($_GET["c"])){
	$peticion2 = "SELECT * FROM categorias WHERE titulo_es='".$_GET['c']."'";
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2)){
		$id=$fila2['id_categoria'];
	}
	$hint="id_categoria = ".$id." ORDER BY id_prod DESC";
}
if(isset($_GET["e"])){
	$e=$_GET["e"];
	$hint="estado='".$e."' ORDER BY nombre ASC";
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
if(isset($_GET["ii"]) && isset($_GET["if"])){
	if($_GET["ii"] !='' && $_GET["if"]!=''){
		$ii=$_GET["ii"];
		$if=$_GET["if"];
		$hint="inventario >= ".$ii." AND inventario <= ".$if." ORDER BY inventario ASC";
	}else{		
		if($_GET["ii"]!=''){
		$ii=$_GET["ii"];
		$hint="inventario >= ".$ii." AND inventario <= 100000000.00 ORDER BY inventario ASC";
		}
		if($_GET["if"]!=''){
			$if=$_GET["if"];
			$hint="inventario >= 0.00 AND inventario <= ".$if." ORDER BY inventario ASC";
		}
	}
}
if(isset($_GET["ca"])){
	$orden=$_GET["ca"];
	switch($orden){
		case 0:$ordenpor = "ORDER BY id_prod ASC";break;
		case 2:$ordenpor = "ORDER BY nombre ASC"; break;
		case 4:$ordenpor = "ORDER BY valor ASC"; break;
		case 6:$ordenpor = "ORDER BY inventario ASC"; break;
		case 8:$ordenpor = "ORDER BY estado ASC"; break;
	}
$hint="";
}

if($hint==""){
		echo" 
     <tr>
        <th>No.</th><th>IMAGEN</th><th>NOMBRE</th><th>REFERENCIA</th><th>MARCA</th><th>CATEGORIA</th><th>VALOR</th><th>INV.</th><th>ESTADO</th><th>EDITAR</th><th>ELIMINAR</th>
    </tr>
";
		
		?>
		<?php
		$peticion = "SELECT * FROM productos ".$ordenpor."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$estado = $fila['estado'];
//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
	echo "<tr";
	
	switch($estado){
		case 'activo':echo " style='background:#ccddff'"; break;
		case 'inactivo':echo " style='background:#fff'"; break;
	}
echo ">
<td width='2%'>".$fila['id_prod']."</td>
";
	  $peticion2 = "SELECT * FROM imgproducto WHERE id_prod = ".$fila['id_prod']." LIMIT 1";
	  $resultado2 = mysqli_query($conexion, $peticion2);
	  while($fila2 = mysqli_fetch_array($resultado2)){
		echo"<td width='10%'><div class='imagenItem'><img src='../fotos/".$fila2['imagen']."' alt=''/></div></td>";
	  }
echo"<td width='10%'>".$fila['nombre']."</td>
<td width='10%'>".$fila['ref']."</td>";
	$peticion2 = "SELECT * FROM productos LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_prod = ".$fila['id_prod']."";
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2)){
		
		$peticion3 = "SELECT * FROM categorias LEFT JOIN marca ON categorias.id_marca = marca.id_marca WHERE id_categoria = ".$fila['id_categoria']."";
		$resultado3 = mysqli_query($conexion, $peticion3);
		while($fila3 = mysqli_fetch_array($resultado3)){
			echo"<td width='10%'>".$fila3['nombre']."</td>";
		}
	echo"<td width='10%'>".$fila2['titulo_es']."</td>";
	} 
echo"
<td width='10%'>".$fila['valor']."</td>
<td width='3%'>".$fila['inventario']."</td>
<td width='10%'>".$estado."</td>
<td width='10%'><a href='editarprod.php?id_prod=".$fila['id_prod']."'><button>Editar</button></a></td>
<td width='10%'><a href='php/borrarproducto.php?id_prod=".$fila['id_prod']."'><button>Eliminar</button></a></td>
</tr>";
			
			}
}else{
  $response=$hint;
}
echo"   
     <tr>
        <th>No.</th><th>IMAGEN</th><th>NOMBRE</th><th>REFERENCIA</th><th>MARCA</th><th>CATEGORIA</th><th>VALOR</th><th>INV.</th><th>ESTADO</th><th>EDITAR</th><th>ELIMINAR</th>
    </tr>
";
$peticion = "SELECT * FROM productos WHERE ".$response."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$estado = $fila['estado'];
//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
	echo "<tr";
	
	switch($estado){
		case 'activo':echo " style='background:#ccddff'"; break;
		case 'inactivo':echo " style='background:#fff'"; break;
	}
echo ">
<td width='2%'>".$fila['id_prod']."</td>
";
	  $peticion2 = "SELECT * FROM imgproducto WHERE id_prod = ".$fila['id_prod']." LIMIT 1";
	  $resultado2 = mysqli_query($conexion, $peticion2);
	  while($fila2 = mysqli_fetch_array($resultado2)){
		echo"<td width='10%'><div class='imagenItem'><img src='../fotos/".$fila2['imagen']."' alt=''/></div></td>";
	  }
echo"<td width='10%'>".$fila['nombre']."</td>
<td width='10%'>".$fila['ref']."</td>";
	$peticion2 = "SELECT * FROM productos LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria WHERE id_prod = ".$fila['id_prod']."";
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2)){
		
		$peticion3 = "SELECT * FROM categorias LEFT JOIN marca ON categorias.id_marca = marca.id_marca WHERE id_categoria = ".$fila['id_categoria']."";
		$resultado3 = mysqli_query($conexion, $peticion3);
		while($fila3 = mysqli_fetch_array($resultado3)){
			echo"<td width='10%'>".$fila3['nombre']."</td>";
		}
	echo"<td width='10%'>".$fila2['titulo_es']."</td>";
	} 
echo"
<td width='10%'>".$fila['valor']."</td>
<td width='3%'>".$fila['inventario']."</td>
<td width='10%'>".$estado."</td>
<td width='10%'><a href='editarprod.php?id_prod=".$fila['id_prod']."'><button>Editar</button></a></td>
<td width='10%'><a href='php/borrarproducto.php?id_prod=".$fila['id_prod']."'><button>Eliminar</button></a></td>
</tr>";

}
mysqli_close($conexion);
?>
