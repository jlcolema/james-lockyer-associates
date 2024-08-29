<?php
/**
 * The header template file.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
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
<?php global $naturespace_options;
foreach ($naturespace_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		${$value['id']} = $value['std'];
	}
	elseif (isset($value['id'])) { ${$value['id']} = get_option( $value['id'] ); }
} ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" /> 
  <meta name="viewport" content="width=device-width" />  
<?php if ( ! function_exists( '_wp_render_title_tag' ) ) { ?><title><?php wp_title( '|', true, 'right' ); ?></title><?php } ?> 
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> 
  <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
<?php if ($naturespace_favicon_url != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($naturespace_favicon_url); ?>" />
<?php } ?>
<?php wp_head(); ?>
<?php if ($naturespace_own_javascript_header != ''){ ?>
<?php echo stripslashes_deep($naturespace_own_javascript_header); ?>
<?php } ?>   
</head>
 
<body <?php body_class(); ?> id="wrapper">
<div id="container-boxed"> 
<div id="container-boxed-inner">
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_display_carousel != 'Hide' ) { ?>
  <div id="ticker-wrapper">
    <div class="ticker-box">
      <div class="ticker-arrow-1"></div>
      <div class="ticker-arrow-2"></div>
<?php if ( $naturespace_carousel_content != 'Carousel Menu' ) { ?>
<?php $args_ticker = array(
  'showposts' => $naturespace_carousel_posts_number,
	'post_type' => 'post',
  'ignore_sticky_posts' => true,
	'post_status' => 'publish' );
$ticker_query = new WP_Query( $args_ticker ); ?>
      <ul id="ticker">
<?php if ($ticker_query->have_posts()) : while ($ticker_query->have_posts()) : $ticker_query->the_post(); ?>
        <li><a href="<?php echo get_permalink(); ?>">&raquo; <?php the_title(); ?></a></li>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
      </ul>
<?php } else { ?>
<?php if ( has_nav_menu( 'carousel-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'ticker', 'theme_location'=>'carousel-navigation', 'link_before'=>'&raquo; ' ) ); } ?>
<?php } ?>
    </div>
  </div>
<?php } ?>
<?php if ( has_nav_menu( 'top-navigation' ) || $naturespace_header_address != '' || $naturespace_header_email != '' || $naturespace_header_phone != '' || $naturespace_header_skype != '' ) {  ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
<?php if ( $naturespace_header_address != '' || $naturespace_header_email != '' || $naturespace_header_phone != '' || $naturespace_header_skype != '' ){ ?>
      <p class="header-contact">
<?php if ( $naturespace_header_address != '' ){ ?>
        <span class="header-contact-address"><i class="icon_house" aria-hidden="true"></i><?php echo stripslashes_deep($naturespace_header_address); ?></span>
<?php } ?>
<?php if ( $naturespace_header_email != '' ){ ?>
        <span class="header-contact-email"><i class="icon_mail" aria-hidden="true"></i><?php echo esc_attr($naturespace_header_email); ?></span>
<?php } ?>
<?php if ( $naturespace_header_phone != '' ){ ?>
        <span class="header-contact-phone"><i class="icon_phone" aria-hidden="true"></i><?php echo esc_attr($naturespace_header_phone); ?></span>
<?php } ?>
<?php if ( $naturespace_header_skype != '' ){ ?>
        <span class="header-contact-skype"><i class="social_skype" aria-hidden="true"></i><?php echo esc_attr($naturespace_header_skype); ?></span>
      </p>
<?php }} ?>
<?php if ( has_nav_menu( 'top-navigation' ) ) { wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation', 'link_before'=>'<i class="', 'link_after'=>'" aria-hidden="true"></i>' ) ); } ?> 
    </div>
  </div>
<?php }} ?>
  
  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( $naturespace_logo_url == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($naturespace_logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_header_layout != 'Centered' ) { ?>
      <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
      </div>
<?php }} ?>
    </div>
  </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $naturespace_header_layout == 'Centered' ) { ?>
  <div class="menu-panel-wrapper">
    <div class="menu-panel">
<?php wp_nav_menu( array( 'menu_id'=>'main-nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
  </div>
<?php }} ?>

<?php if ( is_home() || is_front_page() ) { ?>
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php if ( get_header_image() != '' && $naturespace_display_header_image != 'Everywhere except Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( $naturespace_header_image_headline != '' ) { ?>
        <p class="header-image-headline"><?php echo stripslashes_deep($naturespace_header_image_headline); ?></p>
<?php } if ( $naturespace_header_image_link_url != '' && $naturespace_header_image_link_text != '' ) { ?>
        <p class="header-image-link-wrapper"><a class="header-image-link" href="<?php echo esc_url($naturespace_header_image_link_url); ?>"><?php echo esc_attr($naturespace_header_image_link_text); ?></a></p>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php } ?>
<?php endif; ?>
<?php } else { ?>
<?php if ( is_page() || is_single() ) { ?>
<?php if ( get_post_meta($post->ID, "_my_meta_value_key_slideshow", true ) ) { ?>
  <div id="slideshow-wrapper">
<?php if ( function_exists('cyclone_slider') ) { cyclone_slider(get_post_meta($post->ID, "_my_meta_value_key_slideshow", true)); } ?>
  </div>
<?php } else { ?>
<?php if ( get_header_image() != '' && $naturespace_display_header_image != 'Only on Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php }}} else { ?>
<?php if ( get_header_image() != '' && $naturespace_display_header_image != 'Only on Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
  </div>
<?php }}} ?>
</header> <!-- end of wrapper-header -->