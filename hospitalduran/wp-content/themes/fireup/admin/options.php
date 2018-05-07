<?php
/**
 * Theme Options.
 *
 * @package    FireUp
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2015, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 *
 * @since  1.0.0
 */
function optionsframework_option_name() {
	return 'fireup'; // Theme slug
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * @since  1.0.0
 */
function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories[''] = __( 'All Categories', 'fireup' );
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	$options_tags[''] = __( 'All Tags', 'fireup' );
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'Select a page:', 'fireup' );
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// Image path
	$imagepath =  get_template_directory_uri() . '/assets/img/';

	// Set empty $options.
	$options = array();

	/**
	 * Defines array of options.
	 */
	
	// ============================ //
	// ===== General Settings ===== //
	// ============================ //
	$options[] = array(
		'name' => __( 'General', 'fireup' ),
		'type' => 'heading'
	);

		$options['fireup_favicon'] = array(
			'name' => __( 'Favicon', 'fireup' ),
			'desc' => __( 'Your custom favicon. 32x32px recommended.', 'fireup' ),
			'id'   => 'fireup_favicon',
			'type' => 'upload'
		);

		$options['fireup_mobile_icon'] = array(
			'name' => __( 'Mobile Icon', 'fireup' ),
			'desc' => __( '144x144 recommended in PNG format. This icon will be used when users add your website as a shortcut on mobile devices like iPhone, iPad, Android etc.', 'fireup' ),
			'id'   => 'fireup_mobile_icon',
			'type' => 'upload'
		);

		$options[] = array(
			'name'  => __( 'FeedBurner URL', 'fireup' ),
			'desc'  => __( 'Enter your full FeedBurner URL. If you wish to use FeedBurner over the standard WordPress feed.', 'fireup' ),
			'id'    => 'fireup_feedburner_url',
			'placeholder' => 'http://feeds.feedburner.com/ThemeJunkie',
			'type'  => 'text'
		);

		$options['fireup_tracking'] = array(
			'name' => __( 'Tracking Code', 'fireup' ),
			'desc' => __( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.', 'fireup' ),
			'id'   => 'fireup_tracking',
			'type' => 'textarea'
		);

	// ============================ //
	// ===== Header Settings ====== //
	// ============================ //
	$options[] = array(
		'name' => __( 'Header', 'fireup' ),
		'type' => 'heading'
	);

		$options['fireup_logo'] = array(
			'name' => __( 'Logo', 'fireup' ),
			'desc' => __( 'Upload your custom logo, it will automatically replace the Site Title', 'fireup' ),
			'id'   => 'fireup_logo',
			'type' => 'upload'
		);

		$options['fireup_logo_retina'] = array(
			'name' => __( 'Retina Logo', 'fireup' ),
			'desc' => __( 'Upload your retina version of your logo. eg: logo@2x.png', 'fireup' ),
			'id'   => 'fireup_logo_retina',
			'type' => 'upload'
		);

		$options[] = array(
			'name' => __( 'Site Description', 'fireup' ),
			'desc' => __( 'Display the site description.', 'fireup' ),
			'id'   => 'fireup_site_desc',
			'std'  => 'on',
			'type' => 'onoff'
		);

	// ================================ //
	// ===== Single Post Settings ===== //
	// ================================ //
	$options[] = array(
		'name' => __( 'Single Post', 'fireup' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Featured Image', 'fireup' ),
			'desc' => __( 'Display the featured image.', 'fireup' ),
			'id'   => 'fireup_featured_image',
			'std'  => 'off',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Date', 'fireup' ),
			'desc' => __( 'Display the post date.', 'fireup' ),
			'id'   => 'fireup_date',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Author', 'fireup' ),
			'desc' => __( 'Display the post author.', 'fireup' ),
			'id'   => 'fireup_author',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Comment', 'fireup' ),
			'desc' => __( 'Display the post comment link.', 'fireup' ),
			'id'   => 'fireup_comment',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Tags', 'fireup' ),
			'desc' => __( 'Display the post tags.', 'fireup' ),
			'id'   => 'fireup_tags',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Post Navigation', 'fireup' ),
			'desc' => __( 'Display the post navigation.', 'fireup' ),
			'id'   => 'fireup_post_navigation',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Post Misc Settings', 'fireup' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Author Bio', 'fireup' ),
				'desc' => __( 'Display the author biographical info.', 'fireup' ),
				'id'   => 'fireup_author_bio',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Share Buttons', 'fireup' ),
				'desc' => __( 'Display the social share buttons info.', 'fireup' ),
				'id'   => 'fireup_share_buttons',
				'std'  => 'on',
				'type' => 'onoff'
			);

		$options[] = array(
			'name' => __( 'Related Posts Settings', 'fireup' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Related Posts', 'fireup' ),
				'desc' => __( 'Display the related posts.', 'fireup' ),
				'id'   => 'fireup_related_posts',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Related Posts Thumbnail', 'fireup' ),
				'desc' => __( 'Display the related posts with thumbnail.', 'fireup' ),
				'id'   => 'fireup_related_posts_thumbnail',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Related Posts Date', 'fireup' ),
				'desc' => __( 'Display the related posts with date.', 'fireup' ),
				'id'   => 'fireup_related_posts_date',
				'std'  => 'on',
				'type' => 'onoff'
			);

		$options[] = array(
			'name' => __( 'Advertisement Settings', 'fireup' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options['fireup_ad_single_before'] = array(
				'name' => __( 'Before Content Advertisement', 'fireup' ),
				'desc' => __( 'Your ad will appear on single post before content.', 'fireup' ),
				'id'   => 'fireup_ad_single_before',
				'type' => 'textarea'
			);

			$options['fireup_ad_single_after'] = array(
				'name' => __( 'After Content Advertisement', 'fireup' ),
				'desc' => __( 'Your ad will appear on single post after content.', 'fireup' ),
				'id'   => 'fireup_ad_single_after',
				'type' => 'textarea'
			);

	// =========================== //
	// ===== Footer Settings ===== //
	// =========================== //
	$options[] = array(
		'name' => __( 'Footer', 'fireup' ),
		'type' => 'heading'
	);

		$options['fireup_footer_text'] = array(
			'name' => __( 'Footer Text', 'fireup' ),
			'desc' => __( 'You can customize the footer text here.', 'fireup' ),
			'id'   => 'fireup_footer_text',
			'std'  => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>',
			'type' => 'editor'
		);

		$options['fireup_payment_method'] = array(
			'name' => __( 'Payment Method', 'fireup' ),
			'desc' => __( 'Upload the payment method image. 200 x 30 is recommended size.', 'fireup' ),
			'id'   => 'fireup_payment_method',
			'type' => 'upload'
		);

	// ================================== //
	// ===== Custom Code Settings ======= //
	// ================================== //
	$options[] = array(
		'name' => __( 'Custom Code', 'fireup' ),
		'type' => 'heading'
	);

		$options['fireup_script_head'] = array(
			'name' => __( 'Header code', 'fireup' ),
			'desc' => __( 'If you need to add custom scripts to your header (meta tag verification, google fonts url), you should enter them in the box. They will be added before &lt;/head&gt; tag', 'fireup' ),
			'id'   => 'fireup_script_head',
			'type' => 'textarea'
		);

		$options['fireup_script_footer'] = array(
			'name' => __( 'Footer code', 'fireup' ),
			'desc' => __( 'If you need to add custom scripts to your footer, you should enter them in the box. They will be added before &lt;/body&gt; tag', 'fireup' ),
			'id'   => 'fireup_script_footer',
			'type' => 'textarea'
		);
	
	// Allow dev to filter the theme options.
	return apply_filters( 'fireup_theme_options', $options );
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}