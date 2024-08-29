<?php
/**
 * Headerdata of Theme options.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/  
global $liveride_options;
foreach ($liveride_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}

// additional js and css
if(	!is_admin()){
function liveride_fonts_include () {
// Google Fonts
$bodyfont = get_option('liveride_body_google_fonts');
$headingfont = get_option('liveride_headings_google_fonts');
$descriptionfont = get_option('liveride_description_google_fonts');
$headlinefont = get_option('liveride_headline_google_fonts');
$headlineboxfont = get_option('liveride_headline_box_google_fonts');
$postentryfont = get_option('liveride_postentry_google_fonts');
$sidebarfont = get_option('liveride_sidebar_google_fonts');
$menufont = get_option('liveride_menu_google_fonts');

$fonturl = "//fonts.googleapis.com/css?family=";
$character_set = "&amp;subset=" . get_option('liveride_character_set');

$bodyfonturl = $fonturl.$bodyfont.$character_set;
$headingfonturl = $fonturl.$headingfont.$character_set;
$descriptionfonturl = $fonturl.$descriptionfont.$character_set;
$headlinefonturl = $fonturl.$headlinefont.$character_set;
$headlineboxfonturl = $fonturl.$headlineboxfont.$character_set;
$postentryfonturl = $fonturl.$postentryfont.$character_set;
$sidebarfonturl = $fonturl.$sidebarfont.$character_set;
$menufonturl = $fonturl.$menufont.$character_set;
	// Google Fonts
     if ($bodyfont != 'default' && $bodyfont != ''){
      wp_enqueue_style('liveride-google-font1', $bodyfonturl); 
		 }
     if ($headingfont != 'default' && $headingfont != ''){
      wp_enqueue_style('liveride-google-font2', $headingfonturl);
		 }
     if ($descriptionfont != 'default' && $descriptionfont != ''){
      wp_enqueue_style('liveride-google-font3', $descriptionfonturl);
		 }
     if ($headlinefont != 'default' && $headlinefont != ''){
      wp_enqueue_style('liveride-google-font4', $headlinefonturl); 
		 }
     if ($postentryfont != 'default' && $postentryfont != ''){
      wp_enqueue_style('liveride-google-font5', $postentryfonturl); 
		 }
     if ($sidebarfont != 'default' && $sidebarfont != ''){
      wp_enqueue_style('liveride-google-font6', $sidebarfonturl);
		 }
     if ($menufont != 'default' && $menufont != ''){
      wp_enqueue_style('liveride-google-font8', $menufonturl);
		 }
     if ($headlineboxfont != 'default' && $headlineboxfont != ''){
      wp_enqueue_style('liveride-google-font10', $headlineboxfonturl); 
		 }
}
add_action( 'wp_enqueue_scripts', 'liveride_fonts_include' );
}

// additional js and css
function liveride_css_include () {
	if (get_option('liveride_css') == 'Green (default)' ){
			wp_enqueue_style('liveride-style', get_stylesheet_uri());
		}

		if (get_option('liveride_css') == 'Blue' ){
			wp_enqueue_style('liveride-style-blue', get_template_directory_uri().'/css/blue.css');
		}

		if (get_option('liveride_css') == 'Orange' ){
			wp_enqueue_style('liveride-style-orange', get_template_directory_uri().'/css/orange.css');
		}

		if (get_option('liveride_css') == 'Pink' ){
			wp_enqueue_style('liveride-style-pink', get_template_directory_uri().'/css/pink.css');
		}
    
    if (get_option('liveride_css') == 'Purple' ){
			wp_enqueue_style('liveride-style-purple', get_template_directory_uri().'/css/purple.css');
		}
    
    if (get_option('liveride_css') == 'Red' ){
			wp_enqueue_style('liveride-style-red', get_template_directory_uri().'/css/red.css');
		}

		if (get_option('liveride_css') == 'Turquoise' ){
			wp_enqueue_style('liveride-style-turquoise', get_template_directory_uri().'/css/turquoise.css');
		}
}
add_action( 'wp_enqueue_scripts', 'liveride_css_include' );

//social scripts
if(	!is_admin() && ($liveride_share_buttons_page == '' || $liveride_share_buttons_page == 'Display' || $liveride_share_buttons_post == '' || $liveride_share_buttons_post == 'Display' || $liveride_share_buttons_post_entry == '' || $liveride_share_buttons_post_entry == 'Display' || $liveride_share_buttons_products == '' || $liveride_share_buttons_products == 'Display') ) {

function liveride_scripts_social() {
$share_buttons_language = get_option('liveride_share_buttons_language') . '/all.js#xfbml=1';
$share_buttons_language_url = "//connect.facebook.net/";
$share_buttons_language_full_url = $share_buttons_language_url.$share_buttons_language;
	// Register all javascript files
	wp_enqueue_script('liveride_js_google', '//apis.google.com/js/plusone.js', '', '', 'footer');
  if ( get_option('liveride_share_buttons_language') != '' ) {
	wp_enqueue_script('liveride_js_facebook', $share_buttons_language_full_url, '', '', 'footer'); } else {
  wp_enqueue_script('liveride_js_facebook', '//connect.facebook.net/en_US/all.js#xfbml=1', '', '', 'footer'); }
	wp_enqueue_script('liveride_js_twitter', '//platform.twitter.com/widgets.js', '', '', 'footer');
	}   
add_action('wp_enqueue_scripts', 'liveride_scripts_social');	
}

// Display sidebar
function liveride_display_sidebar() {
    $display_sidebar = get_option('liveride_display_sidebar'); 
		if ($display_sidebar == 'Hide') { ?>
		<?php _e('#wrapper #container #content { width: 870px; }'); ?>
<?php } 
}

// Left Sidebar Position
function liveride_left_sidebar_position() {
    $left_sidebar_position = get_option('liveride_left_sidebar_position'); 
		if ($left_sidebar_position == 'Absolute (scrolled)') { ?>
		<?php _e('body #left-sidebar { height: auto; position: absolute; } #left-sidebar .sidebar-icons { position: relative; bottom: auto; left: auto; margin-left: -5px; margin-top: 20px; } body .sidebar-background { display: block; } .rtl #left-sidebar .sidebar-icons { right: auto; margin-left: 0; margin-right: -5px; }'); ?>
<?php } 
}

// Display Meta Box on posts - post entries styling
function liveride_display_meta_post_entry() {
    $display_meta_post_entry = get_option('liveride_display_meta_post'); 
		if ($display_meta_post_entry == 'Hide') { ?>
		<?php _e('#wrapper #main-content .post-entry .attachment-post-thumbnail { margin-bottom: 17px; } #wrapper #main-content .post-entry .post-entry-content { margin-bottom: -4px; } #wrapper #main-content .post-entry .social-share { margin-bottom: 5px; padding: 0; }'); ?>
<?php } 
}

// Left Sidebar background color
function liveride_get_left_sidebar_background_color() {
    $left_sidebar_background_color = get_option('liveride_left_sidebar_background_color'); 
		if ($left_sidebar_background_color != '#' && $left_sidebar_background_color != '') { ?>
		<?php _e('#wrapper #left-sidebar, #wrapper .sidebar-background, #wrapper #header { background-color: '); ?><?php echo $left_sidebar_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Menu Links border color
function liveride_get_main_menu_links_border_color() {
    $main_menu_links_border_color = get_option('liveride_main_menu_links_border_color'); 
		if ($main_menu_links_border_color != '#' && $main_menu_links_border_color != '') { ?>
		<?php _e('#wrapper .menu-box ul, #wrapper .menu-box ul li { border-color: '); ?><?php echo $main_menu_links_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu drop-down submenus background color
function liveride_get_main_submenu_background_color() {
    $main_submenu_background_color = get_option('liveride_main_submenu_background_color'); 
		if ($main_submenu_background_color != '#' && $main_submenu_background_color != '') { ?>
		<?php _e('#wrapper .menu-box ul ul { background-color: '); ?><?php echo $main_submenu_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu drop-down submenus border color
function liveride_get_main_submenu_border_color() {
    $main_submenu_border_color = get_option('liveride_main_submenu_border_color'); 
		if ($main_submenu_border_color != '#' && $main_submenu_border_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box ul ul li { border-color: '); ?><?php echo $main_submenu_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu drop-down submenus hover color
function liveride_get_main_submenu_hover_color() {
    $main_submenu_hover_color = get_option('liveride_main_submenu_hover_color'); 
		if ($main_submenu_hover_color != '#' && $main_submenu_hover_color != '') { ?>
		<?php _e('html #wrapper #left-sidebar .menu-box ul ul a:hover, html #wrapper #left-sidebar .menu-box ul ul :hover > a { background-color: '); ?><?php echo $main_submenu_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Post Author’s Comments background color
function liveride_get_author_comments_background_color() {
    $author_comments_background_color = get_option('liveride_author_comments_background_color'); 
		if ($author_comments_background_color != '#' && $author_comments_background_color != '') { ?>
		<?php _e('#wrapper #comments .bypostauthor { background-color: '); ?><?php echo $author_comments_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Sticky Post background color
function liveride_get_sticky_post_background_color() {
    $sticky_post_background_color = get_option('liveride_sticky_post_background_color'); 
		if ($sticky_post_background_color != '#' && $sticky_post_background_color != '') { ?>
		<?php _e('#wrapper #container #main-content .sticky { background-color: '); ?><?php echo $sticky_post_background_color ?><?php _e('; }'); ?>
<?php } 
}

// LiveRide Posts-Thumbnail items hover color
function liveride_get_posts_thumbnail_background_color() {
    $posts_thumbnail_background_color = get_option('liveride_posts_thumbnail_background_color'); 
		if ($posts_thumbnail_background_color != '#' && $posts_thumbnail_background_color != '') { ?>
		<?php _e('#wrapper #container .post-entry-thumbnail .thumbnail-hover { background-color: '); ?><?php echo $posts_thumbnail_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Highlighted text background color
function liveride_get_highlight_background_color() {
    $highlight_background_color = get_option('liveride_highlight_background_color'); 
		if ($highlight_background_color != '#' && $highlight_background_color != '') { ?>
		<?php _e('#wrapper #container .highlight-text { background-color: '); ?><?php echo $highlight_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer background color
function liveride_get_footer_background_color() {
    $footer_background_color = get_option('liveride_footer_background_color'); 
		if ($footer_background_color != '#' && $footer_background_color != '') { ?>
		<?php _e('html #wrapper #footer { background-color: '); ?><?php echo $footer_background_color ?><?php _e('; } '); ?>
<?php } 
}

// Searchform border color
function liveride_get_searchform_border_color() {
    $searchform_border_color = get_option('liveride_searchform_border_color'); 
		if ($searchform_border_color != '#' && $searchform_border_color != '') { ?>
		<?php _e('html #wrapper #searchform .searchform-wrapper #s { border-color: '); ?><?php echo $searchform_border_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Search Button background color
function liveride_get_searchform_button_background_color() {
    $searchform_button_background_color = get_option('liveride_searchform_button_background_color'); 
		if ($searchform_button_background_color != '#' && $searchform_button_background_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper .send { background-color: '); ?><?php echo $searchform_button_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Search Button hover color
function liveride_get_searchform_button_hover_color() {
    $searchform_button_hover_color = get_option('liveride_searchform_button_hover_color'); 
		if ($searchform_button_hover_color != '#' && $searchform_button_hover_color != '') { ?>
		<?php _e('#wrapper #searchform .searchform-wrapper .send:hover { background-color: '); ?><?php echo $searchform_button_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Form Fields background color
function liveride_get_form_fields_background_color() {
    $form_fields_background_color = get_option('liveride_form_fields_background_color'); 
		if ($form_fields_background_color != '#' && $form_fields_background_color != '') { ?>
		<?php _e('#searchform .searchform-wrapper #s, #wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { background-color: '); ?><?php echo $form_fields_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Form Fields border color
function liveride_get_form_fields_border_color() {
    $form_fields_border_color = get_option('liveride_form_fields_border_color'); 
		if ($form_fields_border_color != '#' && $form_fields_border_color != '') { ?>
		<?php _e('body #searchform .searchform-wrapper #s, #wrapper input[type="text"], #wrapper input[type="file"], #wrapper input[type="password"], #wrapper input[type="number"], #wrapper input[type="search"], #wrapper input[type="email"], #wrapper input[type="url"], #wrapper textarea, #wrapper select { border-color: '); ?><?php echo $form_fields_border_color ?><?php _e('; }'); ?>
<?php } 
}

// Buttons background color
function liveride_get_form_buttons_background_color() {
    $form_buttons_background_color = get_option('liveride_form_buttons_background_color'); 
		if ($form_buttons_background_color != '#' && $form_buttons_background_color != '') { ?>
		<?php _e('#wrapper input[type="submit"], #wrapper input[type="reset"], #wrapper .custom-button, html #wrapper #container .panel-row-style-liveride .origin-widget-button a { background-color: '); ?><?php echo $form_buttons_background_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Buttons hover color
function liveride_get_form_buttons_hover_color() {
    $form_buttons_hover_color = get_option('liveride_form_buttons_hover_color'); 
		if ($form_buttons_hover_color != '#' && $form_buttons_hover_color != '') { ?>
		<?php _e('#wrapper input[type="submit"]:hover, #wrapper input[type="reset"]:hover, #wrapper .custom-button:hover, html #wrapper #container .panel-row-style-liveride .origin-widget-button a:hover { background: '); ?><?php echo $form_buttons_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
}

// Table Headers background color
function liveride_get_table_headers_background_color() {
    $table_headers_background_color = get_option('liveride_table_headers_background_color'); 
		if ($table_headers_background_color != '#' && $table_headers_background_color != '') { ?>
		<?php _e('#wrapper table th { background-color: '); ?><?php echo $table_headers_background_color ?><?php _e('; }'); ?>
<?php } 
}

// TEXT COLORS AND FONTS
// Body font and color
function liveride_get_body_font() {
    $bodyfont = get_option('liveride_body_google_fonts');
    $body_color = get_option('liveride_body_color'); 
		if ($bodyfont != 'default' && $body_color != '#' && $bodyfont != '') { ?>
		<?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #main-content .post-meta { font-family: "'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $body_color ?><?php _e('; }'); }
    elseif ($bodyfont != 'default' && $body_color == '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #main-content .post-meta { font-family: "'); ?><?php echo $bodyfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($bodyfont == 'default' && $body_color != '#') { ?>
    <?php _e('html body, #wrapper blockquote, #wrapper q, #wrapper #container #comments .comment, #wrapper #container #comments .comment time, #wrapper #container #commentform .form-allowed-tags, #wrapper #container #commentform p, #wrapper input, #wrapper button, #wrapper select, #wrapper #main-content .post-meta { color: '); ?><?php echo $body_color ?><?php _e('; }'); ?>
<?php } 
}

// Main Content area font size
function liveride_get_body_google_fonts_size() {
    $body_google_fonts_size = get_option('liveride_body_google_fonts_size'); 
		if ($body_google_fonts_size != '13' && $body_google_fonts_size != '') { ?>
		<?php _e('body p, body ul, body ol, body li, body dl, body address, body table { font-size: '); ?><?php echo $body_google_fonts_size ?><?php _e('px; }'); ?>
<?php } 
}

// Site title font
function liveride_get_headings_google_fonts() {
    $headingfont = get_option('liveride_headings_google_fonts'); 
		if ($headingfont != 'default' && $headingfont != '') { ?>
		<?php _e('#wrapper .site-title { font-family: "'); ?><?php echo $headingfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Site title font size
function liveride_get_headings_google_fonts_size() {
    $headingfont_size = get_option('liveride_headings_google_fonts_size'); 
		if ($headingfont_size != '40' && $headingfont_size != '') { ?>
		<?php _e('#wrapper .site-title { font-size: '); ?><?php echo $headingfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Site title color
function liveride_get_site_title_color() {
    $site_title_color = get_option('liveride_site_title_color'); 
		if ($site_title_color != '#' && $site_title_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .site-title a { color: '); ?><?php echo $site_title_color ?><?php _e('; }'); ?>
<?php } 
}

// Site title hover color
function liveride_get_site_title_hover_color() {
    $site_title_hover_color = get_option('liveride_site_title_hover_color'); 
		if ($site_title_hover_color != '#' && $site_title_hover_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .site-title a:hover { color: '); ?><?php echo $site_title_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Site description font and color
function liveride_get_description_font() {
    $descriptionfont = get_option('liveride_description_google_fonts');
    $site_description_color = get_option('liveride_site_description_color'); 
		if ($descriptionfont != 'default' && $site_description_color != '#' && $descriptionfont != '') { ?>
		<?php _e('#wrapper #left-sidebar .site-description {font-family: "'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $site_description_color ?><?php _e('; }'); }
    elseif ($descriptionfont != 'default' && $site_description_color == '#') { ?>
    <?php _e('#wrapper #left-sidebar .site-description {font-family: "'); ?><?php echo $descriptionfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($descriptionfont == 'default' && $site_description_color != '#') { ?>
    <?php _e('#wrapper #left-sidebar .site-description { color: '); ?><?php echo $site_description_color ?><?php _e('; }'); ?>
<?php } 
}

// Site description font size
function liveride_get_description_font_size() {
    $descriptionfont_size = get_option('liveride_description_google_fonts_size'); 
		if ($descriptionfont_size != '18' && $descriptionfont_size != '') { ?>
		<?php _e('#wrapper .site-description { font-size: '); ?><?php echo $descriptionfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Page/post Main Headline background color
function liveride_get_main_headlines_background_color() {
    $main_headlines_background_color = get_option('liveride_main_headlines_background_color'); 
		if ($main_headlines_background_color != '#' && $main_headlines_background_color != '') { ?>
		<?php _e('html #wrapper #headline-wrapper { background-color: '); ?><?php echo $main_headlines_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/post Main Headline color
function liveride_get_main_headlines_color() {
    $main_headlines_color = get_option('liveride_main_headlines_color'); 
		if ($main_headlines_color != '#' && $main_headlines_color != '') { ?>
		<?php _e('#wrapper #headline-wrapper .content-headline { color: '); ?><?php echo $main_headlines_color ?><?php _e('; }'); ?>
<?php } 
}

// Breadcrumb Navigation background color
function liveride_get_breadcrumb_background_color() {
    $breadcrumb_background_color = get_option('liveride_breadcrumb_background_color'); 
		if ($breadcrumb_background_color != '#' && $breadcrumb_background_color != '') { ?>
		<?php _e('#wrapper #breadcrumb-navigation { background-color: '); ?><?php echo $breadcrumb_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Page/post headlines font and color
function liveride_get_headlines_font() {
    $headlinefont = get_option('liveride_headline_google_fonts');
    $headlines_color = get_option('liveride_headlines_color'); 
		if ($headlinefont != 'default' && $headlines_color != '#' && $headlinefont != '') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper .info-box .info-box-headline, #wrapper #comments .entry-headline { font-family: "'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $headlines_color ?><?php _e('; }'); }
    elseif ($headlinefont != 'default' && $headlines_color == '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper .info-box .info-box-headline, #wrapper #comments .entry-headline { font-family: "'); ?><?php echo $headlinefont ?><?php _e('", Arial, Helvetica, sans-serif; }'); } 
    elseif ($headlinefont == 'default' && $headlines_color != '#') { ?>
		<?php _e('#wrapper h1, #wrapper h2, #wrapper h3, #wrapper h4, #wrapper h5, #wrapper h6, #wrapper #container .navigation .section-heading, #wrapper .info-box .info-box-headline, #wrapper #comments .entry-headline { color: '); ?><?php echo $headlines_color ?><?php _e('; }');?>
<?php } 
}

// H1 Headlines font size
function liveride_get_headline_h1_size() {
    $headline_h1_size = get_option('liveride_headline_h1_size'); 
		if ($headline_h1_size != '27' && $headline_h1_size != '') { ?>
		<?php _e('#wrapper h1 { font-size: '); ?><?php echo $headline_h1_size ?><?php _e('px; }'); ?>
<?php } 
}

// H2 Headlines font size
function liveride_get_headline_h2_size() {
    $headline_h2_size = get_option('liveride_headline_h2_size'); 
		if ($headline_h2_size != '21' && $headline_h2_size != '') { ?>
		<?php _e('#wrapper h2 { font-size: '); ?><?php echo $headline_h2_size ?><?php _e('px; }'); ?>
<?php } 
}

// H3 Headlines font size
function liveride_get_headline_h3_size() {
    $headline_h3_size = get_option('liveride_headline_h3_size'); 
		if ($headline_h3_size != '18' && $headline_h3_size != '') { ?>
		<?php _e('#wrapper h3 { font-size: '); ?><?php echo $headline_h3_size ?><?php _e('px; }'); ?>
<?php } 
}

// H4 Headlines font size
function liveride_get_headline_h4_size() {
    $headline_h4_size = get_option('liveride_headline_h4_size'); 
		if ($headline_h4_size != '16' && $headline_h4_size != '') { ?>
		<?php _e('#wrapper h4 { font-size: '); ?><?php echo $headline_h4_size ?><?php _e('px; }'); ?>
<?php } 
}

// H5 Headlines font size
function liveride_get_headline_h5_size() {
    $headline_h5_size = get_option('liveride_headline_h5_size'); 
		if ($headline_h5_size != '14' && $headline_h5_size != '') { ?>
		<?php _e('#wrapper h5 { font-size: '); ?><?php echo $headline_h5_size ?><?php _e('px; }'); ?>
<?php } 
}

// H6 Headlines font size
function liveride_get_headline_h6_size() {
    $headline_h6_size = get_option('liveride_headline_h6_size'); 
		if ($headline_h6_size != '13' && $headline_h6_size != '') { ?>
		<?php _e('#wrapper h6 { font-size: '); ?><?php echo $headline_h6_size ?><?php _e('px; }'); ?>
<?php } 
}

// LiveRide Posts Widgets headlines font
function liveride_get_headline_box_google_fonts() {
    $headline_box_google_fonts = get_option('liveride_headline_box_google_fonts'); 
		if ($headline_box_google_fonts != 'default' && $headline_box_google_fonts != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-family: "'); ?><?php echo $headline_box_google_fonts ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// LiveRide Posts Widgets headlines color
function liveride_get_homepage_headlines_color() {
    $homepage_headlines_color = get_option('liveride_homepage_headlines_color'); 
		if ($homepage_headlines_color != '#' && $homepage_headlines_color != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { color: '); ?><?php echo $homepage_headlines_color ?><?php _e('; }'); ?>
<?php } 
}

// LiveRide Posts Widgets headlines font size
function liveride_get_headline_box_google_fonts_size() {
    $headline_box_google_fonts_size = get_option('liveride_headline_box_google_fonts_size'); 
		if ($headline_box_google_fonts_size != '27' && $headline_box_google_fonts_size != '') { ?>
		<?php _e('#wrapper #container #main-content section .entry-headline { font-size: '); ?><?php echo $headline_box_google_fonts_size ?><?php _e('px; }'); ?>
<?php } 
}

// Post entry font
function liveride_get_postentry_font() {
    $postentryfont = get_option('liveride_postentry_google_fonts'); 
		if ($postentryfont != 'default' && $postentryfont != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { font-family: "'); ?><?php echo $postentryfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Post entry font size
function liveride_get_postentry_font_size() {
    $postentryfont_size = get_option('liveride_postentry_google_fonts_size'); 
		if ($postentryfont_size != '21' && $postentryfont_size != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline { font-size: '); ?><?php echo $postentryfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Post entry color
function liveride_get_postentry_color() {
    $post_entry_color = get_option('liveride_post_entry_color'); 
		if ($post_entry_color != '#' && $post_entry_color != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline a, #wrapper #main-content .slides li a, #wrapper #main-content .home-list-posts ul li a { color: '); ?><?php echo $post_entry_color ?><?php _e('; }'); ?>
<?php } 
}  

// Post entry hover color
function liveride_get_postentry_hover_color() {
    $post_entry_hover_color = get_option('liveride_post_entry_hover_color'); 
		if ($post_entry_hover_color != '#' && $post_entry_hover_color != '') { ?>
		<?php _e('#wrapper #main-content .post-entry .post-entry-headline a:hover, #wrapper #main-content .slides li a:hover, #wrapper #main-content .home-list-posts ul li a:hover { color: '); ?><?php echo $post_entry_hover_color ?><?php _e(' !important; }'); ?>
<?php } 
} 

// Sidebar widget headlines font and color
function liveride_get_sidebar_widget_font() {
    $sidebarfont = get_option('liveride_sidebar_google_fonts');
    $sidebar_widget_color = get_option('liveride_sidebar_widget_color');
		if ($sidebarfont != 'default' && $sidebar_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $sidebar_widget_color ?><?php _e('; }'); }
    elseif ($sidebarfont != 'default' && $sidebar_widget_color == '#') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($sidebarfont == 'default' && $sidebar_widget_color != '#') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline { color: '); ?><?php echo $sidebar_widget_color ?><?php _e('; }'); ?>
<?php } 
}

// Sidebar widget headlines font size
function liveride_get_sidebar_widget_font_size() {
    $sidebarfont_size = get_option('liveride_sidebar_google_fonts_size'); 
		if ($sidebarfont_size != '19' && $sidebarfont_size != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline { font-size: '); ?><?php echo $sidebarfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Sidebar widget headlines border color
function liveride_get_sidebar_widget_border_color() {
    $sidebar_widget_border = get_option('liveride_sidebar_widget_border'); 
		if ($sidebar_widget_border != '#' && $sidebar_widget_border != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget .sidebar-headline { border-color: '); ?><?php echo $sidebar_widget_border ?><?php _e('; }'); ?>
<?php } 
}

// Sidebar Text color
function liveride_get_sidebar_text_color() {
    $sidebar_text_color = get_option('liveride_sidebar_text_color'); 
		if ($sidebar_text_color != '#' && $sidebar_text_color != '') { ?>
		<?php _e('#wrapper #container #sidebar .sidebar-widget p, #wrapper #container #sidebar .sidebar-widget ul li, #wrapper #container #sidebar .sidebar-widget ol li, #wrapper #container #sidebar .sidebar-widget table { color: '); ?><?php echo $sidebar_text_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer widget headlines font and color
function liveride_get_footer_widget_font() {
    $sidebarfont = get_option('liveride_sidebar_google_fonts');
    $footer_widget_color = get_option('liveride_footer_widget_color');
		if ($sidebarfont != 'default' && $footer_widget_color != '#' && $sidebarfont != '') { ?>
		<?php _e('#wrapper #footer .footer-signature .footer-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; color: '); ?><?php echo $footer_widget_color ?><?php _e('; }'); }
    elseif ($sidebarfont != 'default' && $footer_widget_color == '#') { ?>
		<?php _e('#wrapper #footer .footer-signature .footer-headline { font-family: "'); ?><?php echo $sidebarfont ?><?php _e('", Arial, Helvetica, sans-serif; }'); }
    elseif ($sidebarfont == 'default' && $footer_widget_color != '#') { ?>
		<?php _e('#wrapper #footer .footer-signature .footer-headline { color: '); ?><?php echo $footer_widget_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer widget headlines font size
function liveride_get_footer_widget_font_size() {
    $footerfont_size = get_option('liveride_footer_google_fonts_size'); 
		if ($footerfont_size != '19' && $footerfont_size != '') { ?>
		<?php _e('#wrapper #footer .footer-signature .footer-headline { font-size: '); ?><?php echo $footerfont_size ?><?php _e('px; }'); ?>
<?php } 
}

// Footer widget headlines border color
function liveride_get_footer_widget_border_color() {
    $footer_widget_border = get_option('liveride_footer_widget_border'); 
		if ($footer_widget_border != '#' && $footer_widget_border != '') { ?>
		<?php _e('#wrapper #footer .footer-signature .footer-headline { border-color: '); ?><?php echo $footer_widget_border ?><?php _e('; }'); ?>
<?php } 
}

// Footer Text color
function liveride_get_footer_text_color() {
    $footer_text_color = get_option('liveride_footer_text_color'); 
		if ($footer_text_color != '#' && $footer_text_color != '') { ?>
		<?php _e('#wrapper #footer .footer-signature p, #wrapper #footer .footer-signature ul li, #wrapper #footer .footer-signature ol li, #wrapper #footer .footer-signature table td { color: '); ?><?php echo $footer_text_color ?><?php _e('; }'); ?>
<?php } 
}

// Main content links color
function liveride_get_content_links_color() {
    $content_links_color = get_option('liveride_content_links_color'); 
		if ($content_links_color != '#' && $content_links_color != '') { ?>
		<?php _e('#wrapper #content a { color: '); ?><?php echo $content_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Sidebar links color
function liveride_get_sidebar_links_color() {
    $sidebar_links_color = get_option('liveride_sidebar_links_color'); 
		if ($sidebar_links_color != '#' && $sidebar_links_color != '') { ?>
		<?php _e('#wrapper #container #sidebar a { color: '); ?><?php echo $sidebar_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Footer links color
function liveride_get_footer_links_color() {
    $footer_links_color = get_option('liveride_footer_links_color'); 
		if ($footer_links_color != '#' && $footer_links_color != '') { ?>
		<?php _e('#wrapper #footer .footer-signature a { color: '); ?><?php echo $footer_links_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu links color
function liveride_get_main_header_menu_color() {
    $main_header_menu_color = get_option('liveride_main_header_menu_color'); 
		if ($main_header_menu_color != '#' && $main_header_menu_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box a, #wrapper #left-sidebar .menu-box a:visited { color: '); ?><?php echo $main_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu links hover color
function liveride_get_main_header_menu_hover_color() {
    $main_header_menu_hover_color = get_option('liveride_main_header_menu_hover_color'); 
		if ($main_header_menu_hover_color != '#' && $main_header_menu_hover_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box a:hover, #wrapper #left-sidebar .menu-box :hover > a { color: '); ?><?php echo $main_header_menu_hover_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu links hover background color
function liveride_get_main_header_menu_hover_background_color() {
    $main_header_menu_hover_background_color = get_option('liveride_main_header_menu_hover_background_color'); 
		if ($main_header_menu_hover_background_color != '#' && $main_header_menu_hover_background_color != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box a:hover, #wrapper #left-sidebar .menu-box :hover > a { background-color: '); ?><?php echo $main_header_menu_hover_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Active Menu links color
function liveride_get_active_main_header_menu_color() {
    $active_main_header_menu_color = get_option('liveride_active_main_header_menu_color');
    if ($active_main_header_menu_color != '#' && $active_main_header_menu_color != '') { ?>
		<?php _e('html #wrapper #left-sidebar .menu-box .current-menu-item > a, html #wrapper #left-sidebar .menu-box .current-menu-ancestor > a, html #wrapper #left-sidebar .menu-box .current_page_item > a, html #wrapper #left-sidebar .menu-box .current-page-ancestor > a { color: '); ?><?php echo $active_main_header_menu_color ?><?php _e('; }'); ?>
<?php } 
}

// Active Menu links background color
function liveride_get_active_main_header_menu_background_color() {
    $active_main_header_menu_background_color = get_option('liveride_active_main_header_menu_background_color');
    if ($active_main_header_menu_background_color != '#' && $active_main_header_menu_background_color != '') { ?>
		<?php _e('html #wrapper #left-sidebar .menu-box .current-menu-item > a, html #wrapper #left-sidebar .menu-box .current-menu-ancestor > a, html #wrapper #left-sidebar .menu-box .current_page_item > a, html #wrapper #left-sidebar .menu-box .current-page-ancestor > a { background-color: '); ?><?php echo $active_main_header_menu_background_color ?><?php _e('; }'); ?>
<?php } 
}

// Menu font
function liveride_get_menu_font() {
    $menufont = get_option('liveride_menu_google_fonts'); 
		if ($menufont != 'default' && $menufont != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box ul li a { font-family: "'); ?><?php echo $menufont ?><?php _e('", Arial, Helvetica, sans-serif; }'); ?>
<?php } 
}

// Menu font size
function liveride_get_menu_font_size() {
    $menufont_size = get_option('liveride_menu_google_fonts_size'); 
		if ($menufont_size != '14' && $menufont_size != '') { ?>
		<?php _e('#wrapper #left-sidebar .menu-box ul li a { font-size: '); ?><?php echo $menufont_size ?><?php _e('px; }'); ?>
<?php } 
}

// User defined CSS.
function liveride_get_own_css() {
    $own_css = get_option('liveride_own_css'); 
		if ($own_css != '') { ?>
		<?php echo esc_attr($own_css); ?>
<?php } 
}

// Display custom CSS.
function liveride_custom_styles() { ?>
<?php echo ("<style type='text/css'>"); ?>
<?php liveride_get_own_css(); ?>
<?php liveride_display_sidebar(); ?>
<?php liveride_left_sidebar_position(); ?>
<?php liveride_display_meta_post_entry(); ?>
<?php liveride_get_left_sidebar_background_color(); ?>
<?php liveride_get_main_menu_links_border_color(); ?>
<?php liveride_get_main_submenu_background_color(); ?>
<?php liveride_get_main_submenu_border_color(); ?>
<?php liveride_get_main_submenu_hover_color(); ?>
<?php liveride_get_author_comments_background_color(); ?>
<?php liveride_get_sticky_post_background_color(); ?>
<?php liveride_get_posts_thumbnail_background_color(); ?>
<?php liveride_get_highlight_background_color(); ?>
<?php liveride_get_footer_background_color(); ?>
<?php liveride_get_searchform_border_color(); ?>
<?php liveride_get_searchform_button_background_color(); ?>
<?php liveride_get_searchform_button_hover_color(); ?>
<?php liveride_get_form_fields_background_color(); ?>
<?php liveride_get_form_fields_border_color(); ?>
<?php liveride_get_form_buttons_background_color(); ?>
<?php liveride_get_form_buttons_hover_color(); ?>
<?php liveride_get_table_headers_background_color(); ?>
<?php liveride_get_body_font(); ?>
<?php liveride_get_body_google_fonts_size(); ?>
<?php liveride_get_headings_google_fonts(); ?>
<?php liveride_get_headings_google_fonts_size(); ?>
<?php liveride_get_site_title_color(); ?>
<?php liveride_get_site_title_hover_color(); ?>
<?php liveride_get_description_font(); ?>
<?php liveride_get_description_font_size(); ?>
<?php liveride_get_main_headlines_background_color(); ?>
<?php liveride_get_main_headlines_color(); ?>
<?php liveride_get_breadcrumb_background_color(); ?>
<?php liveride_get_headlines_font(); ?>
<?php liveride_get_headline_h1_size(); ?>
<?php liveride_get_headline_h2_size(); ?>
<?php liveride_get_headline_h3_size(); ?>
<?php liveride_get_headline_h4_size(); ?>
<?php liveride_get_headline_h5_size(); ?>
<?php liveride_get_headline_h6_size(); ?>
<?php liveride_get_headline_box_google_fonts(); ?>
<?php liveride_get_homepage_headlines_color(); ?>
<?php liveride_get_headline_box_google_fonts_size(); ?>
<?php liveride_get_postentry_font(); ?>
<?php liveride_get_postentry_font_size(); ?>
<?php liveride_get_postentry_color(); ?>
<?php liveride_get_postentry_hover_color(); ?>
<?php liveride_get_sidebar_widget_font(); ?>
<?php liveride_get_sidebar_widget_font_size(); ?>
<?php liveride_get_sidebar_widget_border_color(); ?>
<?php liveride_get_sidebar_text_color(); ?>
<?php liveride_get_footer_widget_font(); ?>
<?php liveride_get_footer_widget_font_size(); ?>
<?php liveride_get_footer_widget_border_color(); ?>
<?php liveride_get_footer_text_color(); ?>
<?php liveride_get_content_links_color(); ?>
<?php liveride_get_sidebar_links_color(); ?>
<?php liveride_get_footer_links_color(); ?>
<?php liveride_get_main_header_menu_color(); ?>
<?php liveride_get_main_header_menu_hover_color(); ?>
<?php liveride_get_main_header_menu_hover_background_color(); ?>
<?php liveride_get_active_main_header_menu_color(); ?>
<?php liveride_get_active_main_header_menu_background_color(); ?>
<?php liveride_get_menu_font(); ?>
<?php liveride_get_menu_font_size(); ?>
<?php echo ("</style>"); ?>
<?php
} 
add_action('wp_enqueue_scripts', 'liveride_custom_styles');	?>