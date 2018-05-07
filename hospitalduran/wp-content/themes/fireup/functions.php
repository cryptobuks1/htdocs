<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 * 
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 630; /* pixels */
}

if ( ! function_exists( 'fireup_content_width' ) ) :
/**
 * Set new content width if user uses 1 column layout.
 *
 * @since  1.0.0
 */
function fireup_content_width() {
	global $content_width;

	if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
		$content_width = 920;
	}
}
endif;
add_action( 'template_redirect', 'fireup_content_width' );

if ( ! function_exists( 'fireup_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since  1.0.0
 */
function fireup_theme_setup() {

	// Make the theme available for translation.
	load_theme_textdomain( 'fireup', trailingslashit( get_template_directory() ) . 'languages' );

	// Add custom stylesheet file to the TinyMCE visual editor.
	add_editor_style( array( 'assets/css/editor-style.css' ) );

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
	add_image_size( 'fireup-widget-thumb', 60, 60, true );
	add_image_size( 'fireup-blog', 266, 150, true );
	add_image_size( 'fireup-featured', 630, 300, true );

	// Register custom navigation menu.
	register_nav_menus(
		array(
			'primary'   => __( 'Primary Menu', 'fireup' ),
			'secondary' => __( 'Secondary Menu' , 'fireup' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list', 'search-form', 'comment-form', 'gallery', 'caption'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fireup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable theme-layouts extensions.
	add_theme_support( 'theme-layouts', 
		array(
			'1c'       => __( '1 Column Wide (Full Width)', 'fireup' ),
			'narrow'   => __( '2 Columns: Content / Sidebar', 'fireup' ),
			'narrow-r' => __( '2 Columns: Sidebar / Content', 'fireup' )
		),
		array( 'customize' => false, 'default' => '1c' ) 
	);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

}
endif; // fireup_theme_setup
add_action( 'after_setup_theme', 'fireup_theme_setup' );

/**
 * Registers custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function fireup_widgets_init() {

	// Register ad widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ads.php';
	register_widget( 'FireUp_Ads_Widget' );

	// Register feedburner widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-feedburner.php';
	register_widget( 'FireUp_Feedburner_Widget' );

	// Register recent posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'FireUp_Recent_Widget' );

	// Register popular posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'FireUp_Popular_Widget' );

	// Register random posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'FireUp_Random_Widget' );

	// Register most views posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'FireUp_Views_Widget' );

	// Register twitter widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-twitter.php';
	register_widget( 'FireUp_Twitter_Widget' );

	// Register video widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-video.php';
	register_widget( 'FireUp_Video_Widget' );

	// Register collections widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-collections.php';
	register_widget( 'FireUp_Collections_Widget' );

	// Register products tab widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-products-tab.php';
	register_widget( 'FireUp_Products_Widget' );

	// Register product categories widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-categories.php';
	register_widget( 'FireUp_Categories_Widget' );

	// Register blog widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-blog.php';
	register_widget( 'FireUp_Blog_Widget' );
	
}
add_action( 'widgets_init', 'fireup_widgets_init' );

/**
 * Registers widget areas and custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fireup_sidebars_init() {

	register_sidebar(
		array(
			'name'          => __( 'Home Sidebar', 'fireup' ),
			'id'            => 'home',
			'description'   => __( 'Home page content.', 'fireup' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'fireup' ),
			'id'            => 'primary',
			'description'   => __( 'Main sidebar that appears on the right.', 'fireup' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Left', 'fireup' ),
			'id'            => 'footer-left',
			'description'   => __( 'The footer sidebar left column.', 'fireup' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Center', 'fireup' ),
			'id'            => 'footer-center',
			'description'   => __( 'The footer sidebar center column.', 'fireup' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Right', 'fireup' ),
			'id'            => 'footer-right',
			'description'   => __( 'The footer sidebar right column.', 'fireup' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
}
add_action( 'widgets_init', 'fireup_sidebars_init' );

/**
 * Modifies the theme layout.
 *
 * @since  1.0.0
 */
function fireup_mod_theme_layout( $layout ) {

	if ( is_singular() ) {
		$post_layout = get_post_layout( get_queried_object_id() );

		if ( 'default' === $post_layout && 'narrow' !== $layout ) {
			$layout = 'narrow';
		}
	}

	if ( is_page_template( 'page-templates/home.php' ) ) {
		$post_layout = get_post_layout( get_queried_object_id() );

		if ( 'default' === $post_layout && '1c' !== $layout ) {
			$layout = '1c';
		}
	}

	return $layout;
}
add_filter( 'theme_mod_theme_layout', 'fireup_mod_theme_layout', 15 );

/**
 * Query WooCommerce activation.
 *
 * @since  1.0.0
 */
function fireup_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

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
require trailingslashit( get_template_directory() ) . 'inc/hybrid/loop-pagination.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/theme-layouts.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/entry-views.php';

/**
 * Load woocommerce custom functions.
 */
if ( fireup_is_woocommerce_activated() ) {
	require trailingslashit( get_template_directory() ) . 'inc/theme-woocommerce.php';
}