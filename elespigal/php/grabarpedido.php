<?php 
@session_start();
include "config.php";
$pedido=$_SESSION['carrito'];
$local=$_GET['local'];
	/*definicion del mensaje*/
	
	$to =$_SESSION['usuario']['m'].', lupaproyectos@gmail.com';
	$headers = "Content-Type: text/html; charset=ISO-8859-1\n";
	$tema="Pedido ".$local;
	$mensaje="
	<div class='contG' style='position:relative; float:left; font-size:8px; width:240px; height:auto;	background-color:#fff; padding:0px;'>		
		<h1 style=' font-size:12px; font-family:helvetica; float:left; width:240px; background-color:fff; padding:0px;' class='titulorevisar'>Solicitud pedido a domicilio</h1>
		<h3 style='width: 240px; margin-bottom:0'>Datos del cliente</h3>
		<div class=datoscliente' style='width:240px;  background-color:#fff; padding:0px 0; margin-top:0px;'>
			<table style='width:240px; '>
				<tr><td><h4 style='line-height:8px; margin:0'><span style='color:#333'>C.I.</span>".$_SESSION['usuario']['c']."</h4></td></tr> 
				<tr><td><h4 style='line-height:8px; margin:0'><span style='color:#333'></span>".$_SESSION['usuario']['n']."</h4></td></tr>
				<tr><td><h4 style='line-height:8px; margin:0'><span style='color:#333'></span>".$_SESSION['usuario']['d']."</h4></td></tr>	    
				<tr><td><h4 style='line-height:8px; margin:0'><span style='color:#333'></span>".$_SESSION['usuario']['r']."</h4></td></tr> 
				<tr><td><h4 style='line-height:8px; margin:0'><span style='color:#333'></span>".$_SESSION['usuario']['t']."</h4></td></tr>
				<tr><td ><h4 style='line-height:8px; margin:0'><span style='color:#333'></span>".$_SESSION['usuario']['m']."</h4></td></tr>    
			</table>
		
		</div>
		<div class='detallespedido' style='width:240px; margin-top:10px; background-color:#fff; padding:0px 0;'>
			<h3 style='margin-bottom:0'>Detalle del pedido</h3>
			<table style=' width:240px'>
				";
				for($i=0;$i<count($pedido);$i++){
	$mensaje.="	<tr>
					<td style='padding:2px 0'>
					".$pedido[$i]['cant']." - <h4 style='width:auto; display:inline-block; margin:0'>".$pedido[$i]['nombre'].":  </h4>";
				for ($j=0; $j <count($pedido[$i]['option']) ; $j++) { 
	$mensaje.="<h4 style='width:auto; display:inline-block; margin:0'>".$pedido[$i]['option'][$j]['grupo'].":</h4> ".$pedido[$i]['option'][$j]['namead']." - ";				
					# code...
				}
	$mensaje.="	<h4 style='width:auto; display:inline-block; margin:0'>$".$pedido[$i]['price']*$pedido[$i]['cant']."</h4>			
					</td>";
				}	
	$mensaje.="	</tr>
				<tr>
					<td>    <div  style='background-color:#fff;  width:240px; margin-left:0; padding:0px 0px;'>
                                                       
							<h4 style='display:inline_block'>".$_SESSION['delivery']['delv']." $".$_SESSION['delivery']['v']."</h4>
                                                        <h4 style='display:inline_block'>Local ".$local."</h4>
						</div>
						<div class='grantotal' style='background-color:#fff;  width:240px; margin-left:0; padding:0px 0px;'>
							<h2 style='display:inline_block'>Valor a pagar</h2>
							<h1><span style='display:inline_block''>$ ".$_SESSION['total']."</span></h1>
						</div>
					</td>
				</tr>
				";
				
	$mensaje.="			</table>
		</div>
	</div>
	";
       
	/*mensaje fin*/
	
        @mail($to,$tema,utf8_decode($mensaje),$headers);
        echo "<center class='exito'>Su pedido ha sido enviado exitosamente</center>";
  

?>
