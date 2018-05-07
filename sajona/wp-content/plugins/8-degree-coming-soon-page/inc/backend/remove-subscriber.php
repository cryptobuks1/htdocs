<?php
defined('ABSPATH') or die("No direct script allowed!!");
//if(isset($_POST['remove_subs']))
global $wpdb;
$si_id = $_POST['rem'];
$table_name =  $wpdb->prefix . "8degree_maintenance";
$wpdb->delete( $table_name, array( 'id' => $si_id ), array( '%d' ) );
//$_SESSION['aps_message'] = __('User deleted successfully.','front-user-manage');
wp_redirect(admin_url().'admin.php?page=8degree-maintenance');
exit;