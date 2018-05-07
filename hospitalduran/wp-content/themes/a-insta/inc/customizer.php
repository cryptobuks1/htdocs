<?php
/**
 * iMedical Theme Customizer.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Load textarea control for the customizer.
 *
 * @since  1.0.0
 */
function imedical_textarea_customize_control() {
	require trailingslashit( get_template_directory() ) . 'inc/classes/customize-control-textarea.php';
}
add_action( 'customize_register', 'imedical_textarea_customize_control', 1 );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since  1.0.0
 * @param  WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function imedical_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}
add_action( 'customize_register', 'imedical_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function imedical_customize_preview_js() {
	wp_enqueue_script( 'imedical_customizer', trailingslashit( get_template_directory_uri() ) . 'assets/js/customizer.js', array( 'customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'imedical_customize_preview_js' );