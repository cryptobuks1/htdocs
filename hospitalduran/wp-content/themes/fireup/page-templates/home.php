<?php
/**
 * Template Name: Home template
 */
get_header(); ?>

	<div id="home">
		<main id="content" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>
			
			<?php if ( is_active_sidebar( 'home' ) ) : ?>

				<?php get_sidebar( 'home' ); ?>

			<?php else : ?>
				
				<div class="entry-content">
					<p><?php printf( __( 'You can customize this page using Widgets, please go to %1$sWidgets Page%2$s then add the widgets to the %3$sHome Sidebar%4$s.', 'fireup' ), '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">', '</a>', '<strong>', '</strong>' ); ?></p>
				</div>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>