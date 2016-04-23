<?php
/**
 * Main navigation
 *
 * @package mi
 * @since 1.0
 *
 */
	$website_style = cs_get_option( 'website_style' );
	if ($website_style == 'website-1' ) { ?>

		<!-- HEADER -->
		<header class="header-hide menu-style-1">
			<nav>
            	<?php if( has_nav_menu( 'primary-menu' ) && is_page()): ?>
                    <ul>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new topMenuS1() ) ); ?>
                    </ul>
                <?php endif; ?>
			</nav>
		</header>
        <?php if (!has_nav_menu( 'primary-menu' )): ?>
        <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a></span>
        <?php endif;?>
		<!-- /HEADER -->

	<?php } elseif ($website_style == 'website-2' ) { ?>

			<!-- HEADER -->        
			<header class="menu-style-2">
				<nav>
					<?php if( has_nav_menu( 'primary-menu' ) && is_page()): ?>
                        <ul>
                            <li id="p_name" class="fadeIn">
                                <a class="hight-head" href="#home" data-href="<?php echo esc_url(home_url('/')); ?>">

                                    <?php $site_logo = cs_get_option( 'site_logo' );
                                    if ($site_logo[0] == 'imglogo' ) { ?>
                                        <span class="show-on-desktop img-logo"></span>
                                   <?php } else { ?>
                                        <span class="show-on-desktop"><?php print cs_get_option( 'text_logo' );?></span>
                                   <?php } ?>                                    
                                    <span class="icon-circle-compass show-on-mobile" style="color:<?php print cs_get_option( 'text_logo_color' );?>;"></span> <!--Icon for mobile goes here -->
                                </a>
                            </li>

                            <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'items_wrap' => '%3$s', 'walker' => new topMenuS2() ) ); ?>
                        </ul>
                    <?php elseif (!has_nav_menu( 'primary-menu' )): ?>
                        <span class="no-menu">Please register Menu from <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>" target="_blank">Appearance &gt; Menus</a>
                    <?php endif; ?>
				</nav>
			</header>
			<!-- /HEADER -->
		
	<?php } else {
		locate_template ( 'cs-framework/include/rs-main-menu-s3.php',  true );
	}