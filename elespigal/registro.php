
<script>
function justNumbers(e)
  {
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
    return true;
     
    return /\d/.test(String.fromCharCode(keynum));
  }
</script>
<div class="diacedula">
    
    <div class="header-orden">
        <span class="icon-undo2 atras-cart atras"><i>Atras</i></span>
        <div class="logopedido"><img src="imagenes/logo-01.png" alt="El Espigal"></div>
        <div class="menenvio"></div>  
        <span class="icon-cancel cancel-cedula canceldia"></span>
    </div>
    
    <form class="formced">
        <p class='textres'>Ingrese <font>su cédula y </font>Verificamos <font>si está registrado.</font></p>
        <div class="campo-cedula">
            <label><span class="asterisco floatnone">*</span>Cédula de identidad </label>
            <input class="inputres" onkeypress="return justNumbers(event);" id="cedula" type="tel" placeholder="Ingrese No. de su cedula"/>
        </div>
        <div class="verificarcedula boton"> Verificar o Registrarse<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></div>      
    </form>
    

    
</div>
<div class="diareg">
    <div class="header-orden">
        <span class="icon-undo2 atras-envio atras"><i>Atras</i></span>
        <div class="logopedido"><img src="imagenes/logo-01.png" alt="El Espigal"></div>
        <div class="menenvio"></div>  
        <span class="icon-cancel cancel-envio canceldia"></span>
    </div>
    
    <form class="formres">
    </form>
    
</div>
<article class="confirmacion">
    <section class="header-conf">
       
       <span class="icon-cancel cancel-envio canceldia"></span>
    </section>
    <section class="body-conf">
        <article class="mensajeenviado">
            <center>Su pedido ha sido envido</center>
        </article>       
        <article class="observa">
            <h4>Importante!</h4>
            <div>*Tiempo promedio a domicilio de 20 a 30 minutos.</div>
            <div>*Los productos calientes(café) recalentar cuado lleguen.</div>
            <div>*Si no llega su pedido llamar al local seleccionado.</div>
        </article>
        <article class="sugpedido">
            <label>Sugerencia sobre la página web</label>
            <input type="text" name="sugpag" placeholder="Sus sugerencias son importantes"/>
            <span class='invalid '></span>
            <div class="boton enviar">Enviar sugerencia<div class='cargando '><i class='fa fa-spinner fa-pulse'></i></div></div>
            <div class="boton omitir">Terminar</div>
        </article>
    </section>
    <section class="footer-conf"></section>
    
</article>
<article class="mensaje-sug">
      
</article