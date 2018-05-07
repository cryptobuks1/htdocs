	<?php if ( ! is_page_template( 'page-templates/home.php' ) ) : ?>	
			</div><!-- .container -->
		</div><!-- #main -->
	<?php endif; ?>

	<footer id="footer" class="site-footer clearfix" role="contentinfo" <?php hybrid_attr( 'footer' ); ?>>
		
		<div class="container footer-top clearfix">
			<div id="footer-widgets" class="clearfix">
				
				<div class="block footer-widget-1">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div>

				<div class="block footer-widget-2">
					<?php dynamic_sidebar( 'footer-center' ); ?>
				</div>

				<div class="block footer-widget-3">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div>

			</div>
		</div>

		<div id="site-bottom" class="clearfix">
			<div class="container clearfix">
				<div class="copyright">
					<p><?php echo stripslashes( of_get_option( 'fireup_footer_text', of_get_default( 'fireup_footer_text' ) ) ); ?></p>
				</div>
				
				<?php $payment = of_get_option( 'fireup_payment_method' ); ?>
				<?php if ( $payment ) : ?>
					<div class="payment">
						<img src="<?php echo esc_url( $payment ); ?>" alt="<?php esc_attr_e( 'Payment Method', 'fireup' ); ?>" width="200">
					</div>
				<?php endif; ?>

			</div><!-- .container -->
		</div>

	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
