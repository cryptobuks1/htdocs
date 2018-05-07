<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 * 
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'fireup_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function fireup_posted_on() {
?>

	<?php if ( is_single() ) : ?>
		
		<?php if ( of_get_option( 'fireup_date', 'on' ) == 'on' ) : ?>
			<span class="published"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><i class="fa fa-clock-o"></i> <?php echo esc_html( get_the_date() )?></time></span>
		<?php endif; ?>
		
		<?php if ( of_get_option( 'fireup_author', 'on' ) == 'on' ) : ?>
			<span class="entry-author author vcard" <?php hybrid_attr( 'entry-author' ) ?>><i class="fa fa-user"></i> <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url"><small itemprop="name"><?php echo esc_html( get_the_author() ); ?></small></a></span>
		<?php endif; ?>
		
		<?php if ( of_get_option( 'fireup_comment', 'on' ) == 'on' ) : ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="entry-comment comment-count"><i class="fa fa-comments"></i> <?php comments_popup_link( __( '0 Comment', 'fireup' ), __( '1 Comment', 'fireup' ), __( '% Comments', 'fireup' ) ); ?></span>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ( of_get_option( 'fireup_tags', 'on' ) == 'on' ) : ?>
			<?php
				$tag_list = get_the_tag_list( '', ', ' );
				if ( $tag_list ) : 
			?>
				<span class="entry-tags" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>><i class="fa fa-tags"></i> <?php echo $tag_list; ?></span>
			<?php endif; ?>
		<?php endif; ?>

	<?php else : ?>

		<span class="published"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php echo esc_html( get_the_date() )?></time></span>

		<span class="meta-sep"> -  </span>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="entry-comment comment-count"><?php comments_popup_link( __( '0 Comment', 'fireup' ), __( '1 Comment', 'fireup' ), __( '% Comments', 'fireup' ) ); ?></span>
		<?php endif; ?>

	<?php endif; ?>
<?php }
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @since  1.0.0
 * @return bool
 */
function fireup_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fireup_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fireup_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fireup_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fireup_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in fireup_categorized_blog.
 *
 * @since 1.0.0
 */
function fireup_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fireup_categories' );
}
add_action( 'edit_category', 'fireup_category_transient_flusher' );
add_action( 'save_post',     'fireup_category_transient_flusher' );

if ( ! function_exists( 'fireup_site_branding' ) ) :
/**
 * Site branding for the site.
 * 
 * Display site title by default, but user can change it with their custom logo.
 * They can upload it on Customizer page.
 * 
 * @since  1.0.0
 */
function fireup_site_branding() {

	// Check if logo available, then display it.
	if ( of_get_option( 'fireup_logo' ) ) :
		echo '<div id="logo" itemscope itemtype="http://schema.org/Brand">' . "\n";
			echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
				echo '<img itemprop="logo" src="' . esc_url( of_get_option( 'fireup_logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</div>' . "\n";

	// If not, then display the Site Title and Site Description.
	else :
		echo '<div id="logo">'. "\n";
			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home"><span itemprop="headline">' . esc_attr( get_bloginfo( 'name' ) ) . '</span></a></h1>'. "\n";
			if ( of_get_option( 'fireup_description', 'on' ) == 'on' ) :
				echo '<h2 class="site-description" ' . hybrid_get_attr( 'site-description' ) . '>' . esc_attr( get_bloginfo( 'description' ) ) . '</h2>';
			endif;
		echo '</div>'. "\n";
	endif;

}
endif;

if ( ! function_exists( 'fireup_social_share' ) ) :
/**
 * Social share.
 *
 * @since  1.0.0
 */
function fireup_social_share() {
	global $post;

	// Bail if user don't want to display the share buttons via theme settings.
	if ( of_get_option( 'fireup_share_buttons', 'on' ) != 'on' ) {
		return;
	}
?>
	<div class="entry-share clearfix">
		<ul>
			<li><a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-twitter"></i></a></li>
			<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&title=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&summary=<?php echo get_the_excerpt(); ?>&source=<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="mailto:"><i class="fa fa-envelope-o"></i></a></li>
			<li><a href="javascript:window.print()"><i class="fa fa-print"></i></a></li>
		</ul>
	</div>
<?php
}
endif;

if ( ! function_exists( 'fireup_post_author' ) ) :
/**
 * Author post informations.
 *
 * @since  1.0.0
 */
function fireup_post_author() {

	// Bail if user don't want to display the author info via theme settings.
	if ( of_get_option( 'fireup_author_bio', 'on' ) != 'on' ) {
		return;
	}

	// Bail if not on the single post.
	if ( ! is_single() ) {
		return;
	}

	// Bail if user hasn't fill the Biographical Info field.
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}
?>
	<footer class="entry-footer clearfix">
		<div class="author-bio clearfix" <?php hybrid_attr( 'entry-author' ) ?>>
			<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'fireup_author_bio_avatar_size', 80 ), '', strip_tags( get_the_author() ) ); ?>
			<div class="description">
				<h3 class="author-title name">
					<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><span itemprop="name"><?php echo strip_tags( get_the_author() ); ?></span></a>
				</h3>
				<p class="bio" itemprop="description"><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
			</div>
		</div><!-- .author-bio -->
	</footer>

