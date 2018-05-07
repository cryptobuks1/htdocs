<?php 
@session_start();
if(isset($_SESSION['user']) && $_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
include "headeradmin.php";
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM productos WHERE id_prod=".$_GET['id_prod']."";
$resultado = mysqli_query($conexion, $peticion);
?>
<div class="contnuevopro">
    <div class="seccion1">	
        <div class="titulocreacionprod"> <h4>INGRESE OTRA IMAGEN, </br>TALLA O COLOR AL PRODUCTO - 
		<span> <?php while($fila = mysqli_fetch_array($resultado)){echo $fila['nombre'];}?></span></h4>            
        	<div class="productoactual">
                    <a href="editarprod.php?id_prod=<?php echo $_GET['id_prod']?>"><input  type="submit" id="insertcar" value="volver"/></a>
            </div>
		</div>
            <div class="imgingreso">
            	<h3>Imagenes del producto</h3>
				<?php 
				$peticion = "SELECT * FROM imgproducto WHERE  id_prod=".$_GET['id_prod']." ORDER BY posicion";
				$resultado = mysqli_query($conexion, $peticion);
				echo"<table><tr>";
				while($fila = mysqli_fetch_array($resultado)){
					echo" <td align='center'><img src='../fotos/".$fila['imagen']."'/><p>Posición: ".$fila['posicion']."</p></td>";
				
				}echo"</tr></table> ";?>            
             </div>
        	<div class="ralla"></div>
            <div class="subirimgprod">
                <div class="seccionimagen">
                    <h4>Añadir imagenes</h4>
                    <div class="nota"><strong><span style="font-size:18px">Importante!</span></strong>
                    <strong>Las imagenes que son usadas para la creación del producto no deben tener más 800 KB.</strong></br>Si desea editar la imagen <a href="http://pixlr.com/editor/" target="_blank">PULSE AQUI</a></div>
                    <p>La posición 1 es la imagen de portada del producto</p>
                </div>
            <form action="php/anadir_img_detalle_prod.php?id_prod=<?php echo"".$_GET['id_prod']."";?>" class="formnuevoprod" method="post" enctype="multipart/form-data">
               	<table>
                    <tr><td><label>Imagen</label></td><td colspan="3"><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Posición</label></td><td><input  style="width:20px" type="text" name="posicion[]" /></td><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td colspan="3"><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Posición</label></td><td><input  style="width:20px" type="text" name="posicion[]" /></td><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Imagen</label></td><td colspan="3"><input type='file' name='imagen[]' placeholder='Ingrese una imagen'/></td></tr>
                    <tr class="primeraimg"><td><label>Posición</label></td><td><input  style="width:20px" type="text" name="posicion[]" /></td><td><label>Descripción</label></td><td><input type="text" name="alt[]"  placeholder='Descripción imagen'/></td></tr>
                </table>
                    <div class="nuevaimg"><div class="masimg">Añadir</div><label>Añadir <input  type='text' value="2"  placeholder="No."/> imagenes más</label></div>
            </div>
            <div class="detallesproducto">
                <!--<div class="secciontalla">
                    <h4>Añadir características</h4>
                </div>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>
               	<table>
                    <tr><td><label>Talla</label></td><td><input style="width:40px" type='text' name='tallas[]' placeholder='Talla'/></td><td><label>Color</label></td><td><input type="text" name="colores[]"  placeholder='Color producto'/></td></tr>
                </table>-->
                   <input type="submit" id="crearprod" value="Enviar" />
            </div>
            </form>
	</div>
</div>
<?php }else{
	echo "
		<meta http-equiv='refresh' content='5; url=loguinadmin.php'>
	" ;
	
}?>