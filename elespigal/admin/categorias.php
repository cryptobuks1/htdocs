<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
include "php/config.php";
 include "headeradmin.php";
?>
<div class="contnuevopro">
    <div class="seccion1 sc">	
        <div class="barramenulista">
                <h1 class="titulomenu">Categorías</h1>
            </div>
        </div>
        <div class="titulo_edit_prod">
		</div>
        <div class="ralla"></div>
        
        <div class="datosgeneralescat">
            <form action="php/modificarcat.php" method="post" enctype="multipart/form-data">
                <?php
    
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
                mysqli_set_charset($conexion, "utf8");
						$i=0;
                        $peticion2 = "SELECT * FROM categoria ORDER BY posicion DESC";
                        $resultado2 = mysqli_query($conexion, $peticion2);
						
                        echo"<table>
						<tr><td colspan=8><h2>Modificar Categorías</h2></td></tr>
                        <tr><th>ID_CAT</th><th>Nombre Categoría</th><th>Imagen</th><th>Cambiar Imagen</th><th>Posicion</th></th><th>Elimiar</th></tr>";
                        while($fila2 = mysqli_fetch_array($resultado2)){
                        echo"	
                                <tr>";
									echo" 
									<td style='width:5%';><input type='text' name='id_cat".$i."' value='".$fila2['id_cat']."'/></td>
                                                                        <td  style='width:5%';><input type='text' name='nombre".$i."' value='".$fila2['nombre']."'/></td>
									<td style='width:80%;'><input type='file' style='width:100%; font-size:12px' name='imagen[]'/><input type='hidden' name='imagen_an".$i."' value='".$fila2['imagen']."'/></td>
									
									<td style='width:5%;'><input type='text' name='clase".$i."' value='".$fila2['imagen']."'/></td>
                                                                        <td  style='width:5%';><input type='text' name='posicion".$i."' value='".$fila2['posicion']."'/></td>
                                                                        <td><a style='width:60%;' href='php/eliminarcat.php?id_cat=".$fila2['id_cat']."' class='boton'>Eliminar</a></td

                                ></tr>
                            ";
                        $i++;}
                    echo" </table>";
                 ?>
                         <input class="modcat boton" type='submit' id="mod_cat_" value='Modificar Categoría'/>
			</form>            
			<div class='formnuevacat'>
            	<h2 id="nuevacate" style="margin-left:5%;">+ Crear nueva categoría</h2>
                <div class="mensajeImagen">La imagen que debe usar para la categoria debe tener máximo 600 x 480 pixeles<br>
                    <a href="http://pixlr.com/editor/" target="_blank">Editor en linea</a></div>
                <form action="php/insertarcat.php" method="post" enctype="multipart/form-data" class="nueva_cat">
                    <table style="width:100%;" class='crearcategoria' >
                    	<tr>
                            <td><label>Nombre*</label></td><td><label>Posición*</label></td><td><label>Imagen*</label></td>
                        </tr>
                        <tr>
                            <td>
                                <input type='text' name='nombre' class="obligatorio"/>
                            </td>
                            <td>
                                <input type='text' name='posicion' class="obligatorio"/>
                            </td>
                            <td>
                                <input type="file" style="width:100%; font-size:12px" name="imagen" class="obligatorio"/>
                            </td>
                            
                        </tr>
                          <div class='btcrearcat boton'>Crear Categoría</div>
                	</table>
                    <div class='contejemplos'>
                    </div>
                </form>
                <div class="camposoblogatorios"></div>
            </div>
		</div>
	</div>
<?php
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


