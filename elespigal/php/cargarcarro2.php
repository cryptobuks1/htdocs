
<?php 
@session_start();
$suma=0;
$cantidad=0;
include "../php/config.php";
echo"<script>	
	$('.quitar').click(function(){		

		var nombre = $(this).data('index');
		var det = $(this).data('det');	
		$.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-delete' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
      	});	
		$('.cantidadt').load('php/actualizarcantidad.php');
		$('.totalGlobal').load('php/actualizarvalor.php');
	});
	$('.masitem').click(function(){
		var nombre = $(this).data('index');
		var det = $(this).data('det');	
		$.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-mas' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
      	});	
		$('.cantidadt').load('php/actualizarcantidad.php');
		$('.totalGlobal').load('php/actualizarvalor.php');
	});
		$('.menositem').click(function(){
		var nombre = $(this).data('index');
		var det = $(this).data('det');	
		$.ajax({
            type: 'POST',
            url: 'php/cargarcarro.php',
            data: {
                      'nom-menos' : nombre,
                      'detalle' : det                     
            },
            dataType: 'html',
            error: function(){
                alert('error petición ajax');
            },
            success:function(data){
                $('.itemCart').html(data);      

            }
      	});	
		$('.cantidadt').load('php/actualizarcantidad.php');
		$('.totalGlobal').load('php/actualizarvalor.php');
		$('.enlacevalidar').load('php/actualizarenlace.php');
	});
	</script>";

$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
if(isset($_SESSION['carrito'])){
	if(isset($_POST['nom-menos']) ){
		$arreglo=$_SESSION['carrito'];
		$encontrado=false;
		$numero=0;
		$numero2=0;
		$nomMenos=$_POST['nom-menos'];
		$detalle=$_POST['detalle'];
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['nom']==$nomMenos && $arreglo[$i]['det']=="".$detalle.""){
				if($arreglo[$i]['cant']==1){
					unset($arreglo[$i]);
					$arreglo=array_values($arreglo);
					$_SESSION['carrito']=$arreglo;
									
				}
			}
		}
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['nom']==$nomMenos && $arreglo[$i]['det']=="".$detalle.""){
					if($arreglo[$i]['cant'] > 1){
						$arreglo[$i]['cant']--;
						$_SESSION['carrito']=$arreglo;
					}
			}
		}
		if(count($arreglo)==0){
			echo"<center>No hay productos</center>";
		}
	}
	if(isset($_POST['nom-mas']) && isset($_POST['detalle'])){
		$arreglo=$_SESSION['carrito'];
		$nomMas=$_POST['nom-mas'];
		$detalle=$_POST['detalle'];
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['nom']=="".$nomMas."" && $arreglo[$i]['det']=="".$detalle.""){
				  $arreglo[$i]['cant']++;
				  $_SESSION['carrito']=$arreglo;
			}
		}
	}
	if(isset($_POST['nom-delete'])&& isset($_POST['detalle']) ){
		$arreglo=$_SESSION['carrito'];
		$nomDelete=$_POST['nom-delete'];
		$detalle=$_POST['detalle'];
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['nom']==$nomDelete && $arreglo[$i]['det']==$detalle  ){
				unset($arreglo[$i]);
				$arreglo=array_values($arreglo);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}
	if(isset($_POST['nombre_or'])&& isset($_POST['det_or']) && $_POST['nombre_or']!=''){
		$arreglo=$_SESSION['carrito'];
		$encontrado=false;
		$numero=0;
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['nom']==$_POST['nombre_or'] && $arreglo[$i]['det']==$_POST['det_or']  ){
				$encontrado=true;
				$numero=$i;

			}
		}
		
		if($encontrado==true){
			$arreglo[$numero]['cant']=$arreglo[$numero]['cant']+$_POST['cant_or'];

			$_SESSION['carrito']=$arreglo;
		}else{		
			$imagen="";
			$nombre="";
			$valor=0;
			$nombre=$_POST['nombre_or'];
			$cant=$_POST['cant_or'];
			$price=$_POST['price_or'];
			$det=$_POST['det_or'];
			$index = $_POST['index'];	
			$arregloNuevo=array(
				'o'=>$index,
				'nom'=>$nombre,
				'cant'=>$cant,
				'price'=>$price,
				'det'=>$det
				);
			array_push($arreglo, $arregloNuevo);
			$_SESSION['carrito']=$arreglo;
		}
	}
}else{
$valor=0;
	if(isset($_POST['nombre']) && $_POST['nombre_or']!=''){
		
		$nombre=$_POST['nombre_or'];
		$cant=$_POST['cant_or'];
		$price=$_POST['price_or'];
		$det=$_POST['det_or'];
		$index = $_POST['index'];			
		$arreglo[]=array(
				'o'=>$index,
				'nom'=>$nombre,
				'cant'=>$cant,
				'price'=>$price,
				'det'=>$det
				);
		$_SESSION['carrito']=$arreglo;

	}else{
	}
}
if(isset($_SESSION['carrito'])){
	$datos=$_SESSION['carrito'];
                
  	for($i=0;$i<count($datos);$i++){
				$suma= $datos[$i]['price']*$datos[$i]['cant']+$suma; 
				$cantidad=$datos[$i]['cant']+$cantidad;
			 	echo"
			 	
					 	<div class='itemCartscroll'>";
					 		if($datos[$i]['det']!=''){
							 	echo"<div class='detalleItem'>
							 		".$datos[$i]['det']."
							 	</div>";
						 	}else{
							 	echo"<div class='detalleItem'>
							 		Sin adiciones
							 	</div>";
						 	}

						 	echo"<div class='productQuantity dropdown '>
						 		<div class='cont-qua'>
                                    <span class='masitem icon-arrow-mas' data-index='".$datos[$i]['nom']."' data-det='".$datos[$i]['det']."'></span><span> ".$datos[$i]['cant']."</span><span class='menositem icon-arrow-menos' data-index='".$datos[$i]['nom']."' data-det='".$datos[$i]['det']."'></span>    
						 		</div>
						 	</div>
						 	<div class='name'>
						 		".$datos[$i]['nom']."
						 	</div>
						 	<div class='remove'>
                                <a class='quitar icon-cancel' data-index='".$datos[$i]['nom']."' data-det='".$datos[$i]['det']."'></a>
                            </div>
						 	<div class='price'>
						 		".$datos[$i]['price']*$datos[$i]['cant']."
						 	</div>
						 	
					 	</div>                      
                    ";
				
  	}
}else{
		echo"<center>No hay productos</center>";
}
$_SESSION['suma']=$suma;
$_SESSION['cantidad']=$cantidad;
$_SESSION['delivery']=1.80;
?>