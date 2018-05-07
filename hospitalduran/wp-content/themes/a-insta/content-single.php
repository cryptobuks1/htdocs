<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
	<header class="entry-header">
		<?php if ( has_post_format( 'image' ) || has_post_format( 'gallery' ) ) : ?>
			<i class="fa fa-camera"></i>
		<?php elseif ( has_post_format( 'video' ) ) : ?>
			<i class="fa fa-video-camera"></i>
		<?php elseif ( has_post_format( 'audio' ) ) : ?>
			<i class="fa fa-music"></i>
		<?php endif; ?>
		
		<?php imedical_posted_on(); ?>

	</header><!-- .entry-header -->

	<?php if ( has_post_format( 'image' ) ) : ?>
		<?php if ( of_get_option( 'imedical_featured_image', 'on' ) == 'on' ) : ?>
			<?php the_post_thumbnail( 'imedical-blog', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
		<?php endif; ?>
	<?php elseif ( has_post_format( 'video' ) ) : ?>
		<div class="featured-video">
			<?php echo hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) ); ?>
		</div>
	<?php elseif ( has_post_format( 'audio' ) ) : ?>
		<div class="featured-audio">
			<?php echo hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-summary -->

	<?php imedical_social_share(); ?>
	
	<?php imedical_post_author(); ?>

	<?php imedical_related_posts(); ?>
	
</article><!-- #post-## -->
