<?php
/**
 * Framework setup.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/

function liveride_bar_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
		$admin_dir = get_admin_url();
		
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_menu',
	'title' => __( 'Theme Options', 'liveride' ),
	'href' => $admin_dir .'admin.php?page=fw-options.php',
	'meta' => array('title' => 'LiveRide Setup', 'class' => 'liveridepanel') ) );
}
add_action('admin_bar_menu', 'liveride_bar_menu', '1000');
?>