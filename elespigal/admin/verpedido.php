<?php 
@session_start();
if(isset($_SESSION['user'])){
	if($_SESSION['user']['p']=='admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='Admin' || $_SESSION['user']['p']=='empleado' || $_SESSION['user']['p']=='Empleado'){
include "headeradmin.php";
include "php/config.php";
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head prefix="og: http://ogp.me/ns#">
	<meta property="og:url" content="http://" />
	<meta property="og:site_name" content="Manufacturas B Ghost" />
	<meta property="og:title" content="Ropa formal e informal para hombre, mujer y niños" />
	<meta property="og:description" content="Diseñamos ropa formal e informal para hombres, mujeres y niños, ternos, trajes, chequetas, blazer, chaquetas, pantalones, jeans, camisas, camisetas, faldas, vestidos" />
	<meta property="og:image" content="http://" />
    <title>B Ghost</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="icon" type="image/png" href="favicon.png" />

	<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script src="js/html5shiv.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<?php
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
?>
    <div class="contpedido" style="top:100PX; height:100%;">
        <div class="pedido">
            <h1>PEDIDO No. <?php echo"".$_GET['id_pedido']."";?></h1>
            <div class="contfechap">
		<form action='php/actualizapedido.php?id=<?php echo $_GET['id_pedido']?>' method='post'> 
             <?php 
				$peticion = "SELECT * FROM pedidos WHERE id_pedido = ".$_GET['id_pedido']."";
				$resultado = mysqli_query($conexion, $peticion);
			  while($fila = mysqli_fetch_array($resultado)){?>
                	<div class="tituloestado">Estado del pedido:
				<?php 	switch($fila['estado']){
						case 0:$diestado = "Activo";break;
						case 1:$diestado = "Despachado"; break;
						case 2:$diestado = "Anulado"; break;
						}
						echo"<select name='estado' value='".$diestado."'>
							<option>".$diestado."</option>
							<option>Activo</option>
							<option>Despachado</option>
							<option>Anulado</option>
						</select>";?>
            		</div>
                <table class="fechapedido">
                    <tr>
                        <th>DIA</th><th>MES</th><th>AÑO</th>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo"".$fila['fecha']."";?></td>
                    </tr>
                </table>
            </div>
            <div class="datosp">
                <h1>DATOS CLIENTE
                </h1>
                <?php }?>
                <table>
              <?php
				$peticion = "SELECT * FROM pedidos LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user WHERE id_pedido = ".$_GET['id_pedido']."";
				$resultado = mysqli_query($conexion, $peticion);
              while($fila = mysqli_fetch_array($resultado)){
                  echo"
                  <tr><td><span>Nombre: </span> ".$fila['nombre']."</td><td><span>Apellidos: </span> ".$fila['apellidos']."</td><td><span>RUC/C.C.: </span> ".$fila['ruc']."</td></tr>
                    <tr><td colspan='2'><span>Dirección: </span> ".$fila['direccion']."</td><td><span>Teléfono: </span> ".$fila['telefono']."</td></tr>
                    <tr><td><span>Provincia: </span> ".$fila['provincia']."</td><td><span>Ciudad: </span> ".$fila['ciudad']."</td></tr>";
					
                } ?>
                </table>
            </div>
            <div class="renglonesp">
                <table cellspacing="0">
                    <tr>
                        <th>REF.</th><th>ARTICULO</th><th>CANTIDAD</th><th>VALOR</th>
                    </tr>
                <?php  
				$peticion = "SELECT * FROM lineaspedido WHERE id_pedido = ".$_GET['id_pedido']."";
				$resultado = mysqli_query($conexion, $peticion);
				while($fila = mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <td><?php echo "".$fila['ref_prod'].""?></td>
                        <td><?php echo "".$fila['nombre_prod'].""?></td>
                        <td><?php echo "".$fila['unidades'].""?></td>
                        <td>$ <?php echo "".$fila['valor'].""?> US</td>
                    </tr>
                    
                 <?php 
				 }?>
                </table>
            </div>
            <div class="totalesp">
                <table cellspacing="0">
					<?php $peticion = "SELECT * FROM pedidos WHERE id_pedido = ".$_GET['id_pedido']."";
                    $resultado = mysqli_query($conexion, $peticion);
                    while($fila = mysqli_fetch_array($resultado)){?>
					<?php $subtotal = $fila['valor']/1.12;
                    $iva= $subtotal*.12;
                    $total = $subtotal+$iva+$fila['valor_env'];?>
					<tr>
						<td></td><td>SUBTOTAL</td><td>$ <?php echo "".round($subtotal).""?> US</td>
                    </tr>
					<tr>
						<td></td><td>ENVIO</td><td>$ <?php echo "".$fila['valor_env'].""?> US</td>
                    </tr>
					<tr>
						<td></td><td>IVA 12%</td><td>$ <?php echo "".round($iva).""?> US</td>
                    </tr>
					<tr>
						<td></td><td>TOTAL A PAGAR</td><td>$ <?php echo "".$total.""?> US</td>
                    </tr>
                    <?php  }?>
                </table>
            </div>
            <div class="datosd">
            </div>
        </div>
		<input  class='enviarpedido' style="margin-left:100px;" type='submit' value='CAMBIAR ESTADO' />	
        </form>
        <a href='php/borrarpedido.php?id=<?php echo"".$_GET['id_pedido']."";?>'><button class='enviarpedido' value=''>ELIMINAR</button></a>
	<a href='pedidos.php'><button class='enviarpedido' value=''>VOLVER</button></a>
	</div>
    
<?php
 mysqli_close($conexion);
?>
</body>
</html>
<?php
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
