<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php hybrid_attr( 'body' ); ?>>

<div id="page" class="hfeed site">

	<?php get_template_part( 'top', 'bar' ); // Loads the top-bar.php template. ?>

	<header id="header" class="site-header" role="banner" <?php hybrid_attr( 'header' ); ?>>

		<div class="container">
			<div class="row">

				<div class="site-branding col-md-3">
					<?php imedical_site_branding(); ?>
				</div>

				<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

				<?php imedical_appointment_btn(); // Appointment button. ?>
				
			</div>
		</div>

	</header><!-- #masthead -->

	<?php imedical_page_info(); ?>

	<div id="content" class="site-content">
		
		<?php if ( ! is_page_template( 'page-templates/block.php' ) ) { echo '<div class="container"><div class="row">'; } ?>