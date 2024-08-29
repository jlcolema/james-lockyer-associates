<?php
/**
 * MeadowHill functions and definitions.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/

/**
 * MeadowHill theme variables.
 *  
*/    
$meadowhill_themename = "MeadowHill Premium";							//Theme Name
$meadowhill_themever = "1.2.1";										//Theme version
$meadowhill_shortname = "meadowhill";							//Shortname 
$meadowhill_manualurl = get_template_directory_uri() . '/docs/documentation.html';	//Manual Url
// Set path to MeadowHill Framework and theme specific functions
$meadowhill_be_path = get_template_directory() . '/functions/be/';									//BackEnd Path
$meadowhill_fe_path = get_template_directory() . '/functions/fe/';									//FrontEnd Path 
$meadowhill_be_pathimages = get_template_directory_uri() . '/functions/be/images';		//BackEnd Path
$meadowhill_fe_pathimages = get_template_directory_uri() . '';	//FrontEnd Path
//Include Framework [BE] 
require_once ($meadowhill_be_path . 'fw-setup.php');		   // Init 
require_once ($meadowhill_be_path . 'fw-options.php');	 	 // Framework Init  
// Include Theme specific functionality [FE] 
require_once ($meadowhill_fe_path . 'headerdata.php');		 // Include css and js
require_once ($meadowhill_fe_path . 'library.php');	       // Include library, functions
require_once ($meadowhill_fe_path . 'social-widget.php');	 // Social Widget
require_once ($meadowhill_fe_path . 'twitter-widget.php'); // Twitter Widget
require_once ($meadowhill_fe_path . 'facebook-widget.php');// Facebook Widget
require_once ($meadowhill_fe_path . 'google-map-shortcode.php');// Google Map Shortcode
require_once ($meadowhill_fe_path . '/wp-display-header/wp-display-header.php');// Google Map Shortcode

/**
 * MeadowHill theme basic setup.
 *  
*/
function meadowhill_setup() {
	// Makes MeadowHill available for translation.
	load_theme_textdomain( 'meadowhill', get_template_directory() . '/languages' );
  // This theme styles the visual editor to resemble the theme style.
  add_editor_style( 'editor-style.css' );
	// Adds RSS feed links to <head> for posts and comments.  
	add_theme_support( 'automatic-feed-links' );
	// This theme supports custom background color.
	$defaults = array(
	'default-color'          => '', 
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '' );  
  add_theme_support( 'custom-background', $defaults );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 9999 );
  add_image_size( 'portfolio-thumb', 344, 252, true );
  add_image_size( 'fullwidth-thumb', 1100, 9999 );
  // This theme uses a custom header background image.
  $args = array(
	'flex-width'     => true,
	'flex-height'    => true,
	'default-image'  => get_template_directory_uri() . '/images/meadow-hill.jpg',
  'random-default' => true,
  'header-text'    => false,
  'uploads'        => true,);
  add_theme_support( 'custom-header', $args );
  add_theme_support( 'title-tag' );
  global $content_width;
  if ( ! isset( $content_width ) ) { $content_width = 750; }
}
add_action( 'after_setup_theme', 'meadowhill_setup' );

/**
 * Enqueues scripts and styles for front-end.
 *
*/
function meadowhill_scripts_styles() {
	global $wp_styles;
	// Adds JavaScript
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'meadowhill-placeholders', get_template_directory_uri() . '/js/placeholders.js', array(), '2.1.0', true );
    wp_enqueue_script( 'meadowhill-scroll-to-top', get_template_directory_uri() . '/js/scroll-to-top.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'meadowhill-selectnav', get_template_directory_uri() . '/js/selectnav.js', array(), '0.1', true );
    wp_enqueue_script( 'meadowhill-responzive', get_template_directory_uri() . '/js/responzive.js', array(), '1.0', true );
	// Loads the main stylesheet.
	  wp_enqueue_style( 'meadowhill-style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'meadowhill_scripts_styles' );

/**
 * Backwards compatibility for older WordPress versions which do not support the Title Tag feature.
 *  
*/
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function meadowhill_wp_title( $title, $sep ) {
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	return $title;
}
add_filter( 'wp_title', 'meadowhill_wp_title', 10, 2 );
}

/**
 * Register our menus.
 *
 */
function meadowhill_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'meadowhill' ),
      'sidebar-menu' => __( 'Sidebar Menu', 'meadowhill' )
    )
  );
}
add_action( 'after_setup_theme', 'meadowhill_register_my_menus' );

