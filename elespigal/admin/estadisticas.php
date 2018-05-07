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
<div class="contnuevopro">
    <div class="seccion1">	
        <div class="titulo_edit_prod">
        <h2>ESTADISTICAS</h2> 
        	<div style="margin-left:73%" class="productoactual">
                    <a style="margin-left:0" href="index.php" id="volver_est" >Volver</a>
            </div>
		</div>
        <div class="ralla"></div>
			<?php
            $peticion = "SELECT lineaspedido.id_prod AS id, nombre, SUM(unidades) FROM lineaspedido LEFT JOIN productos ON lineaspedido.id_prod = productos.id_prod GROUP BY nombre ORDER BY SUM(unidades) DESC LIMIT 1";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<div class='resulest' id='masven'>";
            while($fila = mysqli_fetch_array($resultado)){
            echo "<h3>Producto Estrella: <span>".$fila['nombre']."</span> CON <span>".$fila['SUM(unidades)']."</span> Unidades</h3>";
            }
            $peticion = "SELECT lineaspedido.id_prod AS id,productos.nombre,productos.valor,SUM(unidades) FROM `lineaspedido` LEFT JOIN productos ON lineaspedido.id_prod = productos.id_prod GROUP BY id ORDER BY COUNT(id) DESC LIMIT 3";
            $resultado = mysqli_query($conexion, $peticion);
            echo "<h3>Productos más vendidos</h3>";
            echo "
            <table cellspacing='0'>
			<tr><th>Nombre del producto</th><th>Cantidad vendido</th>";
            while($fila = mysqli_fetch_array($resultado)){
            echo"
            <tr>
            <td>".$fila['nombre']."</td>
            <td align='center'>".$fila['SUM(unidades)']."</td>
            </tr>";
            }
            echo"
			</table>			
			</div>";
            
            $peticion = "SELECT usuarios.nombre, apellidos, SUM(lineaspedido.valor), SUM(lineaspedido.unidades) FROM `pedidos` LEFT JOIN lineaspedido ON pedidos.id_pedido = lineaspedido.id_pedido LEFT JOIN productos ON lineaspedido.id_prod = productos.id_prod LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user GROUP BY usuarios.id_user ORDER BY SUM(lineaspedido.valor) DESC";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<div class='resulest' id='mejorcliente'>";
            echo "<h3>Ranking clientes con mayor valor de compra:</h3>
			<table cellspacing='0' style='font-size:14px;'>
            <tr><th>Nombre</th><th>Apellidos</th><th>Catidad productos</th><th>Total compras</th></tr>";
            while($fila = mysqli_fetch_array($resultado)){
            echo "
            <tr>
            <td>".$fila['nombre']."</td>
            <td>".$fila['apellidos']."</td>
            <td align='center'>".$fila['SUM(lineaspedido.unidades)']."</td>
            <td width='30%'>$ ".$fila['SUM(lineaspedido.valor)']." US</td>
            </tr>";
            }
            echo"
			</table>			
			</div>";

            $peticion = "SELECT COUNT(pago), pago FROM `pedidos` GROUP BY pago";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<div class='resulest'>";
            echo "<h3>Número de pedidos por tipo de pago:</h3>
			<table cellspacing='0'>
            <tr><th>Catidad pedidos</th><th>Tipo de pago</th></tr>";
            while($fila = mysqli_fetch_array($resultado)){
            switch($fila['pago']){
				case 0:$pago = "Paypal"; break;
				case 1:$pago = "Consignación"; break;
			}
			echo "
            <tr>
            <td align='center'>".$fila['COUNT(pago)']."</td><td> ".$pago."</td>
            </tr>
            ";
            }
            echo"
			</table>			
			</div>";
            $peticion = "SELECT SUM(valor), ciudad FROM `pedidos` LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user GROUP BY ciudad ORDER BY SUM(valor) DESC";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<div class='resulest'>";
            echo "<h3>Ventas por Ciudad:</h3>
			<table cellspacing='0'>
            <tr><th>Ciudad</th><th>Valor ventas</th></tr>";
            while($fila = mysqli_fetch_array($resultado)){
            echo "
			
            <tr>
            <td>".$fila['ciudad']."</td> <td>$ ".$fila['SUM(valor)']." US</td>
            </tr>
            ";
            }
            echo"
			</table>			
			</div>";
            $peticion = "SELECT SUM(valor), pais FROM `pedidos` LEFT JOIN usuarios ON pedidos.id_user = usuarios.id_user GROUP BY pais ORDER BY SUM(valor) DESC ";
            $resultado = mysqli_query($conexion, $peticion);
            echo"<div class='resulest'>";
            echo "<h3>Ventas por País:</h3>
			<table cellspacing='0'>
            <tr><th>País</th><th>Valor ventas</th></tr>";
            while($fila = mysqli_fetch_array($resultado)){
            echo "
            <tr>
            <td>".$fila['pais']."</td> <td>$ ".$fila['SUM(valor)']." US</td>
            </tr>
            ";
            }
            echo"
			</table>			
			</div>";
            ?>
	</div>
</div>
<?php 
	}else{
		echo "
			<meta http-equiv='refresh' content='5; url=index.php'>
		" ;
	}
}else{
	echo "
		<meta http-equiv='refresh' content='5; url=loguinadmin.php'>
	" ;
	
}?>

