<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<div class="entry-content">

		<?php if ( has_post_thumbnail() && of_get_option( 'fireup_featured_image', 'off' ) == 'on' ) : ?>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'fireup-featured', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
		<?php endif; ?>
	
		<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

		<div class="entry-meta">
			<?php fireup_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php fireup_social_share(); ?>
		
		<span <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
		</span>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'fireup' ),
				'after'  => '</div>',
			) );
		?>

		<?php edit_post_link( __( 'Edit', 'fireup' ), '<span class="edit-link">', '</span>' ); ?>

	</div><!-- .entry-content -->

	<?php fireup_post_author(); ?>	
	
</article><!-- #post-## -->
