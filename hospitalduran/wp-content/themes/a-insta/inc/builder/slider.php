<?php
/**
 * Slider builder.
 *
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class iMedical_Slider_Builder extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'     => 'builder-imedical-slider',
			'description'   => __( 'Display custom sliders.', 'imedical' ),
			'panels_groups' => array( 'panels' ),
		);

		// Create the widget.
		$this->WP_Widget(
			'imedical-builder-slider',            // $this->id_base
			__( 'Builder - Slider', 'imedical' ), // $this->name
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
				'posts_per_page' => (int) $instance['num'],
				'post_type'      => 'slider',
			);

			// Allow dev to filter the post arguments.
			$query = apply_filters( 'imedical_slider_builder', $args );

			// The post query.
			$posts = new WP_Query( $query );

			if ( $posts->have_posts() ) : ?>
				<div class="featured-slider">
					<div class="flexslider">

						<ul class="slides">
							<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
								<?php $url = get_post_meta( get_the_ID(), 'junkie_types_slider_url', true ); ?>
								<li>
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php echo esc_url( $url ); ?>">
											<?php the_post_thumbnail( 'imedical-blog', array( 'class' => 'slider-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
										</a>
									<?php endif; ?>
									<div class="slide-content">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
										<p><?php echo wp_trim_words( get_the_excerpt(), apply_filters( 'imedical_slider_excerpt', 8 ) ); ?></p>
										<a href="<?php echo esc_url( $url ); ?>" class="btn btn-white"><?php _e( 'View More' ); ?></a>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>

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
		$instance['num'] = (int)( $new_instance['num'] );

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
			'num' => 5
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>">
				<?php _e( 'Number of posts to show', 'imedical' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" type="number" step="1" min="-1" value="<?php echo (int)( $instance['num'] ); ?>" />
		</p>

	<?php

	}

}