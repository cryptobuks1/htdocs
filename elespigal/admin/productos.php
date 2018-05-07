<?php
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
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

<div class="barramenulista">
        <h1 class="titulomenu">Lista de Productos</h1>
        	<?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
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
        <th>POSICION</th><th>IMAGEN</th><th>NOMBRE</th><th>TITULO</th><th>DETALLE</th><th>CATEGORIA</th><th>VALOR</th><?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
<th>EDITAR</th><th>ELIMINAR</th><?php }?>
    </tr>
<?php
$peticion = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
	echo "<tr>
<td >".$fila['pos']."</td>
<td ><div class='imagenItem'><img src='../fotos/".$fila['imagen']."' alt=''/></div></td>";
	 
echo"<td >".$fila['nombre']."</td>
<td >".$fila['titulo']."</td>
<td >".$fila['detalle']."</td>";
	$peticion2 = "SELECT categoria.nombre AS nombre_cat FROM productos LEFT JOIN categoria ON productos.id_cat = categoria.id_cat WHERE id_producto = ".$fila['id_producto']."";
	$resultado2 = mysqli_query($conexion, $peticion2);
	while($fila2 = mysqli_fetch_array($resultado2)){		
	echo"<td width='10%'>".$fila2['nombre_cat']."</td>";
	}
echo"
<td >".$fila['valor']."</td>";
if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
echo"<td ><a href='editarprod.php?id_producto=".$fila['id_producto']."'><button class=''>Editar</button></a></td>
<td ><a href='php/borrarproducto.php?id_producto=".$fila['id_producto']."'><button>Eliminar</button></a></td>"; }
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
