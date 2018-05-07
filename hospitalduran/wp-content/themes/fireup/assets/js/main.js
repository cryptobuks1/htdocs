var $ = jQuery.noConflict();
$(document).ready(function() {

	"use strict";

	// Responsive video
    $(".hentry, .widget").fitVids();
	
	/*----------------------------------------------------*/
	/*  Superfish Menu
	/*----------------------------------------------------*/

	// initialise plugin
	var example = $('.sf-menu').superfish({
		delay:       100,                            // one second delay on mouseout
		speed:       'fast',                          // faster animation speed
		autoArrows:  false                            // disable generation of arrow mark-up       
	});

	/*----------------------------------------------------*/
	/*  Sidr Responsive Menu
	/*----------------------------------------------------*/

	$('#primary-mobile-menu').sidr({
		name: 'sidr-existing-primary',
		source: '#primary-nav',
		side          : 'right'
	});

	$('#secondary-mobile-menu').sidr({
		name: 'sidr-existing-secondary',
		source: '#secondary-nav',
		side          : 'right'
	});

	/*----------------------------------------------------*/
	/*  Tabs
	/*----------------------------------------------------*/

	var $tabsNav    = $('.tabs-nav'),
		$tabsNavLis = $tabsNav.children('li'),
		$tabContent = $('.tab-content');

	$tabsNav.each(function() {
		var $this = $(this);

		$this.next().children('.tab-content').stop(true,true).hide()
											 .first().show();

		$this.children('li').first().addClass('active').stop(true,true).show();
	});

	$tabsNavLis.on('click', function(e) {
		var $this = $(this);

		$this.siblings().removeClass('active').end()
			 .addClass('active');

		$this.parent().next().children('.tab-content').stop(true,true).hide()
														.siblings( $this.find('a').attr('href') ).fadeIn();

		e.preventDefault();
	});


	$(function() {

		/*----------------------------------------------------*/
		/*  Carousel Content (Carousel-1/2)
		/*----------------------------------------------------*/

		/*
		Carousel initialization
		*/
		$('.jcarousel')
			.jcarousel({
				// Options go here
				wrap: 'circular'                
			});

		/*
		 Prev control initialization
		 */
		$('.jcarousel-control-prev')
			.on('jcarouselcontrol:active', function() {
				$(this).removeClass('inactive');
			})
			.on('jcarouselcontrol:inactive', function() {
				$(this).addClass('inactive');
			})
			.jcarouselControl({
				// Options go here
				target: '-=1'
			});

		/*
		 Next control initialization
		 */
		$('.jcarousel-control-next')
			.on('jcarouselcontrol:active', function() {
				$(this).removeClass('inactive');
			})
			.on('jcarouselcontrol:inactive', function() {
				$(this).addClass('inactive');
			})
			.jcarouselControl({
				// Options go here
				target: '+=1'
			});

	});
	
	/*----------------------------------------------------*/
	/*  flexslider
	/*----------------------------------------------------*/ 
	
	$(window).load(function() {
		$('.flexslider').flexslider({
		animation: "slide"
		});
		
	});
	
	/*-----------------------------------------------------------------------------------*/
	/*  Masonry Integration
	/*-----------------------------------------------------------------------------------*/
	
	var $container = $('#blog-container');
	// initialize
	$container.imagesLoaded( function() {
		$container.masonry({
			"gutter": 18,
			itemSelector: '.item',
		});
	});

});
