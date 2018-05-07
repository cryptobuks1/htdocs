<?php


	/*definicion del mensaje elespigalcafeteria@gmail.com, elespigal@hotmail.com*/	
	$to ='elespigalcafeteria@gmail.com, elespigal@hotmail.com';
	$from  = 'MIME-Version: 1.0' . "\r\n";
	$from .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$from .= 'To:elespigalcafeteria@gmail.com, elespigal@hotmail.com' . "\r\n";
	$from .= 'From: reply-to@elespigal.com' . "\r\n";
	date_default_timezone_set('America/Guayaquil');

	//$headers = "Content-Type: text/html; charset=ISO-8859-1\n";
	//$from = "Do_Not_reply@lupaweb.com";
	$tema="Pedido ".$local;
	$mensaje="
	<div class='contG' style='position:relative; font-family:helvetica; float:left; font-size:14px; width:750px; height:auto;	background-color:#fff; padding:10px 35px;'>		
		<table style='border-bottom:2px solid #ccc; width:770px'>
			<tr>
				<td>
					<h1 style=' font-size:18px; line-height:18px; margin:0; font-family:helvetica; float:left; width:350px; background-color:fff; padding:0px 10px;' class='titulorevisar'>Pedido ".$_SESSION['delivery']['delv'].", ".$local." </h1>
				</td>
				<td>
					<h3 style='padding:0px 10px; overflow:hidden; font-size:12px;  margin:0; float:left; width:300px'>Fecha-Hora: ".date('d/m/Y - H:i:s')."</h3>
				</td>
			</tr>
		</table>
		<h3 style='padding:0px 10px; margin:0; float:left; line-height:24px; font-size:18px'>Datos del cliente</h3>
		<div class=datoscliente' style='width:750px;  background-color:#eee; padding:2px 10px; margin:0; margin-top:0px;'>
			<table style='width:750px;'>
				<tr>					
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Nombre:</strong></span> ".$_SESSION['usuario']['n']."</h4></td>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Teléfono:</strong></span> ".$_SESSION['usuario']['t']."</h4></td>
				</tr>
				<tr>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Cedula:</strong></span> ".$_SESSION['usuario']['c']."</h4></td>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>E-mail: </strong></span>".$_SESSION['usuario']['m']."</h4></td>
				</tr>
				<tr><td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Dirección:</strong></span> ".$_SESSION['usuario']['d']."</h4></td></tr>
				<tr><td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Referencia:</strong></span> ".$_SESSION['usuario']['r']."</h4></td></tr> 
				
				   
			</table>
		
		</div>
		<div class='detallespedido' style='width:705px; margin-top:0px; background-color:#fff; padding:0px 0;'>
			<h3 style='margin-bottom:0; font-size:18px; margin-top:0; line-height:24px;'>Detalles del pedido</h3>
			<table style=' width:750px'>
			<tr style='background-color:#eee; font-size:14px'><th style='width:100px; text-align:center'>Cantidad</th><th>Producto</th><th style='width:100px;text-align:center'>Valor</th></tr>";
				
				for($i=0;$i<count($pedido);$i++){
					
	$mensaje.="	<tr style='border-bottom:#666 1px solid; font-size:12px '>
					<td style='font-weight:100; font-size:12px'>".$pedido[$i]['cant']."</td>
					<td style='padding:0px 0; font-weight:100; font-size:12px '>
					<h4 style='width:auto; font-weight:100; display:inline-block; margin:0; line-height:10px; font-size:12px '>".$pedido[$i]['nombre'].":  ";
					for ($j=0; $j <count($pedido[$i]['option']) ; $j++) { 
	$mensaje.="			 ".$pedido[$i]['option'][$j]['namead'].", ";				
					# code...
					}

	$mensaje.="		</h4></td>
					<td style='line-height:10px'>
						<h4 style='width:auto; display:inline-block; margin:0; font-weight:100; line-height:10px; font-size:12px'>$".$pedido[$i]['price']*$pedido[$i]['cant']."</h4>			
					</td>
				</tr>";
				}	
	$mensaje.="	<tr style='border:#ccc 1px solid; font-size:14px'><td colspan='3' ><strong>Comentarios:</strong> ".$coment."</td></tr>
				<tr style='border:#ccc 1px solid; font-size:14px'><td colspan='3'><h4 style='display:inline_block; margin:0; font-weight:100'><strong>Cupon aplicado:</strong> ".$cuponinfo."</h4></td></tr>
                <tr>
					<td  >				
						<h2 style='display:inline_block; float:left; width:300px; margin:0; font-size:14px'>Valor domicilio</h2>
					</td>
					<td >	
						<h1 style='display:inline_block; width:300px; float:left; text-align:right; margin:0; font-size:14px'><span style='font-weight:100'>$ ".$_SESSION['delivery']['v']."</span></h1>
					</td>
				</tr>
				<tr>
					<td>						
						<h2 style='display:inline_block; float:left; width:300px; margin:0; font-size:18px'>Valor a pagar</h2>
					</td>
					<td>	
						<h2 style='display:inline_block; width:300px; float:left; text-align:right; margin:0; font-size:18px'><span >$ ".$_SESSION['total']."</span></h2>						
					</td>
				</tr>
				
				<tr style='border:#ccc 1px solid; font-size:14px'><td colspan='3' style='height:10px'><h4 style='display:inline_block; margin:0''>Pago con $".$pago."</h4> </td></tr>               
				<tr style='border:#ccc 1px solid; font-size:14px' ><td colspan='3' ><strong>Planificación de pedido:</strong> ".$pro."</td></tr>
				";
				
	$mensaje.="</table>
		</div>
	</div>
	";
	$mensaje.="<hr>";
	$mensaje.="
	<div class='contG' style='position:relative; font-family:helvetica; float:left; font-size:14px; width:750px; height:auto;	background-color:#fff; padding:10px 35px;'>		
		<table style='border-bottom:2px solid #ccc; width:770px'>
			<tr>
				<td>
					<h1 style=' font-size:18px; line-height:18px; margin:0; font-family:helvetica; float:left; width:350px; background-color:fff; padding:0px 10px;' class='titulorevisar'>Pedido ".$_SESSION['delivery']['delv'].", ".$local." </h1>
				</td>
				<td>
					<h3 style='padding:0px 10px; overflow:hidden; font-size:12px;  margin:0; float:left; width:300px'>Fecha-Hora: ".date('d/m/Y - H:i:s')."</h3>
				</td>
			</tr>
		</table>
		<h3 style='padding:0px 10px; margin:0; float:left; line-height:24px; font-size:18px'>Datos del cliente</h3>
		<div class=datoscliente' style='width:750px;  background-color:#eee; padding:2px 10px; margin:0; margin-top:0px;'>
			<table style='width:750px;'>
				<tr>					
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Nombre:</strong></span> ".$_SESSION['usuario']['n']."</h4></td>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Teléfono:</strong></span> ".$_SESSION['usuario']['t']."</h4></td>
				</tr>
				<tr>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Cedula:</strong></span> ".$_SESSION['usuario']['c']."</h4></td>
					<td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>E-mail: </strong></span>".$_SESSION['usuario']['m']."</h4></td>
				</tr>
				<tr><td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Dirección:</strong></span> ".$_SESSION['usuario']['d']."</h4></td></tr>
				<tr><td style='line-height:0px;'><h4 style='line-height:8px; height:10px; padding:0; margin:0;font-weight:100'><span style='color:#333'><strong>Referencia:</strong></span> ".$_SESSION['usuario']['r']."</h4></td></tr> 
				
				   
			</table>
		
		</div>
		<div class='detallespedido' style='width:705px; margin-top:0px; background-color:#fff; padding:0px 0;'>
			<h3 style='margin-bottom:0; font-size:18px; margin-top:0; line-height:24px;'>Detalles del pedido</h3>
			<table style=' width:750px'>
			<tr style='background-color:#eee; font-size:14px'><th style='width:100px; text-align:center'>Cantidad</th><th>Producto</th><th style='width:100px;text-align:center'>Valor</th></tr>";
				
				for($i=0;$i<count($pedido);$i++){
					
	$mensaje.="	<tr style='border-bottom:#666 1px solid; font-size:12px '>
					<td style='font-weight:100; font-size:12px'>".$pedido[$i]['cant']."</td>
					<td style='padding:0px 0; font-weight:100; font-size:12px '>
					<h4 style='width:auto; font-weight:100; display:inline-block; margin:0; line-height:10px; font-size:12px '>".$pedido[$i]['nombre'].":  ";
					for ($j=0; $j <count($pedido[$i]['option']) ; $j++) { 
	$mensaje.="			 ".$pedido[$i]['option'][$j]['namead'].", ";				
					# code...
					}

	$mensaje.="		</h4></td>
					<td style='line-height:10px'>
						<h4 style='width:auto; display:inline-block; margin:0; font-weight:100; line-height:10px; font-size:12px'>$".$pedido[$i]['price']*$pedido[$i]['cant']."</h4>			
					</td>
				</tr>";
				}	
	$mensaje.="	<tr style='border:#ccc 1px solid; font-size:14px'><td colspan='3'><h4 style='display:inline_block; margin:0; font-weight:100'><strong>Cupon aplicado:</strong> ".$cuponinfo."</h4></td></tr>
                <tr>
					<td  >				
						<h2 style='display:inline_block; float:left; width:300px; margin:0; font-size:14px'>Valor domicilio</h2>
					</td>
					<td >	
						<h1 style='display:inline_block; width:300px; float:left; text-align:right; margin:0; font-size:14px'><span style='font-weight:100'>$ ".$_SESSION['delivery']['v']."</span></h1>
					</td>
				</tr>
				<tr>
					<td>						
						<h2 style='display:inline_block; float:left; width:300px; margin:0; font-size:18px'>Valor a pagar</h2>
					</td>
					<td>	
						<h2 style='display:inline_block; width:300px; float:left; text-align:right; margin:0; font-size:18px'><span >$ ".$_SESSION['total']."</span></h2>						
					</td>
				</tr>
				
				<tr style='border:#ccc 1px solid; font-size:14px'><td colspan='3' style='height:10px'><h4 style='display:inline_block; margin:0''>Pago con $".$pago."</h4> </td></tr>               
				
				";
				
	$mensaje.="</table>
		</div>
	</div>
	";
	//echo $mensaje;
	
	
       
	/*mensaje fin*/
 ?>