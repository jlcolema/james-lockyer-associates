<?php
/**
 * The template for displaying Comments.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _n( 'Comment (1)', 'Comments (%1$s)', get_comments_number(), 'meadowhill' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'meadowhill_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div id="comment-nav-below" class="navigation" role="navigation">
			<h3 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'meadowhill' ); ?></h3>
			<p class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'meadowhill' ) ); ?> </p>
			<p class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'meadowhill' ) ); ?></p>
		</div>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'meadowhill' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php $placeholder_name = __( 'Your name' , 'meadowhill' );
   $placeholder_web = __( 'Website' , 'meadowhill' );
   $placeholder_comment = __( 'Comment...' , 'meadowhill' );
   $aria_req = ( $req ? " aria-required='true'" : '' );
   $field_req = ( $req ? " *" : '' );
   $comment_args = array(
'title_reply'=>__( 'Leave a Comment' , 'meadowhill' ),
'fields' => apply_filters( 'comment_form_default_fields', array(
'author' => '<p class="comment-form-author">' . '<label for="author">' . __( '', 'meadowhill' ) . '</label> ' . '<input id="author" name="author" type="text" placeholder="' . $placeholder_name . $field_req . '" value=""  size="30"' . $aria_req . ' /></p>',   
'email'  => '<p class="comment-form-email">' .
'<label for="email">' . __( '', 'meadowhill' ) . '</label> ' .
'<input id="email" name="email" type="text" placeholder="E-mail' . $field_req .'" value="" size="30"' . $aria_req . ' />'.'</p>',
'url'    => '<p class="comment-form-url">' .
'<label for="url">' . __( '', 'meadowhill' ) . '</label> ' .
'<input id="url" name="url" type="text" placeholder="' . $placeholder_web . '" value="" size="30" />'.'</p>' ) ),
'comment_field' => '<p>' .
'<label for="comment">' . __( '', 'meadowhill' ) . '</label>' .
'<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . $placeholder_comment . '"></textarea>' .
'</p>',);
          comment_form($comment_args); ?>

</div><!-- #comments .comments-area -->