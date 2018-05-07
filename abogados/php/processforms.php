<?php 
session_start();

require_once ('../db.class.php');

// Recibo variables enviadas en el formulario

$name 		 = $_POST['nombre'];
$middle_name = $_POST['apellido'];
$email 		 = $_POST['correo'];
$phone 		 = $_POST['telefono'];
$tipominuta  = $_POST['tipominuta'];
$comentario  = $_POST['coment'];

$queryVar    = $_POST['query'];
//$minutas     = $_POST['minutas'];

echo $tipominuta;
echo '<pre>';
print_r($_POST);
echo '</pre>';
echo $ip;

//Me aseguro que las variables recibidas no estén vacías, y chequeo que las contraseñas coincidan
//si alguna está vacía se sale del if y marca error
if($name!='' && $middle_name!='' && $email!=''&& $phone!=''){
//echo 'entra';
	//Me aseguro que el usuario no existe en la base, si existe no hago insert, así se evitan usuarios
	//duplicados

	/*$query = "SELECT COUNT(email) FROM users WHERE email=:email AND user=:user";


	$stmt = DB::getStatement($query);

	$stmt->bindParam(":email", $email, PDO::PARAM_STR);
	$stmt->bindParam(":user", $user, PDO::PARAM_STR);
	$result = $stmt->execute();
	$number_of_rows = $stmt->fetchColumn();*/



		//inserción de datos en la DB

		//definir si la cédula va a ir como un requisito o no? Si va hay que agregar esa variable.

		switch ($queryVar) {
			case 1:
				# code...
				$query = "INSERT INTO consulta_juridica (nombre, apellido, telefono, correo, comentario, insert_time)
							  VALUES (:name, :middle_name,:phone,:email, :comm, NOW())";

				$stmt = DB::getStatement($query);

				$stmt->bindParam(":name", $name, PDO::PARAM_STR);
				$stmt->bindParam(":middle_name", $middle_name, PDO::PARAM_STR);

				$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":comm", $comentario, PDO::PARAM_STR);

				//manda mail con la consulta
				$to = "imagenialidad@gmail.com".',';
				$to .= "lupaproyectos@gmail.com";
				$message = "Nombre: $name <br>";
				$message .= "Apellido: $middle_name <br>";
				$message .= "Teléfono: $phone <br>";
				$message .= "E-mail: $email <br>";
				$message .= "Mensaje: $comentario <br>";
				

			    // In case any of our lines are larger than 70 characters, we should use wordwrap()
			    //$message = wordwrap($message, 70, "\r\n");
			    $subject = "Consulta Jurídica";
			    $from = "no-reply@abogadosweb.com.co";

			  
			    $headers  = "From: $from\r\n";
			    $headers .= "Reply-To: $from\r\n";
			    $headers  .= "MIME-Version: 1.0\r\n"; //concatena al final asi va pegando
			    $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
			    $headers .= "X-Mailer: PHP/".phpversion();

			    mail($to, $subject, $message,$headers);			  
				break;

			case 2:
				# code...
				$query = "INSERT INTO minuta_personalizada (nombre, apellido, telefono, correo,interesado_en, comentario, insert_time)
							  VALUES (:name, :middle_name,:phone,:email,:inter, :comm, NOW())";

				$stmt = DB::getStatement($query);			  

				$stmt->bindParam(":name", $name, PDO::PARAM_STR);
				$stmt->bindParam(":middle_name", $middle_name, PDO::PARAM_STR);

				$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":inter", $tipominuta, PDO::PARAM_STR);
				$stmt->bindParam(":comm", $comentario, PDO::PARAM_STR);	

				//manda mail con la consulta
				$to = "imagenialidad@gmail.com".',';
				$to .= "lupaproyectos@gmail.com";
				$message = "Nombre: $name <br>";
				$message .= "Apellido: $middle_name <br>";
				$message .= "Teléfono: $phone <br>";
				$message .= "E-mail: $email <br>";
				$message .= "Mensaje: $comentario <br>";
				

			    // In case any of our lines are larger than 70 characters, we should use wordwrap()
			    //$message = wordwrap($message, 70, "\r\n");
			    $subject = "Consulta Jurídica";
			    $from = "no-reply@abogadosweb.com.co";

			  
			    $headers  = "From: $from\r\n";
			    $headers .= "Reply-To: $from\r\n";
			    $headers  .= "MIME-Version: 1.0\r\n"; //concatena al final asi va pegando
			    $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
			    $headers .= "X-Mailer: PHP/".phpversion();

			    mail($to, $subject, $message,$headers);				  
							  
				break;	
			
			default:
				# code...
				break;
		}

		



		if($stmt->execute()) {
			DB::getConnection()->lastInsertId();

			//Hay que definir estás respuestas gráficamente, sea por pop up o una página a parte
			echo 'Consulta enviada correctamente, será redirigido a la home en 3 segundos';
			
			echo '<meta http-equiv="REFRESH" content="3,url=../index.php">';
			
		}


	

}else{ 

	//Hay que definir estas respuestas gráficamente, sea por pop up o una página a parte

	echo 'error al enviar su consulta';
	echo '<meta http-equiv="REFRESH" content="3,url=../index.php">';
}



/*$conexion = mysql_connect('localhost','root','jDhyJGKC7q6RqzNX');
$consulta = "INSERT INTO usuarios VALUES ('".$nombre."','".$apellido."','','','".$correo."','".$usuario."','','".$pass."','".$repass."','','".$fecha."','".$ip."','','".$navegador."')";
$resultado = mysql_query($conexion,$consulta);
mysql_close($conexion);*/




?>
