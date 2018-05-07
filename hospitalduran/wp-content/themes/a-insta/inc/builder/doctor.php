<?php
/**
 * Doctor builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Doctor_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-doctor',
			'description'   => __( 'Display list of doctors.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-doctor',            // $this->id_base
			__( 'Builder - Doctor', 'imedical' ), // $this->name
			$widget_options                       // $this->widget_options
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
				'posts_per_page' => 2,
				'post_type'      => 'doctor',
			);

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'imedical_doctor_builder', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>
				
				<div class="doctors home-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
					<div class="container">
						<div class="row">
							
							<div class="doctors-desc home-content-desc col-md-4">
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
								<a class="view-more btn" href="<?php echo esc_url( get_post_type_archive_link( 'doctor' ) ); ?>"><?php _e( 'View All Doctors', 'imedical' ); ?></a>
							</div>

							<div class="doctors-list home-content-list col-md-8">
								<div class="row">
									<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
										<div class="doctor col-sm-6 col-md-6">
											<div class="doctor-detail">
												<?php if ( has_post_thumbnail() ) : ?>
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'imedical-loop', array( 'class' => 'doctor-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
												<?php endif; ?>
												<span><?php echo get_the_term_list( get_the_ID(), 'speciality', '', ', ' ); ?></span>
												<?php the_title( sprintf( '<h3><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
												<?php the_excerpt(); ?>
											</div>
										</div>
									<?php endwhile; ?>
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
			'title' => esc_html__( 'Meet Our Doctors', 'imedical' ),
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