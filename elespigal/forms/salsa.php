<div class="item-info">
    <h4 class="red bold">Elige Salsa</h4>
    <p>Selecciona cuantos quieras</p>
    <div class="error-msg"></div>
</div>
<div class="item-group" data-id="53339" data-name="Elige vegetales" data-min="0" data-max="8" data-multiple="1">
    <form name="adicionales">
        <?php
        $conslid = "SELECT * FROM adicional_producto WHERE id_producto = ".$fila['id_producto']."";
        $resI = mysqli_query($conexion, $conslid);
        while($col = mysqli_fetch_array($resI)){
            $peticion1 = "SELECT * FROM adicionales WHERE id_adicional=".$col['id_adicional']." AND  grupo = '".$filaG['grupo']."'";
            $resultado1 = mysqli_query($conexion, $peticion1);?>
           <?php while($fila1 = mysqli_fetch_array($resultado1)){?>
            <label>
                <input data-price="0.00" data-discount="undefined" data-price-type="total" data-name="Pepinillos" name="salsa" id="196530" class="salsa" type="checkbox" value="<?php echo $fila['id_adicional']?>">
                    <span><?php echo $fila1['nombre'] ?></span>
                    <span class="min-text"> + <span class="dinero"> $0</span></span>
            </label>
            <?php }?>
       <?php }?>
    </form>
</div>

