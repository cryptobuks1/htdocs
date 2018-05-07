<?php
/*
Plugin Name: Beopen Love
Plugin URI: 
Description: This plugin allows your visitors to simply like your posts instead of commment it.
Version: 2.0
Author: Beopen
Author URI: http://www.beopenthemes.com

Copyright (c) 2015 Beopen

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/


#### INSTALL PROCESS ####

function setOptionsBeopenLove() {
	global $wpdb;
	
	$table_name = $wpdb->prefix . "beopen_love";
	if($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name)) != $table_name) {
		$sql = "CREATE TABLE ".$table_name." (
			id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
			time TIMESTAMP NOT NULL,
			post_id BIGINT(20) NOT NULL,
			ip VARCHAR(15) NOT NULL,
			UNIQUE KEY id (id)
		);";
        
        $wpdb->query($sql);

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	}
}

register_activation_hook(__FILE__, 'setOptionsBeopenLove');

function unsetOptionsBeopenLove() {
	global $wpdb;
}

register_uninstall_hook(__FILE__, 'unsetOptionsBeopenLove');
####

#### FRONT-END VIEW ####
function getBeopenLove($arg) {
	global $wpdb;
	$post_ID = get_the_ID();
	$ip = $_SERVER['REMOTE_ADDR'];
	
        
    $beopen_love = get_post_meta($post_ID, 'beopen_love', true) != '' ? get_post_meta($post_ID, 'beopen_love', true) : '0';

	$voteStatusByIp = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."beopen_love WHERE post_id = %s AND ip = %s", $post_ID, $ip));
		
    
    if (!isset($_COOKIE['beopen-love-'.$post_ID]) && $voteStatusByIp == 0) {  
    	$counter = '<a data-post-id="'.$post_ID.'">+</a>';
    }
    else {
    	$counter = '';
    }
     
    
    $iLikeThis = '<span id="beopen-love-'.$post_ID.'" class="beopen-love">';
    $iLikeThis .= $counter;
    $iLikeThis .= '</span>';
    
    if ($arg == 'plus') {
	    return $iLikeThis;
    }
	else if ($arg == 'count'){
    	return $beopen_love ;
    }
    else {
    	return $iLikeThis;
    }
}

function beopen_love_scripts() {

    wp_enqueue_script('beopen-love', WP_PLUGIN_URL.'/beopen-love/js/beopen-love.js', array('jquery'));	
    wp_localize_script('beopen-love', 'beopenAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );   
}

function beopen_love_css() {
    wp_register_style('beopen-love', WP_PLUGIN_URL.'/beopen-love/css/beopen-love.css');
    wp_enqueue_style('beopen-love');   
}



add_action('init', 'beopen_love_scripts');
add_action('init', 'beopen_love_css');

add_action('wp_ajax_add_beopen_love', 'add_beopen_love');
add_action('wp_ajax_nopriv_add_beopen_love', 'add_beopen_love');



function add_beopen_love() {
    
	global $wpdb;
    $post_ID = intval($_POST['id']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $like = get_post_meta($post_ID, 'beopen_love', true);

    if($post_ID != '') {
        
		$voteStatusByIp = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM ".$wpdb->prefix."beopen_love WHERE post_id = %s AND ip = %s", $post_ID, $ip));
        
        if (!isset($_COOKIE['beopen-love-'.$post_ID]) && $voteStatusByIp == 0) {
            $likeNew = $like + 1;
            update_post_meta($post_ID, 'beopen_love', $likeNew);

            setcookie('beopen-love-'.$post_ID, time(), time()+3600*24*365, '/');
			
			$wpdb->insert($wpdb->prefix."beopen_love", array('time' => current_time('mysql', 1), 'post_id' => $post_ID, 'ip' => $ip));

            echo $likeNew;
        }
        else {
            echo $like;
        }
    }

    die(); // this is required to return a proper result
}

?>