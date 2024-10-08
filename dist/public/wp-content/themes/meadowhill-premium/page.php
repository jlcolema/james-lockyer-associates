<?php
/**
 * The page template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
get_header(); ?>

<div id="wrapper-content">
  <div class="container">
  <div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="section-headline"><?php the_title(); ?></h1>
<?php meadowhill_get_display_image_page(); ?>

<?php the_content( 'Continue reading' ); ?>
<?php endwhile; endif; ?>

<?php meadowhill_social_buttons_page(); ?>

<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
  
<?php get_sidebar(); ?>  
  </div>
</div>     <!-- end of wrapper-content -->
<?php get_footer(); ?>