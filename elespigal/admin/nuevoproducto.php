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
        <div class="titulocreacionprod"> <h4>Información global del producto</h4>            
        	<div style="margin-left:25%; overflow:visible" class="productoactual">
                    <a href="productos.php"><input style="margin-left: 26%; position: absolute; margin-top: -12px;" type="submit" id="insertpro" value="Cancelar" class="boton" /></a>
            </div>
		</div>
        	<div class="ralla"></div>
            <form action="php/insertarprod.php" class="formnuevoprod nueva_cat" method="post" enctype="multipart/form-data">
            <div class="datosgeneralesprod">
               	<table>
                        <tr><td><label>Nombre*</label></td><td><input type='text' name='nombre' placeholder='Nombre del producto' class="obligatorio input"/></td></tr>
                        <tr><td><label>Posición</label></td><td><input type='text' name='pos' placeholder='Orden del producto en el menú' class="input"/></td></tr>
                        <tr>
                                    <td>
                                        <label>Categoría*</label></td>
                                    <td colspan="3"> <select id="" name='titulo'  style="margin-left: 0px; width: 104%;" class="obligatorio">
                                        <?php
                                            $pet = "SELECT nombre FROM categoria";
                                            $res = mysqli_query($conexion, $pet);
                                            while($fil = mysqli_fetch_array($res)){
                                                echo" <option> ".$fil['nombre']."</option>";
                                            }
                                         } ?>
                                    </select></td>
                                </tr>
                        <tr><td><label>Titulo</label></td><td><textarea name='titulo_p' cols="80" placeholder='Descripción corta' class="input"></textarea></td></tr>
                        <tr><td><label>Detalle*</label></td><td><textarea name='detalle' cols="80" placeholder='Descripción' class="obligatorio input"></textarea></td></tr>
                        <tr><td><label>Valor*</label></td><td><input type='text' name='valor' placeholder='Valor producto' class="obligatorio input"/></td></tr>
                        <tr><td colspan="2"><div class="mensajeImagen">La imagen que debe usar para los productoss debe tener máximo 400 x 213 pixeles<br>
                        <a href="http://pixlr.com/editor/" target="_blank">Editor en linea</a></div></td></tr>
                         <tr><td><label>Imagen*</label></td><td><input type="file" style="width:100%; font-size:12px" name="imagen" class="obligatorio input"/></td></tr>
                         <tr><td></td><td><div class='btcrearcat boton' id="id_crear_produ">Crear Producto</div></td></tr>
                </table>
            </div>
                <div class="camposoblogatorios" id="c_prod"></div>
            </form>
      <?php }?>

