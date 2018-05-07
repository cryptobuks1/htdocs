<?php
/**
 * Custom functions for the theme options.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Theme options header.
 *
 * @since  1.0.0
 */
function imedical_of_header() {
	$theme = wp_get_theme();
	$name  = $theme->get( 'TextDomain' );
?>
	<div class="header-options">
		<ul class="theme-info">
			<li><span class="dashicons dashicons-info"></span><a href="http://docs.theme-junkie.com/<?php echo esc_attr( $name ); ?>" target="_blank"><?php _e( 'Documentation', 'imedical' ); ?></a></li>
			<li><span class="dashicons dashicons-lightbulb"></span><a href="http://www.theme-junkie.com/forum/" target="_blank"><?php _e( 'Support Forum', 'imedical' ); ?></a></li>
			<li><span class="dashicons dashicons-twitter"></span><a href="https://twitter.com/theme_junkie" target="_blank">Follow Us</a></li>
			<li><span class="dashicons dashicons-facebook"></span><a href="https://www.facebook.com/themejunkies" target="_blank">Like Us</a></li>
		</ul>
	</div>
<?php
}
add_action( 'optionsframework_header_options', 'imedical_of_header' );

/**
 * Favicon output.
 *
 * @since 1.0.0
 */
function imedical_favicon_output() {
	$favicon = of_get_option( 'imedical_favicon' );

	if ( !empty( $favicon ) ) {
		echo '<link href="' . esc_url( $favicon ) . '" rel="icon">' . "\n";
	}

}
add_action( 'wp_head', 'imedical_favicon_output', 5 );

/**
 * Mobile Icon output.
 *
 * @since 1.0.0
 */
function imedical_mobile_icon_output() {
	$icon = of_get_option( 'imedical_mobile_icon' );

	if ( !empty( $icon ) ) {
		echo '<link rel="apple-touch-icon-precomposed" href="' . esc_url( $icon ) . '">' . "\n";
	}

}
add_action( 'wp_head', 'imedical_mobile_icon_output', 6 );

/**
 * Custom RSS feed url.
 *
 * @since  1.0.0
 * @return string
 */
function imedical_feed_url( $output, $feed ) {

	// Get the custom rss feed url.
	$url = of_get_option( 'imedical_feedburner_url' );

	// Do not redirect comments feed
	if ( strpos( $output, 'comments' ) ) {
		return $output;
	}

	// Check the settings.
	if ( !empty( $url ) ) {
		$output = esc_url( $url );
	}

	return $output;
}
add_filter( 'feed_link', 'imedical_feed_url', 10, 2 );

/**
 * Single post advertisement.
 * Before content.
 *
 * @since  1.0.0
 */
function imedical_single_ad_before( $content ) {
	$ad = of_get_option( 'imedical_ad_single_before' );

	if ( is_singular( 'post' ) && ! empty( $ad ) ) {
		$content = '<span class="ad-before" style="margin-bottom: 1.5em;display: inline-block;">' . stripslashes( $ad ) . '</span>' . $content;
	} else {
		$content;
	}

	return $content;

}
add_action( 'the_content', 'imedical_single_ad_before' );

/**
 * Single post advertisement.
 * After content.
 *
 * @since  1.0.0
 */
function imedical_single_ad_after( $content ) {
	$ad = of_get_option( 'imedical_ad_single_after' );

	if ( is_singular( 'post' ) && ! empty( $ad ) ) {
		$content = $content . '<span class="ad-after" style="margin-bottom:1.5em;display: inline-block;">' . stripslashes( $ad ) . '</span>';
	} else {
		$content;
	}

	return $content;

}
add_action( 'the_content', 'imedical_single_ad_after' );

/**
 * Tracking Code
 *
 * @since  1.0.0
 */
function imedical_tracking_code() {
	$tracking_code = of_get_option( 'imedical_tracking' );

	if ( !empty( $tracking_code ) ) {
		echo stripslashes( $tracking_code ) . "\n";
	}

}
add_action( 'wp_footer', 'imedical_tracking_code', 15 );

/**
 * Header Code
 *
 * @since  1.0.0
 */
function imedical_header_code() {
	$header_code = of_get_option( 'imedical_script_head' );

	if ( !empty( $header_code ) ) {
		echo stripslashes( $header_code ) . "\n";
	}

}
add_action( 'wp_head', 'imedical_header_code', 20 );

/**
 * Footer Code
 *
 * @since  1.0.0
 */
function imedical_footer_code() {
	$footer_code = of_get_option( 'imedical_script_footer' );

	if ( !empty( $footer_code ) ) {
		echo stripslashes( $footer_code ) . "\n";
	}

}
add_action( 'wp_footer', 'imedical_footer_code', 20 );