<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
  Plugin Name: 8 Degree Coming Soon Page
  Plugin URI:  http://8degreethemes.com/wordpress-plugins/8-degree-coming-soon-page/
  Description: A plugin used for Under Construction | Coming Soon | Maintenance Mode
  Version:     1.0.6
  Author:      8 Degree Themes
  Author URI:  http://8degreethemes.com/
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: 8degree-maintenance-pro
 */
/**
 * Declartion of necessary constants for plugin
 * */
if ( !defined( 'MAINTENANCE_IMAGE_DIR' ) ) {
	define( 'MAINTENANCE_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images' );
}
if ( !defined( 'MAINTENANCE_JS_DIR' ) ) {
	define( 'MAINTENANCE_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
}

if ( !defined( 'MAINTENANCE_CSS_DIR' ) ) {
	define( 'MAINTENANCE_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
}
if ( !defined( 'MAINTENANCE_VERSION' ) ) {
	define( 'MAINTENANCE_VERSION', '1.0.6' );
}

if ( !class_exists( 'Maintenance_class' ) ) {

	class Maintenance_class {

		var $maintenance_settings;

		/**
		 * Initial plugin functions
		 */
		function __construct() {
			$this->maintenance_settings = get_option( 'maintenance_settings' );

			add_action( 'admin_init', array( $this, 'maintenance_session_init' ) );
			add_action( 'admin_menu', array( $this, 'maintenance_menu' ) );
			add_action( 'admin_post_maintenance_settings_action', array( $this, 'maintenance_save_options' ) );
            add_action( 'template_redirect', array( $this, 'maintenance_mode_template_redirect' ) );

            // Css rules for Color Picker
            // Register javascript
			add_action( 'admin_enqueue_scripts', array( $this, 'register_backend_assets' ) );

			register_activation_hook( __FILE__, array( $this, 'callback_plugin_subscriber' ) );
			register_activation_hook( __FILE__, array( $this, 'initial_plugin_settings' ) );
			add_action( 'admin_post_maintenance_restore_default', array( $this, 'maintenance_restore_default' ) );
			add_action( 'wp_ajax_edn_coming_soon_ajax_action', array( $this, 'submit_contact' ) );
			add_action( 'wp_ajax_nopriv_edn_coming_soon_ajax_action', array( $this, 'submit_contact' ) );
		}

		/**
		 * Starting Session 
		 * */
		function maintenance_session_init() {
			if ( !session_id() ) {
				session_start();
			}
		}

		function maintenance_menu() {
			add_menu_page( '8Degree Maintenance Page', 'Coming Soon', 'manage_options', '8degree-maintenance', array( $this, 'maintenance_settings' ) );
		}

		/**
		 * Settings Page
		 */
		function maintenance_settings() {
			include('inc/backend/settings.php');
		}

		/**
		 * Saving Post
		 */
		function maintenance_save_options() {

			if ( isset( $_POST['save_options'] ) && wp_verify_nonce( $_POST['maintenance_nonce_field'], 'maintenance-nonce' ) ) {

				include( 'inc/backend/save-settings.php' );
			} else {
				die( 'No script kiddies please!' );
			}
		}

		/**
		 * Function to create table for subscriber
		 */
		function callback_plugin_subscriber() {

			global $wpdb;
			$table_name = $wpdb->prefix . '8degree_maintenance';

			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id int NOT NULL AUTO_INCREMENT,
            email VARCHAR(255) NOT NULL,
            date date,
            act_code VARCHAR(255) NOT NULL,
            flag int,
            UNIQUE KEY id (id)
            ) $charset_collate;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}

		/**
		 * Function to redirect to maintenance mode page 
		 */
		function maintenance_mode_template_redirect() {

			if ( isset( $_GET['act_code'] ) ) {
				global $wpdb; // this is how you get access to the database


				$code = $_GET['act_code'];
				$email = $_GET['email'];
				$table_name = $wpdb->prefix . '8degree_maintenance';

				$update_table = $wpdb->update( $table_name, array( 'flag' => 1 ), array( 'email' => $email ) );
				if ( $update_table ) {

					wp_redirect( home_url() );
					exit;
				} else {
					wp_redirect( home_url() );
					exit;
				}
			} else {

				include_once( 'inc/backend/redirect.php' );
			}
		}

		/**
		 * Function to enqueue script/styles for wp-color picker, date picker, date picker ui css
		 */
		function register_backend_assets() {
			if ( isset( $_GET['page'] ) && $_GET['page'] == '8degree-maintenance' ) {
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'cpa_custom_js', MAINTENANCE_JS_DIR . '/backend-script.js', array( 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ), '', true );
				wp_enqueue_script( 'jquery-ui-datepicker' );
				wp_enqueue_style( 'm-ui-styles', MAINTENANCE_CSS_DIR . '/jquery-ui.css', false, MAINTENANCE_VERSION );
				wp_enqueue_style( 'custom-styles', MAINTENANCE_CSS_DIR . '/backend-style.css', false, MAINTENANCE_VERSION );
				wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false );
				wp_enqueue_media();
			}
		}

		/**
		 * Function to set initial settings
		 * */
		function initial_plugin_settings() {
			$maintenance_settings = array();
			$maintenance_settings['status'] = 0;
			$maintenance_settings['show_head'] = 1;
			$maintenance_settings['show_description'] = 1;
			$maintenance_settings['headline_text'] = __( 'Coming Soon', '8degree-maintenance' );
			$maintenance_settings['description'] = __( 'We will be coming soon with the site', '8degree-maintenance' );
			$maintenance_settings['headline_color'] = '#000000';
			$maintenance_settings['description_color'] = '#000000';
			$maintenance_settings['timerlayout'] = 'layout1';

			$maintenance_settings['show_subscribe'] = 1;
			$maintenance_settings['show_countdown'] = '';
			$maintenance_settings['subscribe_heading_text'] = __( 'Subscribe Us', '8degree-maintenance' );
			$maintenance_settings['subscribe_button_text'] = __( 'Subscribe', '8degree-maintenance' );
			$maintenance_settings['subscribe_form_label'] = __( 'Email', '8degree-maintenance' );
			$maintenance_settings['confirm_email_subscribe'] = '';
			$maintenance_settings['subs_layout'] = 'layout1';
			$maintenance_settings['note_subscriber'] = __( 'Thank you! We will be back with the quote', '8degree-maintenance' );

			$maintenance_settings['show_social_network'] = '';
			$maintenance_settings['show_contact'] = 1;

//social
			$maintenance_settings['show_social_network'] = '';
			$maintenance_settings['social_controls'] = Array(
				'facebook' => '',
				'twitter' => '',
				'pinterest' => '',
				'linkedin' => '',
				'googleplus' => '',
				'tumblr' => ''
			);

			$maintenance_settings['social_url'] = Array
				(
				'facebook' => Array
					(
					'url' => ''
				),
				'twitter' => Array
					(
					'url' => ''
				),
				'pinterest' => Array
					(
					'url' => ''
				),
				'linkedin' => Array
					(
					'url' => ''
				),
				'googleplus' => Array
					(
					'url' => ''
				),
				'tumblr' => Array
					(
					'url' => ''
				)
			);

//contact us
			$maintenance_settings['email_address'] = '';
			$maintenance_settings['name_label'] = '';
			$maintenance_settings['email_label'] = '';
			$maintenance_settings['message_label'] = '';
			$maintenance_settings['submit_label'] = '';

//countdown
			$maintenance_settings['countdown_date'] = '';
			$maintenance_settings['hour_timer'] = '';
			$maintenance_settings['minute_timer'] = '';
			$maintenance_settings['second_timer'] = '';

//bg type
			$maintenance_settings['bg_type'] = 'image';
			$maintenance_settings['bg_color'] = '';
			$maintenance_settings['bg-image'] = 'pre';
			$maintenance_settings['bg-available-options'] = 'image9';
			$maintenance_settings['ad_image'] = '';
			$maintenance_settings['contactus_bg_color'] = '';
			$maintenance_settings['contactus_font_color'] = '';
			$maintenance_settings['contactus_hoverbg_color'] = '';
			$maintenance_settings['contactus_hovertext_color'] = '';

//social icon design
			$maintenance_settings['socialicon_bg_color'] = '';
			$maintenance_settings['socialicon_font_color'] = '';
			$maintenance_settings['socialicon_hoverbg_color'] = '';
			$maintenance_settings['socialicon_hovertext_color'] = '';

//extra settings
			$maintenance_settings['is_admin'] = '';
			$maintenance_settings['is_editor'] = '';
			$maintenance_settings['is_author'] = '';
			$maintenance_settings['google_analytics'] = '';
			$maintenance_settings['hide_search_engines'] = '';
			$maintenance_settings['meta_name'] = '';
			$maintenance_settings['meta_content'] = '';


			$maintenance_settings['note_subscriber'] = __( 'Thank you! We will be back with the quote', '8degree-maintenance' );

			$maintenance_settings['show_contact'] = 1;
			if ( !get_option( 'maintenance_settings' ) ) {
				update_option( 'maintenance_settings', $maintenance_settings ); //update as default option while activating for the first time.    
			}
		}

		/**
		 * Function to restore default settings
		 * */
		function maintenance_restore_default() {
			$nonce = $_REQUEST['_wpnonce'];
			if ( !empty( $_GET ) && wp_verify_nonce( $nonce, 'maintenance-restore-default-nonce' ) ) {
				$maintenance_settings = array();
				$maintenance_settings['status'] = 0;
				$maintenance_settings['show_head'] = 1;
				$maintenance_settings['show_description'] = 1;
				$maintenance_settings['headline_text'] = __( 'Coming Soon', '8degree-maintenance' );
				$maintenance_settings['description'] = __( 'We will be coming soon with the site', '8degree-maintenance' );
				$maintenance_settings['headline_color'] = '#000000';
				$maintenance_settings['description_color'] = '#000000';
				$maintenance_settings['timerlayout'] = 'layout1';

				$maintenance_settings['show_subscribe'] = 1;
				$maintenance_settings['show_countdown'] = '';
				$maintenance_settings['subscribe_heading_text'] = __( 'Subscribe Us', '8degree-maintenance' );
				$maintenance_settings['subscribe_button_text'] = __( 'Subscribe', '8degree-maintenance' );
				$maintenance_settings['subscribe_form_label'] = __( 'Email', '8degree-maintenance' );
				$maintenance_settings['confirm_email_subscribe'] = '';
				$maintenance_settings['subs_layout'] = 'layout1';
				$maintenance_settings['note_subscriber'] = __( 'Thank you! We will be back with the quote', '8degree-maintenance' );

				$maintenance_settings['show_social_network'] = '';
				$maintenance_settings['show_contact'] = 1;
				$maintenance_settings['bg-available-options'] = '';

//social
				$maintenance_settings['show_social_network'] = '';
				$maintenance_settings['social_controls'] = Array(
					'facebook' => '',
					'twitter' => '',
					'pinterest' => '',
					'linkedin' => '',
					'googleplus' => '',
					'tumblr' => ''
				);

				$maintenance_settings['social_url'] = Array
					(
					'facebook' => Array
						(
						'url' => ''
					),
					'twitter' => Array
						(
						'url' => ''
					),
					'pinterest' => Array
						(
						'url' => ''
					),
					'linkedin' => Array
						(
						'url' => ''
					),
					'googleplus' => Array
						(
						'url' => ''
					),
					'tumblr' => Array
						(
						'url' => ''
					)
				);

//contact us
				$maintenance_settings['email_address'] = '';
				$maintenance_settings['name_label'] = '';
				$maintenance_settings['email_label'] = '';
				$maintenance_settings['message_label'] = '';
				$maintenance_settings['submit_label'] = '';

//countdown
				$maintenance_settings['countdown_date'] = '';
				$maintenance_settings['hour_timer'] = '';
				$maintenance_settings['minute_timer'] = '';
				$maintenance_settings['second_timer'] = '';

//bg type
				$maintenance_settings['bg_type'] = 'image';
				$maintenance_settings['bg_color'] = '';
				$maintenance_settings['bg-image'] = 'pre';
				$maintenance_settings['bg-available-options'] = 'image9';
				$maintenance_settings['ad_image'] = '';
				$maintenance_settings['contactus_bg_color'] = '';
				$maintenance_settings['contactus_font_color'] = '';
				$maintenance_settings['contactus_hoverbg_color'] = '';
				$maintenance_settings['contactus_hovertext_color'] = '';

//social icon design
				$maintenance_settings['socialicon_bg_color'] = '';
				$maintenance_settings['socialicon_font_color'] = '';
				$maintenance_settings['socialicon_hoverbg_color'] = '';
				$maintenance_settings['socialicon_hovertext_color'] = '';

//extra settings
				$maintenance_settings['is_admin'] = '';
				$maintenance_settings['is_editor'] = '';
				$maintenance_settings['is_author'] = '';
				$maintenance_settings['google_analytics'] = '';
				$maintenance_settings['hide_search_engines'] = '';
				$maintenance_settings['meta_name'] = '';
				$maintenance_settings['meta_content'] = '';

				$restore = update_option( 'maintenance_settings', $maintenance_settings );
				$_SESSION['ap_message'] = __( 'Default Settings Restored Successfully.', '8degree-maintenance' );
				wp_redirect( admin_url() . 'admin.php?page=8degree-maintenance' );
				exit;
			}
		}

		/**
		 * print array
		 * */
		function print_array( $array ) {
			echo '<pre>';
			print_r( $array );
			echo '<pre>';
		}

		function get_user_role() {
			global $current_user;

			$user_roles = $current_user->roles;
			$user_role = array_shift( $user_roles );

			return $user_role;
		}

	
		/**
		 * Submit contact email
		 * */
		function submit_contact() {
			if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'edn-ajax-nonce' ) ) {
				include('inc/frontend/send-email.php');
				die();
			} else {
				die( 'No script kiddies please!' );
			}
		}

	}

	$main_obj = new Maintenance_class();
}






