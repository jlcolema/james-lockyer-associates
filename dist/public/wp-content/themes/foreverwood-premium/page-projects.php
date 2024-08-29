
<?php get_header(); ?>

<div id="wrapper-content">

	<div class="container">

		<div id="main-content">
    
    		<section class="home-latest-posts js-masonry">

				<?php

					$args = array(

						'numberposts' 	=> -1,
						'post_type'		=> 'project',
						'orderby'		=> 'menu_order',
						'post_status'	=> 'publish',
						'order'			=> 'ASC'

					);

					$projects = get_posts( $args );

				?>

				<?php foreach ( $projects as $project ) : ?>

					<?php

						/* Thumbnail */

						// Attachment

						$project_featured_image_attachment_id = get_field( 'project_featured_image', $project->ID );

						// Size

						$project_featured_image_size_full = "full";

						// Options

						$project_featured_image_full = wp_get_attachment_image_src ( $project_featured_image_attachment_id, $project_featured_image_size_full);

						/* Short Description */

						$project_short_description = get_field( 'project_short_description', $project->ID );

					?>

		    		<article class="grid-entry">

			    		<div class="grid-entry-inner">

				    		<a href="<?php echo get_permalink( $project->ID ); ?>">

				    			<img width="" height="" src="<?php echo $project_featured_image_full[0]; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="" sizes="" />

				    		</a>

				    		<h2 class="grid-entry-headline">

				    			<a href="<?php echo get_permalink( $project->ID ); ?>"><?php echo $project->post_title; ?></a>

				    		</h2>

				    		<p style="margin-bottom: 2em;"><?php echo $project_short_description; ?></p>

				    		<p>

				    			<a href="<?php echo get_permalink( $project->ID ); ?>" class="more-link">Full details</a>

				    		</p>

			    		</div>

		    		</article>

				<?php endforeach; ?>

		    </section>  

			<?php foreverwood_content_nav( 'nav-below' ); ?> 

		</div>

		<?php if ($foreverwood_display_sidebar_archives != 'Hide') { ?>

			<?php get_sidebar(); ?>

		<?php } ?>

	</div>

</div>

<?php get_footer(); ?>