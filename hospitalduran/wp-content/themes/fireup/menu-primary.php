<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav id="primary-nav" class="main-navigation" role="navigation" <?php hybrid_attr( 'menu' ); ?>>

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'menu-wrapper',
				'menu_id'         => 'primary-menu',
				'menu_class'      => 'sf-menu',
				'fallback_cb'     => ''
			)
		); ?>

	</nav><!-- #primary-nav -->

	<a id="primary-mobile-menu" href="#"><i class="fa fa-bars"></i></a>

	<?php fireup_header_cart(); ?>

<?php endif; // End check for menu. ?>