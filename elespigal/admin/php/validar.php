<?php
	include "../php/config.php";
if(isset($_GET['mailcont'])){
$email = $_GET['mailcont'];
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo"<script>
				$('.mailinvalido').fadeOut(1);
		</script>
		";
		$contador = 0;
		$conexion = mysqli_connect($servidor, $usuario, $cotrasena, $bd);
		$peticion = "SELECT * FROM usuarios WHERE mail='".$email."'";
		$resultado = mysqli_query($conexion, $peticion);
		while($fila = mysqli_fetch_array($resultado)){
			$contador++;
		}
		if($contador==0 ){
		}else{
			echo"<script>
					$('.mailinvalido').fadeIn();
			</script>
			";
			echo"<p style='margin-top:0px'>Este correo ya esta registrado</p>";
		}
	}else{
		echo"<script>
				$(.mailinvalido').fadeIn();
		</script>
		";
		echo"<p style='margin-top:0px'>Ese correo no es valido</p>";
	}
}
?>
