<?php
/**
 * Blog post widget.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class FireUp_Blog_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-fireup-blog',
			'description' => __( 'Display recent blog posts on home page.', 'fireup' )
		);

		// Create the widget.
		$this->WP_Widget(
			'fireup-blog',                               // $this->id_base
			__( '&raquo; Home - Blog Posts', 'fireup' ), // $this->name
			$widget_options                              // $this->widget_options
		);

		// Flush the transient.
		add_action( 'save_post'   , array( $this, 'flush_widget_transient' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_transient' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_transient' ) );

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

		// Display the blog posts.
		if ( false === ( $blog = get_transient( 'fireup_blog_widget_' . $this->id ) ) ) {

			// Posts query arguments.
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => $instance['limit']
			);

			// The post query
			$blog = new WP_Query( $args );

			// Store the transient.
			set_transient( 'fireup_blog_widget_' . $this->id, $blog );

		}

		global $post;
		if ( $blog->have_posts() ) {
			echo '<div class="container">';
			echo '<div id="carousel-2" class="latest-blog carousel-loop clearfix">';

				// If the title not empty, display it.
				if ( $instance['title'] ) {
					echo '<h3 class="section-title clearfix">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</h3>';
				}

				echo '<div class="jcarousel">';
					echo '<ul>';

						while ( $blog->have_posts() ) :
							$blog->the_post();

							echo '<li>';
								echo '<article class="post hentry">';
									echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_post_thumbnail( get_the_ID(), 'fireup-widget-thumb', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ) . '</a>';
									echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . esc_attr( get_the_title() ) . '</a></h2>';
									echo '<div class="entry-meta">';
										echo '<span><time class="entry-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" ' . hybrid_get_attr( 'entry-published' ) . '>' . esc_html( get_the_date() ) . '</time></span> &middot;';
										echo '<span class="entry-comment comment-count">' . comments_popup_link( __( '0 Comment', 'fireup' ), __( '1 Comment', 'fireup' ), __( '% Comments', 'fireup' ) ) . '</span>';
										echo '<div class="entry-summary"><p>' . wp_trim_words( get_the_excerpt(), 15 ) . '</p></div>';
									echo '</div>';
								echo '</article>';
							echo '</li>';

						endwhile;

					echo '</ul>';
				echo '</div>';

				echo '<a href="#" class="jcarousel-control-prev"><i class="fa fa-angle-left"></i></a>';
				echo '<a href="#" class="jcarousel-control-next"><i class="fa fa-angle-right"></i></a>';

			echo '</div>';
			echo '</div>';
		}

		// Reset the query.
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
		$instance['limit'] = (int) $new_instance['limit'];

		// Delete our transient.
		$this->flush_widget_transient();

		return $instance;
	}

	/**
	 * Flush the transient.
	 *
	 * @since  1.0.0
	 */
	function flush_widget_transient() {
		delete_transient( 'fireup_blog_widget_' . $this->id );
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title' => esc_html__( 'Latest Blog', 'fireup' ),
			'limit' => 8
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">
				<?php _e( 'Number of posts to show', 'fireup' ); ?>
			</label>
			<input class="small-text" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="0" value="<?php echo (int)( $instance['limit'] ); ?>" />
		</p>

	<?php

	}

}