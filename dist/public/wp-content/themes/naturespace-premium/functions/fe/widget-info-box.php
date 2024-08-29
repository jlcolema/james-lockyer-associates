<?php
/**
 * Plugin Name: NatureSpace Box-Info Widget
 * Description: Displays a box with your custom text and link.
 * Author: Tomas Toman	
 * Version: 1.0
*/

add_action('widgets_init', create_function('', 'return register_widget("naturespace_info_box");'));
class naturespace_info_box extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'homepage-info-box', 'description' => __('Displays a box with your custom text and link.', 'naturespace') );
		$control_ops = array('width' => 200, 'height' => 400);
		parent::__construct('infobox', __('NatureSpace Box-Info', 'naturespace'), $widget_ops, $control_ops);
	}
	function form($instance) {
		// outputs the options form on admin
    if ( $instance ) {
			$icon = esc_attr( $instance[ 'icon' ] );
		}
		else {
			$icon = __( '', 'naturespace' );
		}
    
    if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'naturespace' );
		} 

	  if ( $instance ) {
			$content = esc_attr( $instance[ 'content' ] );
		}
		else {
			$content = __( '', 'naturespace' );
		} 

		if ( $instance ) {
			$buttonlink = esc_attr( $instance[ 'buttonlink' ] );
		}
		else {
			$buttonlink = __( '', 'naturespace' );
    } ?>
<!-- Icon -->
<p>
	<label for="<?php echo $this->get_field_id('icon'); ?>">
		<?php _e('Icon:', 'naturespace'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" type="text" value="<?php echo $icon; ?>" />
  <p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the name of an icon (example: <strong>icon_calendar</strong>).', 'naturespace'); ?>
</p>
</p>
<!-- Title -->
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">
		<?php _e('Title:', 'naturespace'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<!-- Content -->
<p>
	<label for="<?php echo $this->get_field_id('content'); ?>">
		<?php _e('Text:', 'naturespace'); ?>
	</label>
  <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?></textarea>
</p> 
<!-- Button Link -->
<p>
	<label for="<?php echo $this->get_field_id('buttonlink'); ?>">
		<?php _e('Link:', 'naturespace'); ?>
	</label>
	<input class="widefat" id="<?php echo $this->get_field_id('buttonlink'); ?>" name="<?php echo $this->get_field_name('buttonlink'); ?>" type="text" value="<?php echo $buttonlink; ?>" />
<p style="font-size: 10px; color: #999; margin: 0; padding: 0px;">
	<?php _e('Insert here the full URL which will be displayed as a link (optional).', 'naturespace'); ?>
</p>
</p>
<?php } 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
    $instance['icon'] = sanitize_text_field($new_instance['icon']);
    $instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['buttonlink'] = sanitize_text_field($new_instance['buttonlink']);
	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
      $icon = apply_filters('widget_icon', $instance['icon']);
      $title = apply_filters('widget_title', $instance['title']);
			$content = apply_filters('widget_content', $instance['content']);
			$buttonlink = apply_filters('widget_buttonlink', $instance['buttonlink']); ?>
<?php echo $before_widget; ?>
      <div class="info-box">
<?php if ( $icon != ''  ) { ?>
        <div class="info-box-icon"><span class="<?php echo $icon; ?>" aria-hidden="true"></span></div>
<?php } ?>
        <p class="info-box-headline"><?php echo $title; ?></p>
        <div class="info-box-content">
          <p><?php echo $content; ?></p>
        </div>
<?php if ( $buttonlink != ''  ) { ?>
        <a class="info-box-more" href="<?php echo $buttonlink; ?>"><?php _e( 'Read More &gt;' , 'naturespace' ); ?></a>
<?php } ?>
      </div>
<?php echo $after_widget; ?>
<?php
	}
}
?>