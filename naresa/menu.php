<div class="contMenuTrabajo">
    	
        <div class="menuTrabajo">
            <div class="tituloMenuTrabajo">
            	<h1>TRABAJOS</h1>
            </div>
            <div class="menuTrabajoItem">
            	<ul class="menuServicios">
                    <li class="servicio" id-data="">Todo</li>
                	<?php $peticion = "SELECT * FROM servicios";
                    $resultado = mysqli_query($conexion, $peticion);
              
                     while($fila = mysqli_fetch_array($resultado)){?>
                	<li class="servicio" id-data="WHERE servicio='<?php echo $fila["servicio"] ?>'"><?php echo $fila['servicio'] ?></li>
                	<?php }?>
                    
                </ul>
                <div class="pieMenuServicios">
                </div>
            </div>
        </div>
        
    </div>