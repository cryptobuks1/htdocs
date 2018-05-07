<?php
/**
 * Categories widget.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class FireUp_Categories_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-fireup-product-categories',
			'description' => __( 'Display the product categories on home page.', 'fireup' )
		);

		// Create the widget.
		$this->WP_Widget(
			'fireup-categories',                                 // $this->id_base
			__( '&raquo; Home - Product Categories', 'fireup' ), // $this->name
			$widget_options                                      // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;
		?>
			<div class="container">
				<div id="carousel-1" class="carousel-loop clearfix">
					<?php
						// If the title not empty, display it.
						if ( $instance['title'] ) {
							echo '<h3 class="section-title">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</h3>';
						}
					?>
					<div class="jcarousel woocommerce woocommerce-content"><?php fireup_product_categories(); ?></div>
					<a href="#" class="jcarousel-control-prev"><i class="fa fa-angle-left"></i></a>
					<a href="#" class="jcarousel-control-next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>

		<?php
		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title'   => esc_html__( 'Categories', 'fireup' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

	<?php

	}

}

/**
 * Product Categories
 *
 * @since  1.0.0
 */
function fireup_product_categories() {

	if ( ! fireup_is_woocommerce_activated() ) {
		return;
	}

	// Get the product tax.
	$categories = get_terms( 
		'product_cat', 
		array( 
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => 1
		) 
	);

	if ( $categories ) :

		echo '<ul class="products">';

			foreach( $categories as $cat ) :

				$small_thumbnail_size  = 'shop_catalog';
				$cat_thumb_id  = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
				$dimensions    = wc_get_image_size( $small_thumbnail_size );
				$term_link     = get_term_link( $cat, 'product_cat' );

				if ( $cat_thumb_id ) {
					$image = wp_get_attachment_image_src( $cat_thumb_id, $small_thumbnail_size  );
					$image = $image[0];
				} else {
					$image = wc_placeholder_img_src();
				}

				echo '<li class="product">';
					echo '<a href="' . esc_url( $term_link ) . '"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $cat->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" /></a>';
					echo '<div class="product-meta">';
						echo '<div class="warp-info clearfix">';
							echo '<h3 class="name">' . $cat->name . '</h3>';
							echo '<i class="fa fa-angle-right"></i>';
						echo '</div>';
					echo '</div>';
				echo '</li>';

			endforeach;

		echo '</ul>';

	endif;

}