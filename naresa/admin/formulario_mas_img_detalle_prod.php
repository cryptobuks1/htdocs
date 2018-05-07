<?php 
@session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin' || $_SESSION['usuario']['p']=='empleado' || $_SESSION['usuario']['p']=='Empleado'){
include "headeradmin.php";
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM trabajos WHERE id_trab=".$_GET['id_trab']."";
$resultado = mysqli_query($conexion, $peticion);
?>
<div class="contnuevopro">
    <div class="seccion1">	
        <div class="titulocreacionimg"> <h4>INGRESE IMAGENES 
		<span> <?php while($fila = mysqli_fetch_array($resultado)){echo $fila['nombre'];}?></span></h4>            
        	<div class="productoactual">
                    <a href="editarprod.php?id_trab=<?php echo $_GET['id_trab']?>"><input  type="submit" id="insertcar" value="volver"/></a>
            </div>
		</div>
            <div class="imgingreso">
            	<h3>Imagenes del producto</h3>
				<?php 
				$peticion = "SELECT * FROM imgtrabajo WHERE  id_trab=".$_GET['id_trab']."";
				$resultado = mysqli_query($conexion, $peticion);
				echo"<table><tr>";
				while($fila = mysqli_fetch_array($resultado)){
					echo" <td align='center'><img src='../fotos/".$fila['imagen']."'/></td>";
				
				}echo"</tr></table> ";?>            
             </div>
        	<div class="ralla"></div>
            <div class="subirimgprod">
                <div class="seccionimagen">
                    <h4>Añadir imagenes</h4>
                    <div class="nota"><strong><span style="font-size:18px">Importante!</span></strong>
                    <strong>Las imagenes que son usadas para la creación del producto deben tener las siguientes dimensiones:</strong></br>Portada o 1ra posición 210 x 300 pixeles, las otras imagenes 600 x 900 pixeles, resolucion 72, para editar sus imagenes en linea <a href="http://pixlr.com/editor/" target="_blank">AQUI</a></div>
                </div>
            <form action="php/anadir_img_detalle_prod.php?id_trab=<?php echo"".$_GET['id_trab']."";?>" class="formnuevoprod" method="post" enctype="multipart/form-data">
               	<table>
                    <tr><td><label>Imagen</label></td><td><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
                   <input type="submit" id="crearimg" value="Enviar" />
            </div>
            </form>
	</div>
</div>
<?php }else{
	echo "
		<meta http-equiv='refresh' content='0.001; url=loguinadmin.php'>
	" ;
	
}?>