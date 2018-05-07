<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 * 
 * @package    iMedical
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'imedical_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function imedical_posted_on() {
	if ( 'post' == get_post_type() ) :
	?>
	<div class="entry-meta">
		<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" <?php hybrid_attr( 'entry-published' ); ?>><?php echo esc_html( get_the_date() )?></time> &middot; 
		<span class="entry-author author vcard" <?php hybrid_attr( 'entry-author' ) ?>><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url"><span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span></a></span> &middot; 
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'imedical' ) );
				if ( $categories_list && imedical_categorized_blog() ) :
			?>
			<span class="cat-links" <?php hybrid_attr( 'entry-terms', 'category' ); ?>>
				<?php printf( __( 'Posted in %1$s', 'imedical' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			 &middot; 

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'imedical' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>>
				<?php printf( __( 'Tagged %1$s', 'imedical' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>
	</div>
	<?php
	endif;
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @since  1.0.0
 * @return bool
 */
function imedical_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'imedical_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'imedical_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so imedical_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so imedical_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in imedical_categorized_blog.
 *
 * @since 1.0.0
 */
function imedical_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'imedical_categories' );
}
add_action( 'edit_category', 'imedical_category_transient_flusher' );
add_action( 'save_post',     'imedical_category_transient_flusher' );

if ( ! function_exists( 'imedical_site_branding' ) ) :
/**
 * Site branding for the site.
 * 
 * Display site title by default, but user can change it with their custom logo.
 * They can upload it on Customizer page.
 * 
 * @since  1.0.0
 */
function imedical_site_branding() {

	// Check if logo available, then display it.
	if ( of_get_option( 'imedical_logo' ) ) :
		echo '<div id="logo" class="logo" itemscope itemtype="http://schema.org/Brand">' . "\n";
			echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
				echo '<img itemprop="logo" src="' . esc_url( of_get_option( 'imedical_logo' ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</div>' . "\n";

	// If not, then display the Site Title and Site Description.
	else :
		echo '<div id="logo" class="logo col-md-3">'. "\n";
			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home"><span itemprop="headline">' . esc_attr( get_bloginfo( 'name' ) ) . '</span></a></h1>'. "\n";
			if ( of_get_option( 'imedical_site_desc', 'on' ) == 'on' ) :
				echo '<h2 class="site-description" ' . hybrid_get_attr( 'site-description' ) . '>' . esc_attr( get_bloginfo( 'description' ) ) . '</h2>';
			endif;
		echo '</div>'. "\n";
	endif;

}
endif;

if ( ! function_exists( 'imedical_appointment_btn' ) ) :
/**
 * Appointment button.
 * 
 * @since  1.0.0
 */
function imedical_appointment_btn() {
	$enable = of_get_option( 'imedical_appointment' );
	$text   = of_get_option( 'imedical_appointment_text' );
	$url    = of_get_option( 'imedical_appointment_url' );

	if ( $enable == 'off' ) {
		return;
	}

	echo '<div class="appointment col-lg-2">';
		echo '<a class="btn" href="' . esc_url( $url ) . '">' . esc_attr( $text ) . '</a>';
	echo '</div>';

}
endif;

if ( ! function_exists( 'imedical_page_info' ) ) :
/**
 * Page title info.
 * 
 * @since  1.0.0
 */
function imedical_page_info() {
	if ( is_page_template( 'page-templates/block.php' ) ) {
		return;
	}
?>
	<header class="page-header">
		<div class="container">
			<span class="browsing"><?php _e( 'Browsing:', 'imedical' ); ?></span>
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div>
	</header>
<?php
}
endif;

if ( ! function_exists( 'imedical_get_format_gallery' ) ) :
/**
 * Get the [gallery] shortcode from the post content and display it on index page. It require
 * gallery ids [gallery ids=1,2,3,4] to display it as thumbnail slideshow. If no ids exist it
 * just display it as standard [gallery] markup.
 *
 * If no [gallery] shortcode found in the post content, get the attached images to the post and 
 * display it as slideshow.
 * 
 * @since  1.0.0
 * @uses   get_post_gallery() to get the gallery in the post content.
 * @uses   wp_get_attachment_image() to get the HTML image.
 * @uses   get_children() to get the attached images if no [gallery] found in the post content.
 * @return string
 */
function imedical_get_format_gallery() {
	global $post;

	// Set up a default, empty $html variable.
	$html = '';

	// Set up default image size.
	$size = 'imedical-blog';

	// Check the [gallery] shortcode in post content.
	$gallery = get_post_gallery( $post->ID, false );

	$html = '<div class="flexslider">';

	// Check if the [gallery] exist.
	if ( $gallery ) {

		// Check if the gallery ids exist.
		if ( isset( $gallery['ids'] ) ) {

			// Get the gallery ids and convert it into array.
			$ids = explode( ',', $gallery['ids'] );

			// Display the gallery in a cool slideshow on index page.
			$html .= '<ul class="slides">';
				foreach( $ids as $id ) {
					$html .= '<li>';
					$html .= wp_get_attachment_image( $id, $size, false, array( 'class' => 'entry-thumbnail' ) );
					$html .= '</li>';
				}
			$html .= '</ul>';

		} else {

			// If gallery ids not exist, display the standard gallery markup.
			$html = get_post_gallery( $post->ID );

		}

	// If no [gallery] in post content, get attached images to the post.
	} else {

		// Set up default arguments.
		$defaults = array( 
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post->ID,
			'post_mime_type' => 'image',
			'numberposts'    => -1
		);

		// Retrieves attachments from the post.
		$attachments = get_children( apply_filters( 'imedical_gallery_format_args', $defaults ) );

		// Check if attachments exist.
		if ( $attachments ) {

			// Display the attachment images in a cool slideshow on index page.
			$html .= '<ul class="slides">';
				foreach ( $attachments as $attachment ) {
					$html .= '<li>';
					$html .= wp_get_attachment_image( $attachment->ID, $size, false, array( 'class' => 'entry-thumbnail' ) );
					$html .= '</li>';
				}
			$html .= '</ul>';

		}

	}

	$html .= '</div>';

	// Return the gallery images.
	return $html;

}
endif;

if ( ! function_exists( 'imedical_social_share' ) ) {
/**
 * Social share.
 *
 * @since  1.0.0
 */
function imedical_social_share() {
	global $post;

	// Disable social share.
	if ( of_get_option( 'imedical_share_buttons', 'on' ) != 'on' ) {
		return;
	}

	// Only show on singular post
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	?>
	<div class="entry-share clearfix">
		<span class="entry-share-icons">
			<a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>" title="Facebook"><i class="fa fa-facebook-square"></i></a>
			<a class="tw" href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&amp;url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>" title="Twitter"><i class="fa fa-twitter-square"></i></a>
			<a class="gplus" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>" title="GooglePlus"><i class="fa fa-google-plus-square"></i></a>
			<a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>&amp;description=<?php echo get_the_excerpt(); ?>" title="Pinterest"><i class="fa fa-pinterest-square"></i></a>
			<a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;title=<?php echo esc_attr( get_the_title( $post->ID ) ); ?>&amp;summary=<?php echo get_the_excerpt(); ?>&amp;source=<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" title="LinkedIn"><i class="fa fa-linkedin-square"></i></a>
		</span>
	</div><!-- .entry-share -->
	<?php
}
}

if ( ! function_exists( 'imedical_post_author' ) ) :
/**
 * Author post informations.
 *
 * @since  1.0.0
 */
function imedical_post_author() {

	// Bail if user don't want to display the author info via theme settings.
	if ( of_get_option( 'imedical_post_author', 'on' ) != 'on' ) {
		return;
	}

	// Bail if not on the single post.
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	// Bail if user hasn't fill the Biographical Info field.
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}
?>

	<div class="author-bio clearfix" <?php hybrid_attr( 'entry-author' ) ?>>
		<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'imedical_author_bio_avatar_size', 64 ), '', strip_tags( get_the_author() ) ); ?>
		<div class="description">
			<h3 class="author-title name">
				<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><span itemprop="name"><?php echo strip_tags( get_the_author() ); ?></span></a>
			</h3>
			<p class="bio" itemprop="description"><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
		</div>
	</div><!-- .author-bio -->

<?php
}
endif;

if ( ! function_exists( 'imedical_related_posts' ) ) :
/**
 * Related posts.
 *
 * @since  1.0.0
 */
function imedical_related_posts() {
	global $post;

	// Bail if user don't want to display the related posts via theme settings.
	if ( of_get_option( 'imedical_related_posts', 'on' ) != 'on' ) {
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
		'posts_per_page' => 3,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'imedical_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : ?>

		<div class="related-posts">
			<h3><?php _e( 'You might also like &hellip;', 'imedical' ); ?></h3>
			<ul class="row">
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<li class="col-sm-4 col-md-4">
						<a href="<?php the_permalink(); ?>">
							<?php if ( of_get_option( 'imedical_related_posts_thumbnail', 'on' ) == 'on' && has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'imedical-loop', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
							<?php endif; ?>
							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
							<?php if ( of_get_option( 'imedical_related_posts_date', 'on' ) == 'on' ) : ?>
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

if ( ! function_exists( 'imedical_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function imedical_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">
			<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'imedical' ); ?> <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></span> <?php edit_comment_link( __( '(Edit)', 'imedical' ), '<span class="edit-link">', '</span>' ); ?></p>
		</article>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-container">

			<?php echo get_avatar( $comment, apply_filters( 'imedical_comment_avatar_size', 52 ) ); ?>

			<div class="comment-head">
				<span class="name" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php echo get_comment_author_link(); ?></span></span>
				<?php
					printf( '<span class="date"><a href="%1$s" ' . hybrid_get_attr( 'comment-permalink' ) . '><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a> %4$s</span>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'imedical' ), get_comment_date(), get_comment_time() ),
						sprintf( __( '%1$s&middot; Edit%2$s', 'imedical' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'imedical' ) . '">', '</a>' )
					);
				?>
			</div><!-- comment-head -->
			
			<div class="comment-content comment-entry comment" <?php hybrid_attr( 'comment-content' ); ?>>
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'imedical' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'imedical' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span><!-- .reply -->
			</div><!-- .comment-content -->

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;