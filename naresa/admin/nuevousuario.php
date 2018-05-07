<?php 
@session_start();
if(isset($_SESSION['usuario'])){
	if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){
	include "headeradmin.php";
	include "php/config.php";
	$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
	mysqli_set_charset($conexion, "utf8");
	
	?>
	<div class="contnuevopro">
		<div class="seccion1">	
	<?php if(!isset($_SESSION['producto'])){?>
			<div class="titulocreacionprod"> <h4>Datos del usuario</h4>            
				<div style="margin-left:25%" class="productoactual">
						<a href="usuarios.php"><input style="margin-left:60%;" type="submit" id="insertpro" value="Cancelar"/></a>
				</div>
			</div>
				<div class="ralla"></div>
                    <ul class="mailinvalido">
                    <h5 class="mensmailin"></h5>
                    <h6 class="pink"></h6>
                    </ul>
				<div class="datosgeneralesuser">
                    <form action="php/insertaruser.php" method="post">
					<table>
					<tr><td><label>Nombre:</label></td><td><input type='text' name='nombre' placeholder='Nombre'/></td></tr>
					<tr><td><label>Apellidos:</label></td><td><input type='text' name='apellidos' placeholder='Apellidos'/></td></tr>
					<tr><td><label>Correo:</label></td><td><input type='text' name='mail' placeholder='Correo electrónico'/></td></tr>
					<tr><td><label>Confirmar Correo:</label></td><td><input type='text' name='remail' placeholder='Nuevamente el correo'/></td></tr>
					<tr><td><label>Ruc/C.C.:</label></td><td><input type='text' name='ruc' placeholder='Ingrese Ruc o C.C.'/></td></tr>
					<tr><td><label>Privilegios:</label></td>
						<td>
							<select type='text' name='privilegios'>
								<option>Cliente</option>
								<option>Empleado</option>
								<option>Admin</option>
							</select>
						</td></tr>
					<tr><td><label>Dirección:</label></td><td><input type='text' name='direccion' placeholder='Dirección'/></td></tr>
					<tr><td><label>Teléfono:</label></td><td><input type='text' name='telefono' placeholder='Teléfono'/></td></tr>
					<tr><td><label>País:</label></td><td><input type='text' name='pais' placeholder='País'/></td></tr>
					<tr><td><label>Provincia:</label></td><td><input type='text' name='provincia' placeholder='Provincia'/></td></tr>
					<tr><td><label>Ciudad:</label></td><td><input type='text' name='ciudad' placeholder='Ciudad'/></td></tr>
					<tr><td colspan="2"><input type="submit" id="crearuser" value="Crear usuario" ></td></tr>
				   </table>
					<div class="infocrearuser">
						<p><em><strong>El password del usuario se creará automaticamente de forma aleatoria y se enviara a el correo registrado.</strong></em></p>
						<p><strong><em>Los privilejios son los siguientes:</em></strong></br><strong>Cliente:</strong> Tiene acceso a la tienda, puede realizar compras, pero no tiene acceso a el panel de administración.<br><strong>Empleado:</strong> Tiene acceso a la tienda, puede comprar, tiene acceso a el panel de administración, pero solo puede visualizar los registros, no los puede modificar, crear o eliminar.<br><strong>Admin:</strong> Tiene acceso a la tieneda, puede comprar, tiene acceso al panel de administración, puede visualizar, crear, modificar y elimanar los registros. Tiene control total.</p>
					</div>
				</div>
		  <?php }else{?>
		<?php }?>
		</div>
	</div>
    
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
	
}?>
