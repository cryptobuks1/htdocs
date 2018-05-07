<?php
date_default_timezone_set('America/Bogota');

//$llave="1111111111111111";/////llave de usuario de pruebas 2
$llave="13eae268e79";/////llave de usuario de pruebas 2
$usuario_id=$_REQUEST['usuario_id'];
$ref_venta=$_REQUEST['ref_venta'];
$valor=$_REQUEST['valor'];
$moneda=$_REQUEST['moneda'];
$estado_pol=$_REQUEST['estado_pol'];
$firma_cadena= "$llave~$usuario_id~$ref_venta~$valor~$moneda~$estado_pol";
$firmacreada = md5($firma_cadena);//firma que generaron ustedes
$firma =$_REQUEST['firma'];//firma que envía nuestro sistema
$fecha_procesamiento=$_REQUEST['fecha_procesamiento'];
$ref_pol=$_REQUEST['ref_pol'];
$cus=$_REQUEST['cus'];
$extra1=$_REQUEST['extra1'];
$banco_pse=$_REQUEST['banco_pse'];
if($_REQUEST['estado_pol'] == 6 && $_REQUEST['codigo_respuesta_pol'] == 5)
{$estadoTx = "Transacci&oacute;n fallida";}
else if($_REQUEST['estado_pol'] == 6 && $_REQUEST['codigo_respuesta_pol'] == 4)
{$estadoTx = "Transacci&oacute;n rechazada";}
else if($_REQUEST['estado_pol'] == 12 && $_REQUEST['codigo_respuesta_pol'] == 9994)
{$estadoTx = "Pendiente, Por favor revisar si el d&eacute;bito fue realizado en el Banco";}
else if($_REQUEST['estado_pol'] == 4 && $_REQUEST['codigo_respuesta_pol'] == 1)
{$estadoTx = "Transacci&oacute;n aprobada";}
else
{$estadoTx=$_REQUEST['mensaje'];}
if(strtoupper($firma)==strtoupper($firmacreada)){//comparacion de las firmas para comprobar que los datos si vienen de Pagosonline

	session_start();
	

	require_once ('../db.class.php');

	extract($_REQUEST);

	if(!isset($codigo_autorizacion) || $codigo_autorizacion==''){ $codigo_autorizacion = "null";}

	$query = "INSERT INTO answerdata (usuario_id, ref_venta, valor, moneda, estado,firma,fecha_procesamiento,cus,extra1,banco_pse,emailComprador,ref_pol,descripcion,riesgo,medio_pago,tipo_medio_pago,mensaje,cuotas,iva,codigo_respuesta_pol,codigo_autorizacion,insert_time)
				  VALUES (:usuario_id, :ref_venta,:valor, :moneda,:estado_pol,:firma, :fecha_procesamiento, :cus,:extra1, :banco_pse,:emailComprador,:ref_pol,:descripcion,:riesgo,:medio_pago,:tipo_medio_pago,:mensaje,:cuotas,:iva,:codigo_respuesta_pol,:codigo_autorizacion, NOW())";

		$stmt = DB::getStatement($query);
		$stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_STR);
		$stmt->bindParam(":ref_venta", $ref_venta, PDO::PARAM_STR);
		$stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
		$stmt->bindParam(":moneda", $moneda, PDO::PARAM_STR);
		$stmt->bindParam(":estado_pol", $estado_pol, PDO::PARAM_INT);
		$stmt->bindParam(":firma", $firma, PDO::PARAM_STR);
		$stmt->bindParam(":fecha_procesamiento", $fecha_procesamiento, PDO::PARAM_STR);
		$stmt->bindParam(":cus", $cus, PDO::PARAM_STR);
		$stmt->bindParam(":extra1", $extra1, PDO::PARAM_STR);
		$stmt->bindParam(":banco_pse", $banco_pse, PDO::PARAM_STR);
		$stmt->bindParam(":emailComprador", $emailComprador, PDO::PARAM_STR);
		$stmt->bindParam(":ref_pol", $ref_pol, PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
		$stmt->bindParam(":riesgo", $riesgo, PDO::PARAM_INT);
		$stmt->bindParam(":medio_pago", $medio_pago, PDO::PARAM_INT);
		$stmt->bindParam(":tipo_medio_pago", $tipo_medio_pago, PDO::PARAM_INT);
		$stmt->bindParam(":mensaje", $mensaje, PDO::PARAM_STR);
		$stmt->bindParam(":cuotas", $cuotas, PDO::PARAM_INT);
		$stmt->bindParam(":iva", $iva, PDO::PARAM_STR);
		$stmt->bindParam(":codigo_respuesta_pol", $codigo_respuesta_pol, PDO::PARAM_INT);
		$stmt->bindParam(":codigo_autorizacion", $codigo_autorizacion, PDO::PARAM_INT);




		if($stmt->execute()) {

			//DB::getConnection()->lastInsertId();

			$query = "UPDATE user_forms SET paid = 1 WHERE ref_venta = :ref_venta";
			$stmt = DB::getStatement($query);
			$stmt->bindParam(":ref_venta", $ref_venta, PDO::PARAM_STR);
			$stmt->execute();

			$querySel = "SELECT service_type FROM user_forms   WHERE paid = 1 AND ref_venta = :ref_venta";
			$stmt = DB::getStatement($querySel);
			$stmt->bindParam(":ref_venta", $ref_venta, PDO::PARAM_STR);
			if($stmt->execute()) {

				$row = $stmt->fetch();

				$mostrarForm = $row['service_type'];
			}



		}
?>
<?php
}
/*echo '<pre>';

print_r($_REQUEST);

echo '</pre>';*/
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../css/stylos.css" rel="stylesheet" type="text/css" /> 
<link href="../css/estilosconsultorio.css" rel="stylesheet" type="text/css" />
<link href="../css/validarform.css" rel="stylesheet" type="text/css" /> 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script src="../js/funciones.js"></script> 
<title>Abogados Web Consultas en linea</title>
<link rel="icon" type="image/png" href="../favicon.ico" />
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body  style="width:100%; height:100%" onload="MM_preloadImages('../img/twitterhover-01.png','../img/facehover-01.png')">


	<div class="login">
    	<div class="logo2">
        	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>		
        <div class="inicio">
			<a href="index.php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
			<a href="../index.php"> Volver</a>
		</div>
    </div>
    <div class="contenedor_respuesta">
        <div class="cont_respuesta">
            <div class="form_respuesta">
           		<table width="%100">
                <tr>
                <td>Nombre de la empresa</td>
                <td>AbogadosWeb</td>
                </tr>
                <tr>
                <td>NIT</td>
                <td>######### (Cambiar de NIT)</td>
                </tr>
                <tr>
                <td>Fecha de procesamiento</td>
                <td><?php echo $fecha_procesamiento; ?></td>
                </tr>
                <tr>
                <td>Estado de la transaccion</td>
                <td><?php echo $estadoTx; ?> </td>
                </tr>
                <tr>
                <td>referencia de la venta </td>
                <td><?php echo $ref_venta; ?> </td> </tr>
                <tr>
                <td>Referencia de la transaccion </td>
                <td><?php echo $ref_pol; ?> </td>
                </tr>
                <tr>
                <?php
                if($banco_pse!=null){
                ?>
                <tr>
                <td>cus </td>
                <td><?php echo $cus; ?> </td>
                </tr>
                <tr>
                <td>Banco </td>
                <td><?php echo $banco_pse; ?> </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                <td>Valor total</td>
                <td><?php echo number_format($valor); ?> </td>
                </tr>
                <tr>
                <td>moneda </td>
                <td><?php echo $moneda; ?></td>
                </tr>
                <tr>
                <td>Descripción:</td>
                <td><?php echo ($extra1); ?></td>
                </tr>
                </table>
        
        
        <input type="button" name="imprimir" value="Imprimir Recibo" onClick="window.print();"><br />
    </div>
    <!--<a href="../index.php">Ir a la home</a>-->

                <form action="#" method="post"	>
                <div align="center">
                    <p>Ayuda</p>
                    <span>Para más información de cómo<br/> utilizar nuestros servicios, puede<br/> enviarnos un mensaje donde podrá<br/> plantearnos sus dudas y opiniones<br/> acerca de nuestro servicio.</span>
                    <input type="submit" name="enviar" value="Enviar mensaje"/>
                </div>
        	</div>
   		</div>
	</div>

<?php if($_SESSION['logueado']){?>

	<div class="formconsulta">	
<?php if($mostrarForm=='Consulta'){?>
		<div class="consultas">
        <form action="../php/processforms.php" method="POST">
        	<div class="titulo2">
				Consulta Jurídica
				<p>Ahora puede hacer su consulta, recuerde ser breve y concreto. Le daremos respuesta, en un plazo máximo de 48 horas</p>
        	</div>
            <table width="380" border="0" cellspacing="0">
                  <tr>
                    <td><span>Nombre</span></td>
                  </tr>             
                  <tr>
                    <td><input type="text" name="nombre" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Apellido</span></td>
                  </tr>     
                   <tr>
					<td><input type="text" name="apellido" size="40" value=""/></td>
                  </tr>
                  <tr>
                   <td><span>Teléfono</span></td>
                  </tr>
                  <tr>
					<td><input type="text" name="telefono" size="40" value=""/></td>
				  </tr>
                  <tr>
                   <td><span>Correo</span></td>
                  </tr>
                  <tr>
					<td><input type="email" name="correo" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Comentario</span></td>
                  </tr>
                  <tr>
                   <td><textarea name="coment" id="f" cols="45" rows="7"></textarea></td>
                  </tr>
                  <tr>
                    <td><input type="submit" name="enviar" width="170" height="50" value="Enviar"/></td>
                  </tr>
                </table>
                <input type="hidden" name="query" value="1">
    	</form>
       </div>
<?php }else{?>
		<div class="minutas">
		<form action="../php/processforms.php" method="POST">
        	<div  align="justify" class="titulo2">
				Minuta Personalizada
				<p>Ahora puede enviarnos la información para su minuta Le daremos respuesta, en un plazo máximo de 48 horas</p>
        	</div>
            <table width="380" border="0" cellspacing="0">
                  <tr>
                    <td><span>Nombre</span></td>
                  </tr>             
                  <tr>
                    <td><input type="text" name="nombre" size="40" value=""/></td>
                  </tr>
                  <tr>
                    <td><span>Apellido</span></td>
                  </tr>     
                   <tr>
					<td><input type="text" name="apellido" size="40" value=""/></td>
                  </tr>
                  <tr>
                   <td><span>Teléfono</span></td>
                  </tr>
                  <tr>
					<td><input type="text" name="telefono" size="40" value=""/></td>
				  </tr>
                  <tr>
                   <td><span>Correo</span></td>
                  </tr>
                  <tr>
					<td><input type="email" name="correo" size="40" value=""/></td>
                  </tr>
                  <tr>
                   <td><span>Interesado en:</span></td>
                  </tr>
                  <tr>
					<td><select name="tipominuta" >
					  <option>Derecho de petición</option>
					  <option>Queja</option>
					  <option>Reclamo</option>
					  <option>Solicitud</option>
					  <option>Autorización</option>
				    </select></td>
                  </tr>                  
                  <tr>
                    <td><span>Comentario</span></td>
                  </tr>
                  <tr>
                   <td><textarea name="coment" id="f" cols="45" rows="7"></textarea></td>
                  </tr>
                  <tr>
                    <td><input type="submit" name="enviar" width="170" height="50" value="Enviar"/></td>
                  </tr>
                </table>
                <input type="hidden" name="query" value="2">
    	</form>
       </div>
<?php }?>       
	</div>	
<?php }else{?>  
 <script type="text/javascript">
 window.location.href="../index.php";
 </script>
<?php    
  }
?>
</body>
</html>

