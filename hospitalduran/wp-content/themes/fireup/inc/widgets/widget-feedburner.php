<?php
/**
 * Feedburner widget.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class FireUp_Feedburner_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-fireup-feedburner subscribe-widget',
			'description' => __( 'FeedBurner email subscription.', 'fireup' )
		);

		// Create the widget.
		$this->WP_Widget(
			'fireup-feedburner',                  // $this->id_base
			__( '&raquo; Feedburner', 'fireup' ), // $this->name
			$widget_options                         // $this->widget_options
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

		// If the title not empty, display it.
		if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
		}
		?>

		<div class="footer-social-icons">
			<?php if ( $instance['fb_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['fb_url'] ); ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
			<?php } if ( $instance['twitter_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['twitter_url'] ); ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
			<?php } if ( $instance['gplus_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['gplus_url'] ); ?>" title="GooglePlus"><i class="fa fa-google-plus"></i></a>
			<?php } if ( $instance['pinterest_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['pinterest_url'] ); ?>" title="Pinterest"><i class="fa fa-pinterest"></i></a>
			<?php } if ( $instance['linkedin_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['linkedin_url'] ); ?>" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
			<?php } if ( $instance['rss_url'] ) { ?>
				<a href="<?php echo esc_url( $instance['rss_url'] ); ?>" title="RSS"><i class="fa fa-rss"></i></a>
			<?php } ?>
		</div>

		<?php if ( $instance['feed_id'] ) { ?>
			<form class="form-subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo strip_tags( $instance['feed_id'] ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">
				<?php if ( $instance['before'] ) { ?>
					<p class="help-block"><?php echo stripslashes( $instance['before'] ); ?></p>
				<?php } ?>
				<input type="text" name="email" placeholder="<?php esc_attr_e( 'Enter your email', 'fireup' ); ?>">
				<input type="hidden" value="<?php echo strip_tags( $instance['feed_id'] ); ?>" name="uri">
				<input type="hidden" value="<?php echo strip_tags( $instance['feed_id'] ); ?>" name="title">
				<input type="hidden" name="loc" value="en_US">
				<button class="btn" type="submit" name="submit"><?php _e( 'Signup', 'fireup' ) ?></button>
			</form>
		<?php 
		}

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

		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['before']        = stripslashes( $new_instance['before'] );
		$instance['feed_id']       = strip_tags( $new_instance['feed_id'] );
		$instance['twitter_url']   = esc_url_raw( $new_instance['twitter_url'] );
		$instance['fb_url']        = esc_url_raw( $new_instance['fb_url'] );
		$instance['gplus_url']     = esc_url_raw( $new_instance['gplus_url'] );
		$instance['pinterest_url'] = esc_url_raw( $new_instance['pinterest_url'] );
		$instance['linkedin_url']  = esc_url_raw( $new_instance['linkedin_url'] );
		$instance['rss_url']       = esc_url_raw( $new_instance['rss_url'] );

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
			'title'         => esc_html__( 'Get Updates', 'fireup' ),
			'before'        => esc_html__( 'Subscribe to our newsletter and we will send you the hottest products, deals and promotions.', 'fireup' ),
			'feed_id'       => '',
			'twitter_url'   => '',
			'fb_url'        => '',
			'gplus_url'     => '',
			'pinterest_url' => '',
			'linkedin_url'  => '',
			'rss_url'       => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'before' ); ?>">
				<?php _e( 'HTML or Text before form:', 'fireup' ); ?>
			</label>
			<textarea class="widefat" name="<?php echo $this->get_field_name( 'before' ); ?>" id="<?php echo $this->get_field_id( 'before' ); ?>" cols="30" rows="6"><?php echo stripslashes( $instance['before'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'feed_id' ); ?>">
				<?php _e( 'Feedburner ID:', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'feed_id' ); ?>" name="<?php echo $this->get_field_name( 'feed_id' ); ?>" value="<?php echo esc_attr( $instance['feed_id'] ); ?>" placeholder="<?php echo esc_attr( 'ThemeJunkie' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_url' ); ?>">
				<?php _e( 'Twitter URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_url' ); ?>" name="<?php echo $this->get_field_name( 'twitter_url' ); ?>" value="<?php echo esc_url( $instance['twitter_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'fb_url' ); ?>">
				<?php _e( 'Facebook URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'fb_url' ); ?>" value="<?php echo esc_url( $instance['fb_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'gplus_url' ); ?>">
				<?php _e( 'Google Plus URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'gplus_url' ); ?>" name="<?php echo $this->get_field_name( 'gplus_url' ); ?>" value="<?php echo esc_url( $instance['gplus_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest_url' ); ?>">
				<?php _e( 'Pinterest URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest_url' ); ?>" name="<?php echo $this->get_field_name( 'pinterest_url' ); ?>" value="<?php echo esc_url( $instance['pinterest_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin_url' ); ?>">
				<?php _e( 'Linkedin URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin_url' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_url' ); ?>" value="<?php echo esc_url( $instance['linkedin_url'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss_url' ); ?>">
				<?php _e( 'RSS URL', 'fireup' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss_url' ); ?>" name="<?php echo $this->get_field_name( 'rss_url' ); ?>" value="<?php echo esc_url( $instance['rss_url'] ); ?>" />
		</p>

	<?php

	}

}