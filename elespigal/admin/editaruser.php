<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
include "headeradmin.php";
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");

?>
<div class="contnuevopro">
    <div class="seccion1">	
        <div class="titulo_edit_prod">
		<?php $peticion = "SELECT * FROM usuarios WHERE id_user=".$_GET['id_user']."";
        $resultado = mysqli_query($conexion, $peticion);
        while($fila = mysqli_fetch_array($resultado)){?>
        <h2>USUARIO No. <?php echo"".$fila['id_user'].""; ?></h2> 
            <form action="php/actualizauser.php?id_user=<?php echo"".$fila['id_user'].""; ?>" method="post" >
        	<div style="margin-left:73%; margin-top:-16px;" id="volveruser" class="productoactual">
                    <a style="margin-left:30%" href="usuarios.php" >Volver</a>
            </div>
		</div>
        <div class="ralla"></div>
                <div class="datosgeneralesuser">
                <h4>Datos del usuario</h4>
                    <table cellspacing="15">
                        <tr><td><label>Nombre:</label></td><td><input type='text' name='nombre' value="<?php echo"".$fila['nombre'].""; ?>"/></td><td><label>Apellidos:</label></td><td><input type='text' name='apellidos' value="<?php echo"".$fila['apellidos'].""; ?>"/></td></tr>
                        <tr><td><label>Correo:</label></td><td><input type='text' name='mail' value="<?php echo"".$fila['mail'].""; ?>"/></td><td><label>Ruc:</label></td><td><input type='text' name='ruc' value="<?php echo"".$fila['ruc'].""; ?>"/></td></tr>
                        <tr><td><label>Privilegios:</label></td>
                        	<td><select id="selectuser" type='text' name='privilegios'>
								<option><?php echo"".$fila['privilegios'].""; ?></option>                				
                                <option>Cliente</option>
                				<option>Empleado</option>
                				<option>Admin</option>
                   				 </select>
               				</td><td><label>Dirección:</label></td><td><input type='text' name='direccion' value="<?php echo"".$fila['direccion'].""; ?>"/></td></tr>
                        <tr><td><label>Teléfono:</label></td><td><input type='text' name='telefono' value="<?php echo"".$fila['telefono'].""; ?>"/></td><td><label>País:</label></td><td><input type='text' name='pais' value="<?php echo"".$fila['pais'].""; ?>"/></td></tr>
                        <tr><td><label>Provincia:</label></td><td><input type='text' name='provincia' value="<?php echo"".$fila['provincia'].""; ?>"/></td><td><label>Ciudad:</label></td><td><input type='text' name='ciudad' value="<?php echo"".$fila['ciudad'].""; ?>"/></td></tr>
                        <tr><td><label>Resetear contraseña:</label></td><td><a id="resetearpass" data-mail="<?php echo"".$fila['mail'].""; ?>" href='php/resertpass.php?mail=<?php echo"".$fila['mail'].""; ?>'>Resetear contraseña</a></td><td colspan="2"><div class="mensajepass"></div></td></tr>
                    <tr><td colspan="4"><h4>Se enviara la nueva contraseña al E-mail registrado</h4> </td></tr>
                  	</table>
							<?php } ?>								
                    	<input type="submit" class="editaruser" id="editaruser" value="Aplicar Cambios" >
                </form>
       		</div>
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
