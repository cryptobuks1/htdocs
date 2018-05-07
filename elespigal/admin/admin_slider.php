<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
include "php/config.php";
 include "headeradmin.php";
?>
<div class="contnuevopro">
        <div class="barramenulista">
                <h1 class="titulomenu">Slider</h1>
        </div>
        <div class="ralla"></div>
        <div class="nota" style=" margin-top:15px; wdith:90% !important;"><strong><span style="font-size:18px;">Importante!</span></strong>
        <strong>Las imagenes usadas en los slider versión escritorio deben tener estas dimensiones: </strong> 1366 x 445 pixeles. <br>Las imagenes usadas en los slider versión móvil deben tener estas dimensiones: </strong> 768 x 529 pixeles.  <br>Para editar sus imagenes en linea <a href="http://pixlr.com/editor/" target="_blank"><strong>AQUI</strong></a>
        </div>
        <div class="datosgeneralesslider">
            <form action="php/modificarslider.php" method="post" enctype="multipart/form-data">
                <?php
    
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
                mysqli_set_charset($conexion, "utf8");
						$i=0;
                        $peticion2 = "SELECT * FROM slider";
                        $resultado2 = mysqli_query($conexion, $peticion2);
						
                        echo"<table>
						<tr><td colspan=8><h2>Modificar slider</h2></td></tr>
                        <tr><th>Imagen</th><th>Imagen Actual</th><th>Tipo slider</th><th>Elimiar</th></tr>";
                        while($fila2 = mysqli_fetch_array($resultado2)){
                        echo"	
                                <tr>";
								echo"<td style='width:60%;'>
										<input type='hidden' name='id_slider".$i."' value='".$fila2['id_slider']."'/>
										<input type='file' style='width:100%; font-size:12px' name='imagen[]'/>
									</td>
									<td style='width:35%';>
										<label>".$fila2['imagen']."</label>
									</td>
                                    <td style='width:35%';>
                                        <label>".$fila2['tipo']."</label>
                                    </td>
									
                                                                        <td style='width:15%;'>
										<a style='width:100%;' href='php/eliminarslider.php?id_slider=".$fila2['id_slider']."'>Eliminar</a>
									</td
                                ></tr>
                            ";
                        $i++;}
                    echo" </table>";
?>
				<input class="modcat boton" type='submit' value='Modificar Slider'/>
			</form>            
		</div>
        <div class="new_slider">
            <h2 id="nuevacate" style="margin-left:25px;">+ Crear nuevo slider</h2>

                <form action="php/insertarslider.php" method="post" enctype="multipart/form-data">
                <table class='crearslider'>
                    <tr>
                        <td><label>Imagen</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input type='file' name='imagen'/>
                        </td>
                         <td>
                            <select  name='tipo'/>
                                <option>desktop</option>
                                <option>movil</option>
                            </select>
                        </td>
                        
                    </tr>
                        <input class='btcrearcat sld boton' type='submit' value='Crear slider'/>
                </table>

          </form>
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


