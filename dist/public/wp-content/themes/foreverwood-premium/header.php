<?php
/**
 * The header template file.
 * @package ForeverWood
 * @since ForeverWood 1.0.0
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
<?php global $foreverwood_options;
foreach ($foreverwood_options as $value) {
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
<?php if ($foreverwood_favicon_url != ''){ ?>
	<link rel="shortcut icon" href="<?php echo esc_url($foreverwood_favicon_url); ?>" />
<?php } ?>
<?php wp_head(); ?>
<?php if ($foreverwood_own_javascript_header != ''){ ?>
<?php echo stripslashes_deep($foreverwood_own_javascript_header); ?>
<?php } ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-34113962-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?> id="wrapper">
<div id="container-boxed">
<div id="container-boxed-inner">
<header id="wrapper-header">
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( has_nav_menu( 'top-navigation' ) ) {  ?>
  <div class="top-navigation-wrapper">
    <div class="top-navigation">
<?php wp_nav_menu( array( 'menu_id'=>'top-nav', 'theme_location'=>'top-navigation', 'link_before'=>'<i class="', 'link_after'=>'" aria-hidden="true"></i>' ) ); ?>
    </div>
  </div>
<?php }} ?>

  <div class="header-content-wrapper">
    <div class="header-content">
      <div class="title-box">
<?php if ( $foreverwood_logo_url == '' ) { ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
<?php } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-logo" src="<?php echo esc_url($foreverwood_logo_url); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
<?php } ?>
      </div>

      <div class="h-card">

        <div class="p-name">James Lockyer Associates</div>

        <div class="p-adr">

          <div class="p-street-address">Oakland Mews</div>

          <span class="p-locality">Liskeard</span>,

          <span class="p-region">Cornwall</span>

          <span class="p-postal-code">PL14 3UX</span>

        </div>

        <div class="p-tel">01579 344771</div>

        <div class="u-email">

          <a href="mailto:enquiries@jameslockyer.co.uk">enquiries@jameslockyer.co.uk</a>

        </div>

      </div>

<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $foreverwood_header_layout == 'Wide' ) { ?>
      <div class="menu-box">
<?php wp_nav_menu( array( 'menu_id'=>'nav', 'theme_location'=>'main-navigation' ) ); ?>
      </div>
<?php }} ?>
    </div>
  </div>
<?php if ( !is_page_template('template-landing-page.php') ) { ?>
<?php if ( $foreverwood_header_layout != 'Wide' ) { ?>
  <div class="menu-panel-container">
  <div class="menu-panel-wrapper">
    <div class="menu-panel">
<?php wp_nav_menu( array( 'menu_id'=>'main-nav', 'theme_location'=>'main-navigation' ) ); ?>
    </div>
  </div>
  </div>
<?php }} ?>

<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php if ( get_header_image() != '' && $foreverwood_display_header_image != 'Everywhere except Homepage' ) { ?>
  <div class="header-image">
    <img class="header-img" src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    <div class="header-image-container">
    <div class="header-image-text-wrapper">
      <div class="header-image-text">
<?php if ( $foreverwood_header_image_headline != '' ) { ?>
        <p class="header-image-headline"><?php echo stripslashes_deep($foreverwood_header_image_headline); ?></p>
<?php } if ( $foreverwood_header_image_link_url != '' && $foreverwood_header_image_link_text != '' ) { ?>
        <p class="header-image-link-wrapper"><a class="header-image-link" href="<?php echo esc_url($foreverwood_header_image_link_url); ?>"><?php echo esc_attr($foreverwood_header_image_link_text); ?></a></p>
<?php } ?>
      </div>
    </div>
    </div>
  </div>
<?php } ?>
<?php endif; ?>

</header> <!-- end of wrapper-header -->