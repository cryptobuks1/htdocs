<div class="cont-adi ">
    <div class="item-info ">
        <h4 class="red bold">Hazlo Combo <font>(Opcional)</font></h4>

        <div class="error-msg"></div>
    </div>
    <div class="item-group <?php echo $filaG['grupo'] ?>" data-idgroup="2" data-nameg="Combos" data-group="<?php echo $filaG['grupo'] ?>">
        <form name="adicionales">
            <?php
            $conslid = "SELECT * FROM adicional_producto WHERE id_producto = ".$fila['id_producto']."";
            $resI = mysqli_query($conexion, $conslid);
            while($col = mysqli_fetch_array($resI)){
                $peticion1 = "SELECT * FROM adicionales WHERE id_adicional=".$col['id_adicional']." AND  grupo = '".$filaG['grupo']."'";
                $resultado1 = mysqli_query($conexion, $peticion1);?>
               <?php while($fila1 = mysqli_fetch_array($resultado1)){?>
                <label class="addi">
                    <input data-grupo="<?php echo $filaG['grupo'] ?>" data-id="<?php echo $fila1['id_adicional'] ?>" data-form="<?php echo $filaG['grupo'] ?>" data-group="Combo" data-price="<?php echo $fila1['valor'] ?>"  data-name="<?php echo $fila1['nombre'] ?>" name="adicional" id="196530" class="itemAddi combo" type="checkbox" value="<?php echo $col['id_adicional']?>">
                    <!--<input type="number" min="0" class="cant-adicional <?php echo $fila1['nombre'] ?>" value="0" data-name="<?php echo $fila1['nombre'] ?>">-->
                    <!--<div class="img-ad"><img src="fotos/<?php echo $fila1['imagen'] ?>"></div>-->
                    <span><?php echo $fila1['nombre'] ?></span>
                    
                    <span class="dinero" data-precio="">+ $<?php echo $fila1['valor'] ?></span>
                </label>
                <?php }?>
           <?php }?>
           <label class="addi">
                <input class="no" data-group="<?php echo $filaG['grupo'] ?>" type="checkbox" checked>            <!--<input type="number" min="0" class="cant-adicional <?php echo $fila1['nombre'] ?>" value="0" data-name="<?php echo $fila1['nombre'] ?>">-->
                <!--<div class="img-ad"><img src="fotos/<?php echo $fila1['imagen'] ?>"></div>-->
                <span>No</span>
                
            </label>
        </form>
    </div>
</div>
				
					

