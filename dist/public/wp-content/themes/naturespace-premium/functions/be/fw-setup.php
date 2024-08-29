<?php
/**
 * Framework setup.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/

function naturespace_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'Theme Options', 'naturespace' ),
	'href' => $admin_dir .'admin.php?page=fw-options.php',
	'meta' => array('title' => 'NatureSpace Setup', 'class' => 'naturespacepanel') ) );
}
add_action('admin_bar_menu', 'naturespace_bar_menu', '1000');
?>