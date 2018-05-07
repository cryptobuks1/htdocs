<?php
/**
 * Spotlight builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Spotlight_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-spotlight',
			'description'   => __( 'Display 3 columns content.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-spotlight',            // $this->id_base
			__( 'Builder - Spotlight', 'imedical' ), // $this->name
			$widget_options                          // $this->widget_options
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
			<div class="spotlight">
				<div class="container">
					<div class="row no-gutters">
						
						<div class="spotlight-content col-md-4" style="background: <?php echo $instance['bg_color']; ?>">
							<div class="spotlight-wrapper">
								<?php
									if ( $instance['title'] ) {
										echo '<h2>' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</h2>';
									}
								?>
								<?php
									if ( $instance['desc'] ) {
										echo '<p>' . stripslashes( $instance['desc'] ) . '</p>';
									}
								?>
								<?php
									if ( $instance['more_text'] ) {
										echo '<a class="btn btn-white" href="' . esc_url( $instance['more_url'] ) . '">' . esc_attr( $instance['more_text'] ) . '</a>';
									}
								?>
							</div>
						</div>

						<div class="spotlight-content col-md-4" style="background: <?php echo $instance['bg_color_2']; ?>">
							<div class="spotlight-wrapper">
								<?php
									if ( $instance['title_2'] ) {
										echo '<h2>' . apply_filters( 'widget_title', $instance['title_2'], $instance, $this->id_base ) . '</h2>';
									}
								?>
								<?php
									if ( $instance['desc_2'] ) {
										echo '<p>' . stripslashes( $instance['desc_2'] ) . '</p>';
									}
								?>
								<?php
									if ( $instance['more_text_2'] ) {
										echo '<a class="btn btn-white" href="' . esc_url( $instance['more_url_2'] ) . '">' . esc_attr( $instance['more_text_2'] ) . '</a>';
									}
								?>
							</div>
						</div>

						<div class="spotlight-content col-md-4" style="background: <?php echo $instance['bg_color_3']; ?>">
							<div class="spotlight-wrapper">
								<?php
									if ( $instance['title_3'] ) {
										echo '<h2>' . apply_filters( 'widget_title', $instance['title_3'], $instance, $this->id_base ) . '</h2>';
									}
								?>
								<?php
									if ( $instance['desc_3'] ) {
										echo '<p>' . stripslashes( $instance['desc_3'] ) . '</p>';
									}
								?>
								<?php
									if ( $instance['more_text_3'] ) {
										echo '<a class="btn btn-white" href="' . esc_url( $instance['more_url_3'] ) . '">' . esc_attr( $instance['more_text_3'] ) . '</a>';
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
		$instance['more_text'] = stripslashes( $new_instance['more_text'] );
		$instance['more_url']  = esc_url_raw( $new_instance['more_url'] );
		$instance['bg_color']  = $new_instance['bg_color'];

		$instance['title_2']     = strip_tags( $new_instance['title_2'] );
		$instance['desc_2']      = stripslashes( $new_instance['desc_2'] );
		$instance['more_text_2'] = stripslashes( $new_instance['more_text_2'] );
		$instance['more_url_2']  = esc_url_raw( $new_instance['more_url_2'] );
		$instance['bg_color_2']  = $new_instance['bg_color_2'];

		$instance['title_3']     = strip_tags( $new_instance['title_3'] );
		$instance['desc_3']      = stripslashes( $new_instance['desc_3'] );
		$instance['more_text_3'] = stripslashes( $new_instance['more_text_3'] );
		$instance['more_url_3']  = esc_url_raw( $new_instance['more_url_3'] );
		$instance['bg_color_3']  = $new_instance['bg_color_3'];

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
			'title'     => '',
			'desc'      => '',
			'more_text' => __( 'Read More &hellip;', 'imedical' ),
			'more_url'  => '',
			'bg_color'  => '#ffffff',

			'title_2'     => '',
			'desc_2'      => '',
			'more_text_2' => __( 'Read More &hellip;', 'imedical' ),
			'more_url_2'  => '',
			'bg_color_2'  => '#ffffff',

			'title_3'     => '',
			'desc_3'      => '',
			'more_text_3' => __( 'Read More &hellip;', 'imedical' ),
			'more_url_3'  => '',
			'bg_color_3'  => '#ffffff',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<script>
			jQuery(document).ready(function($) {
				$('.bg-color-picker').wpColorPicker();
			});
		</script>

		<p>
			<h3><?php _e( 'Content 1', 'imedical' ); ?></h3>
		</p>

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
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'desc' ); ?>" id="<?php echo $this->get_field_id( 'desc' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['desc'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text' ); ?>">
				<?php _e( 'More Text', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text' ); ?>" value="<?php echo esc_attr( $instance['more_text'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_url' ); ?>">
				<?php _e( 'More URL', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_url' ); ?>" name="<?php echo $this->get_field_name( 'more_url' ); ?>" value="<?php echo esc_url( $instance['more_url'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>">
				<?php _e( 'Background Color', 'imedical' ); ?>
			</label>
			<br />
			<input class="bg-color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" type="text" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" data-default-color="<?php echo $instance['bg_color']; ?>" />
		</p>

		<hr />

		<p>
			<h3><?php _e( 'Content 2', 'imedical' ); ?></h3>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_2' ); ?>">
				<?php _e( 'Title', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" value="<?php echo esc_attr( $instance['title_2'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'desc_2' ); ?>">
				<?php _e( 'Description', 'imedical' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'desc_2' ); ?>" id="<?php echo $this->get_field_id( 'desc_2' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['desc_2'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text_2' ); ?>">
				<?php _e( 'More Text', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_text_2' ); ?>" name="<?php echo $this->get_field_name( 'more_text_2' ); ?>" value="<?php echo esc_attr( $instance['more_text_2'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_url_2' ); ?>">
				<?php _e( 'More URL', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_url_2' ); ?>" name="<?php echo $this->get_field_name( 'more_url_2' ); ?>" value="<?php echo esc_url( $instance['more_url_2'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color_2' ); ?>">
				<?php _e( 'Background Color', 'imedical' ); ?>
			</label>
			<br />
			<input class="bg-color-picker" id="<?php echo $this->get_field_id( 'bg_color_2' ); ?>" type="text" name="<?php echo $this->get_field_name( 'bg_color_2' ); ?>" value="<?php echo $instance['bg_color_2']; ?>" data-default-color="<?php echo $instance['bg_color_2']; ?>" />
		</p>

		<hr />

		<p>
			<h3><?php _e( 'Content 3', 'imedical' ); ?></h3>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_3' ); ?>">
				<?php _e( 'Title', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" value="<?php echo esc_attr( $instance['title_3'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'desc_3' ); ?>">
				<?php _e( 'Description', 'imedical' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'desc_3' ); ?>" id="<?php echo $this->get_field_id( 'desc_3' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['desc_3'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_text_3' ); ?>">
				<?php _e( 'More Text', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_text_3' ); ?>" name="<?php echo $this->get_field_name( 'more_text_3' ); ?>" value="<?php echo esc_attr( $instance['more_text_3'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'more_url_3' ); ?>">
				<?php _e( 'More URL', 'imedical' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'more_url_3' ); ?>" name="<?php echo $this->get_field_name( 'more_url_3' ); ?>" value="<?php echo esc_url( $instance['more_url_3'] ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color_3' ); ?>">
				<?php _e( 'Background Color', 'imedical' ); ?>
			</label>
			<br />
			<input class="bg-color-picker" id="<?php echo $this->get_field_id( 'bg_color_3' ); ?>" type="text" name="<?php echo $this->get_field_name( 'bg_color_3' ); ?>" value="<?php echo $instance['bg_color_3']; ?>" data-default-color="<?php echo $instance['bg_color_3']; ?>" />
		</p>

	<?php

	}

}

/**
 * Color picker script and style.
 */
function imedical_color_picker_scripts() {
	wp_enqueue_style( 'wp-color-picker' );        
	wp_enqueue_script( 'wp-color-picker' ); 
}
add_action( 'admin_enqueue_scripts', 'imedical_color_picker_scripts' );