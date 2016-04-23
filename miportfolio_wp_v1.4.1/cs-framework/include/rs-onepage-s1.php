<?php
/**
 * Page themeplate style 1
 *
 * @package mi
 * @since 1.0
 */ 
	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	);

	$q = new WP_Query($args);

	if ( $q->have_posts() ) : while (  $q->have_posts() ) :  $q->the_post(); 
	
	$meta_data 		= get_post_meta( get_the_ID(), '_custom_page_side_options', true );
	if (!empty($meta_data)){$page_type = $meta_data['page_types'][0];} else {$page_type = 'custompage';}

	$bg_page_color	= ( !empty($meta_data['page_bg_color'])) ? 'style="background-color:'.$meta_data["page_bg_color"].';"':'';
	$bg_page_img	= ( !empty($meta_data['page_bg_img']))   ? '<div class="animation-image" style="background-image: url('.$meta_data["page_bg_img"].');"></div>':'';
	
	$content = get_the_content();
	if (stristr($content, 'vc_')) {

	
	if ($page_type == 'slide_page'){?>
	 	<div class="content-wrap-in <?php echo esc_html($page_type);?>" id="<?php print str_replace("-","-",$post->post_name);?>">
			<div class="about-content" <?php print $bg_page_color;?>>
            <?php print $bg_page_img; ?>
				<div class="table">
					<div class="table-cell">
						<?php the_content();?>
					</div>
				</div>
            </div>
		<a href="#" class="close ui-link" data-animatedicon="close"><i class="fa fa-times"></i></a>
        </div>
	
	<?php } else { ?>

	<div class="content-wrap-in <?php echo esc_html($page_type);?>" id="<?php print str_replace("-","-",$post->post_name);?>">
		<?php the_content();?>
	</div>
<?php }
	
	wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
	}

	endwhile; endif;

