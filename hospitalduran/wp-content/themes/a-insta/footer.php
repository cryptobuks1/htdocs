		<?php if ( ! is_page_template( 'page-templates/block.php' ) ) { echo '</div></div>'; } ?>
	</div><!-- #content -->

	<footer id="footer" class="site-footer wow fadeIn" role="contentinfo" <?php hybrid_attr( 'footer' ); ?> data-wow-duration="1s" data-wow-delay="0s">
		<div class="container">
			
			<div class="footer-sidebar">
				<div class="row">
					
					<div class="footer-column footer-column-1 col-sm-6 col-md-6 col-lg-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>

					<div class="footer-column footer-column-2 col-sm-6 col-md-6 col-lg-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>

					<div class="footer-column footer-column-3 col-sm-6 col-md-6 col-lg-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>

					<div class="footer-column footer-column-4 col-sm-6 col-md-6 col-lg-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>

				</div>
			</div>

		</div>
	</footer><!-- #footer -->

	<div class="footer-credits">
		<div class="container">
			<div class="row">
				
				<?php get_template_part( 'menu', 'footer' ); ?>

				<div class="copyrights col-xs-12 col-sm-6 col-md-5">
					<?php echo stripslashes( of_get_option( 'imedical_footer_text', of_get_default( 'imedical_footer_text' ) ) ); ?>
				</div><!-- .copyright -->

			</div>
		</div>
	</div>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
