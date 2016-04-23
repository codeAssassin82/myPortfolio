<?php
/**
 * Multipage themeplate style 1
 *
 * @package mi
 * @since 1.0
 */ 

while ( have_posts() ) : the_post();

	$meta_data 		= get_post_meta( get_the_ID(), '_custom_page_side_options', true );
	if (!empty($meta_data)){$page_type = $meta_data['page_types'][0];} else {$page_type = 'custompage';}
	
	$bg_page_color	= ( !empty($meta_data['page_bg_color'])) ? '<div class="bg-color-multi" style="background-color:'.$meta_data["page_bg_color"].';"></div>':'';
	$bg_page_img	= ( !empty($meta_data['page_bg_img']))   ? '<div class="animation-crop"><div class="animation-image" style="background-image: url('.$meta_data["page_bg_img"].');"></div></div>':'';

     print $bg_page_img . $bg_page_color;
	$content = get_the_content();
	if (stristr($content, 'vc_')) { ?>
        <div class="content-wrap-in" id="<?php print str_replace("-","-",$post->post_name);?>">
			<div class="content">
		        <?php the_content();?>
            </div>
        </div>
     <?php } else {?>
        <div class="content-wrap-in" id="<?php print str_replace("-","-",$post->post_name);?>">
			<div class="container multipage1 no_vc_content">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="inner-content"><?php the_content();?></div>
            </div>
        </div>
	 <?php }?>
	<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number'));
	

endwhile;