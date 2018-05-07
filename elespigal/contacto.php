<?php
  include 'header.php';
  ?>
  <link rel="stylesheet" href="css/from.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <div class="cont-formularios">
    <!--<section class="banner-contacto">
      <img src="imagenes/pano_espigal.jpg">
    </section>-->
<section class="contacto-img">
      <div class="imgcontacto">
        <img src="imagenes/contacto.jpg" alt="Local El espigal del centro de ambato"/>
      </div>
      
  </section> 
    <section class="section-contact">
      <h1 class="titulo-cont font-t">Contacto</h1>
      <div class="datos-c datos-dc">
        <h2>Datos de contacto</h2>
        <div class="datos">
            <div> <div class="titledatos"><span class="icon-phone"></span><font class="textred">Local (Centro):</font> </div>(03)2-820-710 / 0994-189-823 </div>
            <div> <div class="titledatos"><div class="titledatos"><span class="icon-phone"></span><font class="textred">Local (Sector Mall):</font> </div>(03)2-419-915 / 0983-100-210 </div>
            <div><div class="titledatos"><span class="icon-mail"></span><font class="textred">E-mail:</font> </div>elespigal@hotmail.com</div>
        </div>
      </div>
      <h2>Formulario de contacto</h2>
      <form data-abide class="form-cont">
        <div class="name-field">
            <label><div class="asterisco">*</div>Nombre y Apellido
                <input type="text" class='name requerido' name="name" pattern="[a-zA-Z]+" placeholder="Escriba su nombre y apellidos">
                <span class="invalid invalidpos"></span>
          </label>
          <small class="error">El nombre es necesario y debe ser una cadena.</small>
        </div>
        <div class="name-field">
            <label><div class="asterisco">*</div>Teléfono / Celular
              <input type="text"  class='tel requerido' name="tel" pattern="[a-zA-Z]+" placeholder="Escriba su número telefónico">
              <span class="invalid invalidpos"></span>
          </label>
          <small class="error">El nombre es necesario y debe ser una cadena.</small>
        </div>
        <div class="name-field">
            <label><div class="asterisco">*</div>Correo Electrónico
              <input type="email"  class='mail requerido' name="mail" required placeholder="Escriba un correo electrónico válido">
              <span class="invalid invalidpos"></span>
          </label>
          <small class="error">E-mail requerido.</small>
        </div>
        <div class="name-field">
            <label><div class="asterisco">*</div>Mensaje 
            <textarea  class='error mensaje requerido' name="mensaje" placeholder="Mensaje..." ></textarea>
            <span class="invalid invalidpos"></span>
            <small class="error">Complete este campo</small>
          </label>
        </div>
        <!--<div class="g-recaptcha" data-tabindex="0" data-sitekey="6Lfo9wYTAAAAAD7A-ez9d3P8Lv0QzPWv8s8ClzO2"></div>
        <span class="invalid invalidpos"></span>-->
        <div  class="boton btn-primary enviar-cont">Enviar</div>
      </form>
      <div class="mensaje-ok"></div>

    </section>
  </div>
  <?php
  include 'footer.php';
  ?>
  </body>
</html>