<?php if ( is_singular( 'post' ) && of_get_option( 'fireup_post_navigation', 'on' ) == 'on' ) : // If viewing a single post page. ?>

	<div class="loop-nav clearfix">
		<?php previous_post_link( '<div class="prev">' . __( 'Previous Post: %link', 'fireup' ) . '</div>', '%title' ); ?>
		<?php next_post_link(     '<div class="next">' . __( 'Next Post: %link',     'fireup' ) . '</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php loop_pagination(
		array( 
			'prev_text' => '<i class="fa fa-angle-left"></i>', 
			'next_text' => '<i class="fa fa-angle-right"></i>'
		) 
	); ?>

<?php endif; // End check for type of page being viewed. ?>