<?php get_header(); ?>

	<div id="primary" class="content-area page clearfix">
		<main id="content" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( is_home() ) { ?>
				<h1 class="page-title"><?php _e( 'Blog', 'fireup' ); ?></h1>
			<?php } ?>

			<?php if ( have_posts() ) : ?>

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
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
