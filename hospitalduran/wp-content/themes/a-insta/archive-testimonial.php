<?php get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>
			<div class="row">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

							<div class="testimonial-content">
								
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'imedical-widget-thumb', array( 'class' => 'testimonial-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
								<?php endif; ?>

								<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

								<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
									<?php the_excerpt(); ?>
								</div><!-- .entry-summary -->

								<div class="testimonial-website">
									<?php if ( get_post_meta( $post->ID, 'junkie_types_testimonial_website_name', true ) ) : ?>
										<a href="<?php echo esc_attr( get_post_meta( $post->ID, 'junkie_types_testimonial_website_url', true ) ); ?>"><?php echo esc_attr( get_post_meta( $post->ID, 'junkie_types_testimonial_website_name', true ) ); ?></a>
									<?php endif; ?>
								</div>

							</div>
							
						</article><!-- #post-## -->


					<?php endwhile; ?>

					<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>