<?php
// Get the value from theme settings.
$enable = of_get_option( 'imedical_top_bar' );
$addr   = of_get_option( 'imedical_addr' );
$phone  = of_get_option( 'imedical_phone' );

// Turn off top bar.
if ( $enable == 'off' ) {
	return;
}
?>

<div class="top-bar">
	<div class="container">
		<div class="row">
			
			<div class="address col-xs-12 col-sm-9 col-md-10">
				<ul>
					<?php if ( ! empty( $addr ) ) : ?>
						<li><i class="fa fa-map-marker"></i> <span><?php echo esc_attr( $addr ); ?></span></li>
					<?php endif; ?>
					<?php if ( ! empty( $phone ) ) : ?>
						<li><i class="fa fa-phone-square"></i> <span><?php echo esc_attr( $phone ); ?></span></li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="social-menu col-xs-12 col-sm-3 col-md-2">
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'container_class' => 'menu-social',
						'menu_id'         => 'menu-social-items',
						'menu_class'      => 'menu-social-items',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				); ?>
			</div>

		</div>
	</div>
</div>