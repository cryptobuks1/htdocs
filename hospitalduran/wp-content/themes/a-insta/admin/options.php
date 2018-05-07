<?php
/**
 * Theme Options.
 *
 * @package    iMedical
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
	return 'imedical'; // Theme slug
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
	$options_categories[''] = __( 'All Categories', 'imedical' );
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	$options_tags[''] = __( 'All Tags', 'imedical' );
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = __( 'Select a page:', 'imedical' );
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
		'name' => __( 'General', 'imedical' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Page layout', 'imedical' ),
			'desc' => __( 'Choose the global page layout.', 'imedical' ),
			'id'   => 'imedical_page_layout',
			'std'  => 'fullwidth',
			'type' => 'radio',
			'options' => array(
				'fullwidth' => __( 'Full Width', 'imedical' ),
				'boxed'     => __( 'Boxed', 'imedical' ),
			)
		);

		$options[] = array(
			'name' => __( 'Favicon', 'imedical' ),
			'desc' => __( 'Your custom favicon. 32x32px recommended.', 'imedical' ),
			'id'   => 'imedical_favicon',
			'type' => 'upload'
		);

		$options[] = array(
			'name' => __( 'Mobile Icon', 'imedical' ),
			'desc' => __( '144x144 recommended in PNG format. This icon will be used when users add your website as a shortcut on mobile devices like iPhone, iPad, Android etc.', 'imedical' ),
			'id'   => 'imedical_mobile_icon',
			'type' => 'upload'
		);

		$options[] = array(
			'name'  => __( 'FeedBurner URL', 'imedical' ),
			'desc'  => __( 'Enter your full FeedBurner URL. If you wish to use FeedBurner over the standard WordPress feed.', 'imedical' ),
			'id'    => 'imedical_feedburner_url',
			'placeholder' => 'http://feeds.feedburner.com/ThemeJunkie',
			'type'  => 'text'
		);

		$options[] = array(
			'name' => __( 'Page Comment', 'imedical' ),
			'desc' => __( 'Enable comment on page.', 'imedical' ),
			'id'   => 'imedical_comment_page',
			'std'  => 'off',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Tracking Code', 'imedical' ),
			'desc' => __( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.', 'imedical' ),
			'id'   => 'imedical_tracking',
			'type' => 'textarea'
		);

	// ============================ //
	// ===== Header Settings ===== //
	// ============================ //
	$options[] = array(
		'name' => __( 'Header', 'imedical' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Logo', 'imedical' ),
			'desc' => __( 'Upload your custom logo, it will automatically replace the Site Title', 'imedical' ),
			'id'   => 'imedical_logo',
			'type' => 'upload'
		);

		$options[] = array(
			'name' => __( 'Retina Logo', 'imedical' ),
			'desc' => __( 'Upload your retina version of your logo. eg: logo@2x.png', 'imedical' ),
			'id'   => 'imedical_logo_retina',
			'type' => 'upload'
		);

		$options[] = array(
			'name' => __( 'Site Description', 'imedical' ),
			'desc' => __( 'Display the site description.', 'imedical' ),
			'id'   => 'imedical_site_desc',
			'std'  => 'off',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Top Bar Settings', 'imedical' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Enable', 'imedical' ),
				'desc' => __( 'Enable the top bar.', 'imedical' ),
				'id'   => 'imedical_top_bar',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name'  => __( 'Address', 'imedical' ),
				'desc'  => __( 'Enter you address.', 'imedical' ),
				'id'    => 'imedical_addr',
				'type'  => 'text'
			);

			$options[] = array(
				'name'  => __( 'Phone', 'imedical' ),
				'desc'  => __( 'Enter you phone number.', 'imedical' ),
				'id'    => 'imedical_phone',
				'type'  => 'text'
			);

		$options[] = array(
			'name' => __( 'Appointement Button Settings', 'imedical' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Enable', 'imedical' ),
				'desc' => __( 'Enable the make an appointment button.', 'imedical' ),
				'id'   => 'imedical_appointment',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name'  => __( 'Appointment Text', 'imedical' ),
				'desc'  => __( 'Enter the appointment text.', 'imedical' ),
				'id'    => 'imedical_appointment_text',
				'std'   => __( 'Make An Appointment', 'imedical' ),
 				'type'  => 'text'
			);

			$options[] = array(
				'name'  => __( 'Appointment URL', 'imedical' ),
				'desc'  => __( 'Enter the appointment url.', 'imedical' ),
				'id'    => 'imedical_appointment_url',
				'type'  => 'text'
			);

	// ================================ //
	// ===== Single Post Settings ===== //
	// ================================ //
	$options[] = array(
		'name' => __( 'Single Post', 'imedical' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Featured Image', 'imedical' ),
			'desc' => __( 'Display the featured image.', 'imedical' ),
			'id'   => 'imedical_featured_image',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Post Navigation', 'imedical' ),
			'desc' => __( 'Display the post navigation.', 'imedical' ),
			'id'   => 'imedical_post_navigation',
			'std'  => 'on',
			'type' => 'onoff'
		);

		$options[] = array(
			'name' => __( 'Post Misc Settings', 'imedical' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Author Bio', 'imedical' ),
				'desc' => __( 'Display the author biographical info.', 'imedical' ),
				'id'   => 'imedical_author_bio',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Share Buttons', 'imedical' ),
				'desc' => __( 'Display the social share buttons info.', 'imedical' ),
				'id'   => 'imedical_share_buttons',
				'std'  => 'on',
				'type' => 'onoff'
			);

		$options[] = array(
			'name' => __( 'Related Posts Settings', 'imedical' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options[] = array(
				'name' => __( 'Related Posts', 'imedical' ),
				'desc' => __( 'Display the related posts.', 'imedical' ),
				'id'   => 'imedical_related_posts',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Related Posts Thumbnail', 'imedical' ),
				'desc' => __( 'Display the related posts with thumbnail.', 'imedical' ),
				'id'   => 'imedical_related_posts_thumbnail',
				'std'  => 'on',
				'type' => 'onoff'
			);

			$options[] = array(
				'name' => __( 'Related Posts Date', 'imedical' ),
				'desc' => __( 'Display the related posts with date.', 'imedical' ),
				'id'   => 'imedical_related_posts_date',
				'std'  => 'on',
				'type' => 'onoff'
			);

		$options[] = array(
			'name' => __( 'Advertisement Settings', 'imedical' ),
			'id'   => '',
			'type' => 'seperator'
		);

			$options['imedical_ad_single_before'] = array(
				'name' => __( 'Before Content Advertisement', 'imedical' ),
				'desc' => __( 'Your ad will appear on single post before content.', 'imedical' ),
				'id'   => 'imedical_ad_single_before',
				'type' => 'textarea'
			);

			$options['imedical_ad_single_after'] = array(
				'name' => __( 'After Content Advertisement', 'imedical' ),
				'desc' => __( 'Your ad will appear on single post after content.', 'imedical' ),
				'id'   => 'imedical_ad_single_after',
				'type' => 'textarea'
			);

	// =========================== //
	// ===== Footer Settings ===== //
	// =========================== //
	$options[] = array(
		'name' => __( 'Footer', 'imedical' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Footer Text', 'imedical' ),
			'desc' => __( 'You can customize the footer text here.', 'imedical' ),
			'id'   => 'imedical_footer_text',
			'std'  => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>',
			'type' => 'editor'
		);

	// ================================== //
	// ===== Custom Code Settings ======= //
	// ================================== //
	$options[] = array(
		'name' => __( 'Custom Code', 'imedical' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' => __( 'Header code', 'imedical' ),
			'desc' => __( 'If you need to add custom scripts to your header (meta tag verification, google fonts url), you should enter them in the box. They will be added before &lt;/head&gt; tag', 'imedical' ),
			'id'   => 'imedical_script_head',
			'type' => 'textarea'
		);

		$options[] = array(
			'name' => __( 'Footer code', 'imedical' ),
			'desc' => __( 'If you need to add custom scripts to your footer, you should enter them in the box. They will be added before &lt;/body&gt; tag', 'imedical' ),
			'id'   => 'imedical_script_footer',
			'type' => 'textarea'
		);
	
	// Allow dev to filter the theme options.
	return apply_filters( 'imedical_theme_options', $options );
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