<?php
  include 'header.php';
  ?>
  <link rel="stylesheet" href="css/from.css" />
  <script src="foundation/js/vendor/modernizr.js"></script>
  <link rel="stylesheet" href="css/responsive.css" />
  <div class="cont-formularios">
    <section class="section-contact">
      <h1 class="titulo-cont font-t">Empleo</h1>
      <div class="datos-c">
        <div>
          <p>Sea parte de nuestro equipo, llene los datos del formulario.</p> 
          
        </div>
      </div>
      <h2>Formulario</h2>
      <form data-abide class="form-cont">
        
        <div class="row">
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Nombre y Apellido </div>
            <div class="col-md-8">
              <span class="">
                  <input type="text" name="nombre" value="" size="40" class="" placeholder="Escriba su nombre y apellidos">
                  <span class="invalid invalidpos"></span>
              </span>
            </div>
          </div>
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Edad </div>
            <div class="col-md-8">
                <span class="">
                    <input type="text" name="edad" value="" size="40" class="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Escriba su edad en números">
                    <span class="invalid invalidpos"></span>
                </span>
            </div>
          </div>          
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Dirección de Domicilio / Sector</div>
            <div class="col-md-8">
                <span class="direccion">
                    <input type="text" name="direccion" value="" size="40" placeholder="Cevallos y Mera sector Mutualista Ambato">
                    <span class="invalid invalidpos"></span>
                </span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4"><div class="asterisco">*</div>Teléfono / Celular </div>
            <div class="col-md-8">
                <span class="wpcf7-form-control-wrap ciudad">
                    <input type="text" name="ciudad" value="" size="40" class="" placeholder="Escriba su número de teléfono">
                    <span class="invalid invalidpos"></span>
                </span>
            </div>
          </div>
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Nivel Educativo </div>
            <div class="col-md-8">
                <select name="nivel-educativo" class="ll">
                  <option value="">---</option>
                  <option value="primaria">Primaria</option>
                  <option value="bachillerato">Bachiller</option>
                  <option value="universitario">Universitario</option>
                  <option value="profesional">Profesional</option>
                </select>
                <span class="invalid invalidpos"></span>
            </div>
          </div>
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Experiencia en Cafetería / Restaurante</div>
            <div class="col-md-8">
                <select name="exp" class="ll">
                  <option value="">---</option>
                  <option value="primaria">Si</option>
                  <option value="bachillerato">No</option>
                </select>
                <span class="invalid invalidpos"></span>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-4"><div class="asterisco">*</div>Cargo a aplicar </div>
            <div class="col-md-8">            
                <select name="cargo" class="">
                  <option value="">---</option>
                  <option value="cajero">Cajero</option>
                  <option value="ayudante">Ayudante cocina</option>
                  <option value="motorizado">Motorizado</option>
                  <option value="mesero">Mesero</option>
                  
                </select>
                <span class="invalid invalidpos"></span>             
            </div>
          </div>
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Correo Electrónico </div>
            <div class="col-md-8">
                <span class="correo">
                    <input type="email" name="correo" value="" size="40" class="mail" placeholder="Escriba un correo electrónico válido">
                    <span class="invalid invalidpos"></span>
                </span>
            </div>
          </div>
         
          <div class="row">
              <div class="col-md-4"><div class="asterisco">*</div>Subir Hoja de Vida</div>
            <div class="col-md-8"><span class="hojadevida">
                    <input type="file" name="hojadevida" value="1" size="40" class="">
                    <span class="invalid invalidpos"></span>
                </span>
            </div>
          </div>
            <div class="g-recaptcha" data-sitekey="6Lfo9wYTAAAAAD7A-ez9d3P8Lv0QzPWv8s8ClzO2"></div>
            <span class="invalid invalidpos"></span>
          <div class="row ">
            <div  class="boton btn-primary enviar-em">Enviar</div>
            <!--<img class="ajax-loader" src="http://www.sandwichqbano.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando..." style="visibility: hidden;">-->
          </div>
        </div>
      </form>
      <div class="mensaje-ok"></div>
    </section>
  </div>
  <?php
  include 'footer.php';
  ?>
  </body>
</html>