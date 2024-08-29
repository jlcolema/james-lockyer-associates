<?php 
/**
 * Library of Theme options functions.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
?>
<?php global $daisychain_options;
foreach ($daisychain_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
<?php 

// Display Breadcrumb navigation
function daisychain_get_breadcrumb() { 
		if (get_option('daisychain_display_breadcrumb') != 'Hide') { ?>
<?php if(function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">'); ?><?php bcn_display(); ?><?php _e('</p>');} ?>
<?php } 
} 

// Display featured images on single posts
function daisychain_get_display_image_post() { 
		if (get_option('daisychain_display_image_post') == '' || get_option('daisychain_display_image_post') == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
}

// Display featured images on pages
function daisychain_get_display_image_page() { 
		if (get_option('daisychain_display_image_page') == '' || get_option('daisychain_display_image_page') == 'Display') { ?>
<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail(); ?>
<?php endif; ?>
<?php } 
} 

//Social Buttons 

//Embed for twiter
 add_filter('oembed_providers','twitter_oembed');
function twitter_oembed($a) {
	$a['#http(s)?://(www\.)?twitter.com/.+?/status(es)?/.*#i'] = array( 'http://api.twitter.com/1/statuses/oembed.{format}', true);
	return $a;
}

function daisychain_open_graph() {
		if ( is_single() || is_page() ){
		global $wp_query;
		$daisychain_postid = $wp_query->post->ID;
		$daisychain_title = single_post_title('', false);
    $daisychain_title_esc = esc_attr($daisychain_title);
		$daisychain_url = get_permalink($daisychain_postid);
		$daisychain_blogname = get_bloginfo('name');
			echo "\n<meta property='og:title' content='$daisychain_title_esc' />",
				"\n<meta property='og:site_name' content='$daisychain_blogname' />",
				"\n<meta property='og:url' content='$daisychain_url' />",
				"\n<meta property='og:type' content='article' />";
} }
		add_action('wp_head', 'daisychain_open_graph');
//
add_image_size( 'daisychain-fb-thumb', 320, 213, true );

function daisychain_fb_thumb() {
if ( is_single() || is_page() ) {
	if (has_post_thumbnail()) {
	$fbthumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'daisychain-fb-thumb');
	$fbthumburl = $fbthumb[0];
	echo "\n<meta property='og:image' content='$fbthumburl' />\n";
	}
	}
}
add_action( 'wp_head', 'daisychain_fb_thumb' );

//show social icons on page
function daisychain_social_buttons_page() { 
if (get_option('daisychain_share_buttons_page') == '' || get_option('daisychain_share_buttons_page') == 'Display') { ?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } }

//show social icons on post
function daisychain_social_buttons_post() { 
if (get_option('daisychain_share_buttons_post') == '' || get_option('daisychain_share_buttons_post') == 'Display') {
?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } }

//show social icons on post entries
function daisychain_social_buttons_post_entry() { 
if (get_option('daisychain_share_buttons_post_entry') == '' || get_option('daisychain_share_buttons_post_entry') == 'Display') {
?>
<?php if ( !is_search() ) { ?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php }}}

//show social icons on products
function daisychain_social_buttons_products() { 
if (get_option('daisychain_share_buttons_products') == '' || get_option('daisychain_share_buttons_products') == 'Display') { ?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } } ?>