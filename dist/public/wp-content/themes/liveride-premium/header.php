<?php
/**
 * The header template file.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php global $liveride_options;
foreach ($liveride_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
<?php if ($liveride_favicon_url != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($liveride_favicon_url); ?>" />
<?php } ?>
<?php wp_head(); ?> 
<?php if ($liveride_own_javascript_header != ''){ ?>
<?php echo stripslashes_deep($liveride_own_javascript_header); ?>
<?php } ?> 
</head>
 
<body <?php body_class(); ?> id="wrapper">  
<div id="left-sidebar">
    <div class="site-headline-box">
<?php if ( $liveride_logo_url == '' ) { ?>
      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($liveride_logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
<?php if ( $liveride_display_site_description != 'Hide' ) { ?>
      <p class="site-description"><?php bloginfo( 'description' ); ?></p>
<?php } ?>
    </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
    <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
<?php } ?>
<?php if ( $liveride_header_facebook_link != '' || $liveride_header_twitter_link != '' || $liveride_header_google_link != '' || $liveride_header_pinterest_link != '' || $liveride_header_linkedin_link != '' || $liveride_header_flickr_link != '' || $liveride_header_youtube_link != '' || $liveride_header_rss_link != '' ) {  ?>
    <div class="sidebar-icons">
<?php if ($liveride_header_facebook_link != ''){ ?>
      <a class="social-icon facebook-icon" href="<?php echo esc_url($liveride_header_facebook_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-facebook.png" alt="Facebook" /></a>
<?php } ?>
<?php if ($liveride_header_twitter_link != ''){ ?>
      <a class="social-icon twitter-icon" href="<?php echo esc_url($liveride_header_twitter_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-twitter.png" alt="Twitter" /></a>
<?php } ?>
<?php if ($liveride_header_google_link != ''){ ?>
      <a class="social-icon google-icon" href="<?php echo esc_url($liveride_header_google_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-google.png" alt="Google +" /></a>
<?php } ?>
<?php if ($liveride_header_pinterest_link != ''){ ?>
      <a class="social-icon pinterest-icon" href="<?php echo esc_url($liveride_header_pinterest_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-pinterest.png" alt="Pinterest" /></a>
<?php } ?>
<?php if ($liveride_header_linkedin_link != ''){ ?>
      <a class="social-icon linkedin-icon" href="<?php echo esc_url($liveride_header_linkedin_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-linkedin.png" alt="LinkedIn" /></a>
<?php } ?>
<?php if ($liveride_header_flickr_link != ''){ ?>
      <a class="social-icon flickr-icon" href="<?php echo esc_url($liveride_header_flickr_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-flickr.png" alt="Flickr" /></a>
<?php } ?>
<?php if ($liveride_header_youtube_link != ''){ ?>
      <a class="social-icon youtube-icon" href="<?php echo esc_url($liveride_header_youtube_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-youtube.png" alt="YouTube" /></a>
<?php } ?>
<?php if ($liveride_header_rss_link != ''){ ?>
      <a class="social-icon rss-icon" href="<?php echo esc_url($liveride_header_rss_link); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-rss.png" alt="RSS" /></a>
<?php } ?>
    </div>
<?php } ?>
</div> <!-- end of left-sidebar -->
  
<div id="container">
<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( get_header_image() != '' ) { ?>
  <header id="header"> 
    <img class="header-image" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />   
  </header>
<?php } ?>
<?php } else { ?>
<?php if ( get_header_image() != '' && $liveride_display_header_image != 'Only on Homepage' ) { ?>
  <header id="header"> 
    <img class="header-image" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />   
  </header>
<?php }} ?>