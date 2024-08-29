<?php
/**
 * Template Name: Sitemap
 * The sitemap page template file.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
get_header(); ?>
<div id="wrapper-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="container">
  <div id="main-content">
    <div id="content"> 
      <div class="content-headline">
        <h1 class="entry-headline"><?php the_title(); ?></h1>
<?php naturespace_get_breadcrumb(); ?>
      </div>
      <div class="entry-content">
<?php the_content(); ?>
<?php if ( function_exists('ddsg_create_sitemap') ) { echo ddsg_create_sitemap(); } ?>
<?php edit_post_link( __( '(Edit)', 'naturespace' ), '<p>', '</p>' ); ?>
      </div>
<?php endwhile; endif; ?>
    </div> <!-- end of content -->
  </div>
<?php if ($naturespace_display_sidebar != 'Hide') { ?>
<?php get_sidebar(); ?>
<?php } ?>
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>