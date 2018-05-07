<?php
/**
 * Collections widget.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class FireUp_Collections_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-fireup-collections',
			'description' => __( 'Display product collections banner on home page.', 'fireup' )
		);

		// Create the widget.
		$this->WP_Widget(
			'fireup-collections',                         // $this->id_base
			__( '&raquo; Home - Collections', 'fireup' ), // $this->name
			$widget_options                               // $this->widget_options
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

			$output = '<div id="collection" class="clearfix">';
				$output .= '<div class="container">';
					$output .= '<div class="box-element clearfix">';

						$output .= '<div class="wpb_wrapper">';
							$output .= '<a href="' . esc_url( $instance['col_1_url'] ) . '"><img src="' . esc_url( $instance['col_1_img'] ) . '"></a>';
						$output .= '</div>';

						$output .= '<div class="wpb_wrapper">';
							$output .= '<a href="' . esc_url( $instance['col_2_url'] ) . '"><img src="' . esc_url( $instance['col_2_img'] ) . '"></a>';
						$output .= '</div>';

						$output .= '<div class="wpb_wrapper last-post">';
							$output .= '<a href="' . esc_url( $instance['col_3_url'] ) . '"><img src="' . esc_url( $instance['col_3_img'] ) . '"></a>';
						$output .= '</div>';

					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			echo $output;

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

		$instance['col_1_img'] = esc_url_raw( $new_instance['col_1_img'] );
		$instance['col_1_url'] = esc_url_raw( $new_instance['col_1_url'] );
		$instance['col_2_img'] = esc_url_raw( $new_instance['col_2_img'] );
		$instance['col_2_url'] = esc_url_raw( $new_instance['col_2_url'] );
		$instance['col_3_img'] = esc_url_raw( $new_instance['col_3_img'] );
		$instance['col_3_url'] = esc_url_raw( $new_instance['col_3_url'] );

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
			'col_1_img' => get_template_directory_uri() . '/assets/img/collections-1.jpg',
			'col_1_url' => get_home_url(),
			'col_2_img' => get_template_directory_uri() . '/assets/img/collections-2.jpg',
			'col_2_url' => get_home_url(),
			'col_3_img' => get_template_directory_uri() . '/assets/img/collections-3.jpg',
			'col_3_url' => get_home_url(),
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'col_1_img' ); ?>">
				<?php _e( 'Collection Image 1', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_1_img' ); ?>" name="<?php echo $this->get_field_name( 'col_1_img' ); ?>" value="<?php echo esc_url( $instance['col_1_img'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'col_1_url' ); ?>">
				<?php _e( 'Collection URL 1', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_1_url' ); ?>" name="<?php echo $this->get_field_name( 'col_1_url' ); ?>" value="<?php echo esc_url( $instance['col_1_url'] ); ?>" />
		</p>

		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'col_2_img' ); ?>">
				<?php _e( 'Collection Image 2', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_2_img' ); ?>" name="<?php echo $this->get_field_name( 'col_2_img' ); ?>" value="<?php echo esc_url( $instance['col_2_img'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'col_2_url' ); ?>">
				<?php _e( 'Collection URL 2', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_2_url' ); ?>" name="<?php echo $this->get_field_name( 'col_2_url' ); ?>" value="<?php echo esc_url( $instance['col_2_url'] ); ?>" />
		</p>

		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'col_3_img' ); ?>">
				<?php _e( 'Collection Image 3', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_3_img' ); ?>" name="<?php echo $this->get_field_name( 'col_3_img' ); ?>" value="<?php echo esc_url( $instance['col_3_img'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'col_3_url' ); ?>">
				<?php _e( 'Collection URL 3', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col_3_url' ); ?>" name="<?php echo $this->get_field_name( 'col_3_url' ); ?>" value="<?php echo esc_url( $instance['col_3_url'] ); ?>" />
		</p>

	<?php

	}

}