<?php
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
 include "headeradmin.php";
 include "php/config.php";
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
unset($_SESSION['producto']);
 ?>
<script>
		function sugerirnombre(str){
			$('.renglonesuser table').load('php/sugerenciasuser.php?n='+str);
		}
		function sugerirapellido(str){
			$('.renglonesuser table').load('php/sugerenciasuser.php?a='+str);
		}
		function sugerirmail(str){
			$('.renglonesuser table').load('php/sugerenciasuser.php?m='+str);
		}
		function sugerirruc(str){
			$('.renglonesuser table').load('php/sugerenciasuser.php?r='+str);
		}
</script>
<div class="filtro">
    <div class="titulofiltro">
    	<h2 style="margin-right:35%;">FILTRAR USUARIOS</h2>
        <img style="margin-left:-360px;" class="imagenfiltro" src="image/selectfiltro.png"/>
    	<h3>Ordenar por:</h3> 
        <ul>
        	<li><div class="checkordenuser"></div></li>
            <li><h3>Nombre</h3></li>
            <li><div class="checkordenuser"></div></li>
            <li><h3>Apellidos</h3></li>
            <li><div class="checkordenuser"></div></li>
            <li><h3>Ruc</h3></li>
            <li><div class="checkordenuser"></div></li>
            <li><h3 style="width:100px">Tipo usuario</h3></li>
        </ul>
        <img style="margin-left:0" class="cerrarfiltro" src="image/cerrarfiltro.png"/>
   </div>
        <div class="contfiltros">
            <div class="filtroporcliente">
                <div class="colorTallaCont">
                    <h2>Datos generales usuario</h2>
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
                    <div class="filtronombre">
                        <h3>E-mail</h3>
                        <input id="cliente" placeholder="Correo Cliente" onKeyUp="sugerirmail(this.value)">
                        <ul class="sug">
                        </ul>
                    </div>	
                    <div class="filtronombre">
                        <h3>Ruc o C.C.</h3>
                        <input id="cliente" placeholder="Ruc Cliente" onKeyUp="sugerirruc(this.value)">
                        <ul class="sug">
                        </ul>
                    </div>	
                </div>	
            </div>	
            <div class="filtroporpedido">
                <div class="colorTallaCont">
                    <h2>Otros datos</h2>
                    <div  class="filtronombre" id="filtropais">
                        <font class="selectvalor" >País</font>
                        <span class="selectico"></span>
                        <ul style="z-index:100; margin-top:33px;">
                        <?php 
						$peticion2 = "SELECT * FROM usuarios GROUP BY pais ORDER BY pais ASC";
                        $resultado2 = mysqli_query($conexion, $peticion2);
                        while($fila2 = mysqli_fetch_array($resultado2)){?>
                            
                                <li><a><?php echo"".$fila2['pais'].""; ?></a></li>
                            
                        <?php } ?>
                        </ul>
                    </div>	    
                    <div class="botonfciudad" id="botonpais" >
                        <img src="image/lupan.png"/>
                    </div>	    
                    <div class="filtronombre" id="filtrociudad">
                        <font class="selectvalor" >Ciudad</font>
                        <span class="selectico"></span>
                        <ul style="z-index:90; margin-top:32px;">
                        <?php 
						$peticion2 = "SELECT * FROM usuarios GROUP BY ciudad ORDER BY ciudad ASC";
                        $resultado2 = mysqli_query($conexion, $peticion2);
                        while($fila2 = mysqli_fetch_array($resultado2)){?>
                            
                                <li><a><?php echo"".$fila2['ciudad'].""; ?></a></li>
                            
                        <?php } ?>
                        </ul>
                    </div>	    
                    <div class="botonfciudad" id="botonciudaduser" >
                        <img src="image/lupan.png"/>
                    </div>	    
                   <div class="filtronombre" id="filtroestado">
                        <font class="selectvalor">Tipo</font>
                        <span class="selectico"></span>
                        <ul class="sug">
                                <li>Admin</li>
                                <li>Empleado</li>
                                <li>Cliente</li>
                        </ul>
                    </div>	
                    <div class="botonfciudad" id="botontipo" >
                        <img src="image/lupan.png"/>
                    </div>	    
                </div>	    
            </div>
            <div class="filtroporproducto">
                <div class="colorTallaCont">
                    <h2 style="color:#EEE;">Por </h2>
                </div>	
            </div>
        </div>
    </div>	
</div>
<div class="barramenulista">
        <h1 class="titulomenu">Lista de Usuarios</h1>
		<?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?>
        <div class="botonesmenu">
            <a class="botonmenu" href="nuevousuario.php">
            	<span class="ico-new"></span>
	            <h3>Añadir nuevo</h3>
            </a>
        </div>
		<?php }?>
    </div>
</div>
<div class="renglonesuser">
<table cellspacing="0">
    <tr>
        <th>No.</th><th>NOMBRE</th><th>APELLIDOS</th><th>CORREO</th><th>RUC</th><th>TIPO USER</th><th>DIRECCION</th><th>TELEFONO</th><th>PAIS</th><th>CIUDAD-PROVINCIA</th><?php if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){?><th>EDITAR</th><th>ELIMINAR</th><?php }?>
    </tr>
<?php
$peticion = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)){
    if($fila['mail']!='lupaclick@gmail.com'){
$tipo = $fila['privilegios'];
	echo "<tr";
	
	switch($tipo){
		case 'Cliente':echo " style='background:#ccddff'"; break;
		case 'Empleado':echo " style='background:#EAEAEA'"; break;
		case 'Admin':echo " style='background:#784eff; color:#fff'";break;
		case 'cliente':echo " style='background:#ccddff'"; break;
		case 'empleado':echo " style='background:#EAEAEA'"; break;
		case 'admin':echo " style='background:#784eff; color:#fff'";break;
		case 'CLIENTE':echo " style='background:#ccddff'"; break;
		case 'EMPLEADO':echo " style='background:#EAEAEA'"; break;
		case 'ADMIN':echo " style='background:#784eff; color:#fff'";break;
	}
echo ">
<td width='2%'>".$fila['id_user']."</td>
";
echo"<td width='8%'>".$fila['nombre']."</td>
<td width='8%'>".$fila['apellidos']."</td>
<td width='23%'>".$fila['mail']."</td>
<td width='8%'>".$fila['ruc']."</td>
<td width='3%'>".$fila['privilegios']."</td>
<td width='8%'>".$fila['direccion']."</td>
<td width='8%'>".$fila['telefono']."</td>
<td width='8%'>".$fila['pais']."</td>
<td width='8%'>".$fila['ciudad']." - ".$fila['provincia']."</td>";
if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin'){
echo"<td width='8%'><a href='editaruser.php?id_user=".$fila['id_user']."'><button>Editar</button></a></td>
<td width='8%'><a href='php/borraruser.php?id_user=".$fila['id_user']."'><button>Eliminar</button></a></td>"; }
echo"</tr>";
}
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
