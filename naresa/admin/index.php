<?php
@session_start();
if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin' || $_SESSION['usuario']['p']=='empleado' || $_SESSION['usuario']['p']=='Empleado'){
include"headeradmin.php";
include "php/config.php";

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
?>
	<div class="cont2">
    	<ul>
        	<?php if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){?>
        	<a href="nuevoproducto.php"><li><img src="image/iconuevoproducto.png" alt=""/><p>Nuevo Producto</p></li></a>
			<?php }?>
        </ul>
    </div>
</body>
</html>
<?php 
	}else{
		echo "
			<meta http-equiv='refresh' content='0; url=index.php'>
		" ;
	}
}else{
	echo "
		<meta http-equiv='refresh' content='0; url=loguinadmin.php'>
	" ;
	
}
mysqli_close($conexion);
?>