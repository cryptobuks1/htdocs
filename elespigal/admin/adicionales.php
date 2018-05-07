<?php
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
 include "headeradmin.php";
 include "php/config.php";

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
?>
<meta charset="utf-8">
<div class="contnuevoad">
    <div class="seccion2">
        <div class="titulo_edit_prod">
        <h2>ADICIONALES</h2>
        	<div style="margin-left:73%" class="productoactual">
                    <a style="margin-left:0" href="index.php" id="volver_est" class="boton" >Volver</a>
            </div>
		</div>
        <div class="datosgeneralesad">

            <form action="php/modificarad.php" method="post" enctype="multipart/form-data">
                <?php
                
                $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
                mysqli_set_charset($conexion, "utf8");
						$i=0;
                        $peticion2 = "SELECT * FROM adicionales";
                        $resultado2 = mysqli_query($conexion, $peticion2);

                        echo"<table>
						<tr><td colspan=8><h2>Modificar Adicionales</h2></td></tr>
                        <tr><th style='width:10px'>ID_ADICIONAL</th><th>NOMBRE</th><th>VALOR</th><th>GURPO</th></th><th>Elimiar</th></tr>";
                        while($fila2 = mysqli_fetch_array($resultado2)){
                        echo"
                                <tr>";
                                        echo"
                                        <td style='width:5%';><input type='text' name='id_adicional".$i."' value='".$fila2['id_adicional']."'/></td>
                                        <td  style='width:5%';><input type='text' name='nombre".$i."' value='".$fila2['nombre']."'/></td>
                                        <td  style='width:5%';><input type='text' name='valor".$i."' value='".$fila2['valor']."'/></td>
                                       
                                        <td >
                                         <select name='grupo' class='obligatorio'>
                                            <option value='".$fila2['grupo']."'> ".$fila2['grupo']."</option>";
                                            $peticion3 = "SELECT * FROM adicionales GROUP BY grupo";
                                            $resultado3 = mysqli_query($conexion, $peticion3);
                                            while($fila3 = mysqli_fetch_array($resultado3)){
                                                echo "<option value='".$fila3['grupo']."'>".$fila3['grupo']."</option>";
                                            }
                                        echo "</select>
                                        

                                        </td>
                                       
                                        <td><a style='width:60%;' href='php/eliminarad.php?id_adicional=".$fila2['id_adicional']."'class='boton'>Eliminar</a></td>
                                </tr>
                            ";
                        $i++;}
                    echo" </table>";
?>
				<input class="modcat boton" type='submit' value='Modificar Adicional'/>
			</form>
			<div class='formnuevacat'>
            	<h2 id="nuevacate" style="margin-left:5%;">+ Crear nuevo adicional</h2>
                <form action="php/insertarad.php" method="post" enctype="multipart/form-data" class="nueva_cat">
                    <table style="width:100%;" class='crearcategoria' >
                        <tr>
                            <td><label>Nombre*</label></td><td><label>Valor*</label></td><td><label>Grupo*</label></td>
                        </tr>
                        <tr>
                            <td style="width:10px">
                                <input type='text' name='nombre' class="obligatorio"/>
                            </td>
                            <td>
                                <input type='text' name='valor' class="obligatorio"/>
                            </td>
                           
                            <td>
                                <select name='grupo' class="obligatorio">
                                    <option value="adicional">Adicional</option>
                                    <option value="combos">Combos</option>
                                    <option value="zbebidas">Bebidas</option>
                                    <option value="sabores">Sabores</option>
                                </select>
                            </td>
                            
                        </tr>
                          <div class='btcrearcat boton'>Crear Adicional</div>
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


