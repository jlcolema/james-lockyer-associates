<?php
/**
 * Plugin Name: LiveRide Posts-List Widget
 * Description: Displays the latest posts from the selected category as an unordered list with highlighted first post.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("liveride_homepage_list");'));
class liveride_homepage_list extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'homepage-list-posts', 'description' => __('Displays the latest posts from the selected category as an unordered list with highlighted first post.', 'liveride') );
		$control_ops = array('width' => 200, 'height' => 400);
		parent::__construct('liveridelist', __('LiveRide Posts-List', 'liveride'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'liveride' );
		} 

	  if ( $instance ) {
			$category = esc_attr( $instance[ 'category' ] );
		}
		else {
			$category = __( '', 'liveride' );
		} 

		if ( $instance ) {
			$numberposts = esc_attr( $instance[ 'numberposts' ] );
		}
		else {
			$numberposts = __( '5', 'liveride' );
    } ?>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'liveride'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Category -->
<p>
	<label for="<?php echo $this->get_field_id('category'); ?>">
		<?php _e('Category:', 'liveride'); ?>
	</label>
<?php wp_dropdown_categories( array(
    'name' => $this->get_field_name('category'),
    'id' => $this->get_field_id('category'),
    'class' => 'widefat',
    'selected' => $instance["category"],
    'show_option_none' => '- not selected -'
) ); ?>
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Select a category of posts.', 'liveride'); ?>
</p>
</p>
<!-- Number of posts -->
<p>
	<label for="<?php echo $this->get_field_id('numberposts'); ?>">
		<?php _e('Number of posts:', 'liveride'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('numberposts'); ?>" name="<?php echo $this->get_field_name('numberposts'); ?>" type="text" value="<?php echo $numberposts; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the number of latest posts from the selected category which you want to display.', 'liveride'); ?>
</p>
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['category'] = $new_instance['category'];
		$instance['numberposts'] = sanitize_text_field($new_instance['numberposts']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $title = apply_filters('widget_title', $instance['title']);
			$category = apply_filters('widget_category', $instance['category']);
			$numberposts = apply_filters('widget_numberposts', $instance['numberposts']); ?>
<?php echo $before_widget; ?>
  <section class="home-list-posts">
<?php $args1 = array(
  'cat' => $category,
  'showposts' => $numberposts,
	'post_type' => 'post',
	'post_status' => 'publish'
);
$my_query = new WP_Query( $args1 ); ?> 
                
<h2 class="entry-headline"><?php echo $title; ?></h2>

<?php if ($my_query->have_posts()) : $count = 0;
while ($my_query->have_posts()) : $my_query->the_post();
$count++; 
if ($count == 1) { ?>                  
      <article class="post-entry post-entry-list-first">
        <div class="post-content">
<?php if ( has_post_thumbnail() ) : ?><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a><?php endif; ?>
          <div class="post-entry-content">
            <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="post-meta">
              <span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
<?php if ( comments_open() ) : ?>
              <span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'liveride' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
            </p>
<?php the_excerpt(); ?>
          </div>
        </div>
      </article>
      <div class="home-list-posts-wrapper">      
        <ul>
<?php } else { ?>           
          <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
<?php } ?>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
        </ul> 
      </div>
  </section>
<?php echo $after_widget; ?>
<?php
	}
}
?>