<?php
@session_start();
echo"
	<script>
	$('#cedula').focusout(function(){
	    var ci=$(this).val();
	    $('.formres').load('php/llenarform.php?ci='+ci);
	});
	</script>
        <p class='textres'>Ingrese su cedula y verificamos si está registrado.</p>
	<label>*Cedula de identidad </label>
     <input class='inputres' id='cedula' type='text' placeholder='Verifique si esta registrado con el No. de su cedula'/>
    ";

?>