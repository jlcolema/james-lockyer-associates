<?php
/**
 * The post template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_post(); ?>

<?php if ( $meadowhill_display_meta_post == '' || $meadowhill_display_meta_post == 'Display' ) { ?>
<p class="post-info"><span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>

<?php the_content( 'Continue reading' ); ?>

<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'meadowhill' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php endwhile; endif; ?>

<?php meadowhill_social_buttons_post(); ?>

<?php if (($meadowhill_next_preview_post == '') || ($meadowhill_next_preview_post == 'Display')) :  meadowhill_prev_next('meadowhill-post-nav');  endif; ?>

<?php if ( $meadowhill_display_related_posts != 'Hide' ) { ?>
<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page' => $meadowhill_related_posts_number,
'caller_get_posts' => 1 );

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) { ?>
<div class="wrapper-related-posts">
      <h2 class="related-posts-headline"><?php _e( 'Related Posts' , 'meadowhill' ); ?></h2>  
        <ul class="unordered-list">
<?php while( $my_query->have_posts() ) {
$my_query->the_post();?>
	       <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
<?php } ?>
        </ul>
</div>
<?php }
}
$post = $orig_post;
wp_reset_query(); ?>
<?php } ?>

<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>