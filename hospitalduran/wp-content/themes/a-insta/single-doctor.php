<?php get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
					<div class="row">

						<div class="doctor-detail col-sm-4 col-md-4">

							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'imedical-loop', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
							<?php endif; ?>

							<div class="doctor-info">
								<div class="specialities bbottom">
									<?php echo get_the_term_list( $post->ID, 'speciality', __( '<strong>Speciality:</strong> ', 'imedical' ), ', ' ); ?>
								</div>

								<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_education', true ) ) : ?>
									<div class="education bbottom">
										<?php printf( __( '<strong>Education:</strong> %s', 'imedical' ), esc_attr( get_post_meta( $post->ID, 'junkie_types_doctor_education', true ) ) ); ?>
									</div>
								<?php endif; ?>
								
								<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_work_days', true ) ) : ?>
									<div class="work-days bbottom">
										<?php printf( __( '<strong>Work Days:</strong> %s', 'imedical' ), esc_attr( get_post_meta( $post->ID, 'junkie_types_doctor_work_days', true ) ) ); ?>
									</div>
								<?php endif; ?>

								<ul class="socialize no-list-style clearfix">
									<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_twitter_url', true ) ) : ?>
										<li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'junkie_types_doctor_twitter_url', true ) ) ?>"><i class="fa fa-twitter-square"></i></a></li>
									<?php endif; ?>
									<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_facebook_url', true ) ) : ?>
										<li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'junkie_types_doctor_facebook_url', true ) ) ?>"><i class="fa fa-facebook-square"></i></a></li>
									<?php endif; ?>
									<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_googleplus_url', true ) ) : ?>
										<li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'junkie_types_doctor_googleplus_url', true ) ) ?>"><i class="fa fa-google-plus-square"></i></a></li>
									<?php endif; ?>
									<?php if ( get_post_meta( $post->ID, 'junkie_types_doctor_linkedin_url', true ) ) : ?>
										<li><a href="<?php echo esc_url( get_post_meta( $post->ID, 'junkie_types_doctor_linkedin_url', true ) ) ?>"><i class="fa fa-linkedin-square"></i></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div>

						<div class="entry-content col-sm-8 col-md-8" <?php hybrid_attr( 'entry-content' ); ?>>
							<?php the_content(); ?>
						</div><!-- .entry-summary -->

					</div>
				</article><!-- #post-## -->

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>