<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly
?>
<!DOCTYPE html>
<html <?php echo !is_rtl() ? 'dir="ltr" ' : ''; language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <link href="<?php echo theme_get_image_path('images/30be2115026f6ecc6453ec25b17f3f89_fav.png'); ?>" rel="icon" type="image/x-icon" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script>
    var themeHasJQuery = !!window.jQuery;
</script>
<script src="<?php echo get_bloginfo('template_url', 'display') . '/jquery.js?ver=' . wp_get_theme()->get('Version'); ?>"></script>
<script>
    window._$ = jQuery.noConflict(themeHasJQuery);
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link class="data-control-id-9" href='//fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic&subset=latin' rel='stylesheet' type='text/css'>
<script src="<?php echo get_bloginfo('template_url', 'display'); ?>/CloudZoom.js?ver=<?php echo wp_get_theme()->get('Version'); ?>" type="text/javascript"></script>
    
    <?php wp_head(); ?>
    
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url', 'display') . '/style.ie.css?ver=' . wp_get_theme()->get('Version'); ?>" />
    <![endif]-->
</head>
<body <?php body_class('data-control-id-61 bootstrap bd-body-6 bd-pagebackground'); ?>>
<header class="data-control-id-936270 bd-headerarea-1">
        <div data-affix
     data-offset=""
     data-fix-at-screen="top"
     data-clip-at-control="top"
     
 data-enable-lg
     
 data-enable-md
     
 data-enable-sm
     
     class="data-control-id-1411581 bd-affix-1"><div class="data-control-id-1411549 bd-layoutbox-1 clearfix">
    <div class="bd-container-inner">
        <section class="data-control-id-1411819 bd-section-5 bd-tagstyles" id="nav" data-section-title="">
    <div class="bd-vertical-align-section-wrapper">
        <div class="data-control-id-1411822 bd-layoutcontainer-10">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-1411830 
 col-sm-24">
    <div class="bd-layoutcolumn-26"><div class="bd-vertical-align-wrapper"><a class="bd-imagelink-3  data-control-id-1412451" href="http://www.sajona.org">
<img class="data-control-id-1412449 bd-imagestyles" src="<?php echo theme_get_image_path('images/16a77ae845eb6ecaea08ddea96ee2b51_banderaespaa.jpg'); ?>">
</a>
	
		<a class="bd-imagelink-4  data-control-id-1412482" href="http://www.sajona.org/en">
<img class="data-control-id-1412480 bd-imagestyles" src="<?php echo theme_get_image_path('images/436f6a8d6923dc5a67984fefcf32c979_banderausa.jpg'); ?>">
</a></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
	
		<section class="data-control-id-1411712 bd-section-3 bd-tagstyles" id="nav" data-section-title="">
    <div class="bd-vertical-align-section-wrapper">
        <div class="data-control-id-1411774 bd-layoutcontainer-3">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-1411776 
 col-lg-3
 col-md-3
 col-sm-4">
    <div class="bd-layoutcolumn-8"><div class="bd-vertical-align-wrapper"><?php theme_logo_1(); ?></div></div>
</div>
	
		<div class="data-control-id-1412012 
 col-lg-4
 col-md-4
 col-sm-5">
    <div class="bd-layoutcolumn-28 hidden-xs"><div class="bd-vertical-align-wrapper"><div class="data-control-id-1423758 bd-layoutcontainer-8">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-1423760 
 col-lg-7
 col-sm-12">
    <div class="bd-layoutcolumn-9"><div class="bd-vertical-align-wrapper"><img class="bd-imagestyles bd-imagelink-1   data-control-id-1423782" src="<?php echo theme_get_image_path('images/123f4700870575ae49e9987e0e7977f2_iconos01.png'); ?>"></div></div>
</div>
	
		<div class="data-control-id-1423762 
 col-lg-17
 col-sm-12">
    <div class="bd-layoutcolumn-18"><div class="bd-vertical-align-wrapper"><div class="data-control-id-1423821 bd-showshortcode-2 bd-tagstyles">
