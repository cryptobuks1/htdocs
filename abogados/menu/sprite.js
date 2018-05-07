// JavaScript Document

$(function(){
		 
		   $('#navigation li a').append('<span class="hover"></span>')
		   
		   $('#navigation li a').hover(function() {
	        
		// Cosas que sucede cuando se pasa sobre el tope +()
		$('.hover', this).stop().animate({
			'opacity': 1
			}, 50,'easeOutSine')
	
	},function() {
	
		// Cosas que sucede cuando la parada un hover +()
		$('.hover', this).stop().animate({
			'opacity': 0
			}, 50, 'easeOutQuad')
	
	})
		   });