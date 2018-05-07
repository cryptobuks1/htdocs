<?php
// Return early if no widget found.
if ( ! is_active_sidebar( 'primary' ) ) {
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

<div id="secondary" class="widget-area <?php echo esc_attr( $class ); ?>" role="complementary" aria-label="<?php echo esc_attr_x( 'Primary Sidebar', 'Sidebar aria label', 'imedical' ); ?>" <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
	<?php dynamic_sidebar( 'primary' ); ?>
</div><!-- #secondary -->