<?php
session_start();

require_once '../db.class.php';


if ($_SERVER ['REQUEST_METHOD'] == 'POST' && $_POST['correo'] !='' && $_POST['pass'] !=''){ 

        $email      = $_POST['correo'];
        $pass       = md5($_POST['pass']);

        $query = "SELECT name, email, pass FROM users WHERE email=:email AND pass=:pass";


		$stmt = DB::getStatement($query);

		$stmt->bindParam(":email", $email, PDO::PARAM_STR);
		$stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
		 
		
		if($stmt->execute()){

			$_SESSION['logueado'] = true;
            $_SESSION['email'] = $email;
            


			while($fila = $stmt->fetch()) {
				$usuario = $fila['name'];
				$_SESSION['name'] = $usuario;



			}
                

            $fecha_exp = time()+60*60*24;
            setcookie("name",$usuario, $fecha_exp);
            setcookie("email",$email, $fecha_exp);
            setcookie("pass",$password, $fecha_exp);
 
            header ("Location: ../index.php");
            exit;

		}else{
                $error ="email y/o password incorrecto";
              
                echo $error;
                
        }
}else{

	$error ="email y/o password incorrecto";
              
    echo $error;	

	/*
	$usuario = $_COOKIE['name'];
    $pass = $_COOKIE['pass'];
    $email = $_COOKIE['email'];*/
}       



//      print_r($_COOKIE);
        




/*
session_start();

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$host='localhost';
$user='root';
$password='123';

$conexion = mysql_connect($host,$user,$password);
mysql_select_db('abogadosweb',$conexion);

$consulta = mysql_query("SELECT nombre FROM usuarios
WHERE usuario LIKE '$usuario' and pass LIKE
'$pass'",$conexion);
$dato= mysql_fetch_array ($consulta);
$cambia= $dato['usuario'];
echo "<hr size = 10 color = ffffff width = 50% align = left>";
if ($dato =="usuario,pass")
{
echo $dato;
echo "Los datos no son correctos, <a
href=../index.php>Volver</a>";
}
else
{
echo $dato;
echo "<STRONG>Bienvenido a nuestra web
$cambia</STRONG><a href=../index.php>Volver</a>";
}*/
?>
