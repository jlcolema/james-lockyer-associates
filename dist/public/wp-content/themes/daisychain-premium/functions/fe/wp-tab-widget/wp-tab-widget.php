<?php
/*
Plugin Name: DaisyChain Tab Widget
Description: Display popular posts, recent posts, comments and tags in tabbed format.
Author: MyThemeShop, modified by Tomas Toman
*/

class daisychain_widget extends WP_Widget {
	function __construct() {
        
		// ajax functions
		add_action('wp_ajax_daisychain_widget_content', array(&$this, 'ajax_daisychain_widget_content'));
		add_action('wp_ajax_nopriv_daisychain_widget_content', array(&$this, 'ajax_daisychain_widget_content'));
        
        // css
        add_action('wp_enqueue_scripts', array(&$this, 'wpt_register_scripts'));
        add_action('admin_enqueue_scripts', array(&$this, 'wpt_admin_scripts'));
		
		$widget_ops = array('classname' => 'widget_wpt', 'description' => __('Display popular posts, recent posts, comments and tags in tabbed format.', 'daisychain'));
		$control_ops = array('width' => 300, 'height' => 350);
		parent::__construct('daisychain_widget', __('DaisyChain Tab Widget', 'daisychain'), $widget_ops, $control_ops);
    }	

    function wpt_admin_scripts($hook) {
        wp_enqueue_script( 'daisychain_widget_admin', get_template_directory_uri() . '/functions/fe/wp-tab-widget/js/wpt-admin.js', array( 'jquery' ), '1.0', true );
    }
    function wpt_register_scripts() { 
		// JS    
		wp_enqueue_script('daisychain_widget', get_template_directory_uri() . '/functions/fe/wp-tab-widget/js/wp-tab-widget.js', array('jquery'), '1.0', true);     
		wp_localize_script( 'daisychain_widget', 'wpt',         
			array( 'ajax_url' => admin_url( 'admin-ajax.php' )) 
		);        
    }  
    	
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'tabs' => array('recent' => 1, 'popular' => 1, 'comments' => 0, 'tags' => 0), 'tab_order' => array('popular' => 1, 'recent' => 2, 'comments' => 3, 'tags' => 4), 'allow_pagination' => 1, 'post_num' => '5', 'comment_num' => '5', 'show_thumb' => 1, 'show_date' => 1, 'show_excerpt' => 0, 'excerpt_length' => 10, 'show_comment_num' => 0, 'show_avatar' => 1) );
		extract($instance);
		?>
        <div class="wpt_options_form">
        
        <h4><?php _e('Select Tabs', 'daisychain'); ?></h4>
        
		<div class="wpt_select_tabs">
			<label class="alignleft" style="display: block; width: 50%; margin-bottom: 5px" for="<?php echo $this->get_field_id("tabs"); ?>_popular">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_popular" name="<?php echo $this->get_field_name("tabs"); ?>[popular]" value="1" <?php if (isset($tabs['popular'])) { checked( 1, $tabs['popular'], true ); } ?> />
				<?php _e( 'Popular Tab', 'daisychain'); ?>
			</label>
			<label class="alignleft" style="display: block; width: 50%; margin-bottom: 5px;" for="<?php echo $this->get_field_id("tabs"); ?>_recent">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_recent" name="<?php echo $this->get_field_name("tabs"); ?>[recent]" value="1" <?php if (isset($tabs['recent'])) { checked( 1, $tabs['recent'], true ); } ?> />		
				<?php _e( 'Recent Tab', 'daisychain'); ?>
			</label>
			<label class="alignleft" style="display: block; width: 50%;" for="<?php echo $this->get_field_id("tabs"); ?>_comments">
				<input type="checkbox" class="checkbox wpt_enable_comments" id="<?php echo $this->get_field_id("tabs"); ?>_comments" name="<?php echo $this->get_field_name("tabs"); ?>[comments]" value="1" <?php if (isset($tabs['comments'])) { checked( 1, $tabs['comments'], true ); } ?> />
				<?php _e( 'Comments Tab', 'daisychain'); ?>
			</label>
			<label class="alignleft" style="display: block; width: 50%;" for="<?php echo $this->get_field_id("tabs"); ?>_tags">
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_tags" name="<?php echo $this->get_field_name("tabs"); ?>[tags]" value="1" <?php if (isset($tabs['tags'])) { checked( 1, $tabs['tags'], true ); } ?> />
				<?php _e( 'Tags Tab', 'daisychain'); ?>
			</label>
		</div>
        <div class="clear"></div>
        
        <h4 class="wpt_tab_order_header"><a href="#"><?php _e('Tab Order', 'daisychain'); ?></a></h4>
        
        <div class="wpt_tab_order" style="display: none;">
            
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_popular" style="width: 50%;">
				<input id="<?php echo $this->get_field_id('tab_order'); ?>_popular" name="<?php echo $this->get_field_name('tab_order'); ?>[popular]" type="number" min="1" step="1" value="<?php echo $tab_order['popular']; ?>" style="width: 48px;" />
                <?php _e('Popular', 'daisychain'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_recent" style="width: 50%;">
				<input id="<?php echo $this->get_field_id('tab_order'); ?>_recent" name="<?php echo $this->get_field_name('tab_order'); ?>[recent]" type="number" min="1" step="1" value="<?php echo $tab_order['recent']; ?>" style="width: 48px;" />
                <?php _e('Recent', 'daisychain'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_comments" style="width: 50%;">
				<input id="<?php echo $this->get_field_id('tab_order'); ?>_comments" name="<?php echo $this->get_field_name('tab_order'); ?>[comments]" type="number" min="1" step="1" value="<?php echo $tab_order['comments']; ?>" style="width: 48px;" />
			    <?php _e('Comments', 'daisychain'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_tags" style="width: 50%;">
				<input id="<?php echo $this->get_field_id('tab_order'); ?>_tags" name="<?php echo $this->get_field_name('tab_order'); ?>[tags]" type="number" min="1" step="1" value="<?php echo $tab_order['tags']; ?>" style="width: 48px;" />
			    <?php _e('Tags', 'daisychain'); ?>
            </label>
        </div>
		<div class="clear"></div>
        
        <h4 class="wpt_advanced_options_header"><a href="#"><?php _e('Advanced Options', 'daisychain'); ?></a></h4>
        
        <div class="wpt_advanced_options" style="display: none;">
        <p>
			<label for="<?php echo $this->get_field_id("allow_pagination"); ?>">				
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("allow_pagination"); ?>" name="<?php echo $this->get_field_name("allow_pagination"); ?>" value="1" <?php if (isset($allow_pagination)) { checked( 1, $allow_pagination, true ); } ?> />
				<?php _e( 'Allow pagination', 'daisychain'); ?>
			</label>
		</p>
		
		<div class="wpt_post_options">

        <p>
			<label for="<?php echo $this->get_field_id('post_num'); ?>"><?php _e('Number of posts to show:', 'daisychain'); ?>
				<br />
				<input id="<?php echo $this->get_field_id('post_num'); ?>" name="<?php echo $this->get_field_name('post_num'); ?>" type="number" min="1" step="1" value="<?php echo $post_num; ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id("show_thumb"); ?>">
				<input type="checkbox" class="checkbox wpt_show_thumbnails" id="<?php echo $this->get_field_id("show_thumb"); ?>" name="<?php echo $this->get_field_name("show_thumb"); ?>" value="1" <?php if (isset($show_thumb)) { checked( 1, $show_thumb, true ); } ?> />
				<?php _e( 'Show post thumbnails', 'daisychain'); ?>
			</label>
		</p>   	
		
		<p>			
			<label for="<?php echo $this->get_field_id("show_date"); ?>">	
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_date"); ?>" name="<?php echo $this->get_field_name("show_date"); ?>" value="1" <?php if (isset($show_date)) { checked( 1, $show_date, true ); } ?> />	
				<?php _e( 'Show post date', 'daisychain'); ?>	
			</label>	
		</p>
        
		<p>		
			<label for="<?php echo $this->get_field_id("show_comment_num"); ?>">		
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_comment_num"); ?>" name="<?php echo $this->get_field_name("show_comment_num"); ?>" value="1" <?php if (isset($show_comment_num)) { checked( 1, $show_comment_num, true ); } ?> />	
				<?php _e( 'Show number of comments', 'daisychain'); ?>		
			</label>	
		</p>    
		
		<p>			
			<label for="<?php echo $this->get_field_id("show_excerpt"); ?>">	
				<input type="checkbox" class="checkbox wpt_show_excerpt" id="<?php echo $this->get_field_id("show_excerpt"); ?>" name="<?php echo $this->get_field_name("show_excerpt"); ?>" value="1" <?php if (isset($show_excerpt)) { checked( 1, $show_excerpt, true ); } ?> />
				<?php _e( 'Show post excerpt', 'daisychain'); ?>
			</label>		
		</p>
		
		<p class="wpt_excerpt_length"<?php echo (empty($show_excerpt) ? ' style="display: none;"' : ''); ?>>
			<label for="<?php echo $this->get_field_id('excerpt_length'); ?>">
				<?php _e('Excerpt length (words):', 'daisychain'); ?>   
				<br />
				<input type="number" min="1" step="1" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $excerpt_length; ?>" />
			</label>
		</p>	
		  
		</div>
        <div class="clear"></div>
        
        <div class="wpt_comment_options"<?php echo (empty($tabs['comments']) ? ' style="display: none;"' : ''); ?>>
		
        <p>
			<label for="<?php echo $this->get_field_id('comment_num'); ?>">
				<?php _e('Number of comments on Comments Tab:', 'daisychain'); ?>
				<br />
				<input type="number" min="1" step="1" id="<?php echo $this->get_field_id('comment_num'); ?>" name="<?php echo $this->get_field_name('comment_num'); ?>" value="<?php echo $comment_num; ?>" />
			</label>			
		</p>      
		
		<p>			
			<label for="<?php echo $this->get_field_id("show_avatar"); ?>">			
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_avatar"); ?>" name="<?php echo $this->get_field_name("show_avatar"); ?>" value="1" <?php if (isset($show_avatar)) { checked( 1, $show_avatar, true ); } ?> />
				<?php _e( 'Show avatars on Comments Tab', 'daisychain'); ?>	
			</label>	
		</p>
        </div><!-- .wpt_comment_options -->
        </div><!-- .wpt_advanced_options -->
		</div><!-- .wpt_options_form -->
		<?php 
	}	
	
	function update( $new_instance, $old_instance ) {	
		$instance = $old_instance;    
		$instance['tabs'] = $new_instance['tabs'];  
        $instance['tab_order'] = $new_instance['tab_order'];  
		$instance['allow_pagination'] = $new_instance['allow_pagination'];	
		$instance['post_num'] = $new_instance['post_num'];	
		$instance['comment_num'] =  $new_instance['comment_num'];		
		$instance['show_thumb'] = $new_instance['show_thumb'];     		
		$instance['show_date'] = $new_instance['show_date'];    
		$instance['show_excerpt'] = $new_instance['show_excerpt'];  
		$instance['excerpt_length'] = $new_instance['excerpt_length'];	
		$instance['show_comment_num'] = $new_instance['show_comment_num'];  
		$instance['show_avatar'] = $new_instance['show_avatar'];	
		return $instance;	
	}	
	function widget( $args, $instance ) {	
		extract($args);     
		extract($instance);    
		wp_enqueue_script('daisychain_widget');  
		if (empty($tabs)) $tabs = array('recent' => 1, 'popular' => 1);    
		$tabs_count = count($tabs);     
		if ($tabs_count <= 1) {       
			$tabs_count = 1;       
		} elseif($tabs_count > 3) {   
			$tabs_count = 4;      
		}
        
        $available_tabs = array('popular' => __('Popular', 'daisychain'), 
            'recent' => __('Recent', 'daisychain'), 
            'comments' => __('Comments', 'daisychain'), 
            'tags' => __('Tags', 'daisychain'));
            
        array_multisort($tab_order, $available_tabs);
        
		?>	
		<?php echo $before_widget; ?>	
		<div class="daisychain_widget_content" id="<?php echo $widget_id; ?>_content">		
			<ul class="wpt-tabs <?php echo "has-$tabs_count-"; ?>tabs">
                <?php foreach ($available_tabs as $tab => $label) { ?>
                    <?php if (!empty($tabs[$tab])): ?>
                        <li class="tab_title"><a href="#" id="<?php echo $tab; ?>-tab"><?php echo $label; ?></a></li>	
                    <?php endif; ?>
                <?php } ?> 
			</ul> <!--end .tabs-->	
			<div class="clear"></div>  
			<div class="inside">        
				<?php if (!empty($tabs['popular'])): ?>	
					<div id="popular-tab-content" class="tab-content">				
					</div> <!--end #popular-tab-content-->       
				<?php endif; ?>       
				<?php if (!empty($tabs['recent'])): ?>	
					<div id="recent-tab-content" class="tab-content"> 		 
					</div> <!--end #recent-tab-content-->		
				<?php endif; ?>                     
				<?php if (!empty($tabs['comments'])): ?>      
					<div id="comments-tab-content" class="tab-content"> 	
						<ul>                    		
						</ul>		
					</div> <!--end #comments-tab-content-->     
				<?php endif; ?>            
				<?php if (!empty($tabs['tags'])): ?>       
					<div id="tags-tab-content" class="tab-content"> 	
						<ul>                    	
						</ul>			 
					</div> <!--end #tags-tab-content-->  
				<?php endif; ?>	
				<div class="clear"></div>	
			</div> <!--end .inside -->	
			<div class="clear"></div>
		</div><!--end #tabber -->    
		<?php    
		// inline script 
		// to support multiple instances per page with different settings   
		
		unset($instance['tabs'], $instance['tab_order']); // unset unneeded  
		?>  
		<script type="text/javascript">  
			jQuery(function($) {    
				$('#<?php echo $widget_id; ?>_content').data('args', <?php echo json_encode($instance); ?>);  
			});  
		</script>  
		<?php echo $after_widget; ?>
		<?php 
	}  
	
	 
	function ajax_daisychain_widget_content() {     
		$tab = $_POST['tab'];       
		$args = $_POST['args'];  
		$page = intval($_POST['page']);    
		if ($page < 1)        
			$page = 1;            
		if (!is_array($args))      
			return '';
        
		// sanitize args		
		$post_num = (empty($args['post_num']) ? 5 : intval($args['post_num']));    
		if ($post_num > 20 || $post_num < 1) { // max 20 posts
			$post_num = 5;   
		}      
		$comment_num = (empty($args['comment_num']) ? 5 : intval($args['comment_num']));   
		if ($comment_num > 20 || $comment_num < 1) {  
			$comment_num = 5;    
		}       
		$show_thumb = !empty($args['show_thumb']);
		$show_date = !empty($args['show_date']);     
		$show_excerpt = !empty($args['show_excerpt']);  
		$excerpt_length = intval($args['excerpt_length']);
        if ($excerpt_length > 50 || $excerpt_length < 1) {  
			$excerpt_length = 10;   
		}   
		$show_comment_num = !empty($args['show_comment_num']);  
		$show_avatar = !empty($args['show_avatar']);   
		$allow_pagination = !empty($args['allow_pagination']);   
        
		/* ---------- Tab Contents ---------- */    
		switch ($tab) {        
		  
			/* ---------- Popular Posts ---------- */   
			case "popular":      
				?>       
				<ul>				
					<?php 
					$popular = new WP_Query( array('ignore_sticky_posts' => 1, 'posts_per_page' => $post_num, 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'desc', 'paged' => $page));         
					$last_page = $popular->max_num_pages;      
					while ($popular->have_posts()) : $popular->the_post(); ?>	
						<li>	
							<?php if ( $show_thumb == 1 ) : ?>					
								<div class="wpt_thumbnail wpt_thumb_small">	
                                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">		
    									<?php if(has_post_thumbnail()): ?>	
    										<?php the_post_thumbnail('square-thumb'); ?>		
    									<?php else: ?>							
    										<img src="<?php echo get_template_directory_uri() . '/functions/fe/wp-tab-widget/img/smallthumb.png'; ?>" alt="<?php the_title(); ?>"  class="wp-post-image" />					
    									<?php endif; ?>
                                    </a>
								</div>				
							<?php endif; ?>					
							<div class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a></div>		
							<?php if ( $show_date == 1 || $show_comment_num == 1) : ?>	
								<div class="wpt-postmeta">						
									<?php if ( $show_date == 1 ) : ?>			
										<?php echo get_the_date(); ?>		
									<?php endif; ?>						
									<?php if ( $show_date == 1 && $show_comment_num == 1) : ?>		
										&bull; 						
									<?php endif; ?>					
									<?php if ( $show_comment_num == 1 ) : ?>			
										<?php echo comments_number(__('No Comment','daisychain'), __('One Comment','daisychain'), '<span class="comments-number">%</span> '.__('Comments','daisychain'));?>				
									<?php endif; ?>						
								</div> <!--end .entry-meta--> 				
							<?php endif; ?>
                            
                            <?php if ( $show_excerpt == 1 ) : ?>	
                                <div class="wpt_excerpt">
                                    <p><?php echo $this->excerpt($excerpt_length); ?></p>
                                </div>
                            <?php endif; ?>	
                            						
							<div class="clear"></div>			
						</li>				
					<?php $post_num++; endwhile; wp_reset_query(); ?>		
				</ul>
                <div class="clear"></div>
				<?php if ($allow_pagination) : ?>         
					<?php $this->tab_pagination($page, $last_page); ?>      
				<?php endif; ?>                      
				<?php           
			break;              
            
			/* ---------- Recent Posts ---------- */      
			case "recent":           
				?>         
				<ul>			
					<?php              
					$recent = new WP_Query('posts_per_page='. $post_num .'&orderby=post_date&order=desc&post_status=publish&paged='. $page);       
					$last_page = $recent->max_num_pages;      
					while ($recent->have_posts()) : $recent->the_post();    
						?>						         
						<li>
							<?php if ( $show_thumb == 1 ) : ?>					
								<div class="wpt_thumbnail wpt_thumb_small">	
                                    <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>">		
    									<?php if(has_post_thumbnail()): ?>	
    										<?php the_post_thumbnail('square-thumb'); ?>		
    									<?php else: ?>							
    										<img src="<?php echo get_template_directory_uri() . '/functions/fe/wp-tab-widget/img/smallthumb.png'; ?>" alt="<?php the_title(); ?>"  class="wp-post-image" />					
    									<?php endif; ?>
                                    </a>
								</div>				
							<?php endif; ?>					
							<div class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a></div>		
							<?php if ( $show_date == 1 || $show_comment_num == 1) : ?>			
								<div class="wpt-postmeta">										
									<?php if ( $show_date == 1 ) : ?>						
										<?php echo get_the_date(); ?>						
									<?php endif; ?>								
									<?php if ( $show_date == 1 && $show_comment_num == 1) : ?>		
										&bull; 										
									<?php endif; ?>								
									<?php if ( $show_comment_num == 1 ) : ?>	
										<?php echo comments_number(__('No Comment','daisychain'), __('One Comment','daisychain'), '<span class="comm">%</span> '.__('Comments','daisychain'));?>									
									<?php endif; ?>		
								</div> <!--end .entry-meta--> 		
							<?php endif; ?>
                            
                            <?php if ( $show_excerpt == 1 ) : ?>	
                                <div class="wpt_excerpt">
                                    <p><?php echo $this->excerpt($excerpt_length); ?></p>
                                </div>
                            <?php endif; ?>	
                            	
							<div class="clear"></div>		
						</li>				
					<?php endwhile; wp_reset_query(); ?>		
				</ul>
                <div class="clear"></div>
				<?php if ($allow_pagination) : ?>       
					<?php $this->tab_pagination($page, $last_page); ?>    
				<?php endif; ?>                 
				<?php       
			break;     
            
			/* ---------- Latest Comments ---------- */        
			case "comments":         
				?>          
				<ul>            
					<?php              
					$no_comments = false;         
					$avatar_size = 60;            
					$comment_length = 90; // max length for comments        
					$comments_total = new WP_Comment_Query();     
					$comments_total_number = $comments_total->query(array('count' => 1));   
					$last_page = ceil($comments_total_number / $comment_num);       
					$comments_query = new WP_Comment_Query();   
					$offset = ($page-1) * $comment_num;         
					$comments = $comments_query->query( array( 'number' => $comment_num, 'offset' => $offset ) );    
					if ( $comments ) : foreach ( $comments as $comment ) : ?>       
						<li>                        
							            
								<?php if ($show_avatar) : ?>                       
									<div class="wpt_avatar">
                                        <a href="<?php echo get_comment_link($comment->comment_ID); ?>">
    										<?php echo get_avatar( $comment->comment_author_email, $avatar_size ); ?>     
                                        </a>                               
									</div>                   
								<?php endif; ?>              
								<div class="wpt_comment_meta">
                                    <a href="<?php echo get_comment_link($comment->comment_ID); ?>">   
    									<span class="wpt_comment_author"><?php echo get_comment_author( $comment->comment_ID ); ?> </span> - <span class="wpt_comment_post"><?php echo get_the_title($comment->comment_post_ID); ?></span>                   
								    </a>
                                </div>                   
								<div class="wpt_comment_content">          
									<p><?php echo $this->truncate(strip_tags(apply_filters( 'get_comment_text', $comment->comment_content )), $comment_length);?></p>
								</div>                   
							</a>                
							<div class="clear"></div>      
						</li>           
					<?php endforeach; else : ?>           
						<li>                   
							<div class="no-comments"><?php _e('No comments yet.', 'daisychain'); ?></div>        
						</li>                             
						<?php $no_comments = true; 
					endif; ?>       
				</ul>       
				<?php if ($allow_pagination && !$no_comments) : ?>           
					<?php $this->tab_pagination($page, $last_page); ?>      
				<?php endif; ?>                     
				<?php           
			break;             
            
			/* ---------- Tags ---------- */   
			case "tags":        
				?>           
				<ul>         
					<?php        
					$tags = get_tags(array('get'=>'all'));             
					if($tags) {               
						foreach ($tags as $tag): ?>    
							<li><a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name; ?></a></li>           
							<?php            
						endforeach;       
					} else {          
						_e('No tags created.', 'daisychain');           
					}            
					?>           
				</ul>            
				<?php            
			break;            
		}              
		die(); // required to return a proper result  
	}    
    function tab_pagination($page, $last_page) {  
		?>   
		<div class="wpt-pagination">     
			<?php if ($page > 1) : ?>               
				<a href="#" class="previous"><span><?php _e('&larr; Previous', 'daisychain'); ?></span></a>      
			<?php endif; ?>        
			<?php if ($page != $last_page) : ?>     
				<a href="#" class="next"><span><?php _e('Next &rarr;', 'daisychain'); ?></span></a>      
			<?php endif; ?>          
		</div>                   
		<div class="clear"></div>
		<input type="hidden" class="page_num" name="page_num" value="<?php echo $page; ?>" />    
		<?php   
	}
    
    function excerpt($limit = 10) {
          $excerpt = explode(' ', get_the_excerpt(), $limit);
          if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
          } else {
            $excerpt = implode(" ",$excerpt);
          }
          $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
          return $excerpt;
    }
    function truncate($str, $length = 24) {
        if (mb_strlen($str) > $length) {
            return mb_substr($str, 0, $length).'...';
        } else {
            return $str;
        }
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "daisychain_widget" );' ) );

// unregister MTS Tabs Widget and Tabs Widget v2
add_action('widgets_init', 'daisychain_unregister_mts_tabs_widget', 100);
function daisychain_unregister_mts_tabs_widget() {
    unregister_widget('mts_Widget_Tabs_2');
    unregister_widget('mts_Widget_Tabs');
} ?>