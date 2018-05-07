<?php

session_start();

require_once ('../db.class.php');

// Recibo variables enviadas en el formulario

$name 		= $_POST['nombre'];
$middle_name= $_POST['apellido'];
$adress 	= $_POST['direccion'];
$email 		= $_POST['correo'];
$user 		= $_POST['usuario'];
$phone 		= $_POST['telefono'];
$pass 		= md5($_POST['pass']);
$repass 	= md5($_POST['repass']);
$birthday 	= $_POST['fecha'];
@$ip 		= getenv(REMOTE_ADDR);
$navegador = $_SERVER["HTTP_USER_AGENT"];

echo '<pre>';
print_r($_POST);
echo '</pre>';
echo $ip;

//Me aseguro que las variables recibidas no estén vacías, y chequeo que las contraseñas coincidan
//si alguna está vacía se sale del if y marca error
if($name!='' && $middle_name!='' && $adress!='' && $email!=''
	&& $user!=''&& $phone!=''&& $pass!=''
	&& $repass!='' && $birthday!='' && $ip!='' && $pass == $repass){

	//Me aseguro que el usuario no existe en la base, si existe no hago insert, así se evitan usuarios
	//duplicados

	$query = "SELECT COUNT(email) FROM users WHERE email=:email AND user=:user";


	$stmt = DB::getStatement($query);

	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
	$stmt->bindParam(":user", $user, PDO::PARAM_STR);
	$result = $stmt->execute();
	$number_of_rows = $stmt->fetchColumn();


	if($number_of_rows==0){

		//inserción de datos en la DB

		//definir si la cédula va a ir como un requisito o no? Si va hay que agregar esa variable.

		$query = "INSERT INTO users (name, middle_name, birthday, user, pass, email,adress,phone,ip,insert_time)
				  VALUES (:name, :middle_name,:birthday, :user,:pass,:email, :adress, :phone, :ip, NOW())";

		$stmt = DB::getStatement($query);

		$stmt->bindParam(":name", $name, PDO::PARAM_STR);
		$stmt->bindParam(":middle_name", $middle_name, PDO::PARAM_STR);
		$stmt->bindParam(":adress", $adress, PDO::PARAM_STR);
		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":user", $user, PDO::PARAM_STR);
		$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
		$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
		$stmt->bindParam(":birthday", $birthday, PDO::PARAM_STR);
		$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);



		if($stmt->execute()) {
			DB::getConnection()->lastInsertId();
			$_SESSION['usuario'] = $user;
			//Hay que definir estás respuestas gráficamente, sea por pop up o una página a parte
			echo 'usuario agregado correctamente, será redirigido a la home en 3 segundos';
			
			echo '<meta http-equiv="REFRESH" content="3,url=../index.php">';
			
		}

	}else{

		//Hay que definir estas respuestas gráficamente, sea por pop up o una página a parte

		echo'usuario ya existe en la base de datos';
		echo '<meta http-equiv="REFRESH" content="3,url=../index.php">';
	}


	

}else{ 

	//Hay que definir estas respuestas gráficamente, sea por pop up o una página a parte

	echo 'error al grabar en la base de datos';
	echo '<meta http-equiv="REFRESH" content="3,url=../index.php">';
}



/*$conexion = mysql_connect('localhost','root','jDhyJGKC7q6RqzNX');
$consulta = "INSERT INTO usuarios VALUES ('".$nombre."','".$apellido."','','','".$correo."','".$usuario."','','".$pass."','".$repass."','','".$fecha."','".$ip."','','".$navegador."')";
$resultado = mysql_query($conexion,$consulta);
mysql_close($conexion);*/




?>
