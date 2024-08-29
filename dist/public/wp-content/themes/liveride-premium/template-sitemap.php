<?php
/**
 * Template Name: Sitemap
 * The sitemap page template file.
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
<?php liveride_get_display_image_page(); ?>
      <div class="entry-content">
<?php the_content(); ?>
<?php if ( function_exists('ddsg_create_sitemap') ) { echo ddsg_create_sitemap(); } ?>
<?php edit_post_link( __( 'Edit', 'liveride' ), '<p>', '</p>' ); ?>
<?php endwhile; endif; ?>
      </div>  
    </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
<?php get_footer(); ?>