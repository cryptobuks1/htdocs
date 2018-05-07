<?php
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
 include "headeradmin.php";
 include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
 ?>
<script>
		function sugerirnombre(str){
			$('.renglonesp table').load('php/sugerencias.php?n='+str);
		}
		function sugerirapellido(str){
			$('.renglonesp table').load('php/sugerencias.php?a='+str);
		}
</script>
<div class="filtro">
    <div class="titulofiltro">
    	<h2>FILTRAR PEDIDOS</h2>
        <img class="imagenfiltro" src="image/selectfiltro.png"/>
    	<h3>Ordenar por:</h3> 
        <ul>
        	<li><div class="checkorden"></div></li>
            <li><h3>Fecha</h3></li>
            <li><div class="checkorden"></div></li>
            <li><h3>Nombre</h3></li>
            <li><div class="checkorden"></div></li>
            <li><h3>Valor</h3></li>
            <li><div class="checkorden"></div></li>
            <li><h3>Estado</h3></li>
        </ul>
        <img class="cerrarfiltro" src="image/cerrarfiltro.png"/>
   </div>
        <div class="contfiltros">
            <div class="filtroporcliente">
                <div class="colorTallaCont">
                    <h2>Por Cliente</h2>
                    <div class="filtronombre" id="filtronombre">
                        <h3>Nombre</h3>
                        <input id="cliente" placeholder="Nombre Cliente" onKeyUp="sugerirnombre(this.value)">
                        <ul class="sug">
                        </ul>
                    </div>	
                    <div class="filtronombre">
                        <h3>Apellido</h3>
                        <input id="cliente" placeholder="Apellido Cliente" onKeyUp="sugerirapellido(this.value)">
                        <ul class="sug">
                        </ul>
                    </div>	
                    <div class="filtronombre" id="filtrociudad">
                        <font class="selectvalor" >Ciudad</font>
                        <span class="selectico"></span>
                        <ul>
                        <?php $peticion2 = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user GROUP BY ciudad ORDER BY ciudad ASC";
                        $resultado2 = mysqli_query($conexion, $peticion2);
                        while($fila2 = mysqli_fetch_array($resultado2)){?>
                            
                                <li><a><?php echo"".$fila2['ciudad'].""; ?></a></li>
                            
                        <?php } ?>
                        </ul>
                    </div>	    
                    <div class="botonfciudad" id="botonciudad" >
                        <img src="image/lupan.png"/>
                    </div>	    
                </div>	
            </div>	
            <div class="filtroporpedido">
                <div class="colorTallaCont">
                    <h2>Por Pedido</h2>
                    <div class="filtronombre" style=" background:#333a99;">
                        <h3 style="margin-bottom:5px; color:#fff;">Fecha</h3>
                    </div>	
                    <div style="margin-bottom:0px" class="filtronombre" id="filtrofecha">
                        <h3>Desde</h3>
                        <input class="fechainicial" type="date" id="cliente" placeholder="DIA / MES / AÑO" >
                        <ul class="sug">
                        </ul>
                    </div>	
                    <div class="filtronombre" id="filtrofecha">
                        <h3>Hasta</h3>
                        <input class="fechafinal" type="date" id="cliente" placeholder="DIA / MES / AÑO">
                        <ul class="sug">
                        </ul>
                    </div>	
                     <div class="botonfciudad" id="botonfecha" >
                        <img src="image/lupan.png"/>
                    </div>
                   <div class="filtronombre" id="filtroestado">
                        <font class="selectvalor">Estado</font>
                        <span class="selectico"></span>
                        <ul class="sug">
                                <li>Activo</li>
                                <li>Despachado</li>
                                <li>Anulado</li>
                        </ul>
                    </div>	
                    <div class="botonfciudad" id="botonestado" >
                        <img src="image/lupan.png"/>
                    </div>	    
                </div>	    
            </div>
            <div class="filtroporproducto">
                <div class="colorTallaCont">
                    <h2 style="color:#EEE;">Por </h2>
                    <div class="filtronombre" style=" background:#333a99;">
                        <h3 style="margin-bottom:5px; color:#fff">Valor</h3>
                    </div>	
                    <div style="margin-bottom:0px" class="filtronombre" id="filtrovalor">
                        <h3>Desde</h3>
                        <input class="valorinicial" type="text" id="cliente" placeholder="Valor inicial" >
                        <ul class="sug">
                        </ul>
                    </div>	
                    <div class="filtronombre" id="filtrovalor">
                        <h3>Hasta</h3>
                        <input class="valorfinal" type="text" id="cliente" placeholder="Valor final">
                        <ul class="sug">
                        </ul>
                    </div>	
                     <div class="botonfciudad" id="botonfvalor" >
                        <img src="image/lupan.png"/>
                    </div>
                </div>	
            </div>
        </div>
    </div>	
</div>
<div class="barramenulista">
        <h1 class="titulomenu">Lista de Pedidos</h1>
    </div>
</div>
<div class="renglonesp">
<table cellspacing="0">
    <tr>
        <th>No.</th><th>FECHA</th><th>CIUDAD</th><th>NOMBRE DE CLIENTE</th><th>VALOR</th><th>ESTADO</th><th>VER PEDIDO</th><?php if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){?><th>ELIMINAR</th><?php } ?>
    </tr>
<?php
$peticion = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user ORDER BY estado ASC ";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
$estado = $fila['estado'];
//if($estado == 0){$diestado = "Pendiente";}else{$diestado = "Despachado";}
	switch($estado){
		case 0:$diestado = "Activo";break;
		case 1:$diestado = "Despachado"; break;
		case 2:$diestado = "Anulado"; break;
	}
	
	echo "<tr";
	
	switch($estado){
		case 0:echo " style='background:#ccddff'"; break;
		case 1:echo " style='background:#EAEAEA'"; break;
		case 2:echo " style='background:#fff'";break;
	}
echo ">
			<td>".$fila['id_pedido']."</td>
			<td>".$fila['fecha']."</td>
			<td>".$fila['ciudad']."</td>
			<td>".$fila['nombre']." ".$fila['apellidos']."</td>
			<td>".$fila['valor']."</td>
			<td><select class='campocambiar' name='estado' id-data='".$fila['id_pedido']."'>
                <option>".$diestado."</option>
                <option>Activo</option>
                <option>Despachado</option>
                <option>Anulado</option>
            </td>
<td ><a href='verpedido.php?id_pedido=".$fila['id_pedido']."'><button>Ver pedido</button></a></td>";
if($_SESSION['usuario']['p']=='admin' || $_SESSION['usuario']['p']=='Admin'){
echo"<td ><a href='php/borrarpedido.php?id=".$fila['id_pedido']."'><button>Eliminar</button></a></td>";
}
echo"</tr>";

}
echo"</table>
</div>";

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
