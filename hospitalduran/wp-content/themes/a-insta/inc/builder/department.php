<?php
/**
 * Department builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Department_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-department',
			'description'   => __( 'Display list of departments.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-department',            // $this->id_base
			__( 'Builder - Department', 'imedical' ), // $this->name
			$widget_options                           // $this->widget_options
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

			// Posts query arguments.
			$args = array(
				'posts_per_page' => 10,
				'post_type'      => 'department',
			);

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'imedical_department_builder', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>
				
				<div class="departments">
					<div class="container">

						<div class="header-text">
							<?php
								if ( $instance['title'] ) {
									echo '<h3><a href="' . esc_url( get_post_type_archive_link( 'department' ) ) . '">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a></h3>';
								}
							?>
							<?php
								if ( $instance['desc'] ) {
									echo '<p>' . stripslashes( $instance['desc'] ) . '</p>';
								}
							?>
						</div>

						<div class="departments-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
							<div class="row no-gutters">
								<?php $i = 0; $class = ''; ?>
								<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
									<?php if ( ++$i > 5 ) { $class = 'no-border-bottom'; } ?>
									<div class="col-md-15">
										<div class="department <?php echo $class; ?>">
											<a href="<?php the_permalink() ?>">
												<?php if ( has_post_thumbnail() ) : ?>
													<?php the_post_thumbnail( 'imedical-loop', array( 'class' => 'department-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
												<?php endif; ?>
												<?php the_title( '<h3>', '</h3>' ); ?>
												<p><?php echo wp_trim_words( get_the_excerpt(), 5 ); ?></p>
											</a>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						</div>

					</div>
				</div>

			<?php endif;

			// Restore original Post Data.
			wp_reset_postdata();

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
		$instance['desc']  = stripslashes( $new_instance['desc'] );

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
			'title' => esc_html__( 'Our Departments', 'imedical' ),
			'desc'  => '',
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
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'desc' ); ?>" id="<?php echo $this->get_field_id( 'desc' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['desc'] ); ?></textarea>
		</p>

	<?php

	}

}