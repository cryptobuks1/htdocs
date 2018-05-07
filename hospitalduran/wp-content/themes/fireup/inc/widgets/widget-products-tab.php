<?php
/**
 * Products widget.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class FireUp_Products_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-fireup-products',
			'description' => __( 'Display products tabs on home page.', 'fireup' )
		);

		// Create the widget.
		$this->WP_Widget(
			'fireup-products',                             // $this->id_base
			__( '&raquo; Home - Products Tab', 'fireup' ), // $this->name
			$widget_options                                // $this->widget_options
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
				<div class="woocommerce woocommerce-content clearfix">

					<ul class="tabs-nav clearfix">
						<li class="active"><a href="#tab1"><?php echo esc_attr( $instance['latest_title'] ); ?></a></li>
						<li><a href="#tab2"><?php echo esc_attr( $instance['featured_title'] ); ?></a></li>
						<li><a href="#tab3"><?php echo esc_attr( $instance['special_title'] ); ?></a></li>
					</ul>

					<div class="tabs-container">
						<div class="tab-content" id="tab1"><?php fireup_get_latest_products(); ?></div>
						<div class="tab-content" id="tab2"><?php fireup_get_featured_products(); ?></div>
						<div class="tab-content" id="tab3"><?php fireup_get_special_products(); ?></div>
					</div>

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
		$instance['latest_title']   = esc_attr( $new_instance['latest_title'] );
		$instance['featured_title'] = esc_attr( $new_instance['featured_title'] );
		$instance['special_title']  = esc_attr( $new_instance['special_title'] );

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
			'latest_title'   => __( 'Latest', 'fireup' ),
			'featured_title' => __( 'Featured', 'fireup' ),
			'special_title'  => __( 'Special', 'fireup' ),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'latest_title' ); ?>">
				<?php _e( 'Latest Title', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'latest_title' ); ?>" name="<?php echo $this->get_field_name( 'latest_title' ); ?>" value="<?php echo esc_attr( $instance['latest_title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'featured_title' ); ?>">
				<?php _e( 'Featured Title', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'featured_title' ); ?>" name="<?php echo $this->get_field_name( 'featured_title' ); ?>" value="<?php echo esc_attr( $instance['featured_title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'special_title' ); ?>">
				<?php _e( 'Special Title', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'special_title' ); ?>" name="<?php echo $this->get_field_name( 'special_title' ); ?>" value="<?php echo esc_attr( $instance['special_title'] ); ?>" />
		</p>

	<?php

	}

}

/**
 * Latest Products
 *
 * @since  1.0.0
 */
function fireup_get_latest_products() {

	if ( ! fireup_is_woocommerce_activated() ) {
		return;
	}

	$args = array(
		'limit'   => 6,
		'columns' => 3,
	);

	echo do_shortcode( '[recent_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

}

/**
 * Featured Products
 *
 * @since  1.0.0
 */
function fireup_get_featured_products() {

	if ( ! fireup_is_woocommerce_activated() ) {
		return;
	}

	$args = array(
		'limit'   => 6,
		'columns' => 3,
	);

	echo do_shortcode( '[featured_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

}

/**
 * Featured Products
 *
 * @since  1.0.0
 */
function fireup_get_special_products() {

	if ( ! fireup_is_woocommerce_activated() ) {
		return;
	}

	$args = array(
		'limit'   => 6,
		'columns' => 3,
	);

	echo do_shortcode( '[sale_products per_page="' . intval( $args['limit'] ) . '" columns="' . intval( $args['columns'] ) . '"]' );

}