/**
 * Register our sidebars and widgetized areas.
 *
*/
function meadowhill_widgets_init() {
  register_sidebar( array(
		'name' => __( 'Main Sidebar', 'meadowhill' ),
		'id' => 'sidebar-1',
		'description' => __( 'Right sidebar which appears on posts and pages.', 'meadowhill' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="sidebar-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer left widget area', 'meadowhill' ),
		'id' => 'sidebar-2',
		'description' => __( 'Left column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer middle widget area', 'meadowhill' ),
		'id' => 'sidebar-3',
		'description' => __( 'Middle column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer right widget area', 'meadowhill' ),
		'id' => 'sidebar-4',
		'description' => __( 'Right column with widgets in footer.', 'meadowhill' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-headline">',
		'after_title' => '</p>',
	) );
  register_sidebar( array(
		'name' => __( 'Footer notices', 'meadowhill' ),
		'id' => 'sidebar-5',
		'description' => __( 'The line for copyright and other notices below the footer widget areas. Insert here one Text widget. The "Title" field at this widget should stay empty.', 'meadowhill' ),
		'before_widget' => '<div class="footer-signature"><div class="footer-signature-content">',
		'after_widget' => '</div></div>',
		'before_title' => '',
		'after_title' => '',
	) );
  register_sidebar( array(
		'name' => __( 'About Section on homepage', 'meadowhill' ),
		'id' => 'sidebar-6',
		'description' => __( 'Insert here as many Text widgets as you want for displaying information in About Section on your homepage.', 'meadowhill' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="section-headline">',
		'after_title' => '</h2>',
	) );
  register_sidebar( array(
		'name' => __( 'Informational Section on homepage', 'meadowhill' ),
		'id' => 'sidebar-7',
		'description' => __( 'Insert here as many Text widgets as you want for displaying information in Informational Section on your homepage.', 'meadowhill' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="section-headline">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'meadowhill_widgets_init' );

/**
 * Short title for Portfolio Items.
 *
*/
function meadowhill_short_title() {
$title = get_the_title();
$limit = "28";
$pad = "...";
if( strlen( $title ) <= $limit) {
echo esc_attr($title);
} else {
$title = substr( $title, 0, $limit ) . $pad;
echo esc_attr($title);
}
}

/**
 * Post excerpt settings.
 *
*/
function meadowhill_custom_excerpt_length( $length ) {
return 40;
}
add_filter( 'excerpt_length', 'meadowhill_custom_excerpt_length', 20 );
function meadowhill_new_excerpt_more( $more ) {
return '...';}
add_filter( 'excerpt_more', 'meadowhill_new_excerpt_more' );

if ( ! function_exists( 'meadowhill_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
*/
function meadowhill_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<div id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'meadowhill' ); ?></h3>
      <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'meadowhill' ),
	'next_text' => __( 'Next &rarr;', 'meadowhill' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
      </p>
		</div>
	<?php endif;
}
endif;

/**
 * Displays navigation to next/previous posts on single posts pages.
 *
*/
function meadowhill_prev_next($nav_id) { ?>
<?php $meadowhill_previous_post = get_adjacent_post( false, "", true );
$meadowhill_next_post = get_adjacent_post( false, "", false ); ?>
<div id="<?php echo $nav_id; ?>" class="navigation" role="navigation">
  <h3 class="navigation-headline section-heading"><?php _e( 'Post navigation', 'meadowhill' ); ?></h3>
<?php if ( !empty($meadowhill_previous_post) ) { ?>
	<p class="nav-previous"><a href="<?php echo esc_url(get_permalink($meadowhill_previous_post->ID)); ?>" title="<?php echo esc_attr($meadowhill_previous_post->post_title); ?>"><?php _e( '&larr; Previous post', 'meadowhill' ); ?></a></p>
<?php } if ( !empty($meadowhill_next_post) ) { ?>
	<p class="nav-next"><a href="<?php echo esc_url(get_permalink($meadowhill_next_post->ID)); ?>" title="<?php echo esc_attr($meadowhill_next_post->post_title); ?>"><?php _e( 'Next post &rarr;', 'meadowhill' ); ?></a></p>
<?php } ?>
</div>
<?php }

if ( ! function_exists( 'meadowhill_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
*/
function meadowhill_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'meadowhill' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'meadowhill' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<span><b class="fn">%1$s</b> %2$s</span>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span>' . __( '(Post author)', 'meadowhill' ) . '</span>' : ''
					);
					printf( '<time datetime="%2$s">%3$s</time>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						// translators: 1: date, 2: time
						sprintf( __( '%1$s at %2$s', 'meadowhill' ), get_comment_date(''), get_comment_time() )
					);
				?>
			</div><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'meadowhill' ); ?></p>
			<?php endif; ?>

			<div class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'meadowhill' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'meadowhill' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-## -->
	<?php
		break;
	endswitch;
}
endif;

/**
 * Custom Shortcodes.
 *
*/
function meadowhill_button_shortcode($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="custom-button" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode( 'button', 'meadowhill_button_shortcode' );
add_filter('widget_text', 'do_shortcode');

function meadowhill_centered_button_shortcode($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#'), $atts));
   return '<a class="centered-button" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode( 'centered-button', 'meadowhill_centered_button_shortcode' );

function meadowhill_table_shortcode($atts) {
    extract( shortcode_atts( array(
        'cols' => 'none',
        'data' => 'none',
    ), $atts ) );
    $cols = explode(',',$cols);
    $data = explode(',',$data);
    $total = count($cols);
    $output = '<table><tr>';
    foreach($cols as $col):
        $output .= '<th>'.$col.'</th>';
    endforeach;
    $output .= '</tr><tr>';
    $counter = 1;
    foreach($data as $datum):
        $output .= '<td>'.$datum.'</td>';
        if($counter%$total==0):
            $output .= '</tr>';
        endif;
        $counter++;
    endforeach;
        $output .= '</table>';
    return $output;
}
add_shortcode( 'table', 'meadowhill_table_shortcode' );

function meadowhill_image_shortcode($atts, $content = null){
return '<img src="'.$atts['src'].'" alt="" />';
}
add_shortcode('image','meadowhill_image_shortcode');

/**
 * Function for adding custom classes to the menu objects.
 *
*/
add_filter( 'wp_nav_menu_objects', 'meadowhill_filter_menu_class', 10, 2 );
function meadowhill_filter_menu_class( $objects, $args ) {

    $ids        = array();
    $parent_ids = array();
    $top_ids    = array();
    foreach ( $objects as $i => $object ) {

        if ( 0 == $object->menu_item_parent ) {
            $top_ids[$i] = $object;
            continue;
        }
 
        if ( ! in_array( $object->menu_item_parent, $ids ) ) {
            $objects[$i]->classes[] = 'first-menu-item';
            $ids[]          = $object->menu_item_parent;
        }
 
        if ( in_array( 'first-menu-item', $object->classes ) )
            continue;
 
        $parent_ids[$i] = $object->menu_item_parent;
    }
 
    $sanitized_parent_ids = array_unique( array_reverse( $parent_ids, true ) );
 
    foreach ( $sanitized_parent_ids as $i => $id )
        $objects[$i]->classes[] = 'last-menu-item';
 
    return $objects; 
}

/**
 * Include the TGM_Plugin_Activation class.
 *  
*/
require_once get_template_directory() . '/class-tgm-plugin-activation.php'; 
add_action( 'tgmpa_register', 'meadowhill_my_theme_register_required_plugins' );

function meadowhill_my_theme_register_required_plugins() {

$plugins = array(
    array(
			'name'     => 'Dagon Design Sitemap Generator',
			'slug'     => 'sitemap-generator',
			'source'   => get_template_directory_uri() . '/plugins/sitemap-generator.zip',
			'required' => false,
		),
	);
 
$config = array(
		'domain'       => 'meadowhill',
    'menu'         => 'install-my-theme-plugins',
		'strings'      	 => array(
		'page_title'             => __( 'Install Required Plugins', 'meadowhill' ),
		'menu_title'             => __( 'Install Plugins', 'meadowhill' ),
		'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', 'meadowhill' ),
		'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', 'meadowhill' ),
		'button'                 => __( 'Install %s Now', 'meadowhill' ),
		'installing'             => __( 'Installing Plugin: %s', 'meadowhill' ),
		'oops'                   => __( 'Something went wrong with the plugin API.', 'meadowhill' ), // */
		'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', 'meadowhill' ),
		'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'meadowhill' ),
		'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', 'meadowhill' ),
		'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'meadowhill' ),
		'return'                 => __( 'Return to Required Plugins Installer', 'meadowhill' ),
),
); 
meadowhill_tgmpa( $plugins, $config ); 
} 

/**
 * Shortcode for displaying lists of posts.
 *  
*/
add_shortcode( 'display-posts', 'meadowhill_display_posts_shortcode' );
function meadowhill_display_posts_shortcode( $atts ) {
	// Original Attributes, for filters
	$original_atts = $atts;
	// Pull in shortcode attributes and set defaults
	$atts = shortcode_atts( array(
		'author'              => '',
		'category'            => '',
		'date_format'         => '(n/j/Y)',
		'id'                  => false,
		'ignore_sticky_posts' => false,
		'image_size'          => false,
		'include_content'     => false,
		'include_date'        => false,
		'include_excerpt'     => false,
		'meta_key'            => '',
		'no_posts_message'    => '',
		'offset'              => 0,
		'order'               => 'DESC',
		'orderby'             => 'date',
		'post_parent'         => false,
		'post_status'         => 'publish',
		'post_type'           => 'post',
		'posts_per_page'      => '10',
		'tag'                 => '',
		'tax_operator'        => 'IN',
		'tax_term'            => false,
		'taxonomy'            => false,
		'wrapper'             => 'ul',
	), $atts );
	$author = sanitize_text_field( $atts['author'] );
	$category = sanitize_text_field( $atts['category'] );
	$date_format = sanitize_text_field( $atts['date_format'] );
	$id = $atts['id']; // Sanitized later as an array of integers
	$ignore_sticky_posts = (bool) $atts['ignore_sticky_posts'];
	$image_size = sanitize_key( $atts['image_size'] );
	$include_content = (bool)$atts['include_content'];
	$include_date = (bool)$atts['include_date'];
	$include_excerpt = (bool)$atts['include_excerpt'];
	$meta_key = sanitize_text_field( $atts['meta_key'] );
	$no_posts_message = sanitize_text_field( $atts['no_posts_message'] );
	$offset = intval( $atts['offset'] );
	$order = sanitize_key( $atts['order'] );
	$orderby = sanitize_key( $atts['orderby'] );
	$post_parent = $atts['post_parent']; // Validated later, after check for 'current'
	$post_status = $atts['post_status']; // Validated later as one of a few values
	$post_type = sanitize_text_field( $atts['post_type'] );
	$posts_per_page = intval( $atts['posts_per_page'] );
	$tag = sanitize_text_field( $atts['tag'] );
	$tax_operator = $atts['tax_operator']; // Validated later as one of a few values
	$tax_term = sanitize_text_field( $atts['tax_term'] );
	$taxonomy = sanitize_key( $atts['taxonomy'] );
	$wrapper = sanitize_text_field( $atts['wrapper'] );	
	// Set up initial query for post
	$args = array(
		'category_name'       => $category,
		'order'               => $order,
		'orderby'             => $orderby,
		'post_type'           => explode( ',', $post_type ),
		'posts_per_page'      => $posts_per_page,
		'tag'                 => $tag,
	);	
	// Ignore Sticky Posts
	if( $ignore_sticky_posts )
		$args['ignore_sticky_posts'] = true;	
	// Meta key (for ordering)
	if( !empty( $meta_key ) )
		$args['meta_key'] = $meta_key;	
	// If Post IDs
	if( $id ) {
		$posts_in = array_map( 'intval', explode( ',', $id ) );
		$args['post__in'] = $posts_in;
	}	
	// Post Author
	if( !empty( $author ) )
		$args['author_name'] = $author;		
	// Offset
	if( !empty( $offset ) )
		$args['offset'] = $offset;	
	// Post Status	
	$post_status = explode( ', ', $post_status );		
	$validated = array();
	$available = array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash', 'any' );
	foreach ( $post_status as $unvalidated )
		if ( in_array( $unvalidated, $available ) )
			$validated[] = $unvalidated;
	if( !empty( $validated ) )		
		$args['post_status'] = $validated;	
	// If taxonomy attributes, create a taxonomy query
	if ( !empty( $taxonomy ) && !empty( $tax_term ) ) {
		// Term string to array
		$tax_term = explode( ', ', $tax_term );		
		// Validate operator
		if( !in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) )
			$tax_operator = 'IN';					
		$tax_args = array(
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'slug',
					'terms'    => $tax_term,
					'operator' => $tax_operator
				)
			)
		);		
		// Check for multiple taxonomy queries
		$count = 2;
		$more_tax_queries = false;
		while( 
			isset( $original_atts['taxonomy_' . $count] ) && !empty( $original_atts['taxonomy_' . $count] ) && 
			isset( $original_atts['tax_' . $count . '_term'] ) && !empty( $original_atts['tax_' . $count . '_term'] ) 
		):		
			// Sanitize values
			$more_tax_queries = true;
			$taxonomy = sanitize_key( $original_atts['taxonomy_' . $count] );
	 		$terms = explode( ', ', sanitize_text_field( $original_atts['tax_' . $count . '_term'] ) );
	 		$tax_operator = isset( $original_atts['tax_' . $count . '_operator'] ) ? $original_atts['tax_' . $count . '_operator'] : 'IN';
	 		$tax_operator = in_array( $tax_operator, array( 'IN', 'NOT IN', 'AND' ) ) ? $tax_operator : 'IN';	 		
	 		$tax_args['tax_query'][] = array(
	 			'taxonomy' => $taxonomy,
	 			'field' => 'slug',
	 			'terms' => $terms,
	 			'operator' => $tax_operator
	 		);
			$count++;			
		endwhile;		
		if( $more_tax_queries ):
			$tax_relation = 'AND';
			if( isset( $original_atts['tax_relation'] ) && in_array( $original_atts['tax_relation'], array( 'AND', 'OR' ) ) )
				$tax_relation = $original_atts['tax_relation'];
			$args['tax_query']['relation'] = $tax_relation;
		endif;		
		$args = array_merge( $args, $tax_args );
	}	
	// If post parent attribute, set up parent
	if( $post_parent ) {
		if( 'current' == $post_parent ) {
			global $post;
			$post_parent = $post->ID;
		}
		$args['post_parent'] = intval( $post_parent );
	}	
	// Set up html elements used to wrap the posts. 
	// Default is ul/li, but can also be ol/li and div/div
	$wrapper_options = array( 'ul', 'ol', 'div' );
	if( ! in_array( $wrapper, $wrapper_options ) )
		$wrapper = 'ul';
	$inner_wrapper = 'div' == $wrapper ? 'div' : 'li';	
	$listing = new WP_Query( apply_filters( 'display_posts_shortcode_args', $args, $original_atts ) );
	if ( ! $listing->have_posts() )
		return apply_filters( 'display_posts_shortcode_no_results', wpautop( $no_posts_message ) );		
	$inner = '';
	while ( $listing->have_posts() ): $listing->the_post(); global $post;		
		$image = $date = $excerpt = $content = '';		
		$title = '<a class="title" href="' . apply_filters( 'the_permalink', get_permalink() ) . '">' . apply_filters( 'the_title', get_the_title() ) . '</a>';		
		if ( $image_size && has_post_thumbnail() )  
			$image = '<a class="image" href="' . get_permalink() . '">' . get_the_post_thumbnail( $post->ID, $image_size ) . '</a> ';			
		if ( $include_date ) 
			$date = ' <span class="date">' . get_the_date( $date_format ) . '</span>';		
		if ( $include_excerpt ) 
			$excerpt = ' <span class="excerpt-dash">-</span> <span class="excerpt">' . get_the_excerpt() . '</span>';			
		if( $include_content )
			$content = '<div class="content">' . apply_filters( 'the_content', get_the_content() ) . '</div>'; 		
		$class = array( 'listing-item' );
		$class = apply_filters( 'display_posts_shortcode_post_class', $class, $post, $listing );
		$output = '<' . $inner_wrapper . ' class="' . implode( ' ', $class ) . '">' . $image . $title . $date . $excerpt . $content . '</' . $inner_wrapper . '>';		
		// If post is set to private, only show to logged in users
		if( 'private' == get_post_status( $post->ID ) && !current_user_can( 'read_private_posts' ) )
			$output = '';		
		$inner .= apply_filters( 'display_posts_shortcode_output', $output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class );		
	endwhile; wp_reset_postdata();	
	$open = apply_filters( 'display_posts_shortcode_wrapper_open', '<' . $wrapper . ' class="display-posts-listing">', $original_atts );
	$close = apply_filters( 'display_posts_shortcode_wrapper_close', '</' . $wrapper . '>', $original_atts );
	$return = $open . $inner . $close;
	return $return;
}

/**
 * Initialize the update checker.
 *  
*/
require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'meadowhill-premium',
    'http://www.tomastoman.cz/updates/meadowhill.json'
); ?>