<?php
$theme_shortcode_content = <<<EOT
[ultimate_modal icon_type="none" modal_title="SAJONA te ayuda a seguir las oportunidades y mantenerte informado. Regístrate." modal_contain="ult-html" modal_on="text" onload_delay="2" btn_size="sm" btn_bg_color="#333333" btn_txt_color="#ffffff" modal_on_align="center" read_text="REGÍSTRATE" txt_color="#ffffff" modal_size="small" modal_style="overlay-cornerbottomleft" overlay_bg_color="#333333" overlay_bg_opacity="80" header_text_color="#333333" modal_border_width="2" modal_border_color="#333333" modal_border_radius="0"]

[wppb-register]

[/ultimate_modal]
EOT;
echo do_shortcode(ThemeShotcodes::filter($theme_shortcode_content));
?>
</div></div></div>
</div>
            </div>
        </div>
    </div>
</div></div></div>
</div>
	
		<div class="data-control-id-1412804 
 col-lg-17
 col-md-17
 col-sm-15">
    <div class="bd-layoutcolumn-29"><div class="bd-vertical-align-wrapper"><?php
    if (theme_get_option('theme_use_default_menu')) {
        wp_nav_menu( array('theme_location' => 'primary-menu-1') );
    } else {
        theme_hmenu_1();
    }
?></div></div>
</div>
            </div>
        </div>
    </div>
</div>
    </div>
</section>
    </div>
</div>
</div>
</header>
	
		<div class="data-control-id-1243589 bd-stretchtobottom-4 bd-stretch-to-bottom" data-control-selector=".bd-contentlayout-6"><div class="bd-sheetstyles bd-contentlayout-6 data-control-id-366">
    <div class="bd-container-inner">
        <div class="bd-flex-vertical bd-stretch-inner">
            
 <?php theme_sidebar_area_6(); ?>
            <div class="bd-flex-horizontal bd-flex-wide">
                
 <?php theme_sidebar_area_5(); ?>
                <div class="bd-flex-vertical bd-flex-wide">
                    
                    <div class="data-control-id-1118950 bd-layoutitemsbox-20 bd-flex-wide">
    <div class="data-control-id-370647 bd-content-15">
    <div class="bd-container-inner">
    
        <?php theme_blog_2(); ?>
    </div>
</div>
</div>
                    
                </div>
                
            </div>
            
        </div>
    </div>
</div></div>
	
		<footer class="data-control-id-936277 bd-footerarea-1">
    <?php if (theme_get_option('theme_override_default_footer_content')): ?>
        <?php echo do_shortcode(theme_get_option('theme_footer_content')); ?>
    <?php else: ?>
        <section class="data-control-id-1406508 bd-section-2 bd-tagstyles" id="section2" data-section-title="">
    <div class="bd-vertical-align-section-wrapper">
        <div class="container data-control-id-1406898 bd-containereffect-3"><div class="data-control-id-2772 bd-layoutcontainer-28">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-2764 
 col-sm-24">
    <div class="bd-layoutcolumn-62"><div class="bd-vertical-align-wrapper"><?php
    ob_start();
    theme_print_sidebar("footer1", 'footer_2_3');
    $current_sidebar_content = trim(ob_get_clean());

    if (isset($theme_hide_sidebar_area)) {
        $theme_hide_sidebar_area = $theme_hide_sidebar_area && !$current_sidebar_content;
    }

    theme_print_sidebar_content($current_sidebar_content, 'footer1', 'data-control-id-2560 bd-footerwidgetarea-3 clearfix');
?></div></div>
</div>
            </div>
        </div>
    </div>
</div></div>
    </div>
</section>
    <?php endif; ?>
</footer>
	
		<div data-animation-time="250" class="data-control-id-520690 bd-smoothscroll-3"><a href="#" class="data-control-id-2787 bd-backtotop-1">
    <span class="data-control-id-2786 bd-icon-67"></span>
</a></div>
<div id="wp-footer">
    <?php wp_footer(); ?>
    <!-- <?php printf(__('%d queries. %s seconds.', THEME_NS), get_num_queries(), timer_stop(0, 3)); ?> -->
</div>
</body>
</html>