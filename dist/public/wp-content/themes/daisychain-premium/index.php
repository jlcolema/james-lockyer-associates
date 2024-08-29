<?php
/**
 * The main template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
get_header(); ?>
<?php if ($daisychain_display_latest_posts != 'Hide') { ?>    
    <section class="home-latest-posts">
      <h2 class="entry-headline"><?php esc_attr_e($daisychain_latest_posts_headline); ?></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php daisychain_content_nav( 'nav-below' ); ?>
   </section>
<?php } ?>
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php endif; ?> 
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>