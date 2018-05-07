<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since  1.0.0
 * @param  array $args Configuration arguments.
 * @return array
 */
function fireup_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'fireup_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function fireup_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( ! is_page_template( 'page-templates/home.php' ) ) {
		$classes[] = 'woocommcer-page';
	}
	
	if ( is_page() && ! is_page_template( 'page-templates/home.php' ) ) {
		$classes[] = 'single';
	}

	if ( in_array( get_theme_mod( 'theme_layout' ), array( 'narrow-r' ) ) ) {
		$classes[] = 'layout-narrow';
	}

	return $classes;
}
add_filter( 'body_class', 'fireup_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function fireup_post_classes( $classes ) {

	// Adds a class if a post hasn't a thumbnail.
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'fireup_post_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function fireup_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'fireup' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'fireup_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function fireup_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'fireup_render_title' );
endif;

/**
 * Change the excerpt more string.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function fireup_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'fireup_excerpt_more' );

/**
 * Limit excerpt length.
 * 
 * @since  1.0.0
 */
function fireup_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'fireup_excerpt_length', 999 );

/**
 * Remove theme-layouts meta box on attachment and bbPress post type.
 * 
 * @since 1.0.0
 */
function fireup_remove_theme_layout_metabox() {
	remove_post_type_support( 'attachment', 'theme-layouts' );
	remove_post_type_support( 'forum', 'theme-layouts' );
	remove_post_type_support( 'topic', 'theme-layouts' );
	remove_post_type_support( 'reply', 'theme-layouts' );
}
add_action( 'init', 'fireup_remove_theme_layout_metabox', 11 );

/**
 * Add post type 'post' support for the Simple Page Sidebars plugin.
 * 
 * @since  1.0.0
 */
function fireup_page_sidebar_plugin() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'simple-page-sidebars/simple-page-sidebars.php' ) ) {
		add_post_type_support( 'post', 'simple-page-sidebars' );
	}
}
add_action( 'init', 'fireup_page_sidebar_plugin' );

/**
 * Custom comment form fields.
 *
 * @since  1.0.0
 */
function fireup_comment_form_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );

	$fields['author'] = '<input class="comment-name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_attr__( 'Name (required)', 'fireup' ) . '"' . $aria_req . ' />';

	$fields['email'] = '<input class="comment-email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email (required)', 'fireup' ) . '"' . $aria_req . ' />';

	$fields['url'] = '<input class="comment-website" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website (optional)', 'fireup' ) . '" />';

	return $fields;

}
add_filter( 'comment_form_default_fields', 'fireup_comment_form_fields' );

/**
 * Custom comment form submit field.
 * 
 * @since  1.0.0
 */
function fireup_comment_button() {
	echo '<button type="submit" id="submit">' . __( 'Post Comment', 'fireup' ) . '</button>';
}
add_action( 'comment_form', 'fireup_comment_button' );

/**
 * Disable LayerSlider update messages.
 * 
 * @since  1.0.0
 */
function fireup_disable_layerslider_messages() {
	// Disable auto-updates
	$GLOBALS['lsAutoUpdateBox'] = false;
}
add_action( 'layerslider_ready', 'fireup_disable_layerslider_messages' );