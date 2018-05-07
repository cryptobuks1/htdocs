<?php
/**
 * Callout builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Callout_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-callout',
			'description'   => __( 'Display custom callout.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-callout',            // $this->id_base
			__( 'Builder - Callout', 'imedical' ), // $this->name
			$widget_options                        // $this->widget_options
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
			<div class="callout wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
				<div class="container">
					<div class="callout-content">
						<div class="row">
							
							<div class="callout-text col-md-9">
								<?php
									if ( $instance['title'] ) {
										echo '<h3>' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</h3>';
									}
								?>
								<?php
									if ( $instance['desc'] ) {
										echo '<p>' . stripslashes( $instance['desc'] ) . '</p>';
									}
								?>
							</div>

							<div class="callout-btn col-md-3">
								<?php
									if ( $instance['btn_text'] ) {
										echo '<a class="btn btn-white" href="' . esc_url( $instance['btn_url'] ) . '">' . esc_attr( $instance['btn_text'] ) . '</a>';
									}
								?>
							</div>

						</div>
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
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['desc']      = stripslashes( $new_instance['desc'] );
		$instance['btn_text']  = strip_tags( $new_instance['btn_text'] );
		$instance['btn_url']   = esc_url_raw( $new_instance['btn_url'] );

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
			'title'    => '',
			'desc'     => '',
			'btn_text' => '',
			'btn_url'  => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>">
				<?php _e( 'Description', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'btn_text' ); ?>">
				<?php _e( 'Button Text', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn_text' ); ?>" name="<?php echo $this->get_field_name( 'btn_text' ); ?>" value="<?php echo esc_attr( $instance['btn_text'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'btn_url' ); ?>">
				<?php _e( 'Button URL', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn_url' ); ?>" name="<?php echo $this->get_field_name( 'btn_url' ); ?>" value="<?php echo esc_url( $instance['btn_url'] ); ?>" />
		</p>

	<?php

	}

}