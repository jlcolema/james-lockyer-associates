<?php get_header(); ?>

<div id="wrapper-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="container">

			<div id="main-content">

				<?php

					/* Thumbnail */

					// Attachment

					$project_featured_image_attachment_id = get_field( 'project_featured_image', $project->ID );

					// Size

					$project_featured_image_size_full = "full";

					// Options

					$project_featured_image_full = wp_get_attachment_image_src ( $project_featured_image_attachment_id, $project_featured_image_size_full);

					$project_featured_image_attachment_page = get_attachment_link( $project_featured_image_attachment_id );

				?>

				<article id="content">

					<div class="content-headline">

						<h1 class="entry-headline"><?php the_title(); ?></h1>

						<?php foreverwood_get_breadcrumb(); ?>

					</div>

					<div class="project-featured-image">

						<a href="<?php echo $project_featured_image_attachment_page; ?>">

							<img width="" height="" src="<?php echo $project_featured_image_full[0]; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="" sizes="" />

						</a>

					</div>

					<div class="entry-content" style="margin-top: 15px;">

						<!-- Location -->

						<?php if ( get_field( 'project_location' ) ) : ?>

							<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>Location</strong></p>

							<p><?php the_field( 'project_location' ); ?></p>

						<?php endif; ?>

						<!-- Client -->

						<?php if ( get_field( 'project_client' ) ) : ?>

							<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>Client</strong></p>

							<p><?php the_field( 'project_client' ); ?></p>

						<?php endif; ?>

						<!-- Contractor -->

						<?php if ( get_field( 'project_contractor' ) ) : ?>

							<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>Contractor</strong></p>

							<p><?php the_field( 'project_contractor' ); ?></p>

						<?php endif; ?>

						<!-- Contract Value -->

						<?php if ( get_field( 'project_contract_value' ) ) : ?>

							<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>Contract Value</strong></p>

							<p>&pound;<?php the_field( 'project_contract_value' ); ?></p>

						<?php endif; ?>

						<!-- Services Provided -->

						<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>Services Provided</strong></p>

						<p>

							<?php $project_services = wp_get_post_terms( $post->ID, 'project_tag' ); ?>

							<?php foreach ( $project_services as $project_service ) : ?>

								<?php echo $project_service->name; ?><br />

							<?php endforeach; ?>

						</p>

						<!-- The Project -->

						<?php if ( get_field( 'project_the_project' ) ) : ?>

							<p style="font-family:Merriweather; text-transform: uppercase; color:#505c24;font-size:105%;margin-bottom:1px;"><strong>The Project</strong></p>

							<?php the_field( 'project_the_project' ); ?>

						<?php endif; ?>

						<!-- Additional Images -->

						<?php if( have_rows('project_additional_images') ): ?>

							<ul class="project-additional-images">

								<?php while( have_rows('project_additional_images') ): the_row(); 

									$project_additional_images_image = get_sub_field('project_additional_images_image');
									
								?>

									<li>

										<a href="<?php echo get_attachment_link( $project_additional_images_image['ID'] ); ?>">

											<img src="<?php echo $project_additional_images_image['url']; ?>" alt="<?php echo $project_additional_images_image['alt'] ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" />

										</a>

									</li>

								<?php endwhile; ?>

							</ul>

						<?php endif; ?>

						<?php edit_post_link( __( '(Edit)', 'foreverwood' ), '<p>', '</p>' ); ?>

						<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'foreverwood' ) . '</span>', 'after' => '</p>' ) ); ?>

					</div>

					<?php endwhile; endif; ?>

					<?php foreverwood_social_buttons_post(); ?>

					<?php if ( $foreverwood_next_preview_post != 'Hide' ) { ?>

						<?php

							$foreverwood_previous_post = get_adjacent_post( false, "", true );

							$foreverwood_next_post = get_adjacent_post( false, "", false );

						?>

						<div id="foreverwood-post-nav" class="navigation" role="navigation">
						
							<div class="nav-wrapper">

								<?php if ( !empty($foreverwood_previous_post) ) { ?>
								
									<p class="nav-previous"><a href="<?php echo esc_url(get_permalink($foreverwood_previous_post->ID)); ?>" title="<?php echo esc_attr($foreverwood_previous_post->post_title); ?>"><?php _e( '&larr; Previous Project', 'foreverwood' ); ?></a></p>

								<?php } if ( !empty($foreverwood_next_post) ) { ?>
		
									<p class="nav-next"><a href="<?php echo esc_url(get_permalink($foreverwood_next_post->ID)); ?>" title="<?php echo esc_attr($foreverwood_next_post->post_title); ?>"><?php _e( 'Next Project &rarr;', 'foreverwood' ); ?></a></p>

								<?php } ?>
							
							</div>

						</div>

					<?php } ?>

					<?php /*

						<?php if ( $foreverwood_display_related_posts != 'Hide' ) { ?>

							<?php $orig_post = $post;

								global $post;

								$categories = get_the_category($post->ID);

								if ($categories) {

									$category_ids = array();

									foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

									$args=array(

										'category__in' => $category_ids,
										'post__not_in' => array($post->ID),
										'posts_per_page' => $foreverwood_related_posts_number,
										'ignore_sticky_posts' => true

									);
							
									$my_query = new wp_query( $args );

									if( $my_query->have_posts() ) { ?>

										<div class="wrapper-related-posts">

											<h2 class="entry-headline"><?php esc_attr_e($foreverwood_related_posts_headline); ?></h2>  

											<div <?php if ( $foreverwood_related_posts_format == 'Slider' ) { ?>class="flexslider"<?php } ?>>      

												<ul <?php if ( $foreverwood_related_posts_format == 'Slider' ) { ?>class="slides"<?php } else { ?>class="unordered-list"<?php } ?>>

													<?php while( $my_query->have_posts() ) {

														$my_query->the_post();?>

														<li><?php if ( $foreverwood_related_posts_format == 'Slider' ) { ?><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( 'slider-thumb' ); ?></a><?php } ?><a <?php if ( $foreverwood_related_posts_format == 'Slider' ) { ?>class="slider-link" title="<?php the_title(); ?>"<?php } ?> href="<?php echo get_permalink(); ?>"><?php if ( $foreverwood_related_posts_format == 'Slider' ) { ?><?php foreverwood_short_title(); ?><?php } else { the_title(); } ?></a></li>

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

					*/ ?>

				</article>

			</div>

			<?php if ($foreverwood_display_sidebar != 'Hide') { ?>

				<?php get_sidebar(); ?>

			<?php } ?>

		</div>

</div>
<?php get_footer(); ?>