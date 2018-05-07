<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 * 
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'imedical_content_width' ) ) :
/**
 * Set new content width if user uses 1 column layout.
 *
 * @since  1.0.0
 */
function imedical_content_width() {
	global $content_width;

	if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
		$content_width = 1170;
	}
}
endif;
add_action( 'template_redirect', 'imedical_content_width' );

if ( ! function_exists( 'imedical_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since  1.0.0
 */
function imedical_theme_setup() {

	// Make the theme available for translation.
	load_theme_textdomain( 'imedical', trailingslashit( get_template_directory() ) . 'languages' );

	// Add custom stylesheet file to the TinyMCE visual editor.
	add_editor_style( array( 'assets/css/editor-style.css', imedical_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	// Declare image sizes.
	add_image_size( 'imedical-widget-thumb', 64, 64, true );
	add_image_size( 'imedical-blog', 1140, 500, true );
	add_image_size( 'imedical-loop', 500, 300, true );

	// Register custom navigation menu.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Location', 'imedical' ),
			'footer'  => __( 'Footer Location' , 'imedical' ),
			'social'  => __( 'Social Location' , 'imedical' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list', 'search-form', 'comment-form', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See: http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio', 'gallery', 'image', 'video'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'imedical_custom_background_args', array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	) ) );

	// Enable theme-layouts extensions.
	add_theme_support( 'theme-layouts', 
		array(
			'1c'   => __( '1 Column Wide (Full Width)', 'imedical' ),
			'2c-l' => __( '2 Columns: Content / Sidebar', 'imedical' ),
			'2c-r' => __( '2 Columns: Sidebar / Content', 'imedical' )
		),
		array( 'customize' => false, 'default' => '2c-l' ) 
	);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Compatibility with 'Junkie Types' plugin to enable custom post types.
	add_theme_support( 'junkie-doctor' );
	add_theme_support( 'junkie-department' );
	add_theme_support( 'junkie-service' );
	add_theme_support( 'junkie-testimonial' );
	add_theme_support( 'junkie-slider' );

}
endif; // imedical_theme_setup
add_action( 'after_setup_theme', 'imedical_theme_setup' );

/**
 * Registers custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function imedical_widgets_init() {

	// Register ad widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ads.php';
	register_widget( 'iMedical_Ads_Widget' );

	// Register feedburner widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-feedburner.php';
	register_widget( 'iMedical_Feedburner_Widget' );

	// Register recent posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'iMedical_Recent_Widget' );

	// Register popular posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'iMedical_Popular_Widget' );

	// Register random posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'iMedical_Random_Widget' );

	// Register most views posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'iMedical_Views_Widget' );

	// Register tabs widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-tabs.php';
	register_widget( 'iMedical_Tabs_Widget' );

	// Register twitter widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-twitter.php';
	register_widget( 'iMedical_Twitter_Widget' );

	// Register video widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-video.php';
	register_widget( 'iMedical_Video_Widget' );
	
}
add_action( 'widgets_init', 'imedical_widgets_init' );

/**
 * Registers widget areas and custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function imedical_sidebars_init() {

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'imedical' ),
			'id'            => 'primary',
			'description'   => __( 'Main sidebar that appears on the right.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'imedical' ),
			'id'            => 'footer-1',
			'description'   => __( 'The footer sidebar 1st column.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'imedical' ),
			'id'            => 'footer-2',
			'description'   => __( 'The footer sidebar 2nd column.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'imedical' ),
			'id'            => 'footer-3',
			'description'   => __( 'The footer sidebar 3rd column.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'imedical' ),
			'id'            => 'footer-4',
			'description'   => __( 'The footer sidebar 4th column.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
}
add_action( 'widgets_init', 'imedical_sidebars_init' );

/**
 * Register Raleway Google font.
 *
 * @since  1.0.0
 * @return string
 */
function imedical_font_url() {
	
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Raleway, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'imedical' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Raleway:400,300,700' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Custom page layout.
 *
 * @since  1.0.0
 */
function imedical_custom_page_layout( $theme_layout ) {

	// Doctor single page
	if ( is_singular( 'doctor' ) || is_page_template( 'page-templates/block.php' ) ) {

		$layout = get_post_layout( get_queried_object_id() );
		$args   = theme_layouts_get_args();

		// Set the default product page to fullwidth layout.
		$args['default'] = '1c';
		$theme_layout    = $args['default'];

		if ( 'default' !== $layout ) {
			$theme_layout = $layout;
		}

	}

	return $theme_layout;

}
add_filter( 'theme_mod_theme_layout', 'imedical_custom_page_layout', 15 );

/**
 * Custom Query
 */
function imedical_tax_page_query( $query ) {

	if ( ! is_admin() && $query->is_main_query() ) {

		if ( is_tax( 'speciality' ) ) {
			$query->set( 'post_type', 'doctor' );
		}

		if ( is_post_type_archive( 'department' ) ) {
			$query->set( 'posts_per_page', -1 );
		}

	}

}
add_action( 'pre_get_posts', 'imedical_tax_page_query' );

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Enqueue scripts and styles.
 */
require trailingslashit( get_template_directory() ) . 'inc/scripts.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer.php';

/**
 * Require and recommended plugins list.
 */
require trailingslashit( get_template_directory() ) . 'inc/plugins.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Load page builder functions file.
 */
require trailingslashit( get_template_directory() ) . 'inc/builder.php';

/**
 * Mega menus walker.
 */
require trailingslashit( get_template_directory() ) . 'inc/megamenus/init.php';
require trailingslashit( get_template_directory() ) . 'inc/megamenus/class-primary-nav-walker.php';

/**
 * Load Options Framework core.
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', trailingslashit( get_template_directory_uri() ) . 'admin/' );
require trailingslashit( get_template_directory() ) . 'admin/options-framework.php';
require trailingslashit( get_template_directory() ) . 'admin/options.php';
require trailingslashit( get_template_directory() ) . 'admin/options-functions.php';

/**
 * We use some part of Hybrid Core to extends our themes.
 *
 * @link  http://themehybrid.com/hybrid-core Hybrid Core site.
 */
require trailingslashit( get_template_directory() ) . 'inc/hybrid/attr.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/breadcrumb-trail.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/theme-layouts.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/entry-views.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/hybrid-media-grabber.php';