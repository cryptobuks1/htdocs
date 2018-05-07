<?php
// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
	return;
}
?>

<nav id="top-navigation" class="primary-navigation col-md-12 col-lg-7" role="navigation" <?php hybrid_attr( 'menu' ); ?>>

	<?php wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container_class' => 'navigation-wrapper',
			'menu_id'         => 'menu-primary-items',
			'menu_class'      => 'sf-menu no-list-style pull-right',
			'walker'          => new iMedical_Custom_Nav_Walker
		)
	); ?>
	
</nav><!-- #site-navigation -->