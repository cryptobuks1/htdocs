<?php get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>
			<div class="departments-content departments-list">
				<div class="row no-gutters">

					<?php if ( have_posts() ) : ?>
						<?php $i = 0; $class = ''; ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( ++$i > 5 ) { $class = 'no-border-bottom'; } ?>
							<div class="col-md-15">
								
								<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?> <?php hybrid_attr( 'post' ); ?>>

									<div class="img-wrapper">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'imedical-loop', array( 'class' => 'department-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
										<?php endif; ?>
									</div>
									<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									<p><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
									<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Read More &hellip;', 'imedical' ); ?></a>
									
								</article><!-- #post-## -->

							</div>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>