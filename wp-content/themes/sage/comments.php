<?php
 /**
 * Sage Theme: Blog, comment template
 * @package WordPress
 * @subpackage Sage Theme
 * @since 1.0
 */
 
 $allowed_html_array = array(
    'a' => array(
        'href' => array(),
        'title' => array()
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
);
 ?>
 <div id="comments"> 
  <!-- Prevents loading the file directly -->
  <?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
  <?php die('Please do not load this page directly. Thanks and have a great day!'); ?>
  <?php endif; ?>
  
  <!-- Password Required -->
  <?php if(!empty($post->post_password)) : ?>
	  <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
      <?php endif; ?>
  <?php endif; ?>
  <!-- variable for alternating comment styles -->
  
  <?php if($comments) : ?>
  <h2>
    <?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'sage' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'sage'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
		?>
  </h2>
  <?php wp_list_comments(array('style' => 'div','avatar_size' => 64,), $comments);?>
  <?php else : ?>
  
  <?php if(comments_open()) : ?>
  <p>
    <?php esc_html_e('No comments yet. You should be kind and add one!', 'sage'); ?>
  </p>
  <?php endif; ?>
  
  <?php endif; ?>
  <div id="comments-form">
    <?php if(comments_open()) : ?>
    <?php
			$required_text =	 esc_html__('This is a required field!','sage');
			$aria_req		=	' required ';
			
			$args = array(	'id_form'           => 'commentform',
							'id_submit'         => 'submit',
							'title_reply'       => esc_html__( 'Leave a Reply', 'sage' ),
							'title_reply_to'    => esc_html__( 'Leave a Reply to %s' , 'sage'),
							'cancel_reply_link' => esc_html__( 'Cancel Reply' , 'sage'),
							'label_submit'      => esc_html__( 'Post Comment' , 'sage'),
							'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'sage' ) . 
								'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . 
								'</textarea></p>',
							'must_log_in' => '<p class="must-log-in">' .
								sprintf(
								  wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.' , 'sage'), $allowed_html_array ),
								  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
								) . '</p>',
							'logged_in_as' => '<p class="logged-in-as">' .
								sprintf(
								wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' , 'sage' ), $allowed_html_array ),
								  admin_url( 'profile.php' ),
								  $user_identity,
								  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
								) . '</p>',
							'comment_notes_before' => '<p class="comment-notes">' .
								esc_html__( 'Your email address will not be published.', 'sage' ) . ( $req ? $required_text : '' ) .
								'</p>',
							'comment_notes_after' => '<p class="form-allowed-tags">' .
								sprintf(
								  esc_html__( '<small>You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:<br> %s' , 'sage' ), allowed_tags() . '</small>'
								) . '</p>',
							'fields' => apply_filters( 'comment_form_default_fields', array(
								'author' =>
									'<p class="comment-form-author">' .
									'<label for="author">' . esc_html__( 'Name', 'sage' ) . '</label> ' .
									'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
									'" size="30"' . $aria_req . ' /></p>',
								'email' =>
									'<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'sage' ) . '</label> ' .
									'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
									'" size="30"' . $aria_req . ' /></p>',
								'url' =>
									'<p class="comment-form-url"><label for="url">' .
									esc_html__( 'Website', 'sage' ) . '</label>' .
									'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
									'" size="30" /></p>'
								)
							  ),
							);?>
    <?php comment_form( $args ); ?>
    <?php else : ?>
    <p>
      <?php //esc_html_e('The comments are closed.', 'sage'); ?>
    </p>
    <?php endif; ?>
  </div>
  <!--#commentsForm--> 
</div>
<!--#comments-->