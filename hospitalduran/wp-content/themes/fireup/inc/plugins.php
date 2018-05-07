<?php
/**
 * TGM Plugin Lists
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

// Include the TGM_Plugin_Activation class.
require trailingslashit( get_template_directory() ) . 'inc/classes/class-tgm-plugin-activation.php';

/**
 * Register required and recommended plugins.
 *
 * @since  1.0.0
 */
function fireup_register_plugins() {

	$plugins = array(

		array(
			'name'               => 'LayerSlider',
			'slug'               => 'layerslider',
			'source'             => get_stylesheet_directory() . '/inc/plugins/layersliderwp-5.3.2.installable.zip',
			'required'           => false,
			'version'            => '5.3.2',
		),

		array(
			'name'     => 'WooCommerce - excelling eCommerce',
			'slug'     => 'woocommerce',
			'required' => true,
		),

		array(
			'name'     => 'Theme Junkie Shortcodes',
			'slug'     => 'theme-junkie-shortcodes',
			'required' => false,
		),

		array(
			'name'     => 'Theme Junkie Custom CSS',
			'slug'     => 'theme-junkie-custom-css',
			'required' => false,
		),

		array(
			'name'     => 'Jetpack by WordPress.com',
			'slug'     => 'jetpack',
			'required' => false,
		),

		array(
			'name'     => 'WordPress SEO by Yoast',
			'slug'     => 'wordpress-seo',
			'required' => false,
		),

		array(
			'name'     => 'Simple Page Sidebars',
			'slug'     => 'simple-page-sidebars',
			'required' => false,
		),

	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'fireup_register_plugins' );