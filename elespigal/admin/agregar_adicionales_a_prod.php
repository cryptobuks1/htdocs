<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
include "headeradmin.php";
include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
//$id_producto=$_POST['id_producto'];
?>

<div class="contnuevopro">
    
    <div class="seccion1">	
        
        <div class="titulocreacionprod" style="height:auto"> <h4>ADICIONALES</h4>
            
        	<div style="margin-left:25%; overflow:visible" class="productoactual">
                    <a href="productos.php"><input style="margin-left:320%;" type="submit" id="insertpro" class="boton" value="Cancelar"/></a>
             <div class="subirimgprod">
                <div class="seccionimagen">
                    <form class="" method="POST" action="php/adicionar_adicional_producto.php?id_producto=<?php echo $_GET['id_producto'] ?>">
                            <?php

                        $conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);;
                        mysqli_set_charset($conexion, "utf8");
                                                        $i=0;
                                $peticion2 = "SELECT * FROM adicionales GROUP BY grupo";
                                $resultado2 = mysqli_query($conexion, $peticion2);
                
                                while($fila2 = mysqli_fetch_array($resultado2)){
                                echo"<div class='grupo_adicional'>";
                                    echo $fila2['grupo'];
                                    echo"<div class='adicionales_por_grupo' style='margin-left: 20px;'>";
                                         $peti = "SELECT * FROM adicionales WHERE grupo='".$fila2['grupo']."'";
                                         $resu = mysqli_query($conexion, $peti);
                                         while($fil = mysqli_fetch_array($resu)){
                                         $p = "SELECT * FROM adicional_producto WHERE id_producto='".$_GET['id_producto']."' AND id_adicional = '".$fil['id_adicional']."'";
                                         $r = mysqli_query($conexion, $p);
                                         $f = mysqli_fetch_array($r);
                                         if($f['id_adicional']==$fil['id_adicional'])
                                         {?>
                                            <div><input type="checkbox" name="opcion[]" value="<?php echo $fil['id_adicional']?>" checked /><label><?php echo $fil['nombre']?></label></div>
                                   <?php }else{ ?>
                                   <div><input type="checkbox" name="opcion[]" value="<?php echo $fil['id_adicional']?>"/><label><?php echo $fil['nombre']?></label></div>
                                   <?php }}
                                    echo"</div>";
                               echo" </div>";
                                $i++;}
                            
                            ?>

                            <input style="margin-left:200px; margin-top:-586px;" type="submit" class='btcrearcate btn_crear_pro_sin_adi boton' id="btn_crear_pro_sin_adi" value="Agregar Adicionales">
                       </form>
                    </div>
             </div>
	</div>
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
		<meta http-equiv='refresh' content='0.001; url=loguinadmin.php'>
	" ;
	
}?>
