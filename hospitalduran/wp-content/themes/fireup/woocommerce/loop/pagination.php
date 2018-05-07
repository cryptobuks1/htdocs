<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

loop_pagination(
	array( 
		'prev_text' => '<i class="fa fa-angle-left"></i>', 
		'next_text' => '<i class="fa fa-angle-right"></i>'
	) 
);