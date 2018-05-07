<!DOCTYPE html>
<html lang="en">

<head>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
 
</head>
<script async="" src="http://lupaweb.com/vacation/verificar.js"></script>
<body>
<style>
.containerform{
width:70%;
margin:0 auto;
padding:10px 70px;
}
.formchipitines h4{
color:#CB3232;
text-transform:none;
font-size:18px;
text-align:center;
}
.formchipitines p{
padding:0 0px;
}
.formchipitines .span{
width:100%;
display:inline-block;
height:auto;
padding:0 15%;
margin:5px 0;
}
.containerform input{
width:100%;
border-radius:10px;
border:#000 solid 1px;
max-width:100%;
color:#000;
margin:0 auto;
font-size:16px;
}
.terminos{
width:70%;
margin:20px auto;
font-size:12px !important;
line-height:12px !important;
text-align:justify;
}
.enviarVacaciones {
width:30%;
margin:0 10px 0 35%;
background:#104e87;
color:#fff;
text-align: center;
padding:10px 10px;
border-radius:10px;
border:solid 1px #1A237E;
cursor:pointer;
}
.enviarVacaciones:hover{
    background:#053765;
}
.acepter{
width: 20px !important;
float: left;
padding: 0 0 0 15% !important;
}
.textacep{
display:inline-block;
margin: 5px 0 15px;
width: 70%;
}
@media screen and (max-width: 800px){
    .containerform{
    width:90%;
    margin:0 auto;
    padding:10px 5%;
    }
    .formchipitines .enviarVacaciones {
    width:60%;
    margin:0 0 0 20%;
    background:#104e87;
    color:#fff;
    }
    .terminos{
    width:90%;
    margin:20px auto;
    }
}
.alert{
    width: 70% !important;
    padding: 5px 20px;
    margin:0 auto;
    background: transparent;
}
.ajax-loader{
    left:10%;
    display:none;
    height: 100%;
    width: 100%;
    position: absolute;
    background: rgba(255,255,255,.8);
    top: 0;
    vertical-align: middle;
    text-align: center;
}
.loader{
    margin-top: 50%;
    width:1.5%;
}
.alert{
}
#blocklayer{
    position:relative;
}
</style>
<div role="form" class="wpcf7">
    <form>
        <span class="">
            <input type="text" id="name" value="" size="40" data-validation-required-message="Por favor ingrese nombre del acudiente." class="req" aria-required="true" aria-invalid="false" placeholder="Nombre del acudiente:">
            <div class="help-block"></div>
        </span>
        <span class="">
            <input type="text" id="nombre" value="" size="40" class="req" aria-required="true" data-validation-required-message="Por favor ingrese nombre del niño o niña." aria-invalid="false" placeholder="Nombre del niño/niña:">
            <div class="help-block"></div>
        </span>
        <span class="">
            <input type="email" id="mail" value="" size="40" class="req email" data-validation-required-message="Por favor ingrese un correo valido." aria-required="true" aria-invalid="false" placeholder="Correo:">
            <div class="help-block"></div>
        </span> 
        <span class="">
            <input type="text" id="tel" value="" size="40" class="req" data-validation-required-message="Por favor ingrese un número de teléfono." aria-required="true" aria-invalid="false" placeholder="Teléfono:">
            <div class="help-block"></div>
        </span>
        <p class="terminos">La información suministrada es voluntaria.  Los datos personales serán incluidos, tratados, recolectados, almacenados, usados y procesados en una base de datos del centro comercial, propiedad del CENTRO COMERCIAL CHIPICHAPE PROPIEDAD HORIZONTAL.  E-mail: mercadeo@chipichape.com.co, tel. 6592198, cuya finalidad es gestionar el envío a los clientes de ofertas comerciales y publicaciones, manteniéndole de este modo informado sobre los servicios y productos que se considera puedan resultar de interés para éstos, así como hacerle partícipe de los eventos publicitarios.  El centro comercial Chipichape garantiza el ejercicio de los derechos de acceso, rectificación, cancelación y oposición de los datos facilitados.  Si desea consultar o eliminar sus datos, puede hacerlo mediante comunicación escrita dirigida al correo mercadeo@chipichape.com.co o entregarla físicamente en nuestras instalaciones en las oficinas de la administración de CENTRO COMERCIAL CHIPICHAPE PROPIEDAD HORIZONTAL.  Todo lo anterior, acorde con el aviso de privacidad y política de tratamiento de datos que podrá consultar en nuestra página web www.chipichape.com.co
        </p>
        <p>
            <span class="wpcf7-form-control-wrap acepter">
                <input type="checkbox" name="acepter" value="1" class="terminos wpcf7-acceptance acep-ter" checked data-validation-required-message="Acepte los términos y condiciones."/>
                <div class="help-block"></div>
                <label class="textacep">Acepto términos y condiciones.</label>
            </span>
            <div class="enviarVacaciones">Enviar</div>
            
        </p>
    <div class="alert"></div>
    </form>
    <div class="ajax-loader">
        <img class="loader" src="http://www.chipichape.com.co/new/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Enviando..."/>
    </div>
</div>
</body>
</html>