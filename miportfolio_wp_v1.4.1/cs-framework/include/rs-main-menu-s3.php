<!-- /HEADER -->
<?php $menu_style = cs_get_option( 'menu_style' );
	$content = get_the_content();
	if (stristr($content, 'vc_')) {$bmenu = '';} else {$bmenu = 'act-menu';}

	// MENU STYLE 5
	if ($menu_style == 'style-5' ) { ?>

    <?php if ((!has_nav_menu( 'primary-menu' ) && is_page()) || (!has_nav_menu( 'additional-menu' ) && !is_page())) { ?>
		<span class="no-menu style2">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
    <?php } else {?>

    <nav class="navbar navbar-default menu-style-5" role="navigation">    
    <div class="header">
        <div class="container">
            <nav id="bt-menu" class="bt-menu">
                <i class="fa fa-bars fa-2x bt-menu-trigger"></i>
					<?php if( has_nav_menu( 'primary-menu' ) && is_page()): ?>
                    <ul>
	                    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new topMenuWalker() ) ); ?>
                    </ul>
                    <?php endif; ?>
                    
                    <?php if( has_nav_menu( 'additional-menu' ) && !is_page()): ?>
                    <ul>
    	                <?php wp_nav_menu( array( 'theme_location' => 'additional-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new additionalMenuWalker() ) ); ?>
                    </ul>
                    <?php endif; ?>
            </nav>
        </div>
    </div>
    </nav>
    <?php }?>
    
<?php } 
	// MENU STYLE 4
	else if ($menu_style == 'style-4' ) { ?>
	<div id="header-sticky-wrapper" class="sticky-wrapper">
        <div id="header" class="header-sticky ">
            <div class="col-lg-8 align-center">	
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="text-align:left">
                    <?php
                    if (!is_front_page()){ $home_url = 'target="_self" href="'.esc_url(home_url( '/' )).'"';} else { $home_url = '';}
                    $site_logo = cs_get_option( 'site_logo' );
                    if ($site_logo[0] == 'imglogo' ) { ?>
                        <a <?php print $home_url;?> class="site-logo navbar-brand nav-img"></a>
                   <?php } else { ?>
                        <a <?php print $home_url;?> class="head-p-name"><?php print cs_get_option( 'text_logo' );?></a>
                   <?php } ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 " style="text-align:right">
                    <span>
                        <button type="button" id="trigger_overlay2" class=" ui-btn ui-shadow ui-corner-all">
                            <img src="<?php  echo esc_url( get_template_directory_uri() ); ?>/assets3/img/hamburger.png" alt="Menu">
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
    
    <!-- Open/Close -->
    <div class="overlay2 overlay-slidedown">
        <button type="button" class="overlay-close"><i class="fa fa-times fa-2x close-cross"></i></button>
        <nav>
			<?php if( has_nav_menu( 'primary-menu' ) && is_page()): ?>
                <ul class="nav-style-4">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new topMenuWalker() ) ); ?>
                </ul>
            <?php elseif (!has_nav_menu( 'primary-menu' ) && is_page()): ?>
                <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
            <?php endif; ?>
            
            <?php if( has_nav_menu( 'additional-menu' ) && !is_page()): ?>
                <ul class="nav-style-4 additional-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'additional-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new additionalMenuWalker() ) ); ?>
                </ul>
            <?php elseif (!has_nav_menu( 'additional-menu' ) && !is_page()): ?>
                <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
            <?php endif; ?>
            
            
        </nav>
    </div>
<?php } else {
	// MENU STYLE 6
?>
    <div class="header header-hide <?php echo esc_attr($bmenu);?>">
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
		   <div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
				 <span class="sr-only">Toggle navigation</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			  </button>
			    
				<?php
				if (!is_front_page()){ $home_url = 'target="_self" href="'.esc_url(home_url( '/' )).'"';} else { $home_url = '';}
				$site_logo = cs_get_option( 'site_logo' );
				if ($site_logo[0] == 'imglogo' ) { ?>
               		<a <?php print $home_url;?> class="site-logo navbar-brand style6 nav-img"></a>
               <?php } else { ?>
              		<a <?php print $home_url;?> class="site-logo navbar-brand style6"><?php print cs_get_option( 'text_logo' );?></a>
               <?php } ?>
		   </div>
		   <div class="collapse navbar-collapse" id="example-navbar-collapse">
				<?php if( has_nav_menu( 'primary-menu' ) && is_page()): ?>
                    <ul class="nav navbar-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new topMenuWalker() ) ); ?>
                    </ul>
                <?php elseif (!has_nav_menu( 'primary-menu' ) && is_page()): ?>
                    <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
                <?php endif; ?>
                
				<?php if( has_nav_menu( 'additional-menu' ) && !is_page()): ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'additional-menu', 'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>' ) ); ?>
                    
                <?php elseif (!has_nav_menu( 'additional-menu' ) && !is_page()): ?>
                    <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
                <?php endif; ?>  
                
                
		   </div>
		</nav>
	</div> 
	</div>

<?php } ?>
<!--/HEADER-->


