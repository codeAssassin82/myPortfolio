<?php
/**
 *
 * Standart Post Format
 * @since 1.0
 * @version 1.2.0
 *
 */
?>


<?php if ( has_post_thumbnail() ) {?> <figure class="images blog-post-img">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail('full');?>
	</a>
</figure> <?php } ?>
 
<div class="post-wrap">
	<?php if( !is_single()) { ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog-title"><h3><?php the_title(); ?></h3></a>
	<?php } else { ?>
		<h3 class="post-title"><?php the_title(); ?></h3>
	<?php } ?>
  
  <p class="blog-post-date"><?php echo esc_html(get_the_date()); ?></p>
  
  <?php  if( !is_single() ) { ?>
	<div class="blog-desc"><?php the_excerpt(); ?></div>
	<div class="bottom"> 
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="arrow readmore">READ MORE</span></a>
	</div> 
  <?php } else { ?>
	<div class="blog-article">
		<?php the_content(); wp_link_pages('before=<div class="post-nav">&after=</div>'); ?>
	</div>
    
    <div class="post-meta">
    	<p><i>Category: </i><?php print get_the_category_list(', '); ?></p>
    	<?php the_tags( '<p><i>Tags:</i> ', ', ', '</p>' ); ?>
    </div>
    
  <?php

    // If comments are open or we have at least one comment, load up the comment template
    if ( comments_open() || '0' != get_comments_number() ) {
      comments_template( '', true );
    }

  ?>
    
  <?php } ?>
</div>
