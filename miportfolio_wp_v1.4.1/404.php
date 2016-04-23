<?php
/**
 * 404 Page
 *
 * @package mi
 * @since 1.0
 *
 */
get_header(); 

?>
<div class="content-wrapper">
	
    <!-- Header Section -->
	<?php 
	$show_head = cs_get_option( 'show_head_404' );
	if ($show_head == true){
		$header_bg 	= cs_get_option( 'head_bg_color_404' );
		$header_img = cs_get_option( 'head_img_404' );
		if (!empty($header_bg)){$header_bg = 'style="background-color:'.$header_bg.'"';}else{$header_bg = '';}
		if (!empty($header_img)){$header_img = '<div class="header-image" style="background-image:url('.$header_img.')"></div>';}else{$header_img = '';}
			print '<div class="cat-header" '.$header_bg.'>'.$header_img.'</div>';
	} else {
	
	
	}?>

    <!-- End Header Section -->
    
	<div class="container blog-content">
    	<!-- Main content -->
        <div class="col-md-12">
			<div class="error-404-mess">
            	<p class="error-code">Error 404</p>
                <div class="error-mess"><?php echo esc_html(cs_get_option( 'error_message' )); ?></div>
                <a href="<?php echo esc_url(home_url('/')); ?>"  data-title="" class="whole-tile">
                    <p class="alignleft">Back to the homepage</p>
                </a>
            </div>
        </div>
        <!-- End main content -->
        

	</div>
</div>

<?php get_footer(); ?>