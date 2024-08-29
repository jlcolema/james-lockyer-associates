<?php
/**
 * Framework options.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/   
      
$naturespace_options = array (

array( "name" => $naturespace_themename ." Options",
	"type" => "title"),

array( "type" => "open"),

// Start Tabs
array( "name" => "Start Tabs",
		"type" => "tabs-open",
		"icon" => "layout"),

	// Home
	array( "name" => "Welcome",
			"id" => "tab_menu_0",
			"type" => "tab",
			"icon" => "layout",
			"class" => " selected first"),
	
	// General Settings
	array( "name" => "General Settings",
			"id" => "tab_menu_1",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
      
	// Header Settings
	array( "name" => "Header Settings",
			"id" => "tab_menu_2",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
      
	// Posts/Pages Settings
	array( "name" => "Posts/Pages Settings",
			"id" => "tab_menu_3",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
      
  // Homepage Settings
	array( "name" => "Post Entries Settings",
			"id" => "tab_menu_4",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
		
	// Colors
	array( "name" => "Colors",
			"id" => "tab_menu_5",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
      
	// Fonts
	array( "name" => "Fonts",
			"id" => "tab_menu_6",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
	
	// Social Networking Tab
	array( "name" => "Social Networking",
			"id" => "tab_menu_7",
			"type" => "tab",
			"icon" => "layout",
			"class" => ""),
	
	// Other settings Tab
	array( "name" => "Other Settings",
			"type" => "tab",
			"id" => "tab_menu_8",
			"class" => ""),
	

// General setting Tab
array( "name" => "Close Tabs",
		"type" => "tabs-close",
		"icon" => "layout"),


array( "name" => "Start Container",
		"type" => "container-open",
		"icon" => "layout"),

// Home Container 0
array( "name" => "tab_content_0",
		"type" => "tabcontent-open",
		"display" => "block",
		"icon" => "layout"),

	// Home
	array( "name" => "Welcome to NatureSpace!",
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => "First of all, I would like to thank you for choosing NatureSpace! I firmly believe that you will be satisfied with this theme. In case of any problems or doubts, you can use the <a href='http://www.tomastoman.cz/support' target='_blank'>NatureSpace Official Support</a> (in English or Czech).",
		"type" => "infotext"),
	
		array( "name" => "About NatureSpace",
		"type" => "heading",
		"icon" => "layout"),
	
	array("name" => "NatureSpace is an easily customizable WordPress multipurpose theme. It is a fully responsive and Retina ready theme that allows for easy viewing on any device.",
		"type" => "infotext"),

array( "name" => "tab_content_0",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Home

// General setting Tab Container 1
array( "name" => "tab_content_1",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	// General settings
	array( "name" => "General Settings",
		"type" => "heading",
		"icon" => "layout"),		

	array( "name" => "Color Scheme",
		"desc" => "Select one of the preconfigured Color Schemes. You can create your own color scheme under Colors tab.",
		"id" => $naturespace_shortname."_css",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Green (default)',
							'b' => 'Blue',
							'c' => 'Orange',
							'd' => 'Pink',
              'e' => 'Purple',
              'f' => 'Red',
              'g' => 'Turquoise',),
		"type" => "select"),
    
  array( "name" => "Layout Style",
		"desc" => "Choose the layout style of your website.",
		"id" => $naturespace_shortname."_layout_width",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Boxed',
							'b' => 'Wide'),
		"type" => "select"),
    
  array( "name" => "Display Breadcrumb Navigation",
		"desc" => "Set the Breadcrumb Navigation to be visible or not. The Breadcrumb NavXT plugin has to be installed for displaying it.",
		"id" => $naturespace_shortname."_display_breadcrumb",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
	array( "name" => "Favicon URL",
		"desc" => "Upload your own favicon image (16x16px) or directly insert its URL. You can create your own favicon using <a title='Online Favicon Generator' href='http://www.favicon.cc/' target='_blank'>Favicon generator</a>.",
		"id" => $naturespace_shortname."_favicon_url",
		"type" => "upload-favicon",
		"std" => ""),	
    
	array( "name" => "Sidebar Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Display Sidebar on Posts/Pages",
		"desc" => "Set the right sidebar to be visible or not on the single posts and pages.",
		"id" => $naturespace_shortname."_display_sidebar",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Display Sidebar on Archives",
		"desc" => "Set the right sidebar to be visible or not on the archive pages (including all archives, homepage and search results).",
		"id" => $naturespace_shortname."_display_sidebar_archives",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
array( "name" => "tab_content_1",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close General settings
   	

// Open Header settings
  array( "name" => "tab_content_2",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),
    
	array( "name" => "Header Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Header Layout",
		"desc" => "Set the layout of your Site Title and the Main Header Menu.",
		"id" => $naturespace_shortname."_header_layout",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Wide',
							'b' => 'Centered'),
		"type" => "select"),
    
  array( "name" => "Display Header Image",
		"desc" => "Set the <a href='themes.php?page=custom-header'>Header Image</a> to be visible on all pages or only on the homepage.",
		"id" => $naturespace_shortname."_display_header_image",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Everywhere',
							'b' => 'Only on Homepage',
              'c' => 'Everywhere except Homepage'),
		"type" => "select"),
    
  array( "name" => "Title Box/Logo width",
		"desc" => "Set the width of your Site Title or Logo in header (percentages due to the page width). This option is needed only for the Wide Header Layout.",
		"id" => $naturespace_shortname."_page_title_width",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => '50%',
							'b' => '0%',
              'c' => '10%',
              'd' => '20%',
              'e' => '30%',
              'f' => '40%',
              'g' => '60%',
              'h' => '70%',
              'i' => '80%',
              'j' => '90%',
              'k' => '100%'),
		"type" => "select"),
    
  array( "name" => "Menu Box width",
		"desc" => "Set the width of your Main Header Menu (percentages due to the page width). This option is needed only for the Wide Header Layout.",
		"id" => $naturespace_shortname."_header_menu_width",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => '50%',
							'b' => '0%',
              'c' => '10%',
              'd' => '20%',
              'e' => '30%',
              'f' => '40%',
              'g' => '60%',
              'h' => '70%',
              'i' => '80%',
              'j' => '90%',
              'k' => '100%'),
		"type" => "select"),
    
	array( "name" => "Logo URL",
		"desc" => "Upload your own logo in .jpg, .gif or .png format or directly insert its URL. The logo will automatically replace the Site Title.",
		"id" => $naturespace_shortname."_logo_url",
		"type" => "upload-logo",
		"std" => ""),
  
  // Carousel box  
	array( "name" => "Carousel Box Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Display Carousel Box",
		"desc" => "Set the Carousel Box to be visible or not in your header.",
		"id" => $naturespace_shortname."_display_carousel",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Carousel Content",
		"desc" => "Set what to display in the Carousel Box. You can set the Carousel Menu in <a href='nav-menus.php'>Menus</a> panel.",
		"id" => $naturespace_shortname."_carousel_content",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Latest Posts',
							'b' => 'Carousel Menu'),
		"type" => "select"),
    
  array( "name" => "Number of Latest Posts in Carousel",
	  "desc" => "Fill here the number of latest posts to be displayed in the Carousel Box.",
		"id" => $naturespace_shortname."_carousel_posts_number",
		"type" => "text",
		"std" => "6"), 
    
  // Contact information  
	array( "name" => "Contact Information",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Postal Address",
	  "desc" => "Fill here your postal address to be displayed in header.",
		"id" => $naturespace_shortname."_header_address",
		"type" => "text",
		"std" => ""),
    
  array( "name" => "Email Address",
	  "desc" => "Fill here your email address to be displayed in header.",
		"id" => $naturespace_shortname."_header_email",
		"type" => "text",
		"std" => ""),
    
  array( "name" => "Phone Number",
	  "desc" => "Fill here your phone number to be displayed in header.",
		"id" => $naturespace_shortname."_header_phone",
		"type" => "text",
		"std" => ""),
    
  array( "name" => "Skype Name",
	  "desc" => "Fill here your Skype name to be displayed in header.",
		"id" => $naturespace_shortname."_header_skype",
		"type" => "text",
		"std" => ""),
    
	// Homepage header    
  array( "name" => "Homepage Header Image",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Header Image Headline",
	  "desc" => "Fill here the headline to be displayed in the Header Image.",
		"id" => $naturespace_shortname."_header_image_headline",
		"type" => "text",
		"std" => ""),
    
  array( "name" => "Header Image Link URL",
	   "desc" => "Fill here the URL address of a link to be displayed in the Header Image.",
		"id" => $naturespace_shortname."_header_image_link_url",
		"type" => "text",
		"std" => ""),
    
  array( "name" => "Header Image Link Text",
	   "desc" => "Fill here the text of a link to be displayed in the Header Image.",
		"id" => $naturespace_shortname."_header_image_link_text",
		"type" => "text",
		"std" => ""),
    
array( "name" => "tab_content_2",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Header settings
 
  
// Open Posts/Pages settings
  array( "name" => "tab_content_3",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),
    
	array( "name" => "Post Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Display Featured Image on single posts",
		"desc" => "Set the Featured Image to be visible or not on the single posts.",
		"id" => $naturespace_shortname."_display_image_post",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Display Meta Box on single posts",
		"desc" => "Set the Meta Box (with publish date, author, category and tags) to be visible or not on the single posts.",
		"id" => $naturespace_shortname."_display_meta_post",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
	array( "name" => "Next/Previous Post Navigation",
		"desc" => "This feature gives the possibility to easy navigate between the posts in chronological order.",
		"id" => $naturespace_shortname."_next_preview_post",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Display Related Posts on single posts",
		"desc" => "Set the Related Posts box to be visible or not on the single posts.",
		"id" => $naturespace_shortname."_display_related_posts",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Related Posts headline",
	"desc" => "Fill here the headline of Related Posts box.",
		"id" => $naturespace_shortname."_related_posts_headline",
		"type" => "text",
		"std" => "Related Posts"),
    
  array( "name" => "Number of Related Posts",
	"desc" => "Fill here the number of related posts to be displayed on the single posts.",
		"id" => $naturespace_shortname."_related_posts_number",
		"type" => "text",
		"std" => "6"),
    
  array( "name" => "Related Posts format",
		"desc" => "Set here if you want to display the Related Posts as a Slider or as an Unordered List.",
		"id" => $naturespace_shortname."_related_posts_format",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Slider',
							'b' => 'Unordered List'),
		"type" => "select"),

// PAGES
	array( "name" => "Page Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Display Featured Image on pages",
		"desc" => "Set the Featured Image to be visible or not on pages.",
		"id" => $naturespace_shortname."_display_image_page",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
array( "name" => "tab_content_3",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Posts/Pages settings


// Open Post Entries settings
array( "name" => "tab_content_4",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),
    
	// Post Entries   
  array( "name" => "Post Entries Settings",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Post Entries Format",
		"desc" => "Set the way how the post entries to be displayed.",
		"id" => $naturespace_shortname."_post_entry_format",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'One Column',
              'b' => 'Grid - Masonry'),
		"type" => "select"),
    
  array( "name" => "Number of Columns in the Grid",
		"desc" => "Set the number of columns to be displayed in the Grid - Masonry format.",
		"id" => $naturespace_shortname."_grid_columns",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => '3',
              'b' => '4',
              'c' => '2'),
		"type" => "select"),
    
  array( "name" => "Display Meta Box on Post Entries",
		"desc" => "Set the Meta Box (with publish date, author, comments, category and tags) to be visible or not on the post entries.",
		"id" => $naturespace_shortname."_display_meta_post_entry",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),  
    
  array( "name" => "Featured Images Hover Effect",
		"desc" => "Select an effect for the Featured Images after placing the mouse cursor on them.",
		"id" => $naturespace_shortname."_featured_image_hover",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'None',
              'b' => 'Fade',
              'c' => 'Focus',
              'd' => 'Shadow',
              'e' => 'Tilt'),
		"type" => "select"),
    
  array( "name" => "Featured Images Size",
		"desc" => "Set a size of the Featured Images in the One Column layout.",
		"id" => $naturespace_shortname."_featured_image_size",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Small',
              'b' => 'Large'),
		"type" => "select"),
    
  array( "name" => "Content/Excerpt Displaying",
		"desc" => "Select whether you want to display the full content or the post excerpts on your archive pages (including all archives, homepage and search results).",
		"id" => $naturespace_shortname."_content_archives",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Excerpt',
							'b' => 'Content',),
		"type" => "select"),
    
  array( "name" => "Blog Page",
		"type" => "heading",
		"icon" => "layout"),
  
  array( "name" => "Display Site Description",
		"desc" => "Set the Site Description to be visible or not on your Latest Posts page.",
		"id" => $naturespace_shortname."_display_site_description",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),

array( "name" => "tab_content_4",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Post Entries settings


// Colors Tab Container
array( "name" => "tab_content_5",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),
        
  array( "name" => "Color Settings",
		"type" => "heading",
		"icon" => "layout"),
    
	array("name" => "Since version 2.0.0, the Color settings have been moved to the <a href='customize.php'>Customizer</a>.",
		"type" => "infotext"),
	
	array( "name" => "tab_content_5",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Color settings

// Open Fonts
array( "name" => "tab_content_6",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	array( "name" => "Font Settings",
		"type" => "heading",
		"icon" => "layout"),		
    
	array("name" => "Since version 2.0.0, the Font settings have been moved to the <a href='customize.php'>Customizer</a>.",
		"type" => "infotext"),	

array( "name" => "tab_content_6",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close fonts

// Open Social Networking
array( "name" => "tab_content_7",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	array( "name" => "Share Buttons",
		"type" => "heading",
		"icon" => "layout"),
    
  array( "name" => "Share Buttons Language",
		"desc" => "Set here a language of the Facebook Like and Share buttons.",
		"id" => $naturespace_shortname."_share_buttons_language",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'en_US',
							'b' => 'cs_CZ',
              'c' => 'da_DK',
              'd' => 'de_DE',
              'e' => 'el_GR',
              'f' => 'es_ES',
              'g' => 'fr_FR', 
              'h' => 'hi_IN',
              'i' => 'it_IT',
              'j' => 'nl_NL',
              'k' => 'pl_PL',
              'l' => 'ru_RU',
              'm' => 'sk_SK',
              'n' => 'tr_TR'),
		"type" => "select"),
	
	array( "name" => "Share Buttons on Pages",
		"desc" => "This shows Facebook, Twitter and Google '+1' share buttons below your pages content.",
		"id" => $naturespace_shortname."_share_buttons_page",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
	
	array( "name" => "Share Buttons on Posts",
		"desc" => "This shows Facebook, Twitter and Google '+1' share buttons below your posts content.",
		"id" => $naturespace_shortname."_share_buttons_post",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
	array( "name" => "Share Buttons on Post Entries",
		"desc" => "This shows Facebook, Twitter and Google '+1' share buttons on the Post Entries (on homepage/archive pages). Note: share buttons are displayed only in the One Column layout, not in the Grid - Masonry layout.",
		"id" => $naturespace_shortname."_share_buttons_post_entry",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),
    
  array( "name" => "Share Buttons on Products",
		"desc" => "This shows Facebook, Twitter and Google '+1' share buttons on the individual WooCommerce Products.",
		"id" => $naturespace_shortname."_share_buttons_products",
		"std" => "",
		"class" => "hidden",
		"options" => array(	'a' => 'Display',
							'b' => 'Hide'),
		"type" => "select"),

array( "name" => "tab_content_7",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Social Networking


// Open Other settings
array( "name" => "tab_content_8",
		"type" => "tabcontent-open",
		"display" => "none",
		"icon" => "layout"),

	array( "name" => "Other Settings",
		"type" => "heading",
		"icon" => "layout"),
		

array( "type" => "infotext",
		"name" => "OPTIONS: <a href='widgets.php'>Widgets</a> | <a href='nav-menus.php'>Menus</a> | <a href='themes.php?page=custom-header'>Header Image</a> | <a href='themes.php?page=custom-background'>Background Settings</a>"),
    
  array( "name" => "Custom CSS",
		"desc" => "Fill here your own cascading style sheet information (CSS).<br />Example: #content p {font-size: 15px;} #sidebar p {font-size: 14px;}",
		"id" => $naturespace_shortname."_own_css",
		"type" => "textarea",
		"std" => ""),
    
  array( "name" => "Custom JavaScript - Header",
		"desc" => "Fill here your custom JavaScript code which will appear in the 'head' section. <br />Please do not forget to wrap your JavaScript code between the &lt;script type='text/javascript'&gt;&lt;/script&gt; tags!",
		"id" => $naturespace_shortname."_own_javascript_header",
		"type" => "textarea",
		"std" => ""),
    
  array( "name" => "Custom JavaScript - Footer",
		"desc" => "Fill here your custom JavaScript code which will appear just before the closing 'body' tag. <br />Please do not forget to wrap your JavaScript code between the &lt;script type='text/javascript'&gt;&lt;/script&gt; tags!",
		"id" => $naturespace_shortname."_own_javascript_footer",
		"type" => "textarea",
		"std" => ""),

array( "name" => "tab_content_8",
		"type" => "tabcontent-close",
		"icon" => "layout"),
// Close Other settings

array("name" => "Close Container",
		"type" => "container-close",
		"icon" => "layout"),

array( "type" => "close") 
); 


add_action('admin_head', 'naturespace_admin_css');

function naturespace_admin_css() { ?>
     
	<script language="JavaScript">
		jQuery.noConflict();
		jQuery(document).ready(function($) {
	
		$(".tabs .tab[id^=tab_menu]").click(function() {
			var curMenu=$(this);
			$(".tabs .tab[id^=tab_menu]").removeClass("selected");
			curMenu.addClass("selected");
	
			var index=curMenu.attr("id").split("tab_menu_")[1];
			$(".curvedContainer .tabcontent").css("display","none");
			$(".curvedContainer #tab_content_"+index).css("display","block");
		});
	});
	</script>

<?php }
function naturespace_add_admin() {
	global $naturespace_options; global $naturespace_themename; global $naturespace_shortname;
	if ( isset ( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {
		if ( isset ($_REQUEST['action']) && ( 'save' == $_REQUEST['action'] ) ){
      if ( !empty($_POST) && check_admin_referer('naturespace_save_options','naturespace_save_options_field' ) ) {
			foreach ( $naturespace_options as $value ) {
				if ( array_key_exists('id', $value) ) {
					if ( isset( $_REQUEST[ $value['id'] ] ) ) {
						update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
					}
					else {
						delete_option( $value['id'] );
					}
				}
			}
			header("Location: themes.php?page=".basename(__FILE__)."&saved=true");
		}
    }else if ( isset ($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ) ) {
			foreach ($naturespace_options as $value) {
				if ( array_key_exists('id', $value) ) {
					delete_option( $value['id'] );
				}
			}
			header("Location: themes.php?page=".basename(__FILE__)."&reset=true");
		}
	}
	add_theme_page($naturespace_themename." Options", 'Theme Options', 'edit_theme_options', 'fw-options.php', 'naturespace_admin', '', '1');
}



function naturespace_admin() {
	global $naturespace_themename, $naturespace_shortname, $naturespace_options, $naturespace_themever, $fwver, $naturespace_manualurl; 
	if (isset($_REQUEST["saved"]) && !empty($_REQUEST["saved"])) echo '<div id="message" class="updated fade"><p><strong>'.$naturespace_themename.' settings saved.</strong></p></div>';
	if (isset($_REQUEST["reset"]) && !empty($_REQUEST["reset"])) echo '<div id="message" class="error fade"><p><strong>'.$naturespace_themename.' '.__( 'settings reset.', 'naturespace' ).'</strong></p></div>';
  wp_enqueue_style('naturespace-framework-style', get_template_directory_uri() . '/functions/be/css.css');
?>

	<div id="wrap_fm"><!-- [ Header ]-->
		<div class="header_fm">
			<div class="logo_fm">Theme Options</div>
			<div class="frame_vers_fm">
				<div class="theme_version_fm"><?php echo $naturespace_themename;?> <strong><?php echo $naturespace_themever;?></strong></div>
				<div class="clear"></div>
			</div>
		</div>

		<!-- [ Top Menu ]-->
		<div class="top_menu_fm">
			<a title="Theme Documentation" target="_blank"class="doc_fm" href="<?php echo $naturespace_manualurl; ?>">Documentation</a><a title="Theme Support" target="_blank" class="support_fm" href="http://www.tomastoman.cz/support">Support</a>
		</div>


	<form method="post">
	<?php 
	foreach ($naturespace_options as $value) {
	switch ( $value['type'] ) {
	case "open":
	?> 
	<?php break; case "title": ?> 

	<!-- [ Body ]-->
	<div id="wrap_body_fm">
	<div class="tabscontainer">


	<?php break; case "close": ?> 

	<!-- start form -->
	<div class="col_100">
		<div class="col_50">
			<input id="submit" class="button-primary" name="save" type="submit" value="Save all changes" /> <input type="hidden" name="action" value="save" />
      <?php wp_nonce_field( 'naturespace_save_options','naturespace_save_options_field' ); ?>
			</form>
		</div>
	 	<div class="col_50">
		 	<form method="post">
				<input class="reset" name="reset" type="submit" value="Reset to default settings" />
				<input type="hidden" name="action" value="reset" />
			</form>
		</div>	
		<div class="clear"></div>
	</div>
	<!-- end form -->
</div></div>



<?php break;case 'text': ?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	<div class="input_fm"><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?>" /></div>
	<div class="desc_fm"><small><?php echo $value['desc']; ?></small></div>
  
<?php break;case 'upload-favicon': ?>
<?php wp_enqueue_media();
wp_enqueue_script('naturespace-my-admin-js-favicon', get_template_directory_uri() . '/js/custom-uploader-favicon.js', array('jquery')); ?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
  <input class="upload_image" type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?>" /> 
  <input class="upload_image_button button" type="button" value="Upload Image" />
	<div class="desc_fm"><small><?php echo $value['desc']; ?></small></div>
  
<?php break;case 'upload-logo': ?>
<?php wp_enqueue_script('naturespace-my-admin-js-logo', get_template_directory_uri() . '/js/custom-uploader-logo.js', array('jquery')); ?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
  <input class="upload_logo" type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?>" /> 
  <input class="upload_logo_button button" type="button" value="Upload Image" />
	<div class="desc_fm"><small><?php echo $value['desc']; ?></small></div>

<?php break; case 'textarea':?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	<div class="input_fm"><textarea name="<?php echo $value['id']; ?>" style="height: 100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] )); } else { echo $value['std']; } ?></textarea></div>
	<div class="desc_fm"><small><?php echo $value['desc']; ?></small></div>

<?php break; case 'select': ?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	<div class="input_fm"><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?>
	<option <?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	<?php } ?>
	</select></div>
	<div class="desc_fm"><small><?php echo $value['desc']; ?></small></div>
	
	<?php break; case "heading":?>
	<h1><?php echo $value['name']; ?></h1>
	
	<?php break; case "subheader":?>
	<div class="name_fm"><?php echo $value['name']; ?></div>
	
  <?php break; case "infotext":?>
	<div class="infotext"><?php echo $value['name']; ?></div>
	
	<?php break; case "paragraph":?>
	<div class="desc_fm"><small><?php echo $value['name']; ?></small></div>
  	
	<?php break; case "tabs-open":?>	
	<div class="tabs">
	
	<?php break; case "tabs-close":?>	
	</div>	
	
	<?php break; case "tab":?>	
	<div class="tab<?php echo $value['class']; ?>" id="<?php echo $value['id']; ?>">
	<div class="link"><?php echo $value['name']; ?></div>
	<div class="arrow"></div>
	</div>
 	
 	<?php break; case "container-open":?>	
	<div class="curvedContainer">
 	
 	<?php break; case "container-close":?>	
	</div>	
 	
	<?php break; case "tabcontent-open":?>	
	<div class="tabcontent" id="<?php echo $value['name']; ?>" style="display:<?php echo $value['display']; ?>" >
	
	<?php break; case "tabcontent-close":?>	
	</div>
	
 	
<?php break;

}
}
?>

<?php
}

add_action('admin_menu', 'naturespace_add_admin');
?>