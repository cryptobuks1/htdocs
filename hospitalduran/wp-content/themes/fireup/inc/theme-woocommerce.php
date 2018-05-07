<?php
/**
 * Custom filter, hooks and functions to support WooCommerce
 * 
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

global $woo_options;

// Indicate that this theme support WooCommerce.
add_theme_support( 'woocommerce' );

// Remove WooCommerce default styles.
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// Remove rating on product page.
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Remove default wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Remove add to cart.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Remove sale flash.
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// Remove breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

/**
 * Wrapper start.
 *
 * @since  1.0.0
 */
function fireup_wrapper_start() {
	echo '<div id="primary" class="content-area page clearfix">';
	echo '<main id="content" class="site-main" role="main" ' . hybrid_get_attr( 'content' ) . '>';
}
add_action( 'woocommerce_before_main_content', 'fireup_wrapper_start', 10 );

/**
 * Wrapper end.
 *
 * @since  1.0.0
 */
function fireup_wrapper_end() {
	echo '</main>';
	echo '</div>';
}
add_action( 'woocommerce_after_main_content', 'fireup_wrapper_end', 10 );

/**
 * Define image sizes on theme activation.
 *
 * @since  1.0.0
 */
function fireup_woocommerce_image_sizes() {

	global $pagenow;

	if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {

		$catalog = array(
			'width'  => '303',
			'height' => '366',
			'crop'   => 1
		);

		$single = array(
			'width'  => '461',
			'height' => '556',
			'crop'   => 1
		);

		$thumbnail = array(
			'width'  => '107',
			'height' => '125',
			'crop'   => 1
		);

		// Product thumbnail size.
		update_option( 'shop_catalog_image_size', $catalog );

		// Single product image size.
		update_option( 'shop_single_image_size', $single );

		// Image gallery thumbnail size.
		update_option( 'shop_thumbnail_image_size', $thumbnail );

	}

}
add_action( 'init', 'fireup_woocommerce_image_sizes', 1 );

/**
 * Modify the breadcrumbs output.
 *
 * @since  1.0.0
 */
function fireup_woo_breadcrumbs( $args ) {

	$args['wrap_before'] = '<section id="breadcrumbs"><nav class="breadcrumbs woo-breadcrumbs" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>';
	$args['wrap_after']  = '</nav></section>';

	return $args;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'fireup_woo_breadcrumbs' );

/**
 * Share buttons
 *
 * @since  1.0.0
 */
function fireup_woo_share() {
	global $post;
?>
	<div class="share-social-icons clearfix">
		<ul><?php _e( 'Share:', 'fireup' ); ?>
			<li><a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-twitter"></i></a></li>
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&title=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&summary=<?php echo get_the_excerpt(); ?>&source=<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="mailto:"><i class="fa fa-envelope-o"></i></a></li>
			<li><a href="javascript:window.print()"><i class="fa fa-print"></i></a></li>
		</ul>
	</div>
<?php	
}
add_action( 'woocommerce_share', 'fireup_woo_share' );

/**
 * WooCommerce page layout.
 *
 * @since  1.0.0
 */
function supernews_woo_pages_layout( $theme_layout ) {

	if ( is_product() || is_cart() || is_checkout() || is_account_page() ) {

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
add_filter( 'theme_mod_theme_layout', 'supernews_woo_pages_layout', 15 );

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 *
 * @since  1.0.0
 */
function fireup_cart_link_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'fireup' ); ?>">
		<span>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_total() ); ?></span> 
			<span class="contents"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'fireup' ), WC()->cart->get_cart_contents_count() ) );?></span>
		</span>
	</a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}
add_filter( 'add_to_cart_fragments', 'fireup_cart_link_fragment' );