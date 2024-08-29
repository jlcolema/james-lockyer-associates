<?php
/**
 * Framework setup.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/

function daisychain_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'Theme Options', 'daisychain' ),
	'href' => $admin_dir .'admin.php?page=fw-options.php',
	'meta' => array('title' => 'DaisyChain Setup', 'class' => 'daisychainpanel') ) );
}
add_action('admin_bar_menu', 'daisychain_bar_menu', '1000');
?>