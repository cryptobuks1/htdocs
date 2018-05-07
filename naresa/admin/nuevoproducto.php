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
        <div class="titulocreacionprod"> <h4>Información global del producto</h4>            
        	<div style="margin-left:25%; overflow:visible" class="productoactual">
                    <a href="productos.php"><input style="margin-left:150%;" type="submit" id="insertpro" class="botones" value="Cancelar"/></a>
            </div>
		</div>
        	<div class="ralla"></div>
            <form action="php/insertarprod.php" class="formnuevoprod" method="post" >
            <div class="datosgeneralesprod">
               	<table>
                <tr><td><label>Nombre</label></td><td><input type='text' name='nombre' placeholder='Nombre del producto'/></td></tr>
                <tr><td><label>Cliente</label></td><td><input type='text' name='cliente' placeholder='Nombre del cliente'/></td></tr>
                <tr><td><label>Descripcion Corta</label></td><td><textarea name='des_corta' cols="80" placeholder='Descripción corta'/></textarea></td></tr>
                <tr><td><label>Descripción</label></td><td><textarea name='des' cols="80" placeholder='Descripción'/></textarea></td>
                <tr><td><label>Servicio</label></td><td><select type="text" name='servicio'  class='servicio'>
                	<option>Seleccione un servicio</option>
                	
                 <?php $peticion2 = "SELECT * FROM servicios";
                  $resultado2 = mysqli_query($conexion, $peticion2);
                  while($fila2 = mysqli_fetch_array($resultado2)){?>
                  <option><?php echo $fila2['servicio'] ?></option>
                  <?php }?>
                </select></td></tr>
                <tr><td><label>Detalles</label></td><td><input type='text' name='detalles' placeholder='Detalles'/></td></tr>
                <tr><td><label>Portada</label></td><td><select type="text" name='enlace' >
                	<option>No</option>
                	<option>Si</option>
                </select></td></tr>
                </table>
            </div>
				<input type="submit" id="crearprod1" class="botones" value="Crear Trabajo"/>
            </form>
			<?php }else{?>
	  <?php $peticion = "SELECT * FROM trabajos WHERE id_trab=".$_SESSION['producto']['id']."";
      $resultado = mysqli_query($conexion, $peticion);
      while($fila = mysqli_fetch_array($resultado)){?>
        <div class="titulocreacionprod"> <h2 class="tituloprodpre"><?php echo"".$fila['nombre']."";?></h2> </br><h4>Producto No. <?php echo"".$_SESSION['producto']['id']."";?> </h4>            
        <a href="productos.php"><input  type="submit" id="cerrarprodpre" class="botones" value="Cerrar Trabajo"/></a>
        </div>
            
        	<div class="ralla"></div>
                    <div class="contprodcrear">
							<?php } ?>								
                            <table cellspacing="0" class="contpreprod">
                                <h3 style="line-height:15px;">Datos del Trabajo</h3>
								<?php $peticion = "SELECT * FROM trabajos WHERE id_trab=".$_SESSION['producto']['id']."";
                                $resultado = mysqli_query($conexion, $peticion);
                                while($fila = mysqli_fetch_array($resultado)){?>
								<tr><td>Nombre:   <?php echo"".$fila['nombre'].""; ?> </td><td>Cliente:  <?php echo"".$fila['cliente'].""; ?></td></tr>
                            	<tr><td>Servicio:  <?php echo"".$fila['servicio'].""; ?></td><td>Descripción corta: <?php echo"".$fila['des_corta'].""; ?></td></tr>
                            	<tr><td>Enlace: <?php echo"".$fila['enlace'].""; ?></td></tr>
                            	<tr><td colspan="2">Descripción:  <?php echo"".$fila['des'].""; ?></td></tr>
                            	<tr><td colspan="2">Detalles:  <?php echo"".$fila['detalle'].""; ?></td></tr>
								<?php } ?>								
                            </table>
					</div>

                          <div class="subirimgprod">
                          <h1 class="paso2">Paso 2 >> ingrese imagen del trabajo</h1>
                          <div class="nota"><strong><span style="font-size:18px">Importante!</span></strong>
                          <strong>Las imagenes que son usadas para la creación del trabajo deben tener las siguientes dimensiones:</strong></br>Máximo 800 x 531 pixeles y proporcional para otros tamaños, resolución 72 , para editar sus imagenes en linea <a href="http://pixlr.com/editor/" target="_blank">AQUI</a>
                          </div>
                              <div class="seccionimagen">
                                  <h4>Seleccione una imagen para el trabajo</h4>
                              </div>
                              <form action="php/insertarImagen.php" method="post" enctype="multipart/form-data">
                              <table>
                                  <tr><td><label>Imagen</label></td><td colspan="3"><input type='file' name='imagen' placeholder='Ingrese una imagen'/></td></tr>
                                  <tr class="primeraimg"><td><label>Descripción</label></td><td><input type="text" name="alt"  placeholder='Descripción imagen'/></td></tr>
                              </table>
                              <input type="submit" id="grabarimagen" class="botones" value="Grabar Imagen"/>
                          </div>
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
		<meta http-equiv='refresh' content='0.001; url=loguinadmin.php'>
	" ;
	
}?>
