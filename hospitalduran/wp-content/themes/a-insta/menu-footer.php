<?php
// Check if there's a menu assigned to the 'footer' location.
if ( ! has_nav_menu( 'footer' ) ) {
	return;
}
?>

<nav id="top-navigation" class="footer-menu col-xs-12 col-sm-6 col-md-7" role="navigation" <?php hybrid_attr( 'menu' ); ?>>

	<?php wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'container'      => '',
			'menu_id'        => 'menu-footer-items',
			'menu_class'     => 'no-list-style',
			'fallback_cb'    => ''
		)
	); ?>
	
</nav><!-- #site-navigation -->