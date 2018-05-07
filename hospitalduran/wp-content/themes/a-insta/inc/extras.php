<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package    iMedical
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
function imedical_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'imedical_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function imedical_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	$layout = of_get_option( 'imedical_page_layout', 'fullwidth' );
	if ( $layout == 'fullwidth' ) {
		$classes[] = 'layout-full';
	} else {
		$classes[] = 'layout-boxed';
	}

	return $classes;
}
add_filter( 'body_class', 'imedical_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function imedical_post_classes( $classes ) {

	// Adds a class if a post hasn't a thumbnail.
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}

	if ( is_post_type_archive( 'doctor' ) || is_post_type_archive( 'service' ) || is_tax( 'speciality' ) ) {
		$classes[] = 'col-sm-6 col-md-4';
	}

	if ( is_post_type_archive( 'testimonial' ) ) {
		$classes[] = 'col-md-6';
	}

	$classes[] = 'animated fadeIn';

	return $classes;
}
add_filter( 'post_class', 'imedical_post_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function imedical_wp_title( $title, $sep ) {
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
			$title .= " $sep " . sprintf( __( 'Page %s', 'imedical' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'imedical_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function imedical_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'imedical_render_title' );
endif;

/**
 * Change the excerpt more string.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function imedical_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'imedical_excerpt_more' );

/**
 * Filter the archive title.
 *
 * @since  1.0.0
 */
function imedical_archive_title( $title ) {

	if ( ! is_archive() && ! is_singular() ) {
		$title = __( 'Latest Posts', 'imedical' );
	}

	if ( is_singular() ) {
		$title = get_the_title();
	}

	if ( is_404() ) {
		$title = __( 'Oops! That page can&rsquo;t be found.', 'imedical' );
	}

	if ( is_search() ) {
		$title = sprintf( __( 'Search Results for: %s', 'imedical' ), '<strong>' . get_search_query() . '</strong>' );
	}

	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'imedical_archive_title' );

/**
 * Remove theme-layouts meta box.
 * 
 * @since 1.0.0
 */
function imedical_add_theme_layout_metabox() {
	add_post_type_support( 'doctor', 'theme-layouts' );
}
add_action( 'init', 'theme_layouts_add_post_type_support', 11 );

/**
 * Add post type 'post' support for the Simple Page Sidebars plugin.
 * 
 * @since  1.0.0
 */
function imedical_page_sidebar_plugin() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'simple-page-sidebars/simple-page-sidebars.php' ) ) {
		add_post_type_support( 'post', 'simple-page-sidebars' );
	}
}
add_action( 'init', 'imedical_page_sidebar_plugin' );

/**
 * Move textarea comment field to the top.
 *
 * @since  1.0.0
 */
function imedical_move_textarea( $input = array () ) {
	static $textarea = '';
 
	if ( 'comment_form_defaults' === current_filter() ) {
		$textarea = $input['comment_field'];
		$input['comment_field'] = '';	
		return $input;
	}
	if ( is_singular() ) {
		print $textarea;
	}
}
add_action( 'comment_form_defaults', 'imedical_move_textarea' );
add_action( 'comment_form_top', 'imedical_move_textarea' );

/**
 * Custom comment form fields.
 *
 * @since  1.0.0
 * @param  array $fields
 * @return array
 */
function imedical_comment_form_fields( $fields, $args = array() ) {

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html5     = 'html5' === $args['format'];

	$fields['author'] = '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'imedical' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input class="txt" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';

	$fields['email'] = '<p class="comment-form-email"><label for="email">' . __( 'Email', 'imedical' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input class="txt" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';

	$fields['url'] = '<p class="comment-form-url"><label for="url">' . __( 'Website', 'imedical' ) . '</label> ' . '<input class="txt" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	return $fields;

}
add_filter( 'comment_form_default_fields', 'imedical_comment_form_fields' );

/**
 * Rename the timetable post type
 */
function imedical_rename_timetable_post_type() {
	global $menu, $submenu;

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( ! is_plugin_active( 'timetable/timetable.php' ) ) {
		return;
	}

	$menu[21][0] = 'Timetable Columns';
	echo '';
}
add_action( 'admin_menu', 'imedical_rename_timetable_post_type' );

/**
 * Re-register sidebar event
 */
function imedical_reregister_sidebar() {
	unregister_sidebar( 'sidebar-event' );

	register_sidebar(
		array(
			'name'          => __( 'Event Sidebar', 'imedical' ),
			'id'            => 'sidebar-event',
			'description'   => __( 'Special sidebar for events page, it only appear on events page.', 'imedical' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'imedical_reregister_sidebar', 11 );