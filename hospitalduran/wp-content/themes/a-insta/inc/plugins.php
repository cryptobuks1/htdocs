<?php
/**
 * TGM Plugin Lists
 *
 * @package    iMedical
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
function imedical_register_plugins() {

	$plugins = array(

		array(
			'name'     => 'Timetable Responsive Schedule For WordPress',
			'slug'     => 'timetable',
			'source'   => trailingslashit( get_template_directory() ) . 'inc/plugins/timetable.zip', // The plugin source.
			'required' => false,
		),

		array(
			'name'     => 'Page Builder by SiteOrigin',
			'slug'     => 'siteorigin-panels',
			'required' => false,
		),

		array(
			'name'     => 'Junkie Types',
			'slug'     => 'junkie-content-types',
			'required' => false,
		),

		array(
			'name'     => 'SiteOrigin Widgets Bundle',
			'slug'     => 'so-widgets-bundle',
			'required' => false,
		),

		array(
			'name'     => 'Ninja Forms',
			'slug'     => 'ninja-forms',
			'required' => false,
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
add_action( 'tgmpa_register', 'imedical_register_plugins' );