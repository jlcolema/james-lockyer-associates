<?php
/**
 * Headerdata of Theme options.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/  
global $meadowhill_options;
foreach ($meadowhill_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}

// additional js and css
if(	!is_admin()){
function meadowhill_fonts_include () {
// Google Fonts
$bodyfont = get_option('meadowhill_body_google_fonts');
$headingfont = get_option('meadowhill_headings_google_fonts');
$descriptionfont = get_option('meadowhill_description_google_fonts');
$headlinefont = get_option('meadowhill_headline_google_fonts');
$postentryfont = get_option('meadowhill_postentry_google_fonts');
$sidebarfont = get_option('meadowhill_sidebar_google_fonts');
$imagefont = get_option('meadowhill_image_google_fonts');
$menufont = get_option('meadowhill_menu_google_fonts');

$fonturl = "//fonts.googleapis.com/css?family=";

$bodyfonturl = $fonturl.$bodyfont;
$headingfonturl = $fonturl.$headingfont;
$descriptionfonturl = $fonturl.$descriptionfont;
$headlinefonturl = $fonturl.$headlinefont;
$postentryfonturl = $fonturl.$postentryfont;
$sidebarfonturl = $fonturl.$sidebarfont;
$imagefonturl = $fonturl.$imagefont;
$menufonturl = $fonturl.$menufont;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('meadowhill-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('meadowhill-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('meadowhill-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('meadowhill-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('meadowhill-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('meadowhill-google-font6', $sidebarfonturl);
		 }
     if ($imagefont != 'default' && $imagefont != ''){
      wp_enqueue_style('meadowhill-google-font7', $imagefonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('meadowhill-google-font8', $menufonturl);
		 }
}
add_action( 'wp_enqueue_scripts', 'meadowhill_fonts_include' );
}

// additional js and css
function meadowhill_css_include () {
	if (get_option('meadowhill_css') == 'Burning Autumn (default)' ){
			wp_enqueue_style('meadowhill-style', get_stylesheet_uri());
		}

		if (get_option('meadowhill_css') == 'Autumn Forest' ){
			wp_enqueue_style('meadowhill-style-autumn-forest', get_template_directory_uri().'/css/autumn-forest.css');
		}

		if (get_option('meadowhill_css') == 'Autumn Leaves' ){
			wp_enqueue_style('meadowhill-style-autumn-leaves', get_template_directory_uri().'/css/autumn-leaves.css');
		}

		if (get_option('meadowhill_css') == 'Autumn Sunlight' ){
			wp_enqueue_style('meadowhill-style-autumn-sunlight', get_template_directory_uri().'/css/autumn-sunlight.css');
		}

		if (get_option('meadowhill_css') == 'Autumn Trees' ){
			wp_enqueue_style('meadowhill-style-autumn-trees', get_template_directory_uri().'/css/autumn-trees.css');
		}
    
    if (get_option('meadowhill_css') == 'Blue' ){
			wp_enqueue_style('meadowhill-style-blue', get_template_directory_uri().'/css/blue.css');
		}
    
    if (get_option('meadowhill_css') == 'Turquoise' ){
			wp_enqueue_style('meadowhill-style-turquoise', get_template_directory_uri().'/css/turquoise.css');
		}
    
    if (get_option('meadowhill_css') == 'Violet' ){
			wp_enqueue_style('meadowhill-style-violet', get_template_directory_uri().'/css/violet.css');
		}
}
add_action( 'wp_enqueue_scripts', 'meadowhill_css_include' );

//social scripts
if(	!is_admin() && ($meadowhill_share_buttons_page == '' || $meadowhill_share_buttons_page == 'Display' || $meadowhill_share_buttons_post == '' || $meadowhill_share_buttons_post == 'Display')   ) {

function meadowhill_scripts_social() {
	// Register all javascript files
	wp_enqueue_script('meadowhill_js_google', '//apis.google.com/js/plusone.js', '', '', 'footer');
	wp_enqueue_script('meadowhill_js_facebook', '//connect.facebook.net/en_US/all.js#xfbml=1', '', '', 'footer');
	wp_enqueue_script('meadowhill_js_twitter', '//platform.twitter.com/widgets.js', '', '', 'footer');
	}   
add_action('wp_enqueue_scripts', 'meadowhill_scripts_social');	
}	

// Display sidebar
function meadowhill_display_sidebar() {
    $display_sidebar = get_option('meadowhill_display_sidebar'); 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper .container #sidebar { display: none; } #wrapper .container #content { width: 100%; }', 'meadowhill'); ?>
<?php } 
}

// Header Bar Attachment
function meadowhill_header_bar_attachment() {
    $header_bar_attachment = get_option('meadowhill_header_bar_attachment'); 
		if ($header_bar_attachment == 'Fixed') { ?>
		<?php _e('#wrapper .header-bar { max-width: 1100px; position: fixed; left: auto; top: 0; z-index: 500;} html .admin-bar #header .header-bar { top: 32px; } @media screen and (max-width: 1100px) { #wrapper #header .header-bar { max-width: 90%; top: 0 !important; } }', 'meadowhill'); ?>
<?php } 
}

// Page title width
function meadowhill_get_page_title_width() {
    $page_title_width = get_option('meadowhill_page_title_width'); 
		if ($page_title_width != '' && $page_title_width != '50%') { ?>
		<?php _e('#wrapper .title-box { width: ', 'meadowhill'); ?><?php echo $page_title_width ?><?php _e(';}', 'meadowhill'); ?>
<?php } 
}

// Header menu width
function meadowhill_get_header_menu_width() {
    $header_menu_width = get_option('meadowhill_header_menu_width'); 
		if ($header_menu_width != '' && $header_menu_width != '50%') { ?>
		<?php _e('#wrapper .menu-box { width: ', 'meadowhill'); ?><?php echo $header_menu_width ?><?php _e(';}', 'meadowhill'); ?>
<?php } 
}

// Header menu format
function meadowhill_get_header_menu_format() {
    $header_menu_format = get_option('meadowhill_header_menu_format'); 
		if ($header_menu_format == 'Drop-down') { ?>
		<?php _e('.js .menu-box .selectnav {display: block; float: right; height: 28px; position: relative; right: 22px; top: 31px; width: 90%;} .js #nav {display: none;}', 'meadowhill'); ?>
<?php } 
}

// Header background image URL
function meadowhill_get_header_image_url() {
    $header_image_url = get_header_image(); ?> 
		<?php _e('#wrapper #wrapper-header {background-image: url(', 'meadowhill'); ?><?php echo $header_image_url ?><?php _e('); }', 'meadowhill'); ?>
<?php 
}

// Header background image height
function meadowhill_get_header_image_height() {
    $header_image_height = get_option('meadowhill_header_image_height'); 
		if ($header_image_height != '' && $header_image_height != '400') { ?>
		<?php _e('#wrapper #wrapper-header {height: ', 'meadowhill'); ?><?php echo $header_image_height ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Background Pattern for Header Image
function meadowhill_get_header_background_pattern() {
    $header_background_pattern = get_option('meadowhill_header_background_pattern');
    $theme_folder = get_template_directory_uri(); 
		if ($header_background_pattern == 'Pattern 2') { ?>
		<?php _e('#wrapper .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-2.png); }', 'meadowhill'); }
    elseif ($header_background_pattern == 'Pattern 3') { ?>
		<?php _e('#wrapper .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-3.png); }', 'meadowhill'); }
    elseif ($header_background_pattern == 'Pattern 4') { ?>
		<?php _e('#wrapper .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-4.png); }', 'meadowhill'); }
    elseif ($header_background_pattern == 'None') { ?>
		<?php _e('#wrapper .header-pattern { background-image: none; }', 'meadowhill'); ?>
<?php } 
}

// Opacity of Background Pattern for Header Image
function meadowhill_get_header_background_pattern_opacity() {
    $header_background_pattern_opacity = get_option('meadowhill_header_background_pattern_opacity'); 
		if ($header_background_pattern_opacity != '' && $header_background_pattern_opacity != '100') { ?>
		<?php _e('#wrapper .header-pattern { opacity: 0.', 'meadowhill'); ?><?php echo $header_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'meadowhill'); ?><?php echo $header_background_pattern_opacity ?><?php _e('); }', 'meadowhill'); ?>
<?php } 
} 

// Background Pattern for Footer
function meadowhill_get_footer_background_pattern() {
    $footer_background_pattern = get_option('meadowhill_footer_background_pattern');
    $theme_folder = get_template_directory_uri(); 
		if ($footer_background_pattern == 'Pattern 2') { ?>
		<?php _e('#wrapper .footer-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-2.png); }', 'meadowhill'); }
    elseif ($footer_background_pattern == 'Pattern 3') { ?>
		<?php _e('#wrapper .footer-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-3.png); }', 'meadowhill'); }
    elseif ($footer_background_pattern == 'Pattern 4') { ?>
		<?php _e('#wrapper .footer-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-4.png); }', 'meadowhill'); }
    elseif ($footer_background_pattern == 'None') { ?>
		<?php _e('#wrapper .footer-pattern { background-image: none; }', 'meadowhill'); ?>
<?php } 
}

// Opacity of Background Pattern for Footer
function meadowhill_get_footer_background_pattern_opacity() {
    $footer_background_pattern_opacity = get_option('meadowhill_footer_background_pattern_opacity'); 
		if ($footer_background_pattern_opacity != '' && $footer_background_pattern_opacity != '20' && $footer_background_pattern_opacity != '100') { ?>
		<?php _e('#wrapper .footer-pattern { opacity: 0.', 'meadowhill'); ?><?php echo $footer_background_pattern_opacity ?><?php _e('; filter: alpha(opacity=', 'meadowhill'); ?><?php echo $footer_background_pattern_opacity ?><?php _e('); }', 'meadowhill'); ?>
<?php } 
    elseif ($footer_background_pattern_opacity == '100') { ?>
    <?php _e('#wrapper .footer-pattern { opacity: 1; filter: alpha(opacity=100); }', 'meadowhill');
} 
    else { _e('#wrapper .footer-pattern { opacity: 0.2; filter: alpha(opacity=20); }', 'meadowhill');
} 
} 

// Homepage Header background image URL
function meadowhill_get_homepage_header_image_url() {
    $homepage_header_image_url = get_option('meadowhill_homepage_header_image_url'); 
		if ($homepage_header_image_url != '') { ?>
		<?php _e('html .home #wrapper-header, html .blog #wrapper-header {background-image: url(', 'meadowhill'); ?><?php echo $homepage_header_image_url ?><?php _e(') !important; }', 'meadowhill'); ?>
<?php } 
}

// Background Pattern for Homepage Header Image
function meadowhill_get_homepage_header_background_pattern() {
    $homepage_header_background_pattern = get_option('meadowhill_homepage_header_background_pattern');
    $theme_folder = get_template_directory_uri();
    if ($homepage_header_background_pattern == 'Pattern 1 (default)') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-1.png) !important; }', 'meadowhill'); } 
		elseif ($homepage_header_background_pattern == 'Pattern 2') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-2.png) !important; }', 'meadowhill'); }
    elseif ($homepage_header_background_pattern == 'Pattern 3') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-3.png) !important; }', 'meadowhill'); }
    elseif ($homepage_header_background_pattern == 'Pattern 4') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-4.png) !important; }', 'meadowhill'); }
    elseif ($homepage_header_background_pattern == 'None') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { background-image: none !important; }', 'meadowhill'); ?>
<?php } 
}

// Opacity of Background Pattern for Header Image
function meadowhill_get_homepage_header_background_pattern_opacity() {
    $homepage_header_background_pattern_opacity = get_option('meadowhill_homepage_header_background_pattern_opacity'); 
		if ($homepage_header_background_pattern_opacity != '' && $homepage_header_background_pattern_opacity != '100') { ?>
		<?php _e('html .home .header-pattern, html .blog .header-pattern { opacity: 0.', 'meadowhill'); ?><?php echo $homepage_header_background_pattern_opacity ?><?php _e(' !important; filter: alpha(opacity=', 'meadowhill'); ?><?php echo $homepage_header_background_pattern_opacity ?><?php _e(') !important; }', 'meadowhill'); ?>
<?php } 
}

// Position of Site Description
function meadowhill_get_site_description_position() {
    $site_description_position = get_option('meadowhill_site_description_position'); 
		if ($site_description_position != '' && $site_description_position != '20') { ?>
		<?php _e('#wrapper #header .header-description {bottom: ', 'meadowhill'); ?><?php echo $site_description_position ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
} 

// Image Section height
function meadowhill_get_image_section_height() {
    $image_section_height = get_option('meadowhill_image_section_height'); 
		if ($image_section_height != '' && $image_section_height != '370') { ?>
		<?php _e('#wrapper #wrapper-image {height: ', 'meadowhill'); ?><?php echo $image_section_height ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Image Section background image URL
function meadowhill_get_image_section_image_url() {
    $image_section_image_url = get_option('meadowhill_image_section_image_url'); 
		if ($image_section_image_url != '') { ?>
		<?php _e('#wrapper #wrapper-image {background-image: url(', 'meadowhill'); ?><?php echo $image_section_image_url ?><?php _e(') !important; }', 'meadowhill'); ?>
<?php } 
}

// Image Section background image scrolling
function meadowhill_get_image_section_scrolling() {
    $image_section_scrolling = get_option('meadowhill_image_section_scrolling'); 
		if ($image_section_scrolling == 'Fixed') { ?>
		<?php _e('#wrapper #wrapper-image {background-attachment: fixed;}', 'meadowhill'); ?>
<?php } 
}

// Background Pattern for Image Section background image
function meadowhill_get_image_section_background_pattern() {
    $image_section_background_pattern = get_option('meadowhill_image_section_background_pattern');
    $theme_folder = get_template_directory_uri(); 
		if ($image_section_background_pattern == 'Pattern 2') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-2.png) !important; }', 'meadowhill'); }
    elseif ($image_section_background_pattern == 'Pattern 3') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-3.png) !important; }', 'meadowhill'); }
    elseif ($image_section_background_pattern == 'Pattern 4') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { background-image: url(', 'meadowhill'); ?><?php echo $theme_folder ?><?php _e('/images/pattern-4.png) !important; }', 'meadowhill'); }
    elseif ($image_section_background_pattern == 'None') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { background-image: none !important; }', 'meadowhill'); ?>
<?php } 
}

// Opacity of Background Pattern for Image Section background image
function meadowhill_get_image_section_background_pattern_opacity() {
    $image_section_background_pattern_opacity = get_option('meadowhill_image_section_background_pattern_opacity'); 
		if ($image_section_background_pattern_opacity != '' && $image_section_background_pattern_opacity != '100') { ?>
		<?php _e('#wrapper #wrapper-image .image-pattern { opacity: 0.', 'meadowhill'); ?><?php echo $image_section_background_pattern_opacity ?><?php _e(' !important; filter: alpha(opacity=', 'meadowhill'); ?><?php echo $image_section_background_pattern_opacity ?><?php _e(') !important; }', 'meadowhill'); ?>
<?php } 
}  

// Position of Image Section text
function meadowhill_get_image_section_text_position() {
    $image_section_text_position = get_option('meadowhill_image_section_text_position'); 
		if ($image_section_text_position != '' && $image_section_text_position != '125') { ?>
		<?php _e('#wrapper #wrapper-image .image-description {top: ', 'meadowhill'); ?><?php echo $image_section_text_position ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
} 

// Header Menu Panel background color
function meadowhill_get_menu_background_color() {
    $menu_background_color = get_option('meadowhill_menu_background_color'); 
		if ($menu_background_color != '#' && $menu_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .header-bar { background-color: ', 'meadowhill'); ?><?php echo $menu_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Main Content background color
function meadowhill_get_content_background_color() {
    $content_background_color = get_option('meadowhill_content_background_color'); 
		if ($content_background_color != '#' && $content_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-content, .archive #wrapper-blog, .search #wrapper-blog { background-color: ', 'meadowhill'); ?><?php echo $content_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer background color
function meadowhill_get_footer_background_color() {
    $footer_background_color = get_option('meadowhill_footer_background_color'); 
		if ($footer_background_color != '#' && $footer_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer { background-color: ', 'meadowhill'); ?><?php echo $footer_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer border-top color
function meadowhill_get_footer_border_color() {
    $footer_border_color = get_option('meadowhill_footer_border_color'); 
		if ($footer_border_color != '#' && $footer_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer { border-color: ', 'meadowhill'); ?><?php echo $footer_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer Notices background color
function meadowhill_get_footer_notices_background_color() {
    $footer_notices_background_color = get_option('meadowhill_footer_notices_background_color'); 
		if ($footer_notices_background_color != '#' && $footer_notices_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer .footer-signature .footer-signature-content { background-color: ', 'meadowhill'); ?><?php echo $footer_notices_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage About Section background color
function meadowhill_get_homepage_about_background_color() {
    $homepage_about_background_color = get_option('meadowhill_homepage_about_background_color'); 
		if ($homepage_about_background_color != '#' && $homepage_about_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-about { background-color: ', 'meadowhill'); ?><?php echo $homepage_about_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Portfolio Section background color
function meadowhill_get_homepage_portfolio_background_color() {
    $homepage_portfolio_background_color = get_option('meadowhill_homepage_portfolio_background_color'); 
		if ($homepage_portfolio_background_color != '#' && $homepage_portfolio_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-portfolio { background-color: ', 'meadowhill'); ?><?php echo $homepage_portfolio_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Informational Section background color
function meadowhill_get_homepage_informational_background_color() {
    $homepage_informational_background_color = get_option('meadowhill_homepage_informational_background_color'); 
		if ($homepage_informational_background_color != '#' && $homepage_informational_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-informational { background-color: ', 'meadowhill'); ?><?php echo $homepage_informational_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Blog Section background color
function meadowhill_get_homepage_blog_background_color() {
    $homepage_blog_background_color = get_option('meadowhill_homepage_blog_background_color'); 
		if ($homepage_blog_background_color != '#' && $homepage_blog_background_color != '') { ?>
		<?php _e('.home #wrapper-blog, .blog #wrapper-blog { background-color: ', 'meadowhill'); ?><?php echo $homepage_blog_background_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Drop-down Submenu background color
function meadowhill_get_submenu_background_color() {
    $submenu_background_color = get_option('meadowhill_submenu_background_color'); 
		if ($submenu_background_color != '#' && $submenu_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul ul { background-color: ', 'meadowhill'); ?><?php echo $submenu_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Drop-down Submenu border color
function meadowhill_get_submenu_border_color() {
    $submenu_border_color = get_option('meadowhill_submenu_border_color'); 
		if ($submenu_border_color != '#' && $submenu_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul ul { border-color: ', 'meadowhill'); ?><?php echo $submenu_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Drop-down Submenu Items hover color
function meadowhill_get_submenu_hover_color() {
    $submenu_hover_color = get_option('meadowhill_submenu_hover_color'); 
		if ($submenu_hover_color != '#' && $submenu_hover_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul ul a:hover, #wrapper #wrapper-header .menu-box ul ul :hover > a { background-color: ', 'meadowhill'); ?><?php echo $submenu_hover_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Drop-down Submenu Items border color
function meadowhill_get_submenu_item_border_color() {
    $submenu_item_border_color = get_option('meadowhill_submenu_item_border_color'); 
		if ($submenu_item_border_color != '#' && $submenu_item_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .menu-box ul ul li { border-color: ', 'meadowhill'); ?><?php echo $submenu_item_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Meta Box background color
function meadowhill_get_meta_box_background_color() {
    $meta_box_background_color = get_option('meadowhill_meta_box_background_color'); 
		if ($meta_box_background_color != '#' && $meta_box_background_color != '') { ?>
		<?php _e('.single #wrapper-content #content .post-info { background-color: ', 'meadowhill'); ?><?php echo $meta_box_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Meta Box Separator color
function meadowhill_get_meta_box_separator_color() {
    $meta_box_separator_color = get_option('meadowhill_meta_box_separator_color'); 
		if ($meta_box_separator_color != '#' && $meta_box_separator_color != '') { ?>
		<?php _e('.single #wrapper-content #content .post-info span { border-color: ', 'meadowhill'); ?><?php echo $meta_box_separator_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Comments border-top color
function meadowhill_get_comments_border_color() {
    $comments_border_color = get_option('meadowhill_comments_border_color'); 
		if ($comments_border_color != '#' && $comments_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-content #content #comments ol li { border-color: ', 'meadowhill'); ?><?php echo $comments_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Author’s Comments background color
function meadowhill_get_author_comments_background_color() {
    $author_comments_background_color = get_option('meadowhill_author_comments_background_color'); 
		if ($author_comments_background_color != '#' && $author_comments_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-content #content #comments .bypostauthor { background-color: ', 'meadowhill'); ?><?php echo $author_comments_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Portfolio Items border color
function meadowhill_get_portfolio_items_border_color() {
    $portfolio_items_border_color = get_option('meadowhill_portfolio_items_border_color'); 
		if ($portfolio_items_border_color != '#' && $portfolio_items_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-portfolio .portfolio-box img { border-color: ', 'meadowhill'); ?><?php echo $portfolio_items_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Portfolio Items hover border color
function meadowhill_get_portfolio_items_hover_border_color() {
    $portfolio_items_hover_border_color = get_option('meadowhill_portfolio_items_hover_border_color'); 
		if ($portfolio_items_hover_border_color != '#' && $portfolio_items_hover_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-portfolio .portfolio-box :hover > img { border-color: ', 'meadowhill'); ?><?php echo $portfolio_items_hover_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries background color
function meadowhill_get_post_entries_background_color() {
    $post_entries_background_color = get_option('meadowhill_post_entries_background_color'); 
		if ($post_entries_background_color != '#' && $post_entries_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry { background-color: ', 'meadowhill'); ?><?php echo $post_entries_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries border-top color
function meadowhill_get_post_entries_border_color() {
    $post_entries_border_color = get_option('meadowhill_post_entries_border_color'); 
		if ($post_entries_border_color != '#' && $post_entries_border_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry { border-color: ', 'meadowhill'); ?><?php echo $post_entries_border_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Meta Box background color
function meadowhill_get_post_entries_meta_background_color() {
    $post_entries_meta_background_color = get_option('meadowhill_post_entries_meta_background_color'); 
		if ($post_entries_meta_background_color != '#' && $post_entries_meta_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry .post-info { background-color: ', 'meadowhill'); ?><?php echo $post_entries_meta_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Meta Box Separators color
function meadowhill_get_post_entries_separator_color() {
    $post_entries_separator_color = get_option('meadowhill_post_entries_separator_color'); 
		if ($post_entries_separator_color != '#' && $post_entries_separator_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry .post-info span { border-color: ', 'meadowhill'); ?><?php echo $post_entries_separator_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Read More button background color
function meadowhill_get_post_entries_read_more_background_color() {
    $post_entries_read_more_background_color = get_option('meadowhill_post_entries_read_more_background_color'); 
		if ($post_entries_read_more_background_color != '#' && $post_entries_read_more_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry .post-read-more { background-color: ', 'meadowhill'); ?><?php echo $post_entries_read_more_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Read More button hover color
function meadowhill_get_post_entries_read_more_hover_color() {
    $post_entries_read_more_hover_color = get_option('meadowhill_post_entries_read_more_hover_color'); 
		if ($post_entries_read_more_hover_color != '#' && $post_entries_read_more_hover_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .post-entry .post-read-more:hover { background-color: ', 'meadowhill'); ?><?php echo $post_entries_read_more_hover_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Sticky Post background color
function meadowhill_get_sticky_post_background_color() {
    $sticky_post_background_color = get_option('meadowhill_sticky_post_background_color'); 
		if ($sticky_post_background_color != '#' && $sticky_post_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .sticky { background-color: ', 'meadowhill'); ?><?php echo $sticky_post_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Post Entries Sticky Post Meta Box background color
function meadowhill_get_sticky_post_meta_background_color() {
    $sticky_post_meta_background_color = get_option('meadowhill_sticky_post_meta_background_color'); 
		if ($sticky_post_meta_background_color != '#' && $sticky_post_meta_background_color != '') { ?>
		<?php _e('#wrapper #wrapper-blog .container .sticky .post-info { background-color: ', 'meadowhill'); ?><?php echo $sticky_post_meta_background_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Searchform background color
function meadowhill_get_searchform_background_color() {
    $searchform_background_color = get_option('meadowhill_searchform_background_color'); 
		if ($searchform_background_color != '#' && $searchform_background_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper, #wrapper #searchform .searchform-wrapper #s { background-color: ', 'meadowhill'); ?><?php echo $searchform_background_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Searchform border color
function meadowhill_get_searchform_border_color() {
    $searchform_border_color = get_option('meadowhill_searchform_border_color'); 
		if ($searchform_border_color != '#' && $searchform_border_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper { border-color: ', 'meadowhill'); ?><?php echo $searchform_border_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Form Fields background color
function meadowhill_get_form_fields_background_color() {
    $form_fields_background_color = get_option('meadowhill_form_fields_background_color'); 
		if ($form_fields_background_color != '#' && $form_fields_background_color != '') { ?>
		<?php _e('#wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { background-color: ', 'meadowhill'); ?><?php echo $form_fields_background_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Form Fields border color
function meadowhill_get_form_fields_border_color() {
    $form_fields_border_color = get_option('meadowhill_form_fields_border_color'); 
		if ($form_fields_border_color != '#' && $form_fields_border_color != '') { ?>
		<?php _e('#wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { border-color: ', 'meadowhill'); ?><?php echo $form_fields_border_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Buttons background color
function meadowhill_get_form_buttons_background_color() {
    $form_buttons_background_color = get_option('meadowhill_form_buttons_background_color'); 
		if ($form_buttons_background_color != '#' && $form_buttons_background_color != '') { ?>
		<?php _e('#wrapper input[type="submit"], #wrapper input[type="reset"], #wrapper .centered-button, #wrapper .custom-button { background-color: ', 'meadowhill'); ?><?php echo $form_buttons_background_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Buttons hover color
function meadowhill_get_form_buttons_hover_color() {
    $form_buttons_hover_color = get_option('meadowhill_form_buttons_hover_color'); 
		if ($form_buttons_hover_color != '#' && $form_buttons_hover_color != '') { ?>
		<?php _e('#wrapper input[type="submit"]:hover, #wrapper input[type="reset"]:hover, #wrapper .centered-button:hover, #wrapper .custom-button:hover { background-color: ', 'meadowhill'); ?><?php echo $form_buttons_hover_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Table Headers background color
function meadowhill_get_table_headers_background_color() {
    $table_headers_background_color = get_option('meadowhill_table_headers_background_color'); 
		if ($table_headers_background_color != '#' && $table_headers_background_color != '') { ?>
		<?php _e('#wrapper table th { background-color: ', 'meadowhill'); ?><?php echo $table_headers_background_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Body font and color
function meadowhill_get_body_font() {
    $bodyfont = get_option('meadowhill_body_google_fonts');
    $body_color = get_option('meadowhill_body_color'); 
		if ($bodyfont != 'default' && $body_color != '#' && $bodyfont != '') { ?>
		<?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper #content #commentform .form-allowed-tags, #wrapper #content #commentform p { font-family: "', 'meadowhill'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; color: ', 'meadowhill'); ?><?php echo $body_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($bodyfont != 'default' && $body_color == '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper #content #commentform .form-allowed-tags, #wrapper #content #commentform p { font-family: "', 'meadowhill'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); }
    elseif ($bodyfont == 'default' && $body_color != '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper .container #comments .comment, #wrapper .container #comments .comment time, #wrapper #content #commentform .form-allowed-tags, #wrapper #content #commentform p { color: ', 'meadowhill'); ?><?php echo $body_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Main Content area font size
function meadowhill_get_body_google_fonts_size() {
    $body_google_fonts_size = get_option('meadowhill_body_google_fonts_size'); 
		if ($body_google_fonts_size != '14' && $body_google_fonts_size != '') { ?>
		<?php _e('body p, body ul, body ol, body li, body dl, body address, body table { font-size: ', 'meadowhill'); ?><?php echo $body_google_fonts_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Site title font
function meadowhill_get_headings_google_fonts() {
    $headingfont = get_option('meadowhill_headings_google_fonts'); 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .site-title { font-family: "', 'meadowhill'); ?><?php echo $headingfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif;}', 'meadowhill'); ?>
<?php } 
}

// Site title color
function meadowhill_get_site_title_color() {
    $site_title_color = get_option('meadowhill_site_title_color'); 
		if ($site_title_color != '#' && $site_title_color != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .site-title a { color: ', 'meadowhill'); ?><?php echo $site_title_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Site description font and color
function meadowhill_get_description_font() {
    $descriptionfont = get_option('meadowhill_description_google_fonts');
    $site_description_color = get_option('meadowhill_site_description_color'); 
		if ($descriptionfont != 'default' && $site_description_color != '#' && $descriptionfont != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .site-description {font-family: "', 'meadowhill'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; color: ', 'meadowhill'); ?><?php echo $site_description_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($descriptionfont != 'default' && $site_description_color == '#') { ?>
    <?php _e('#wrapper #wrapper-header #header .site-description {font-family: "', 'meadowhill'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); }
    elseif ($descriptionfont == 'default' && $site_description_color != '#') { ?>
    <?php _e('#wrapper #wrapper-header #header .site-description { color: ', 'meadowhill'); ?><?php echo $site_description_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Read More Button text color
function meadowhill_get_read_more_text_color() {
    $read_more_text_color = get_option('meadowhill_read_more_text_color'); 
		if ($read_more_text_color != '#' && $read_more_text_color != '') { ?>
		<?php _e('#wrapper #wrapper-header .read-more-button, #wrapper #wrapper-image .read-more-button { color: ', 'meadowhill'); ?><?php echo $read_more_text_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage About Section Headline color
function meadowhill_get_about_headline_color() {
    $about_headline_color = get_option('meadowhill_about_headline_color'); 
		if ($about_headline_color != '#' && $about_headline_color != '') { ?>
		<?php _e('#wrapper #wrapper-about .container .section-headline { color: ', 'meadowhill'); ?><?php echo $about_headline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Portfolio Section Headline color
function meadowhill_get_portfolio_headline_color() {
    $portfolio_headline_color = get_option('meadowhill_portfolio_headline_color'); 
		if ($portfolio_headline_color != '#' && $portfolio_headline_color != '') { ?>
		<?php _e('#wrapper #wrapper-portfolio .container .section-headline { color: ', 'meadowhill'); ?><?php echo $portfolio_headline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Portfolio Section Items text color
function meadowhill_get_portfolio_links_color() {
    $portfolio_links_color = get_option('meadowhill_portfolio_links_color'); 
		if ($portfolio_links_color != '#' && $portfolio_links_color != '') { ?>
		<?php _e('#wrapper #wrapper-portfolio .container .portfolio-link { color: ', 'meadowhill'); ?><?php echo $portfolio_links_color ?><?php _e(' !important; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Informational Section Headline color
function meadowhill_get_informational_headline_color() {
    $informational_headline_color = get_option('meadowhill_informational_headline_color'); 
		if ($informational_headline_color != '#' && $informational_headline_color != '') { ?>
		<?php _e('#wrapper #wrapper-informational .container .section-headline { color: ', 'meadowhill'); ?><?php echo $informational_headline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Blog Section Headline color
function meadowhill_get_blog_headline_color() {
    $blog_headline_color = get_option('meadowhill_blog_headline_color'); 
		if ($blog_headline_color != '#' && $blog_headline_color != '') { ?>
		<?php _e('.home #wrapper-blog .container .section-headline, .blog #wrapper-blog .container .section-headline { color: ', 'meadowhill'); ?><?php echo $blog_headline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Image Section font and color
function meadowhill_get_image_font() {
    $imagefont = get_option('meadowhill_image_google_fonts');
    $image_color = get_option('meadowhill_image_color'); 
		if ($imagefont != 'default' && $image_color != '#' && $imagefont != '') { ?>
		<?php _e('#wrapper #wrapper-image .image-description p {font-family: "', 'meadowhill'); ?><?php echo $imagefont ?><?php _e('", Arial, Helvetica, sans-serif; color: ', 'meadowhill'); ?><?php echo $image_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($imagefont != 'default' && $image_color == '#') { ?>
    <?php _e('#wrapper #wrapper-image .image-description p {font-family: "', 'meadowhill'); ?><?php echo $imagefont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); }
    elseif ($imagefont == 'default' && $image_color != '#') { ?>
    <?php _e('#wrapper #wrapper-image .image-description p { color: ', 'meadowhill'); ?><?php echo $image_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Page/post main headlines color
function meadowhill_get_main_headlines_color() {
    $main_headlines_color = get_option('meadowhill_main_headlines_color'); 
		if ($main_headlines_color != '#' && $main_headlines_color != '') { ?>
		<?php _e('#wrapper .container .section-headline { color: ', 'meadowhill'); ?><?php echo $main_headlines_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Page/post headlines font and color
function meadowhill_get_headlines_font() {
    $headlinefont = get_option('meadowhill_headline_google_fonts');
    $headlines_color = get_option('meadowhill_headlines_color'); 
		if ($headlinefont != 'default' && $headlines_color != '#' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "', 'meadowhill'); ?><?php echo $headlinefont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; color: ', 'meadowhill'); ?><?php echo $headlines_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($headlinefont != 'default' && $headlines_color == '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { font-family: "', 'meadowhill'); ?><?php echo $headlinefont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); } 
    elseif ($headlinefont == 'default' && $headlines_color != '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper .container .navigation .section-heading { color: ', 'meadowhill'); ?><?php echo $headlines_color ?><?php _e('; }', 'meadowhill');?>
<?php } 
}

// Post entry font
function meadowhill_get_postentry_font() {
    $postentryfont = get_option('meadowhill_postentry_google_fonts'); 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper .container .post-entry .post-entry-headline { font-family: "', 'meadowhill'); ?><?php echo $postentryfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Post entry color
function meadowhill_get_postentry_color() {
    $post_entry_color = get_option('meadowhill_post_entry_color'); 
		if ($post_entry_color != '#' && $post_entry_color != '') { ?>
		<?php _e('#wrapper .container .post-entry .post-entry-headline a { color: ', 'meadowhill'); ?><?php echo $post_entry_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}  

// Post entry hover color
function meadowhill_get_postentry_hover_color() {
    $post_entry_hover_color = get_option('meadowhill_post_entry_hover_color'); 
		if ($post_entry_hover_color != '#' && $post_entry_hover_color != '') { ?>
		<?php _e('#wrapper .container .post-entry .post-entry-headline a:hover { color: ', 'meadowhill'); ?><?php echo $post_entry_hover_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
} 

// Sidebar widget headlines font and color
function meadowhill_get_sidebar_widget_font() {
    $sidebarfont = get_option('meadowhill_sidebar_google_fonts');
    $sidebar_widget_color = get_option('meadowhill_sidebar_widget_color');
		if ($sidebarfont != 'default' && $sidebar_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; color: ', 'meadowhill'); ?><?php echo $sidebar_widget_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($sidebarfont != 'default' && $sidebar_widget_color == '#') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); }
    elseif ($sidebarfont == 'default' && $sidebar_widget_color != '#') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { color: ', 'meadowhill'); ?><?php echo $sidebar_widget_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Sidebar Widget Headlines underline color
function meadowhill_get_sidebar_widget_underline_color() {
    $sidebar_widget_underline_color = get_option('meadowhill_sidebar_widget_underline_color'); 
		if ($sidebar_widget_underline_color != '#' && $sidebar_widget_underline_color != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget .sidebar-headline { border-color: ', 'meadowhill'); ?><?php echo $sidebar_widget_underline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Sidebar Text color
function meadowhill_get_sidebar_text_color() {
    $sidebar_text_color = get_option('meadowhill_sidebar_text_color'); 
		if ($sidebar_text_color != '#' && $sidebar_text_color != '') { ?>
		<?php _e('#wrapper .container #sidebar .sidebar-widget p, #wrapper .container #sidebar .sidebar-widget ul li, #wrapper .container #sidebar .sidebar-widget ol li, #wrapper .container #sidebar .sidebar-widget table { color: ', 'meadowhill'); ?><?php echo $sidebar_text_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer widget headlines font and color
function meadowhill_get_footer_widget_font() {
    $sidebarfont = get_option('meadowhill_sidebar_google_fonts');
    $footer_widget_color = get_option('meadowhill_footer_widget_color');
		if ($sidebarfont != 'default' && $footer_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; color: ', 'meadowhill'); ?><?php echo $footer_widget_color ?><?php _e('; }', 'meadowhill'); }
    elseif ($sidebarfont != 'default' && $footer_widget_color == '#') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { font-family: "', 'meadowhill'); ?><?php echo $sidebarfont ?><?php _e('", Calibri, Candara, Segoe, "Segoe UI", Optima, Arial, sans-serif; }', 'meadowhill'); }
    elseif ($sidebarfont == 'default' && $footer_widget_color != '#') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { color: ', 'meadowhill'); ?><?php echo $footer_widget_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer Widget Headlines underline color
function meadowhill_get_footer_widget_underline_color() {
    $footer_widget_underline_color = get_option('meadowhill_footer_widget_underline_color'); 
		if ($footer_widget_underline_color != '#' && $footer_widget_underline_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer .footer-widget .footer-headline { border-color: ', 'meadowhill'); ?><?php echo $footer_widget_underline_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer Text color
function meadowhill_get_footer_text_color() {
    $footer_text_color = get_option('meadowhill_footer_text_color'); 
		if ($footer_text_color != '#' && $footer_text_color != '') { ?>
		<?php _e('#wrapper-footer #footer .footer-widget p, #wrapper-footer #footer .footer-widget ul li, #wrapper-footer #footer .footer-widget ol li, #wrapper-footer #footer .footer-widget table, #wrapper #wrapper-footer .footer-signature .footer-signature-content p { color: ', 'meadowhill'); ?><?php echo $footer_text_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Main content links color
function meadowhill_get_content_links_color() {
    $content_links_color = get_option('meadowhill_content_links_color'); 
		if ($content_links_color != '#' && $content_links_color != '') { ?>
		<?php _e('#wrapper .container a { color: ', 'meadowhill'); ?><?php echo $content_links_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Sidebar links color
function meadowhill_get_sidebar_links_color() {
    $sidebar_links_color = get_option('meadowhill_sidebar_links_color'); 
		if ($sidebar_links_color != '#' && $sidebar_links_color != '') { ?>
		<?php _e('#wrapper .container #sidebar a { color: ', 'meadowhill'); ?><?php echo $sidebar_links_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Footer links color
function meadowhill_get_footer_links_color() {
    $footer_links_color = get_option('meadowhill_footer_links_color'); 
		if ($footer_links_color != '#' && $footer_links_color != '') { ?>
		<?php _e('#wrapper #wrapper-footer #footer a, #wrapper #wrapper-footer .footer-signature .footer-signature-content a { color: ', 'meadowhill'); ?><?php echo $footer_links_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Header menu font
function meadowhill_get_menu_font() {
    $menufont = get_option('meadowhill_menu_google_fonts'); 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper-header #header .header-bar .menu-box { font-family: "', 'meadowhill'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }', 'meadowhill'); ?>
<?php } 
}

// Header menu links color
function meadowhill_get_header_menu_color() {
    $header_menu_color = get_option('meadowhill_header_menu_color'); 
		if ($header_menu_color != '#' && $header_menu_color != '') { ?>
		<?php _e('#wrapper-header #header .header-bar .menu-box a, #wrapper-header #header .header-bar .menu-box a:visited { color: ', 'meadowhill'); ?><?php echo $header_menu_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Header menu links hover color
function meadowhill_get_header_menu_hover_color() {
    $header_menu_hover_color = get_option('meadowhill_header_menu_hover_color'); 
		if ($header_menu_hover_color != '#' && $header_menu_hover_color != '') { ?>
		<?php _e('#wrapper-header #header .header-bar .menu-box a:hover, #wrapper-header #header .header-bar .menu-box :hover > a { color: ', 'meadowhill'); ?><?php echo $header_menu_hover_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// Active header menu links color
function meadowhill_get_active_header_menu_color() {
    $active_header_menu_color = get_option('meadowhill_active_header_menu_color');
    if ($active_header_menu_color != '#' && $active_header_menu_color != '') { ?>
		<?php _e('#wrapper #wrapper-header #header .header-bar .menu-box .current-menu-item > a, #wrapper #wrapper-header #header .header-bar .menu-box .current-menu-ancestor > a, #wrapper #wrapper-header #header .header-bar .menu-box .current_page_item > a, #wrapper #wrapper-header #header .header-bar .menu-box .current-page-ancestor > a { color: ', 'meadowhill'); ?><?php echo $active_header_menu_color ?><?php _e('; }', 'meadowhill'); ?>
<?php } 
}

// FONT SIZE

// Site title font size
function meadowhill_get_headings_google_fonts_size() {
    $headingfont_size = get_option('meadowhill_headings_google_fonts_size'); 
		if ($headingfont_size != '50' && $headingfont_size != '') { ?>
		<?php _e('#wrapper #header .site-title { font-size: ', 'meadowhill'); ?><?php echo $headingfont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Site description font size
function meadowhill_get_description_font_size() {
    $descriptionfont_size = get_option('meadowhill_description_google_fonts_size'); 
		if ($descriptionfont_size != '37' && $descriptionfont_size != '') { ?>
		<?php _e('#wrapper #header .site-description { font-size: ', 'meadowhill'); ?><?php echo $descriptionfont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Homepage Image Section font size
function meadowhill_get_image_google_fonts_size() {
    $image_google_fonts_size = get_option('meadowhill_image_google_fonts_size'); 
		if ($image_google_fonts_size != '27' && $image_google_fonts_size != '') { ?>
		<?php _e('#wrapper #wrapper-image .image-description p { font-size: ', 'meadowhill'); ?><?php echo $image_google_fonts_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H1 Headlines font size
function meadowhill_get_headline_h1_size() {
    $headline_h1_size = get_option('meadowhill_headline_h1_size'); 
		if ($headline_h1_size != '30' && $headline_h1_size != '') { ?>
		<?php _e('#wrapper h1 { font-size: ', 'meadowhill'); ?><?php echo $headline_h1_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H2 Headlines font size
function meadowhill_get_headline_h2_size() {
    $headline_h2_size = get_option('meadowhill_headline_h2_size'); 
		if ($headline_h2_size != '25' && $headline_h2_size != '') { ?>
		<?php _e('#wrapper h2 { font-size: ', 'meadowhill'); ?><?php echo $headline_h2_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H3 Headlines font size
function meadowhill_get_headline_h3_size() {
    $headline_h3_size = get_option('meadowhill_headline_h3_size'); 
		if ($headline_h3_size != '21' && $headline_h3_size != '') { ?>
		<?php _e('#wrapper h3 { font-size: ', 'meadowhill'); ?><?php echo $headline_h3_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H4 Headlines font size
function meadowhill_get_headline_h4_size() {
    $headline_h4_size = get_option('meadowhill_headline_h4_size'); 
		if ($headline_h4_size != '17' && $headline_h4_size != '') { ?>
		<?php _e('#wrapper h4 { font-size: ', 'meadowhill'); ?><?php echo $headline_h4_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H5 Headlines font size
function meadowhill_get_headline_h5_size() {
    $headline_h5_size = get_option('meadowhill_headline_h5_size'); 
		if ($headline_h5_size != '15' && $headline_h5_size != '') { ?>
		<?php _e('#wrapper h5 { font-size: ', 'meadowhill'); ?><?php echo $headline_h5_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// H6 Headlines font size
function meadowhill_get_headline_h6_size() {
    $headline_h6_size = get_option('meadowhill_headline_h6_size'); 
		if ($headline_h6_size != '14' && $headline_h6_size != '') { ?>
		<?php _e('#wrapper h6 { font-size: ', 'meadowhill'); ?><?php echo $headline_h6_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Post entry font size
function meadowhill_get_postentry_font_size() {
    $postentryfont_size = get_option('meadowhill_postentry_google_fonts_size'); 
		if ($postentryfont_size != '29' && $postentryfont_size != '') { ?>
		<?php _e('#wrapper .post-entry .post-entry-headline { font-size: ', 'meadowhill'); ?><?php echo $postentryfont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Sidebar widget headlines font size
function meadowhill_get_sidebar_widget_font_size() {
    $sidebarfont_size = get_option('meadowhill_sidebar_google_fonts_size'); 
		if ($sidebarfont_size != '24' && $sidebarfont_size != '') { ?>
		<?php _e('#wrapper #sidebar .sidebar-widget .sidebar-headline { font-size: ', 'meadowhill'); ?><?php echo $sidebarfont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Footer widget headlines font size
function meadowhill_get_footer_widget_font_size() {
    $footerfont_size = get_option('meadowhill_footer_google_fonts_size'); 
		if ($footerfont_size != '20' && $footerfont_size != '') { ?>
		<?php _e('#wrapper #footer .footer-widget .footer-headline { font-size: ', 'meadowhill'); ?><?php echo $footerfont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// Header Main menu font size
function meadowhill_get_menu_font_size() {
    $menufont_size = get_option('meadowhill_menu_google_fonts_size'); 
		if ($menufont_size != '17' && $menufont_size != '') { ?>
		<?php _e('#wrapper .menu-box a, #wrapper .menu-box a:visited { font-size: ', 'meadowhill'); ?><?php echo $menufont_size ?><?php _e('px; }', 'meadowhill'); ?>
<?php } 
}

// User defined CSS.
function meadowhill_get_own_css() {
    $own_css = get_option('meadowhill_own_css'); 
		if ($own_css != '') { ?>
		<?php echo $own_css ?>
<?php } 
}

// Display custom CSS.
function meadowhill_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php meadowhill_get_own_css(); ?>
<?php meadowhill_display_sidebar(); ?>
<?php meadowhill_header_bar_attachment(); ?>
<?php meadowhill_get_page_title_width(); ?>
<?php meadowhill_get_header_menu_width(); ?>
<?php meadowhill_get_header_menu_format(); ?>
<?php meadowhill_get_header_image_url(); ?>
<?php meadowhill_get_header_image_height(); ?>
<?php meadowhill_get_header_background_pattern(); ?>
<?php meadowhill_get_header_background_pattern_opacity(); ?>
<?php meadowhill_get_footer_background_pattern(); ?>
<?php meadowhill_get_footer_background_pattern_opacity(); ?>
<?php meadowhill_get_homepage_header_image_url(); ?>
<?php meadowhill_get_homepage_header_background_pattern(); ?>
<?php meadowhill_get_homepage_header_background_pattern_opacity(); ?>
<?php meadowhill_get_site_description_position(); ?>
<?php meadowhill_get_image_section_height(); ?>
<?php meadowhill_get_image_section_image_url(); ?>
<?php meadowhill_get_image_section_scrolling(); ?>
<?php meadowhill_get_image_section_background_pattern(); ?>
<?php meadowhill_get_image_section_background_pattern_opacity(); ?>
<?php meadowhill_get_image_section_text_position(); ?>
<?php meadowhill_get_menu_background_color(); ?>
<?php meadowhill_get_content_background_color(); ?>
<?php meadowhill_get_footer_background_color(); ?>
<?php meadowhill_get_footer_border_color(); ?>
<?php meadowhill_get_footer_notices_background_color(); ?>
<?php meadowhill_get_homepage_about_background_color(); ?>
<?php meadowhill_get_homepage_portfolio_background_color(); ?>
<?php meadowhill_get_homepage_informational_background_color(); ?>
<?php meadowhill_get_homepage_blog_background_color(); ?>
<?php meadowhill_get_submenu_background_color(); ?>
<?php meadowhill_get_submenu_border_color(); ?>
<?php meadowhill_get_submenu_hover_color(); ?>
<?php meadowhill_get_submenu_item_border_color(); ?>
<?php meadowhill_get_meta_box_background_color(); ?>
<?php meadowhill_get_meta_box_separator_color(); ?>
<?php meadowhill_get_comments_border_color(); ?>
<?php meadowhill_get_author_comments_background_color(); ?>
<?php meadowhill_get_portfolio_items_border_color(); ?>
<?php meadowhill_get_portfolio_items_hover_border_color(); ?>
<?php meadowhill_get_post_entries_background_color(); ?>
<?php meadowhill_get_post_entries_border_color(); ?>
<?php meadowhill_get_post_entries_meta_background_color(); ?>
<?php meadowhill_get_post_entries_separator_color(); ?>
<?php meadowhill_get_post_entries_read_more_background_color(); ?>
<?php meadowhill_get_post_entries_read_more_hover_color(); ?>
<?php meadowhill_get_sticky_post_background_color(); ?>
<?php meadowhill_get_sticky_post_meta_background_color(); ?>
<?php meadowhill_get_searchform_background_color(); ?>
<?php meadowhill_get_searchform_border_color(); ?>
<?php meadowhill_get_form_fields_background_color(); ?>
<?php meadowhill_get_form_fields_border_color(); ?>
<?php meadowhill_get_form_buttons_background_color(); ?>
<?php meadowhill_get_form_buttons_hover_color(); ?>
<?php meadowhill_get_table_headers_background_color(); ?>
<?php meadowhill_get_body_font(); ?>
<?php meadowhill_get_body_google_fonts_size(); ?>
<?php meadowhill_get_headings_google_fonts(); ?>
<?php meadowhill_get_site_title_color(); ?>
<?php meadowhill_get_description_font(); ?>
<?php meadowhill_get_read_more_text_color(); ?>
<?php meadowhill_get_about_headline_color(); ?>
<?php meadowhill_get_portfolio_headline_color(); ?>
<?php meadowhill_get_portfolio_links_color(); ?>
<?php meadowhill_get_informational_headline_color(); ?>
<?php meadowhill_get_blog_headline_color(); ?>
<?php meadowhill_get_image_font(); ?>
<?php meadowhill_get_main_headlines_color(); ?>
<?php meadowhill_get_headlines_font(); ?>
<?php meadowhill_get_postentry_font(); ?>
<?php meadowhill_get_postentry_color(); ?>
<?php meadowhill_get_postentry_hover_color(); ?>
<?php meadowhill_get_sidebar_widget_font(); ?>
<?php meadowhill_get_sidebar_widget_underline_color(); ?>
<?php meadowhill_get_sidebar_text_color(); ?>
<?php meadowhill_get_footer_widget_font(); ?>
<?php meadowhill_get_footer_widget_underline_color(); ?>
<?php meadowhill_get_footer_text_color(); ?>
<?php meadowhill_get_content_links_color(); ?>
<?php meadowhill_get_sidebar_links_color(); ?>
<?php meadowhill_get_footer_links_color(); ?>
<?php meadowhill_get_header_menu_color(); ?>
<?php meadowhill_get_header_menu_hover_color(); ?>
<?php meadowhill_get_active_header_menu_color(); ?>
<?php meadowhill_get_menu_font(); ?>
<?php meadowhill_get_headings_google_fonts_size(); ?>
<?php meadowhill_get_description_font_size(); ?>
<?php meadowhill_get_image_google_fonts_size(); ?>
<?php meadowhill_get_headline_h1_size(); ?>
<?php meadowhill_get_headline_h2_size(); ?>
<?php meadowhill_get_headline_h3_size(); ?>
<?php meadowhill_get_headline_h4_size(); ?>
<?php meadowhill_get_headline_h5_size(); ?>
<?php meadowhill_get_headline_h6_size(); ?>
<?php meadowhill_get_postentry_font_size(); ?>
<?php meadowhill_get_sidebar_widget_font_size(); ?>
<?php meadowhill_get_footer_widget_font_size(); ?>
<?php meadowhill_get_menu_font_size(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'meadowhill_custom_styles');	?>