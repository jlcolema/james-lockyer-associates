<?php 
/**
 * Library of Theme options functions.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
?>
<?php global $meadowhill_options;
foreach ($meadowhill_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
<?php  

// Display featured images on single posts
function meadowhill_get_display_image_post() { 
		if (get_option('meadowhill_display_image_post') == '' || get_option('meadowhill_display_image_post') == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( get_option('meadowhill_display_sidebar') == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function meadowhill_get_display_image_page() { 
		if (get_option('meadowhill_display_image_page') == '' || get_option('meadowhill_display_image_page') == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
    <?php if ( is_page_template('template-full-width.php') || is_page_template('template-full-width-without-sharing.php') || is_page_template('template-portfolio.php') || get_option('meadowhill_display_sidebar') == 'Hide' ) { ?>
      <?php the_post_thumbnail( 'fullwidth-thumb' ); ?>
    <?php } else { ?>
      <?php the_post_thumbnail(); } ?>
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

function meadowhill_open_graph() {
		if ( is_single() || is_page() ){
		global $wp_query;
		$meadowhill_postid = $wp_query->post->ID;
		$meadowhill_title = single_post_title('', false);
		$meadowhill_url = get_permalink($meadowhill_postid);
		$meadowhill_blogname = get_bloginfo('name');
			echo "\n<meta property='og:title' content='$meadowhill_title' />",
				"\n<meta property='og:site_name' content='$meadowhill_blogname' />",
				"\n<meta property='og:url' content='$meadowhill_url' />",
				"\n<meta property='og:type' content='article' />";
} }
		add_action('wp_head', 'meadowhill_open_graph');
//
add_image_size( 'meadowhill-fb-thumb', 320, 213, true );

function meadowhill_fb_thumb() {
if ( is_single() || is_page() ) {
	if (has_post_thumbnail()) {
	$fbthumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'meadowhill-fb-thumb');
	$fbthumburl = $fbthumb[0];
	echo "\n<meta property='og:image' content='$fbthumburl' />\n";
	}
	}
}
add_action( 'wp_head', 'meadowhill_fb_thumb' );

//show social icons on page
function meadowhill_social_buttons_page() { 
if (get_option('meadowhill_share_buttons_page') == '' || get_option('meadowhill_share_buttons_page') == 'Display') { ?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } }

//show social icons on post
function meadowhill_social_buttons_post() { 
if (get_option('meadowhill_share_buttons_post') == '' || get_option('meadowhill_share_buttons_post') == 'Display') {
?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } }

//show social icons on post entries
function meadowhill_social_buttons_post_entry() { 
if (get_option('meadowhill_share_buttons_post_entry') == 'Display') {
?>
	<div class="social-share">
  <fb:like href="<?php echo get_permalink(); ?>" send="true" layout="button_count" width="200" show_faces="true"></fb:like>
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo get_permalink(); ?>">Tweet</a>
	<g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone>
	</div>
<?php } } ?>