	<?php
@session_start();
if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin' || $_SESSION['usuario']['p']=='empleado' || $_SESSION['usuario']['p']=='Empleado'){
 include "headeradmin.php";
 include "php/config.php";
unset($_SESSION['producto']);
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
 ?>
<script>
		function sugerirnombre(str){
			$('.renglonespro table').load('php/sugerenciaspro.php?n='+str);
		}
		function sugerirapellido(str){
			$('.renglonespro table').load('php/sugerenciaspro.php?a='+str);
		}
</script>
<div class="filtro">
    <div class="titulofiltro">
    	<h2 style="margin-right:30%;">FILTRAR PRODUCTOS</h2>
    	<h3>Ordenar por:</h3> 
        <ul>
        	<li><div class="checkordenprod"></div></li>
            <li><h3>Número</h3></li>
            <li><div class="checkordenprod"></div></li>
            <li><h3>Nombre</h3></li>
            <li><div class="checkordenprod"></div></li>
            <li><h3>Cliente</h3></li>
            <li><div class="checkordenprod"></div></li>
            <li><h3>Servicio</h3></li>
            
        </ul>
   </div>
    </div>	
</div>
<div class="barramenulista">
        <h1 class="titulomenu">Lista de Trabajos</h1>
        	<?php if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){?>
        <div class="botonesmenu">
            <a class="botonmenu" href="nuevoproducto.php">
            	<span class="ico-new"></span>
	            <h3>Añadir nuevo</h3>
            </a>
        </div>
       <?php }?>
    </div>
</div>
<div class="renglonespro">
<table cellspacing="0">
    <tr>
        <th>No.</th><th>IMAGEN</th><th>NOMBRE</th><th>CLIENTE</th><th>SERVICIO</th> <?php if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){?>
<th>EDITAR</th><th>ELIMINAR</th><?php }?>
    </tr>
<?php
$peticion = "SELECT * FROM trabajos";
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
<td width='3%'>".$fila['servicio']."</td>";
if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){
echo"<td width='10%'><a href='editarprod.php?id_trab=".$fila['id_trab']."'><button>Editar</button></a></td>
<td width='10%'><a href='php/borrarproducto.php?id_trab=".$fila['id_trab']."'><button>Eliminar</button></a></td>"; }
echo"</tr>";

}
echo"</table>
</div>";

mysqli_close($conexion);
	}else{
		echo "
			<meta http-equiv='refresh' content='0; url=index.php'>
		" ;
	}
}else{
	echo "
		<meta http-equiv='refresh' content='0; url=loguinadmin.php'>
	" ;
	
}?>
