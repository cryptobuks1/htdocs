<?php
// Return early if no widget found.
if ( ! is_active_sidebar( 'sidebar-event' ) ) {
	return;
}

// Return early if user uses 1 column layout.
if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
	return;
}

$class = '';
$layout = of_get_option( 'imedical_page_layout', 'fullwidth' );
if ( $layout == 'fullwidth' ) {
	$class = 'col-md-4 col-lg-4';
} else {
	$class = 'col-md-4';
}
?>

<div id="secondary" class="widget-area <?php echo esc_attr( $class ); ?>" role="complementary" aria-label="<?php echo esc_attr_x( 'Event Sidebar', 'Sidebar aria label', 'imedical' ); ?>" <?php hybrid_attr( 'sidebar', 'event' ); ?>>
	<?php dynamic_sidebar( 'sidebar-event' ); ?>
</div><!-- #secondary -->