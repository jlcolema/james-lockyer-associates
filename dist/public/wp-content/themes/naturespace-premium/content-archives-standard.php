<?php
/**
 * The template for displaying content of Standard Post entries as One Column.
 * @package NatureSpace
 * @since NatureSpace 1.0.0
*/
?>
<?php global $naturespace_options;
foreach ($naturespace_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		${$value['id']} = $value['std'];
	}
	elseif (isset($value['id'])) { ${$value['id']} = get_option( $value['id'] ); }
} ?>
    <article <?php post_class('post-entry'); ?>>
<?php if ( !has_post_format('aside') ) { ?>
        <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php } ?>
<?php if ( $naturespace_display_meta_post_entry != 'Hide' ) { ?>
        <p class="post-meta">
          <span class="post-info-author"><i class="icon_pencil-edit" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
          <span class="post-info-date"><i class="icon_clock_alt" aria-hidden="true"></i> <a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
<?php if ( comments_open() ) { ?>
          <span class="post-info-comments"><i class="icon_comment_alt" aria-hidden="true"></i> <a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
<?php } ?>
<?php if ( has_category() ) { ?>
          <span class="post-info-category"><i class="icon_folder-alt" aria-hidden="true"></i> <?php the_category(', '); ?></span>
<?php } ?>
<?php if ( has_tag() ) { ?>
<?php the_tags( '<span class="post-info-tags"><i class="icon_tag_alt" aria-hidden="true"></i> ', ', ', '</span>' ); ?>
<?php } ?>
        </p>
<?php } ?>
<?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<?php } ?>
        <div class="post-entry-content"><?php if ( $naturespace_content_archives != 'Content' ) { ?><?php the_excerpt(); ?><?php } else { ?><?php global $more; $more = 0; ?><?php the_content(); ?><?php } ?></div>
<?php naturespace_social_buttons_post_entry(); ?>
    </article>