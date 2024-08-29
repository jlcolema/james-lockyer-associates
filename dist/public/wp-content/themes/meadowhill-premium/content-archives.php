<?php
/**
 * The template for displaying content of search/archives.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
?>
<?php global $meadowhill_options;
foreach ($meadowhill_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
      <div <?php post_class('post-entry'); ?>>
        <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="post-info">
          <span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
          <span class="post-info-author"><?php the_author_posts_link(); ?></span>
          <?php if ( is_search() ) : else : ?><span class="post-info-category"><?php the_category(', '); ?></span><?php endif; ?>
          <?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?>
          <?php if ( comments_open() ) : ?><span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span><?php endif; ?>
        </p>
        <div class="post-thumbnail">
          <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
          <a class="post-read-more" href="<?php echo get_permalink(); ?>"><?php _e( 'READ MORE' , 'meadowhill' ); ?></a>
        </div>
        <div class="post-entry-content"><?php if ( $meadowhill_content_archives != 'Excerpt' ) { ?><?php global $more; $more = 0; ?><?php the_content(); ?><?php } else { the_excerpt(); } ?>
<?php meadowhill_social_buttons_post_entry(); ?></div>
      </div>