<?php 
 include "config.php";
$contador=0;
$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
mysqli_set_charset($conexion, "utf8");
if(isset($_GET["criterio"])){
$entrada = $_GET['criterio'];
$criterio=str_replace("\'","'",$entrada);

	
	$peticion = "SELECT * FROM trabajos ".$criterio."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$contador++;
	}

	if($contador!=0){
	echo" 
	<ul class='cont-trabajos'>";
		  $peticion = "SELECT * FROM trabajos ".$criterio."";
		  $resultado = mysqli_query($conexion, $peticion);
		  while($fila = mysqli_fetch_array($resultado)){?>
			  	<li class="item" id-data="WHERE servicio='<?php echo $fila['servicio'] ?>' GROUP BY nombre">
				<?php echo "<div>
					  <div class='imgItem'>
						<div class='catImg'>
							<h1>".$fila['des_corta']."</h1>
						</div>
						  <img src='fotos/".$fila['imagen']."' alt='".$fila['alt']."'/>
	
						<span class='pantalla'></span>
						<h2 class='cliente'>".$fila['cliente']."</h2>
					  </div>
				  </div>
			  </li>";
			 }
		echo "</ul>";
	}else{
		echo"<div class='resultados'><p>No hay Trabajos </p></div>";
	}
}
if(isset($_GET["criterio2"])){
$entrada2 = $_GET['criterio2'];
$criterio2=str_replace("\'","'",$entrada2);
	$peticion = "SELECT * FROM trabajos ".$criterio2." AND nombre";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			echo "<div class='migajas'><p><span>"; 
				if($fila['nombre']==""){ 
					echo "Proyectos"; 
				}else{
					echo $fila['nombre'];
				}
			echo "</span></p></div>";
	}
		$peticion = "SELECT * FROM trabajos ".$criterio2."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$contador++;
	}

	if($contador!=0){
	echo" 
	<ul class='cont-trabajos'>";
		  $peticion = "SELECT * FROM trabajos ".$criterio2."";
		  $resultado = mysqli_query($conexion, $peticion);
		  while($fila = mysqli_fetch_array($resultado)){
			  if($fila['nombre']==""){?>
	              <li class="item" id-data="WHERE servicio='<?php echo "".$fila['servicio']?>'">
				<?php }else{
                	if($fila['servicio']==""){?>
			 		<li class="item3" id-data="WHERE servicio='<?php echo $fila['servicio'] ?>' AND nombre='<?php echo $fila['nombre'] ?>'">
                   <?php  }else{?>	
			  		<li class="item2" id-data="WHERE servicio='<?php echo $fila['servicio'] ?>' AND nombre='<?php echo $fila['nombre'] ?>' GROUP BY nombre">
				<?php } 
				} echo "<div>
					  <div class='imgItem'>
						<div class='catImg'>
							<h1>"; if($fila['nombre']==""){echo $fila['nombre'];}else{ echo $fila['nombre'];}echo "</h1>
						</div>
						  <img src='fotos/".$fila['imagen']."' alt='".$fila['alt']."'/>
	
						<span class='pantalla'></span>
						<h2 class='cliente'>".$fila['cliente']."</h2><h3 class='nombre'>".$fila['']."</h3>";if($fila['enlace']=='Si' && $fila['nombre']==""){ echo "<a href='trabajo.php?id_trab=".$fila['id_trab']."' ><div class='enlacetrab'></div></a>";}
					  echo"</div>
				  </div>
			  </li>";
			 }
		echo "</ul>";
	}else{
		echo"<div class='resultados'><p>No hay Trabajos </p></div>";
	}
}
if(isset($_GET["criterio3"])){
$entrada3 = $_GET['criterio3'];
$criterio3=str_replace("\'","'",$entrada3);
	$peticion = "SELECT * FROM trabajos ".$criterio3."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			//echo "<div class='migajas'><p><span>".$fila['nombre']." </span></p></div>";
	}
		$peticion = "SELECT * FROM trabajos ".$criterio3."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$contador++;
	}
	if($contador!=0){
	echo" 
	<ul class='cont-trabajos'>";
		  $peticion = "SELECT * FROM trabajos ".$criterio3."";
		  $resultado = mysqli_query($conexion, $peticion);
		  while($fila = mysqli_fetch_array($resultado)){?>
			  <li class="item3" id-data="WHERE servicio='<?php echo $fila['servicio'] ?>' AND cat='<?php echo $fila['nombre'] ?>'">
				<?php echo "<div>
					  <div class='imgItem'>
						<div class='catImg'>
							<h1>".$fila['estilo']."</h1>
						</div>
						 <img src='fotos/".$fila['imagen']."' alt='".$fila['alt']."'/>
	
						<span class='pantalla'></span>
						<h2 class='cliente'>".$fila['cliente']."</h2><h3 class='nombre'>".$fila['']."</h3>
					  </div>
				  </div>
			  </li>";
			 }
		echo "</ul>";
	}else{
		echo"<div class='resultados'><p>No hay Trabajos </p></div>";
	}
}
if(isset($_GET["criterio4"])){
$entrada4 = $_GET['criterio4'];
$criterio4=str_replace("\'","'",$entrada4);
	$peticion = "SELECT * FROM trabajos ".$criterio4." GROUP BY nombre";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			//echo "<div class='migajas'><p><span>".$fila['subcat']." ".$fila['estilo']." </span></p></div>";
	}
		$peticion = "SELECT * FROM trabajos ".$criterio4."";
	$resultado = mysqli_query($conexion, $peticion);
	while($fila = mysqli_fetch_array($resultado)){
			$contador++;
	}
	if($contador!=0){
	echo" 
	<ul class='cont-trabajos'>";
		  $peticion = "SELECT * FROM trabajos ".$criterio4."";
		  $resultado = mysqli_query($conexion, $peticion);
		  while($fila = mysqli_fetch_array($resultado)){
			  echo "<li class='item'>
				  <div>
					  <div class='imgItem'>
						<div class='catImg'>
							<h1>".$fila['nombre']."</h1>
						</div>
						  <img src='fotos/".$fila['imagen']."' alt='".$fila['alt']."'/>
	
						<span class='pantalla'></span>
						<h2 class='cliente'>".$fila['cliente']."</h2><h3 class='nombre'>".$fila['']."</h3>
					  </div>
				  </div>
			  </li>";
			 }
		echo "</ul>";
	}else{
		echo"<div class='resultados'><p>No hay Trabajos </p></div>";
	}
}

mysqli_close($conexion);
?>
