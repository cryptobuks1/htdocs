
<?php @session_start();
include 'header.php';?>
<div class='section-producto'>
    <article class="confirmacion">   
        <section class="body-conf">
            <article class="mensajeenviado">
                <center>Su pedido ha sido envido</center>
            </article>       
            <article class="observa">
                <h4>Importante!</h4>
                <div>*Tiempo promedio a domicilio de 20 a 30 minutos.</div>
                <div>*Los productos calientes(café) recalentar cuado lleguen.</div>
                <div>*Si no llega su pedido llamar al local seleccionado.</div>
                <div><strong style="color:#a6010c">Si su pedido no llega al la bandeja de entrada de su correo, revise el spam o correo no deseado y marquelo como no spam.</strong></div>
            </article>
            <article class="sugpedido">
                <label>Sugerencia sobre la página web</label>
                <form action="enviarsugp.php" method="POST">
                    <input type="text" name="sug" class="sugpag" placeholder="Sus sugerencias son importantes"/>
                    <span class='invalid '></span>
                    <input type="submit" class="boton enviar" value="Enviar sugerencia">
                </form>
                <a href='producto.php' class="boton omitir">Terminar</a>
            </article>
        </section>
        <section class="footer-conf"></section>    
    </article>
    <article class="mensaje-sug">
          
    </article>
</div>
 <?php
  include 'footer.php';
  ?>
  </body>
</html>