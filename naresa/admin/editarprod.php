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
        <div class="titulo_edit_prod">
		<?php $peticion = "SELECT * FROM trabajos WHERE id_trab=".$_GET['id_trab']."";
        $resultado = mysqli_query($conexion, $peticion);
        while($fila = mysqli_fetch_array($resultado)){?>
        <h2>Producto No. <?php echo"".$fila['id_trab'].""; ?></h2> 
            <form action="php/modificarprod.php?id_trab=<?php echo"".$fila['id_trab'].""; ?>" method="post" enctype="multipart/form-data">
        	<div style="margin-left:19%" class="productoactual">
                    <a style="margin-right:12px" href="productos.php" class="botones volver_editprod">Volver</a>
                    <!--<a style="margin-right:12px" href="formulario_mas_img_detalle_prod.php?id_trab=<?php echo $_GET['id_trab']?>" class="botones">Insertar imagenes</a>-->
            </div>
		</div>
        <div class="ralla"></div>
                <div class="datosgenerales_prod_edit">
                <h4>Datos del trabajo</h4>
                    <table>
                        <tr><td><label>Nombre:</label></td><td><input type='text' name='nombre' value="<?php echo"".$fila['nombre'].""; ?>"/></td></tr>
                        <tr><td><label>Cliente:</label></td><td><input type='text' name='cliente' value="<?php echo"".$fila['cliente'].""; ?>"/></td></tr>
                        <tr><td><label>Servicios:</label></td>
                        	<td><select id="selectuser" type='text' name='servicio' class='servicio'>
                                <option><?php echo $fila['servicio']?></option>
                                <?php $peticion2 = "SELECT * FROM servicios";
                                $resultado2 = mysqli_query($conexion, $peticion2);
                                 while($fila2 = mysqli_fetch_array($resultado2)){?>
                                <option><?php echo $fila2['servicio'] ?></option>
                                <?php }?>
                   				 </select>
               				</td></tr>
                   
                        

                        <tr><td><label>Descripción:</label></td><td colspan="5"><textarea name='des' cols="80"><?php echo"".$fila['des'].""; ?></textarea></td></tr>
                        <tr><td><label>Descripción Corta:</label></td><td colspan="5"><textarea name='des_corta' cols="80"><?php echo"".$fila['des_corta'].""; ?></textarea></td></tr>
                        <tr><td><label>Detalles:</label></td><td colspan="5"><textarea name='detalle' cols="80"><?php echo"".$fila['detalle'].""; ?></textarea></td></tr>
                        <tr><td><label>Portada:</label></td>
                        	<td colspan="5">
                            	<select name='enlace' cols="80">
                                	<option><?php echo"".$fila['enlace'].""; ?></option>
                                    <option>Si</option>
                                    <option>No</option>
                                </select>
                             </td>
                        </tr>
                        <tr><td></td>
                        	<td>
                            	<img src="../fotos/<?php echo $fila['imagen']?>"/>
                            </td>
                        </tr>
                        <tr><td><label>Imagen:</label></td><td><input type='file' name='imagen' value="<?php echo"".$fila['imagen'].""; ?>"/></td></tr>
                        <tr><td><label>Descripción de la imagen:</label></td><td><input type='text' name='alt' value="<?php echo"".$fila['alt'].""; ?>"/></td></tr>
							<?php
							} ?>								
                    </table>
                            <input type="submit" id="editprod" class="botones" value="Aplicar Cambios" >
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
