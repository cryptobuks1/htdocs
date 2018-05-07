<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'secondary' location. ?>

	<div id="secondary-bar">

		<div class="container clearfix">

			<a id="secondary-mobile-menu" href="#"><i class="fa fa-bars"></i> <span><?php _e( 'Categories', 'fireup' ); ?></span></a>

			<nav id="secondary-nav" class="main-navigation" role="navigation" <?php hybrid_attr( 'menu' ); ?>>

				<?php wp_nav_menu(
					array(
						'theme_location'  => 'secondary',
						'container_class' => 'menu-wrapper',
						'menu_id'         => 'secondary-menu',
						'menu_class'      => 'sf-menu',
						'fallback_cb'     => ''
					)
				); ?>

			</nav><!-- #secondary-nav -->

			<?php fireup_header_search(); ?>

		</div>

	</div>

<?php endif; // End check for menu. ?>