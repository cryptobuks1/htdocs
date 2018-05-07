 $(document).ready(function(){
	$('#usuarios').click(function(evento){
		evento.preventDefault();
		$('#cortina').css({'opacity':'0.7', 'display':'block'},500);
		$('#zona').css({'opacity':'1', 'display':'block'},1000);
	});
	$('#cerrar').click(function(evento){
		evento.preventDefault();
		$('#cortina').css({'opacity':'0', 'display':'none'},500);
		$('#zona').css({'opacity':'0', 'display':'none'},1000);
	});

 });
         
					
					
/*					
					$('#bannerinicio').animate({
                               'height':'500px'
                    },50).animate({
                               'height':'500px'
                    },5700).animate({
								'height':'-500px'
					},300);
					$('#soluciones').animate({
								'margin-top':'-160px'
					},500).animate({
								'margin-top':'125px'
					},200).animate({
								'margin-top':'125px'
					},500).animate({
								'margin-top':'-160px'
					},200);

					$('#integradas').animate({
								'margin-top':'-270px'
					},1500).animate({
								'margin-top':'125px'
					},200).animate({
								'margin-top':'125px'
					},500).animate({
								'margin-top':'-270px'
					},200);

					$('#alcance').animate({
								'margin-top':'-160px'
					},2500).animate({
								'margin-top':'125px'
					},200).animate({
								'margin-top':'125px'
					},500).animate({
								'margin-top':'-160px'
					},200);
					$('#divAnimado').animate({
                               'margin-left':'600px'
                    },1500); 
                    
					$('#desu').animate({
								'margin-top':'-160px'
					},3500).animate({
								'margin-top':'125px'
					},200).animate({
								'margin-top':'125px'
					},500).animate({
								'margin-top':'-160px'
					},200);
					
					$('#necesidades').animate({
								'margin-top':'-160px'
					},4500).animate({
								'margin-top':'145px'
					},200).animate({
								'margin-top':'145px'
					},500).animate({
								'margin-top':'-160px'
					},200);
					
					/*$('#divAnimado2').animate({
                               'width':'200px',
                               'height':'200px'
                    });
 
                    $('#divAnimado3').animate({
                               'width':'200px',
                               'height':'200',
                               'margin-left':'600px'
                    },1500).animate({
                               'margin-left':'500px'
         
		            },'fast');*/
    
