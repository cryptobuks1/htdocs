<?php
/**
 * Page builder custom functions.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Check if the Siteorigin Page Builder is exist.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( ! is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) {
	return;
}

/**
 * Custom widgets for page builder.
 * 
 * @since  1.0.0
 */
function imedical_builder_init() {

	// Register slider builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/slider.php';
	register_widget( 'iMedical_Slider_Builder' );

	// Register doctor builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/doctor.php';
	register_widget( 'iMedical_Doctor_Builder' );

	// Register blog builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/blog.php';
	register_widget( 'iMedical_Blog_Builder' );

	// Register callout builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/callout.php';
	register_widget( 'iMedical_Callout_Builder' );

	// Register tagline builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/tagline.php';
	register_widget( 'iMedical_Tagline_Builder' );

	// Register service builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/service.php';
	register_widget( 'iMedical_Service_Builder' );

	// Register testimonial builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/testimonial.php';
	register_widget( 'iMedical_Testimonial_Builder' );

	// Register department builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/department.php';
	register_widget( 'iMedical_Department_Builder' );

	// Register spotlight builder.
	require trailingslashit( get_template_directory() ) . 'inc/builder/spotlight.php';
	register_widget( 'iMedical_Spotlight_Builder' );

}
add_action( 'widgets_init', 'imedical_builder_init', 5 );

/**
 * Remove 'widget' class
 */
function imedical_remove_widget_class( $class ) {
	$class = array_diff( $class, array( 'widget' ) );	
	return $class;
}
add_filter( 'siteorigin_panels_widget_classes', 'imedical_remove_widget_class' );

/**
 * Prebuilt builder.
 *
 * @since  1.0.0
 */
function imedical_prebuilt_builder( $layouts ) {

	$layouts['default-home'] = array(
		'name'        => __( 'Prebuilt Home Page', 'imedical' ),
		'description' => __( 'Default home page builder.', 'imedical' ),
		'widgets'     => array(
			0 => array(
				'num'  => 5,
				'info' => array(
					'class' => 'iMedical_Slider_Builder',
					'id'    => '1',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			1 => array(
				'info' => array(
					'class' => 'iMedical_Spotlight_Builder',
					'id'    => '2',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			2 => array(
				'info' => array(
					'class' => 'iMedical_Service_Builder',
					'id'    => '3',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			3 => array(
				'info' => array(
					'class' => 'iMedical_Department_Builder',
					'id'    => '4',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			4 => array(
				'info' => array(
					'class' => 'iMedical_Doctor_Builder',
					'id'    => '5',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			5 => array(
				'info' => array(
					'class' => 'iMedical_Testimonial_Builder',
					'id'    => '6',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			6 => array(
				'info' => array(
					'class' => 'iMedical_Callout_Builder',
					'id'    => '7',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
			7 => array(
				'info' => array(
					'class' => 'iMedical_Blog_Builder',
					'id'    => '8',
					'grid'  => '0',
					'cell'  => '0',
				),
			),
		),
		'grids' => array(
			0 => array(
				'cells' => '1',
				'style' => '',
			),
		),
		'grid_cells' => array(
			0 => array(
				'weight' => '1',
				'grid'   => '0',
			),
		),
	);

	return $layouts;

}
add_filter( 'siteorigin_panels_prebuilt_layouts', 'imedical_prebuilt_builder' );