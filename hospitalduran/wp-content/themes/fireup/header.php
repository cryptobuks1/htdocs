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

<div id="page" class="hfeed site clearfix">

	<header id="masthead" class="site-header clearfix" role="banner" <?php hybrid_attr( 'header' ); ?>>

		<div class="container">

			<?php fireup_site_branding(); ?>

			<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>

		</div>

		<div class="clearfix"></div>

	</header><!-- #masthead -->

	<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template. ?>
	
	<?php if ( ! is_page_template( 'page-templates/home.php' ) ) : ?>
	<div id="main" class="site-content">
		<div class="container clearfix">
	<?php endif; ?>
