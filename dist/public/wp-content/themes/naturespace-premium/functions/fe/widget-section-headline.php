<?php
/**
 * Plugin Name: NatureSpace Section-Headline
 * Description: Displays a headline of a section created with the Page Builder.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("naturespace_section_headline");'));
class naturespace_section_headline extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'homepage-section-headline', 'description' => __('Displays a headline of a section created with the Page Builder.', 'naturespace') );
		$control_ops = array('width' => 200, 'height' => 400);
		parent::__construct('sectionheadline', __('NatureSpace Section-Headline', 'naturespace'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'naturespace' );
		} ?>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Headline:', 'naturespace'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the subtitle of the widget
		 extract( $args );
      $title = apply_filters('widget_title', $instance['title']); ?>
<?php echo $before_widget; ?>
  <h2 class="section-title"><?php echo $title; ?></h2>
<?php echo $after_widget; ?>
<?php
	}
}
?>