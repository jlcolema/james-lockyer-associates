<?php
/**
 * The post template file.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="headline-wrapper">
    <h1 class="content-headline"><?php the_title(); ?></h1>
  </div>  
<?php liveride_get_breadcrumb(); ?>  
  <div id="main-content">    
    <div id="content">    
<?php liveride_get_display_image_post(); ?>
<?php if ( $liveride_display_meta_post != 'Hide' ) { ?>
    <p class="post-meta">
      <span class="post-info-author"><?php _e( 'Author: ', 'liveride' ); ?><?php the_author_posts_link(); ?></span>
      <span class="post-info-date"><?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) : ?>
      <span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'liveride' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
    </p>
    <div class="post-info">
      <p class="post-category"><span class="post-info-category"><?php the_category(', '); ?></span></p>
      <p class="post-tags"><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
    </div>
<?php } ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'liveride' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'liveride' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php liveride_social_buttons_post(); ?>
<?php if ( $liveride_next_preview_post != 'Hide' ) { ?>
<?php liveride_prev_next('liveride-post-nav'); ?>
<?php } ?>
<?php if ( $liveride_display_related_posts != 'Hide' ) { ?>
<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page' => $liveride_related_posts_number,
'ignore_sticky_posts' => true );
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) { ?>
<div class="wrapper-related-posts">
      <h2 class="entry-headline"><?php esc_attr_e($liveride_related_posts_headline); ?></h2>  
      <div <?php if ( $liveride_related_posts_format == 'Slider' ) { ?>class="flexslider"<?php } ?>>      
        <ul <?php if ( $liveride_related_posts_format == 'Slider' ) { ?>class="slides"<?php } else { ?>class="unordered-list"<?php } ?>>
<?php while( $my_query->have_posts() ) {
$my_query->the_post();?>
	       <li><?php if ( $liveride_related_posts_format == 'Slider' ) { ?><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'slider-thumb' ); ?></a><?php } ?><a <?php if ( $liveride_related_posts_format == 'Slider' ) { ?>class="slider-link" title="<?php the_title(); ?>"<?php } ?> href="<?php echo get_permalink(); ?>"><?php if ( $liveride_related_posts_format == 'Slider' ) { ?><?php liveride_short_title(); ?><?php } else { the_title(); } ?></a></li>
<?php } ?>
        </ul>
      </div>
</div>
<?php }
}
$post = $orig_post;
wp_reset_query(); ?>
<?php } ?>
<?php comments_template( '', true ); ?>
      </div>  
    </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>