<?php
  require_once ('../db.class.php');
  session_start();
  if(!$_SESSION['logueado']){

    header('Location: ../index.php');
  }else{


    $query = "SELECT * FROM users WHERE email=:email ";


    $stmt = DB::getStatement($query);

    $stmt->bindParam(":email", $_SESSION['email'], PDO::PARAM_STR);

    $stmt->execute();


    while($row = $stmt->fetch()) {
     


?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta property="og:title" content="Abogados Web" />
      <meta property="og:type" content="website" />
      <meta property="og:url" content="https://abogadosweb.com.co" />
      <meta property="og:site_name" content="Abogados Web consultas en linea" />
      <meta property="fb:admins" content="612842103" />

      <link rel="icon" type="image/png" href="favicon.ico" />
      <link href="../css/stylos.css" rel="stylesheet" type="text/css" />
      </head>
      <body>
      <div class="actualizardatos">
          <div class="login">
          	<div class="logo2">
              	<img src="../imagenes/logologin-01.png" alt="logo de zona de usuarios"/>
              </div>
      		
              <div class="inicio">
      			<a href="../index.php"><img src="../imagenes/volver-01.png" alt="volver a home"/></a>
      			<a href="../index.php"> Volver</a>
      		</div>
          </div>
      	<div class="titulo_act">
              	Actualice sus datos
      	</div>
          <div class="ac_datos">
              <form action="" method="POST">
              	<table width="380" border="0" cellspacing="0">
                        <tr>
                          <td><span>Nombre</span></td><td><span>Apellido</span></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="nombre" size="40" value="<?php echo $row['name'];?>"/></td>
      					<td><input type="text" name="apellido" size="40" value="<?php echo $row['middle_name'];?>"/></td>
                        </tr>
                        <tr>
                          <td><span>Direcci&oacute;n</span></td><td><span>Tel&eacute;fono</span></td>
                        </tr>
                        <tr>
                          <td><input type="email" name="direccion" size="40" value="<?php echo $row['adress'];?>"/></td>
      					<td><input type="text" name="telefono" size="40" value="<?php echo $row['phone'];?>"/></td>
      				  </tr>
      				  <tr>
      					<td><span>Correo</span></td>
      				  <tr>	
      					<td><input type="email" name="correo" size="40" value="<?php echo $row['email'];?>"/></td>
      				  </tr>
      				  </tr>
                        <tr>
                          <td><span>Fecha de Nacimiento</span></td>
                        </tr>
                        <tr>
                          <td><input type="date" name="fecha"  size="40" value="<?php echo $row['birthday'];?>"/></td>
                        </tr>
      				  			  
      				  <tr>
                          <td><input class="btactualizar" type="submit" name="enviar" width="170" height="50" value="Actualizar"/></td>
                        </tr>
                  </table>
          	</form>
          </div>
      </div>
      </body>
      </html>
<?php
  }

}

?>