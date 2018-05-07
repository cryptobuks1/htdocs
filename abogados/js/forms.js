function elementoDentro(elemento){	
	elemento.className='enfoco';
	var todacelda = document.getElementsByTagName("input");
	for(var i=0; i<todacelda.lenght; i++){
	todacelda[i].className='';
	}

}

function validarEmail(elemento){
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	elemento.className='';
	if($(".email").val() == "" || !emailreg.test($(".email").val())){
		elemento.className='errorEmail';
		var parrafo = elemento.parentNode;
		parrafo.innerHTML += "<p style='font-size:9px' class='texterror' id='texterror'>Igrese un correo valido, campo obligatorio</p>";
	}else{
		elemento.className='';	
	}
		
	
	}
	
function CampoNoRequerido(elemento){
	elemento.className='';
	var texterror = document.getElementById('enfoco');
		if(texterror!=undefined){
			texterror.parentNode.removeChild(enfoco);
		}

	}
	
function elementoFuera(elemento){
	elemento.className='';
	var texterror = document.getElementById('texterror, errorEmail');
		if(texterror!=undefined){
			texterror.parentNode.removeChild(texterror, errorEmail);
		}

	}
function campoRequerido(elemento){
	if(elemento.value==''){
		elemento.className='error';
		var parrafo = elemento.parentNode;
		parrafo.innerHTML += "<p style='font-size:9px' class='texterror' id='texterror'>Campo obligatorio</p>";
	}
	else{
		elemento.className='';	
	}
}


	

