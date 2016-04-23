<?php
/**
 * Search Page
 *
 * @package mi
 * @since 1.0
 *
 */

get_header(); 

?>
<div class="content-wrapper">
	
    <!-- Blog Header Section -->
	<?php 
	$show_head = cs_get_option( 'show_head' );
	if ($show_head == true){
		$header_bg 	= cs_get_option( 'head_bg_color' );
		$header_img = cs_get_option( 'head_img' );
		if (!empty($header_bg)){$header_bg = 'style="background-color:'.$header_bg.'"';}else{$header_bg = '';}
		if (!empty($header_img)){$header_img = '<div class="header-image" style="background-image:url('.$header_img.')"></div>';}else{$header_img = '';}
			print '<div class="cat-header" '.$header_bg.'>'.$header_img.'</div>';
	} else {
	
	
	}?>

    <!-- End Blog Header Section -->
    
	<div class="container blog-content">
    	<!-- Main content -->
        <div class="col-md-8">
	
    	<?php
        if ( have_posts() ) { while ( have_posts() ) : the_post();
        $post_format = (get_post_format() == true) ? get_post_format():'standard';

        switch ($post_format) {
            case 'aside':
            case 'quote':
            $class = 'grey';
        break;
        
        default:
          $class = '';
          break;
        }

        ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class('post-item clearfix '.$class.' '); ?>>
            <?php get_template_part('post-formats/content', $post_format ); ?> 
        </div>

        <?php endwhile; ?>
        <?php mi_cat_paging_nav(); ?>
        <?php } else {?>
			<div class="search-not-found">Sorry, but nothing matched your search terms. Please try again with some different keywords.</div>
		<?php } ?>
        
        
        </div>
        <!-- End main content -->
        
        <!-- Sidebar -->
        <div id="sidebar" class="col-md-4">
        	<?php get_sidebar(); ?>
        </div>
        <!-- End sidebar -->
	</div>
</div>

<?php get_footer(); ?>