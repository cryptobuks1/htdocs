<!DOCTYPE html>
<html lang="es">
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/imalestilos.css">
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script async="async" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script async="async" type="text/javascript" src="js/load.js"></script>
</head>
<body>
	<h2>Registra tus datos aquí:</h2>
&nbsp;

	<form method="POST">
		<div class="form-group">
			<input id="name" class="form-control req"   type="text" placeholder="Nombre Completo *" data-validation-required-message="Por favor ingrese su nombre completo" />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group celu">
			<input id="mail" class="form-control req"   type="mail" placeholder="Correo Electrónico *" data-validation-required-message="Por favor ingrese su número de documento." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group celu">
			<input id="fecha" class="form-control req"   type="date" placeholder="Fecha de Nacimiento *" data-validation-required-message="Por favor ingrese su número celular." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group tel">
			<input id="telefono" class="form-control req"   type="tel" placeholder="Teléfono de Celular *" data-validation-required-message="Por favor ingrese su número de teléfono." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group">
			<input id="taller" class="form-control req"   type="text" placeholder="Dirección Taller *" data-validation-required-message="Por favor ingrese un correo valido." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group">
			<input id="residencia" class="form-control req"   type="text" placeholder="Dirección Residencia *" data-validation-required-message="Por favor ingrese un correo valido." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group">
			<input id="ciudad" class="form-control req"   type="text" placeholder="Ciudad *" data-validation-required-message="Por favor ingrese un correo valido." />
			<p class="help-block text-danger"></p>
		</div>
		<div class="form-group">
			<h3>¿Cómo te enteraste de nuestra campaña?</h3>
			<div class="radio"><input name="enteraste"  class="enteraste" type="radio" value="Amigo" /><label>Amigo</label></div>
			<div class="radio"><input name="enteraste"  class="enteraste" type="radio" value="Boletín" /><label>Boletín</label></div>
			<div class="radio radiom" data-validation-required-message="Seleccione una opción"><input name="enteraste"  class="enteraste" type="radio" value="Otro" /><label>Otro</label><input id="otro"  class="form-control detenteraste" type="text" placeholder="Otro" data-validation-required-message="Ingresa el detalle de como te enteraste."/><p class="help-block text-danger"></p></div>
		</div>
		<div class="form-group">
			<div class="checkbox">
			<input checked="checked" name="terminos" type="checkbox" class="terminos" value="acepto" data-validation-required-message="Acepte los terminos"/><label class="losterminos" data-validation-required-message="Acepte los terminos">La Política de protección de Datos Personales y los términos y condiciones de Soy Imalero</label><p class="help-block text-danger"></p>
			</div>
		</div>
		<div class="mensaje-respuesta"></div>
	</form>
	<div class="btn btn-lg btn-primary btn-block enviarRegistro">Enviar </div>
</body>
</html>
