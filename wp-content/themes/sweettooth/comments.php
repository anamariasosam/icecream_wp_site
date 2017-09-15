<?php if ( post_password_required() ) { ?>
		<p class="eltdf-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'sweettooth' ); ?></p>
<?php } else { ?>
	<?php if ( have_comments() ) { ?>
		<div class="eltdf-comment-holder clearfix" id="comments">
			<div class="eltdf-comment-holder-inner">
				<div class="eltdf-comments-title">
					<h4><?php esc_html_e('Comments', 'sweettooth' ); ?></h4>
				</div>
				<div class="eltdf-comments">
					<ul class="eltdf-comment-list">
						<?php wp_list_comments(array( 'callback' => 'sweettooth_elated_comment')); ?>
					</ul>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'sweettooth'); ?></p>
		<?php endif; ?>	
	<?php } ?>
<?php } ?>
<?php
$eltdf_commenter = wp_get_current_commenter();
$eltdf_req = get_option( 'require_name_email' );
$eltdf_aria_req = ( $eltdf_req ? " aria-required='true'" : '' );

$eltdf_args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=> esc_html__( 'Post a Comment','sweettooth' ),
	'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after' => '</h4>',
	'title_reply_to' => esc_html__( 'Post a Reply to %s','sweettooth' ),
	'cancel_reply_link' => esc_html__( 'cancel reply','sweettooth' ),
	'label_submit' => esc_html__( 'Submit','sweettooth' ),
	'comment_field' => '<textarea id="comment" placeholder="'.esc_html__( 'Your comment','sweettooth' ).'" name="comment" cols="45" rows="6" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" name="author" placeholder="'. esc_html__( 'Your Name','sweettooth' ) .'" type="text" value="' . esc_attr( $eltdf_commenter['comment_author'] ) . '"' . $eltdf_aria_req . ' />',
		'email' => '<input id="email" name="email" placeholder="'. esc_html__( 'Your Email','sweettooth' ) .'" type="text" value="' . esc_attr(  $eltdf_commenter['comment_author_email'] ) . '"' . $eltdf_aria_req . ' />'
		 ) ) );
 ?>
<?php if(get_comment_pages_count() > 1){ ?>
	<div class="eltdf-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<?php if(comments_open()) { ?>
	<div class="eltdf-comment-form">
		<div class="eltdf-comment-form-inner">
			<?php comment_form($eltdf_args); ?>
		</div>
	</div>
<?php } ?>	