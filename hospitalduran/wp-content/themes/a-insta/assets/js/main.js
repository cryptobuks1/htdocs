var $ = jQuery.noConflict();
$(document).ready(function() {

	"use strict";

	// Responsive video
	$(".hentry, .widget").fitVids();

	// Mobile menu
	$('#top-navigation').slicknav({
		prependTo:'#top-navigation',
		label: "<i class='fa fa-bars'></i>",
		removeClasses: 'sf-menu'
	});

	// Superfish
	$('ul.sf-menu').superfish({
		delay:       100,
		speed:       'fast',
		autoArrows:  false     
	});

	/*-----------------------------------------------------------------------------------*/
	/*  Tabs
	/*-----------------------------------------------------------------------------------*/
	var $tabsNav    = $('.tabs-nav'),
		$tabsNavLis = $tabsNav.children('li'),
		$tabContent = $('.tab-content');

	$tabsNav.each(function() {
		var $this = $(this);
		$this.next().children('.tab-content').stop(true,true).hide().first().show();
		$this.children('li').first().addClass('active').stop(true,true).show();
	});

	$tabsNavLis.on('click', function(e) {
		var $this = $(this);
		$this.siblings().removeClass('active').end().addClass('active');
		$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
		e.preventDefault();
	});  

});

$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,
		pauseOnHover: true,
		pauseOnAction: false,
		smoothHeight: false,
		prevText: "",
		nextText: "",
	});
});

/**
 * Wow init
 */
new WOW().init({
	offset: 100
});