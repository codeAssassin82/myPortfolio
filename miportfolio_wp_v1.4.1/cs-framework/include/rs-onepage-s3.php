<?php
/**
 * Page themeplate style 3
 *
 * @package mi
 * @since 1.0
 */ 

$blogid = get_option('page_for_posts');
$args = array(
	'post_type'      => 'page',
	'posts_per_page' => -1,
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'post__not_in' => array($blogid)
	
);

$q = new WP_Query($args);

if ( $q->have_posts() ) : while (  $q->have_posts() ) :  $q->the_post(); 

$content = get_the_content();
if (stristr($content, 'vc_')) {?>

	<div class="content-wrap-in" id="<?php print str_replace("-","-",$post->post_name);?>">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
<?php }
endwhile; endif; 
?>