<?php
/**
 * Testimonial builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Testimonial_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-testimonial',
			'description'   => __( 'Display list of testimonials.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-testimonial',            // $this->id_base
			__( 'Builder - Testimonial', 'imedical' ), // $this->name
			$widget_options                            // $this->widget_options
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
				'posts_per_page' => 5,
				'post_type'      => 'testimonial',
			);

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'imedical_testimonial_builder', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>
				
				<div class="testimonials parallax-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
					<div class="container">
						<div class="testimonials-content">
							
							<div class="testimonials-header header-text">
								<?php
									if ( $instance['title'] ) {
										echo '<h3><a href="' . esc_url( get_post_type_archive_link( 'testimonial' ) ) . '">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a></h3>';
									}
								?>
								<?php
									if ( $instance['desc'] ) {
										echo '<p>' . stripslashes( $instance['desc'] ) . '</p>';
									}
								?>
							</div>

							<div class="testimonials-list">
								<div class="flexslider">
									<ul class="slides">
										
										<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
											<?php $role = get_post_meta( get_the_ID(), 'junkie_types_testimonial_role', true ); ?>
											<li>
												<div class="testimonial">
													<?php the_excerpt(); ?>
													<?php if ( has_post_thumbnail() ) : ?>
														<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'imedical-widget-thumb', array( 'class' => 'testimonial-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
													<?php endif; ?>
													<div class="testimonial-meta">
														<?php the_title( '<div class="author">', '</div>' ); ?>
														<div class="role"><?php echo esc_attr( $role ); ?></div>
													</div>
												</div>
											</li>
										<?php endwhile; ?>

									</ul>
								</div>
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
			'title' => esc_html__( 'What Our Client Say', 'imedical' ),
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