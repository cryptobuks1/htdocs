<?php 
 include "config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$nombre[]=$fila['nombre'];
			$apellidos[]=$fila['apellidos'];
			$ruc[]=$fila['ruc'];
			$mail[]=$fila['mail'];
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

if(isset($_GET["m"])){
	$m=$_GET["m"];
	if (strlen($m) > 0){
		$hint="";
		for($i=0; $i<count($mail); $i++){
		  	$comparar = strtolower(substr($mail[$i],0,strlen($m)));
		  	if (strtolower($m)==$comparar){
					$hint="mail In ('".$mail[$i]."') ORDER BY mail ASC";
			}
		}
	}else{
		$hint = "";
	}
}

if(isset($_GET["r"])){
	$r=$_GET["r"];
	if (strlen($r) > 0){
		$hint="";
		for($i=0; $i<count($ruc); $i++){
		  	$comparar = strtolower(substr($ruc[$i],0,strlen($r)));
		  	if (strtolower($r)==$comparar){
					$hint="ruc In ('".$ruc[$i]."') ORDER BY ruc ASC";
			}
		}
	}else{
		$hint = "";
	}
}


if(isset($_GET["p"])){
	$p=$_GET["p"];
	$hint="pais = '".$p."' ORDER BY nombre ASC";
}
if(isset($_GET["c"])){
	$c=$_GET["c"];
	$hint="ciudad = '".$c."' ORDER BY nombre ASC";
}
if(isset($_GET["t"])){
	$t=$_GET["t"];
	$hint="privilegios = '".$t."' ORDER BY nombre ASC";
}

if(isset($_GET["ca"])){
	$orden=$_GET["ca"];
	switch($orden){
		case 0:$ordenpor = "ORDER BY nombre DESC";break;
		case 2:$ordenpor = "ORDER BY apellidos ASC"; break;
		case 4:$ordenpor = "ORDER BY ruc ASC"; break;
		case 6:$ordenpor = "ORDER BY privilegios ASC"; break;
	}
$hint="";
}

if($hint==""){
		echo" 
        <tr>
        <th>No.</th><th>NOMBRE</th><th>APELLIDOS</th><th>CORREO</th><th>RUC</th><th>TIPO USER</th><th>DIRECCION</th><th>TELEFONO</th><th>PAIS</th><th>CIUDAD-PROVINCIA</th><th>EDITAR</th><th>ELIMINAR</th>
    </tr>
";
		
		?>
		<?php
		$peticion = "SELECT * FROM usuarios ".$ordenpor."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$tipo = $fila['privilegios'];
	echo "<tr";
	
	switch($tipo){
		case 'Cliente':echo " style='background:#ccddff'"; break;
		case 'Empleado':echo " style='background:#EAEAEA'"; break;
		case 'Admin':echo " style='background:#784eff; color:#fff'";break;
		case 'cliente':echo " style='background:#ccddff'"; break;
		case 'empleado':echo " style='background:#EAEAEA'"; break;
		case 'admin':echo " style='background:#784eff; color:#fff'";break;
		case 'CLIENTE':echo " style='background:#ccddff'"; break;
		case 'EMPLEADO':echo " style='background:#EAEAEA'"; break;
		case 'ADMIN':echo " style='background:#784eff; color:#fff'";break;
	}
echo ">
<td width='2%'>".$fila['id_user']."</td>
";
echo"<td width='8%'>".$fila['nombre']."</td>
<td width='8%'>".$fila['apellidos']."</td>
<td width='23%'>".$fila['mail']."</td>
<td width='8%'>".$fila['ruc']."</td>
<td width='3%'>".$fila['privilegios']."</td>
<td width='8%'>".$fila['direccion']."</td>
<td width='8%'>".$fila['telefono']."</td>
<td width='8%'>".$fila['pais']."</td>
<td width='8%'>".$fila['ciudad']." - ".$fila['provincia']."</td>
<td width='8%'><a href='editaruser.php?id_user=".$fila['id_user']."'><button>Editar</button></a></td>
<td width='8%'><a href='php/borraruser.php?id_user=".$fila['id_user']."'><button>Eliminar</button></a></td>
</tr>";
			
			}
}else{
  $response=$hint;
}
echo"   
     <tr>
        <th>No.</th><th>NOMBRE</th><th>APELLIDOS</th><th>CORREO</th><th>RUC</th><th>TIPO USER</th><th>DIRECCION</th><th>TELEFONO</th><th>PAIS</th><th>CIUDAD-PROVINCIA</th><th>EDITAR</th><th>ELIMINAR</th>
    </tr>
";
$peticion = "SELECT * FROM usuarios WHERE ".$response."";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$tipo = $fila['privilegios'];
	echo "<tr";
	
	switch($tipo){
		case 'Cliente':echo " style='background:#ccddff'"; break;
		case 'Empleado':echo " style='background:#EAEAEA'"; break;
		case 'Admin':echo " style='background:#784eff; color:#fff'";break;
		case 'cliente':echo " style='background:#ccddff'"; break;
		case 'empleado':echo " style='background:#EAEAEA'"; break;
		case 'admin':echo " style='background:#784eff; color:#fff'";break;
		case 'CLIENTE':echo " style='background:#ccddff'"; break;
		case 'EMPLEADO':echo " style='background:#EAEAEA'"; break;
		case 'ADMIN':echo " style='background:#784eff; color:#fff'";break;
	}
echo ">
<td width='2%'>".$fila['id_user']."</td>
";
echo"<td width='8%'>".$fila['nombre']."</td>
<td width='8%'>".$fila['apellidos']."</td>
<td width='23%'>".$fila['mail']."</td>
<td width='8%'>".$fila['ruc']."</td>
<td width='3%'>".$fila['privilegios']."</td>
<td width='8%'>".$fila['direccion']."</td>
<td width='8%'>".$fila['telefono']."</td>
<td width='8%'>".$fila['pais']."</td>
<td width='8%'>".$fila['ciudad']." - ".$fila['provincia']."</td>
<td width='8%'><a href='editaruser.php?id_user=".$fila['id_user']."'><button>Editar</button></a></td>
<td width='8%'><a href='php/borraruser.php?id_user=".$fila['id_user']."'><button>Eliminar</button></a></td>
</tr>";

}
mysqli_close($conexion);
?>
