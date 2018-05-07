<?php
/**
 * Include this file from another php file
 * and use the function below to display the menu
 * 
 * Example:
 * 
 * <?php
 * include 'emm/easymenu.php';
 * echo easymenu(1);
 * 
 */

define('_DOC_ROOT', dirname(__FILE__) . '/');

include _DOC_ROOT . 'Connections/config.php';
include _DOC_ROOT . 'includes/db.php';
include _DOC_ROOT . 'includes/tree.php';
$db = new DB;
$db->Connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

function easymenu($group_id, $attr = '') {
	global $db;
	$tree = new Tree;

	$sql = sprintf(
		'SELECT * FROM %s WHERE group_id = %s ORDER BY %s, %s',
		MENU_TABLE,
		$group_id,
		MENU_PARENT,
		MENU_POSITION
	);
	$menu = $db->GetAll($sql);
	foreach ($menu as $row) {
		$label = '<a href="'.$row[MENU_URL].'">';
		$label .= $row[MENU_TITLE];
		$label .= '</a>';

		$li_attr = '';
		if ($row[MENU_CLASS]) {
			$li_attr = ' class="'.$row[MENU_CLASS].'"';
		}
		$tree->add_row($row[MENU_ID], $row[MENU_PARENT], $li_attr, $label);
	}
	$menu = $tree->generate_list($attr);
	return $menu;
}
