<?php
/**
 *
 * Comment Form
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function mi_comment( $comment, $args, $depth ) {

   //start comments
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ):
    case 'pingback':
    case 'trackback':
  ?>
  <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>"><p><?php _e( 'Pingback:', 'mi'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'mi'), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;

      default:

      // generate comments
    global $post;
  ?>
  <li <?php comment_class('ct-part'); ?> id="li-comment-<?php comment_ID(); ?>">
    <div id="comment-<?php comment_ID(); ?>">

      <p class="comment-meta">
        <strong><?php print get_comment_author_link(); ?></strong>
        <sub><i>
        <?php
          printf( '%3$s', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( get_comment_date(), get_comment_time() )); print '&nbsp;';
          comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply &raquo;', 'mi'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); 
        ?>
        </i></sub>
      </p>

      <?php comment_text(); ?>

    </div><!-- #comment container-## -->
  <?php
    break;
  endswitch;

}

if ( post_password_required() ) { return; }
?>

  <?php if(comments_open()) : ?>
    <div class="element clearfix col1-3 home grey auto">
    <?php if ( have_comments() ) : ?>
      <h3><?php printf( _n( 'Comments &#40;1&#41;', 'Comments &#40;%1$s&#41; ', get_comments_number() ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>

      <ul class="clearfix" id="comment-list"><?php wp_list_comments( array( 'callback' => 'mi_comment', 'style' => 'ul' ) ); ?></ul>

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="nav-single">
          <div class="nav-previous left"><?php previous_comments_link( __( 'Older Comments', 'mi') ); ?></div>
          <div class="nav-next right"><?php next_comments_link( __( 'Newer Comments;', 'mi' ) ); ?></div>
        </nav>
      <?php endif; endif; endif; ?>

  <?php 

    //Custom Fields
    $fields =  array(
      'author'=> '<input id="comment-author" type="text" placeholder="Name (required)" tabindex="1"  name="author">',
      'email' => '<input type="email" id="comment-email" name="email" placeholder="E-mail (requried)" tabindex="2">',
      'url'   => '<input type="text" id="comment-website" name="website" placeholder="Website" tabindex="3">',
    );

      $comments_args = array(
        'fields' => $fields,
            'comment_field' => '<textarea id="comment" aria-required="true" name="comment" placeholder="Message (requried)" rows="6" tabindex="4"></textarea>',
            'must_log_in' => '',
            'logged_in_as' => '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply' => sprintf(__('Leave a Comment', 'mi')),
            'title_reply_to' => __('Leave a Reply to %s', 'mi'),
            'cancel_reply_link' => __('Cancel', 'mi'),
            'label_submit' => __('Send', 'mi'),
      );

      comment_form($comments_args); ?>

      </div>