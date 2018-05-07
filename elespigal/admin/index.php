<?php
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
		include"headeradmin.php";
		include "php/config.php";
		$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
		mysqli_set_charset($conexion, "utf8");?>
			<div class="cont2">
		    	<ul>
		        	<?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
	                    <a href="categorias.php#nuevacate"><div class="div_cate_in"> <li><img src="image/iconuevacategoria.png" alt=""/><p style="margin-top:7px;">Categorías</p></li><img src="image/salmon.png" style="float:right; width:50%; height:150px;" alt=""/></div></a>
	                    <a href="productos.php"><div class="div_prod_in"><li><img src="image/iconuevoproducto.png" alt=""/><p>Nuevo Producto</p></li><img src="image/prodcopia.png" style="float:right; width:50%; height:150px;" alt=""/></div></a>
	                    <a href="adicionales.php"><div class="div_ad_in"><li><img src="image/icomejorprod.png" alt=""/><p style="margin-top:1px; line-height:12px">Adicionales</p></li><img src="image/adicionales.png" style="float:right; width:50%; height:150px;" alt=""/></div></a>
	                    <a href="list_usuarios.php"><div class="div_listus_in"><li><img src="image/iconuevousuario.png" alt=""/><p>Listado Usuarios</p></li><img src="image/usuarios.png" style="float:right; width:50%; height:150px;" alt=""/></div></a>
	                    <a href="admin_slider.php"><div class="div_slider_in"><li><img src="image/iconuevousuario.png" alt=""/><p>Slider</p></li><img src="image/slider1.png" style="float:right; width:50%; height:150px;" alt=""/></div></a>
	                <?php }?>
		        	<!--<a href="estadisticas.php#mejorcliente"><li><img src="image/icomejorcliente.png" alt=""/><p style="margin-top:6px;  line-height:12px">Los mejores Clientes</p></li></a>-->
		        </ul>
		    </div>
		</body>
		</html>
		<?php 
	}else{
		echo "<meta http-equiv='refresh' content='0; url=index.php'>". $_SESSION['user']['p'];
	}
}else{
	echo "<meta http-equiv='refresh' content='0; url=loguinadmin.php'>";
}?>