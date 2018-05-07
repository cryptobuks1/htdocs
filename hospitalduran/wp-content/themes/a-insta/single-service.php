<?php get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'imedical-blog', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
					<?php endif; ?>

					<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
						<?php the_content(); ?>
					</div><!-- .entry-summary -->
					
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>