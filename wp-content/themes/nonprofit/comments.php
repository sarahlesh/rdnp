<?php function nonprofit_comments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class("clearfix"); ?>>
    <article id="comment-<?php comment_ID(); ?>">
      <header class="large-2 columns comment-author clearfix">
        <?php echo get_avatar($comment,$size='48'); ?>
      </header>
      <div class="large-10 columns">
      	 <div class="author-meta">
		       <cite class="fn"><?php echo get_comment_author_link() ?></cite>
           <?php edit_comment_link(esc_html__('(Edit)', 'nonprofit'), '', '') ?>
        </div>
      <?php if ($comment->comment_approved == '0') : ?>
            <div class="notice alert-box">
              <p class="bottom"><?php esc_html_e('Your comment is awaiting moderation.', 'nonprofit') ?></p>
            </div>
      <?php endif; ?>
      
      <section class="comment">
        <?php comment_text() ?>

        <time datetime="<?php echo comment_date('c') ?>"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(esc_html__('%1$s', 'nonprofit'), get_comment_date(),  get_comment_time()) ?></a></time>
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 

      </section>
	</div>
    </article>
   </li>
<?php } ?>



<?php
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die (esc_html__('Please do not load this page directly. Thanks!', 'nonprofit'));

  if ( post_password_required() ) { ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'nonprofit'); ?></p>
    </div>
  </section>
  <?php
    return;
  }
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if ( have_comments() ) : ?>
  <section id="comments">
    <ul class="commentlist">
    <?php wp_list_comments('type=comment&callback=nonprofit_comments'); ?>
    
    </ul>
    <footer>
      <nav id="comments-nav">
        <div class="comments-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'nonprofit' ) ); ?></div>
        <div class="comments-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'nonprofit' ) ); ?></div>
      </nav>
    </footer>
  </section>
<?php else : // this is displayed if there are no comments so far ?>
  <?php if ( comments_open() ) : ?>
  <?php else : // comments are closed ?>
  <section id="comments">
    <div class="notice alert-box">
      <p class="bottom"><?php esc_html_e('Comments are closed.', 'nonprofit') ?></p>
    </div>
  </section>
  <?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<section id="respond" class="wd-section-reply">
  <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
  <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  <p><?php printf( esc_html__('You must be <a href="%s">logged in</a> to post a comment.', 'nonprofit'), wp_login_url( get_permalink() ) ); ?></p>
  <?php else : ?>
	  <?php
		  $args = array(
			  'class_submit' => 'submit button',
		  );
	    comment_form($args); ?>
  <?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>