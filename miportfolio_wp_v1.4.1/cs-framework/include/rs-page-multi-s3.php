<?php
/**
 * Multipage themeplate style 3
 *
 * @package mi
 * @since 1.0
 */ 

while ( have_posts() ) : the_post();

	$meta_data 		= get_post_meta( get_the_ID(), '_custom_page_side_options', true );
	if (!empty($meta_data)){$page_type = $meta_data['page_types'][0];} else {$page_type = 'custompage';}
	
	$bg_page_color	= ( !empty($meta_data['page_bg_color'])) ? 'style="background-color:'.$meta_data["page_bg_color"].';"':'';
	$bg_page_img	= ( !empty($meta_data['page_bg_img']))   ? '<div class="animation-crop"><div class="animation-image" style="background-image: url('.$meta_data["page_bg_img"].');"></div></div>':'';

	$content = get_the_content();
	if (stristr($content, 'vc_')) { ?>
        <div class="content-wrap-in multipage3" id="<?php print str_replace("-","-",$post->post_name);?>">
	        <?php the_content();?>
        </div>
	<?php } else {?>
        <div class="blog-content container content-wrap-in multipage3" id="<?php print str_replace("-","-",$post->post_name);?>">
	    	<div class="blog-article">
                <h3 class="post-title"><?php the_title(); ?></h3>
                <div class="inner-content"><?php the_content();?></div>
            </div>
        </div>
	<?php } ?>
	<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
endwhile;