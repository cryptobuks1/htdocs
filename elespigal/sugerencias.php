<?php
  include 'header.php';
  ?>
  <link rel="stylesheet" href="css/from.css" />
  <script src="foundation/js/vendor/modernizr.js"></script>
  <link rel="stylesheet" href="css/responsive.css" />
  <div class="cont-formularios">
    
    <section class="section-contact">
      <h1 class="titulo-sug font-t">Sugerencias</h1>
      <div class="datos-c">
        
        <div>
          <p>Déjanos tu sugerencia, es importante para nosotros.</p> 
          
        </div>
      </div>
      <h2>Formulario de sugerencias</h2>
      <form data-abide class="form-cont">
        <div class="name-field">
          <label>Nombre y Apellido
              <input type="text" name="name"  pattern="[a-zA-Z]+" placeholder="Escriba su nombre y apellidos">
          </label>
          <small class="error">El nombre es necesario y debe ser una cadena.</small>
        </div>
        <div class="name-field">
          <label>Teléfono / Celular
              <input type="text" name="tel" pattern="[a-zA-Z]+" placeholder="Escriba su número telefónico">
          </label>
          <small class="error">El nombre es necesario y debe ser una cadena.</small>
        </div>
        <!-- <div class="email-field">
          <label>Correo Electrónico
              <input type="email" name="mail" placeholder="Escriba un correo electrónico válido">
          </label>
          <small class="error">E-mail requerido.</small>
        </div>-->
        <div class="mensaje-field">
            <label><div class="asterisco">*</div>Sugerencia 
            <textarea class="error mensaje" name="mensaje" placeholder="Sugerencia..." ></textarea>
            <span class="invalid invalidpos"></span>
          </label>
        </div>
        <div class="g-recaptcha" data-sitekey="6Lfo9wYTAAAAAD7A-ez9d3P8Lv0QzPWv8s8ClzO2"></div>
        <span class="invalid invalidpos"></span>
        <div  class="boton btn-primary enviar-sug">Enviar</div>
      </form>
      <div class="mensaje-ok"></div>

    </section>
  </div>
  <?php
  include 'footer.php';
  ?>
  </body>
</html>