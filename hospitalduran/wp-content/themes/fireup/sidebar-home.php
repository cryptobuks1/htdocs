<?php
// Return early if no widget found.
if ( ! is_active_sidebar( 'home' ) ) {
	return;
}
?>
<?php dynamic_sidebar( 'home' ); ?>