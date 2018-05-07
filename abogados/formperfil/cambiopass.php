<?php
//Generar la contraseña aleatoria
//actualizar el campo pass de la db con el mail que ingresó. Si no existe se le pide se registre
//se manda mail con la contraseña generada aleatoriamente
// The message
/*$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send
mail('imagenialidad@gmail.com', 'My Subject', $message);*/
require_once ('../db.class.php');


function generaPass(){
  //Se define una cadena de caractares. Te recomiendo que uses esta.
  $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
  //Obtenemos la longitud de la cadena de caracteres
  $longitudCadena=strlen($cadena);

  //Se define la variable que va a contener la contraseña
  $pass = "";
  //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
  $longitudPass=10;

  //Creamos la contraseña
  for($i=1 ; $i<=$longitudPass ; $i++){
    //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
    $pos=rand(0,$longitudCadena-1);

    //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
    $pass .= substr($cadena,$pos,1);
  }
  return $pass;
}
$newPass = generaPass();
//echo $newPass;

if(isset($_POST) && $_POST['direccion']!=''){

  $message = "Su contraseña provisional es:<strong> $newPass </strong> <br>";
  $message .= "No olvide cambiarla al ingresar a su cuenta<br>";
  $message .= "<a href='http://abogadosweb.com.co/beta/index.php'>Ingresar</a>";

  // In case any of our lines are larger than 70 characters, we should use wordwrap()
  //$message = wordwrap($message, 70, "\r\n");
  $subject = "Abogados Web recuperación de contraseña";
  $from = 'no-reply@abogadosweb.com.co';

  
  $headers  = "From: $from\r\n";
  $headers .= "Reply-To: $from\r\n";
  $headers  .= "MIME-Version: 1.0\r\n"; //concatena al final asi va pegando
  $headers  .= "Content-Type: text/html; charset= utf-8\r\n"; 
  $headers .= "X-Mailer: PHP/".phpversion();

  mail($_POST['direccion'], $subject, $message,$headers);

  

  $query = "UPDATE users SET  pass=:pass WHERE email=:email ";

  $newPassDB = md5($newPass);
  $stmt = DB::getStatement($query);

  $stmt->bindParam(":email",$_POST['direccion'], PDO::PARAM_STR);
  $stmt->bindParam(":pass", $newPassDB, PDO::PARAM_STR);
  $newPass = generaPass();
  if($stmt->execute()){
    
    echo'<script> alert("Enviamos una nueva contrase\u00F1a a su e-mail.");document.location.href = "../index.php";</script>';
      //echo 'actualizò';

    }else{
      header('Location: ../pantallazos/errorgrabacion.php');
      //echo 'No actualizò'; 
    }


}


?>
<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Abogados Web" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://abogadosweb.com.co" />
<meta property="og:site_name" content="Abogados Web consultas en linea" />
<meta property="fb:admins" content="612842103" />

<link rel="icon" type="image/png" href="../favicon.ico" />
<link href="../css/stylos.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="actualizardatos">
    <div class="login">
    	<div class="logo2">
        	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
        </div>
		
        <div class="inicio">
			<a href="../index.-php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
			<a href="../index.php"> Volver</a>
		</div>
    </div>
	<div class="cont_ca">
        <div class="titulo_ca" >
                Cambio obligatorio de contraseña
        </div>
        <div id="textca">
        <p><br />Escriba una nueva contraseña</p>
        </div>
        <div class="ca_datos">
            <form action="" method="POST">
                <table width="380" border="0" cellspacing="0">
                     
                      <tr>
                        <td style="padding-left:23px">Nueva contraseña</td><td style="padding-left:23px">Escriba nuevamente la contraseña</td>
                      </tr>
                      <tr>
                    <td><input type="password" name="pass" size="40" value="" onfocus="elementoDentro(this)" onblur="elementoFuera(this)"/></td>
					<td><input type="password" name="repass" size="40" value="" onfocus="elementoDentro(this)" onblur="elementoFuera(this)"/></td>
                      </tr>
                      
                                  
                      <tr>
                        <td><input align="right" class="btrecordar" type="submit" name="enviar" width="170" height="50" value="Cambiar ahora"/></td>
                      </tr>
                </table>
            </form>
        </div>
     </div>
</div>
</body>
</html>-->