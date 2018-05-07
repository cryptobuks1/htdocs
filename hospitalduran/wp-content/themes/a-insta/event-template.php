<?php get_header(); ?>

	<div id="primary" class="content-area tt_event_page_left col-md-8">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'imedical-blog', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
			<?php endif; ?>

			<?php the_title( '<h1 class="page-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

			<?php
			$subtitle = get_post_meta( get_the_ID(), "timetable_subtitle", true );
			if ( $subtitle != "" ) : ?>
				<h5><?php echo $subtitle; ?></h5>
			<?php
			endif;
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				echo tt_remove_wpautop( get_the_content() );
			endwhile; endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'event' ); ?>
<?php get_footer(); ?>