<?php
}
endif;

if ( ! function_exists( 'fireup_related_posts' ) ) :
/**
 * Related posts.
 *
 * @since  1.0.0
 */
function fireup_related_posts() {
	global $post;

	// Bail if user don't want to display the related posts via theme settings.
	if ( of_get_option( 'fireup_related_posts', 'on' ) != 'on' ) {
		return;
	}

	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}
	
	// Posts query arguments.
	$query = array(
		'post__not_in' => array( $post->ID ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 4,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'fireup_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : ?>

		<div class="related-posts">
			<h3><?php _e( 'You might also like:', 'fireup' ); ?></h3>
			<ul class="clearfix">
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php if ( of_get_option( 'fireup_related_posts_thumbnail', 'on' ) == 'on' && has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'fireup-blog', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
							<?php endif; ?>
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							<?php if ( of_get_option( 'fireup_related_posts_date', 'on' ) == 'on' ) : ?>
								<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() )?></time>
							<?php endif; ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	
	<?php endif;

	// Restore original Post Data.
	wp_reset_postdata();

}
endif;

if ( ! function_exists( 'fireup_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function fireup_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class( 'clearfix' ); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">
			<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'fireup' ); ?> <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></span> <?php edit_comment_link( __( '(Edit)', 'fireup' ), '<span class="edit-link">', '</span>' ); ?></p>
		</article>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">

			<?php echo get_avatar( $comment, 60 ); ?>
			
			<div class="comment-des">

				<div class="arrow-comment"></div>

				<div class="comment-by">
					<p class="author" <?php hybrid_attr( 'comment-author' ); ?>><strong><span itemprop="name"><?php echo get_comment_author_link(); ?></span></strong></p>
					<?php
						printf( '<span class="date"><a href="%1$s" ' . hybrid_get_attr( 'comment-permalink' ) . '><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a> - %4$s</span>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'theworld' ), get_comment_date(), get_comment_time() ),
							sprintf( __( '%1$sEdit%2$s', 'theworld' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'theworld' ) . '">', '</a>' )
						);
					?>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'theworld' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</span><!-- .reply -->
				</div><!-- .comment-by -->

				<section class="comment-content comment" <?php hybrid_attr( 'comment-content' ); ?>>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'theworld' ); ?></p>
					<?php endif; ?>
					<?php comment_text(); ?>
				</section><!-- .comment-content -->

			</div><!-- .comment-des -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'fireup_header_cart' ) ) :
/**
 * Header Cart
 *
 * @since  1.0.0
 */
function fireup_header_cart() {

	// Make sure WooCommerce plugin is exist.
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
?>
	<ul class="wc-nav">
		<li class="cart">
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'fireup' ); ?>">
				<span>
					<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_total() ); ?></span> 
					<span class="contents"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'fireup' ), WC()->cart->get_cart_contents_count() ) );?></span>
				</span>
			</a>
		</li>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</ul>
<?php
}
endif;

if ( ! function_exists( 'fireup_header_search' ) ) :
/**
 * Header Cart
 *
 * @since  1.0.0
 */
function fireup_header_search() {

	// Make sure WooCommerce plugin is exist.
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
?>
	<div class="search-form">
		<form method="get" class="searchform" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<input class="n-search" type="text" name="s" id="s" placeholder="<?php esc_attr_e( 'Search products', 'fireup' ); ?>">
			<button type="submit" name="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
	</div>
<?php
}
endif;