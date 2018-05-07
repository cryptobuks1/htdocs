<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="content" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div id="blog-container" class="js-isotope">

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="item">
							<?php get_template_part( 'content', get_post_format() ); ?>
						</div>

					<?php endwhile; ?>

				</div>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'loop', 'nav' ); // Loads the loop-nav.php template ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>