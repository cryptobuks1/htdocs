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
            <?php $peticion = "SELECT * FROM productos WHERE id_producto=".$_GET['id_producto']."";
            $resultado = mysqli_query($conexion, $peticion);
            while($fila = mysqli_fetch_array($resultado)){?>
            <h2 style="margin-left: 500px;">Producto No. <?php echo"".$fila['id_producto'].""; ?></h2>
            <form action="php/modificarprod.php?id_producto=<?php echo"".$fila['id_producto'].""; ?>" method="post" enctype="multipart/form-data" class="nueva_cat">
                <label style="margin-left: 350px;">Nombre:*</label> <input style="font-size:16px; width: 320px; margin-top: -40px; margin-left: 480px;" type='text' name='nombre_prod' value="<?php echo"".$fila['nombre'].""; ?>" class="obligatorio input"/>
        	<label style="margin-left: 350px;">Posición:*</label> <input style="font-size:16px; width: 320px; margin-top: -40px; margin-left: 480px;" type='text' name='pos' value="<?php echo"".$fila['pos'].""; ?>" class="obligatorio input"/>
                    <a style="margin-left: 310px !important; margin-top: -80px;" href="productos.php" class="btcrearcat boton">Volver</a>
                
        <div class="ralla"></div>
            <div class="datosgenerales_prod_edit">
                <div><h4 style="margin-top: -30px; position: absolute; margin-left: 370px;">Datos del producto</h4></div>
                   <table style="margin-top: 50px; margin-left: 200px;">
                        <tr>
                            <td ><label style="margin-left: 30px;">Valor:* $US</label></td><td><input type='text' name='valor' value="<?php echo"".$fila['valor'].""; ?>" class="obligatorio input"/></td>
                        </tr>
                        <tr>
                            <td ><label style="margin-left: 30px;">Titulo:</label></td><td><input type='text' name='titulo_p' value="<?php echo"".$fila['titulo'].""; ?>" class="input"/></td>
                        </tr>
                        <tr><td><label style="margin-left: 30px;">Detalle:*</label></td><td colspan="5"><textarea name='detalle' cols="80" class="obligatorio input"><?php echo"".$fila['detalle'].""; ?></textarea></td></tr>
															
                        <tr>                           			
                            <td align="left" colspan="3">
                            	<label style="margin-left: 30px;">Categoría:*</label>
                            	<select id="" name='titulo' class="obligatorio" style="margin-left: 153px; width: 72%; margin-top: -40px;">
                                <?php $peticion2 = "SELECT categoria.nombre AS nombre_cat FROM categoria LEFT JOIN productos ON categoria.id_cat = productos.id_cat WHERE id_producto=".$_GET['id_producto']."";
                            	$resultado2 = mysqli_query($conexion, $peticion2);
                                while($fila2 = mysqli_fetch_array($resultado2)){?>

                            	<?php echo" <option> ".$fila2['nombre_cat']."</option>";
                                    $pet = "SELECT nombre FROM categoria";
                                    $res = mysqli_query($conexion, $pet);
                                    while($fil = mysqli_fetch_array($res)){
                                        echo" <option> ".$fil['nombre']."</option>";
                                    }
                                 } ?>

                            
                            </select></td>								
                        </tr>
                        <tr>
                            <td><label style="margin-left: 30px;">Imagen:</label><input type="file" style='width: 15%; font-size: 12px; position: absolute; margin-left: 153px; margin-top: -40px;' name="imagen" class="input"/></td>

                            <td style="margin-left: 225px; position: absolute; margin-top: 8px;"><?php echo $fila['imagen']?></td>
                        </tr>
                    </table>
       		</div>
                
                      <div class='btcrearcat boton' style="margin-left: 70%; margin-top: -425px;">Aplicar Cambios</div>
                </form>
    	</div>
        <div class="camposoblogatorios" id="c_prody" style="margin-left: 470px !important; margin-top: -40px !important;"></div>
        <?php } ?>
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
	
}
