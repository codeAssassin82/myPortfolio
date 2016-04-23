<?php

/**
 *
 * This class provides the capability to import demo content as well as import widgets and WordPress menus
 *
 * @since 2.2.0
 *
 * @category MIPORTFOLIO Framework
 * @package  new
 * @author   relstudiosnx
 * @link     http://relstudiosnx.com/
 *
 */
class MI_Theme_Importer {

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $theme_options_file;

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $widgets;

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $content_demo_style1;
	public $content_demo_style2;
	public $content_demo_style4;
	public $content_demo_style5;
	public $content_demo_style6;

  // public $widget_import_results;
	/**
	 * Flag imported to prevent duplicates
	 *
	 * @since 2.2.0
	 *
	 * @var object
	 */
	public $flag_as_imported = array();

    /**
     * Holds a copy of the object for easy reference.
     *
     * @since 2.2.0
     *
     * @var object
     */
    private static $instance; 

    /**
     * Constructor. Hooks all interactions to initialize the class.
     *
     * @since 2.2.0
     */
    public function __construct() {

        self::$instance = $this;
		
        $this->content_demo_style1 = $this->demo_files_path . $this->content_demo_file_name_style1;
		$this->content_demo_style2 = $this->demo_files_path . $this->content_demo_file_name_style2;
		$this->content_demo_style4 = $this->demo_files_path . $this->content_demo_file_name_style4;
        $this->content_demo_style5 = $this->demo_files_path . $this->content_demo_file_name_style5;
        $this->content_demo_style6 = $this->demo_files_path . $this->content_demo_file_name_style6;
		 
        add_action( 'admin_menu', array($this, 'add_admin') );

    }

	/**
	 * Add Panel Page
	 *
	 * @since 2.2.0
	 */
    public function add_admin() {

        add_submenu_page('themes.php', "Import Demo Data", "Import Demo Data", 'switch_themes', 'mi_demo_installer', array($this, 'demo_installer'));

    }

    /**
     * [demo_installer description]
     *
     * @since 2.2.0
     *
     * @return [type] [description]
     */
    public function demo_installer() {

        ?>
        <div id="icon-tools" class="icon32"><br></div>
        <h2>Import Demo Data</h2>
        <div style="background-color: #F5FAFD; margin:10px 0;padding: 10px;color: #0C518F;border: 3px solid #CAE0F3; claer:both; width:90%; line-height:18px;">
            <p class="tie_message_hint">Importing demo data (post, pages, images, theme settings, ...) is the easiest way to setup your theme. It will
            allow you to quickly edit everything instead of creating content from scratch. When you import the data following things will happen:</p>

              <ul style="padding-left: 20px;list-style-position: inside;list-style-type: square;}">
                  <li>No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified .</li>
                  <li>No WordPress settings will be modified .</li>
                  <li>Posts, pages, some images, some widgets and menus will get imported .</li>
                  <li>Images will be downloaded from our server, these images are copyrighted and are for demo use only .</li>
                  <li>Please click import only once and wait, it can take a couple of minutes</li>
              </ul>
         </div>

        <div style="background-color: #F5FAFD; margin:10px 0;padding: 10px;color: #0C518F;border: 3px solid #CAE0F3; claer:both; width:90%; line-height:18px;"><p class="tie_message_hint">Before you begin, make sure all the required plugins are activated. <br />Before importing please remove all pages for correct display.</p></div>
        <div style="background-color: #F5FAFD; margin:10px 0;padding: 10px;color: #0C518F;border: 3px solid #CAE0F3; claer:both; width:90%; line-height:18px;">
            Choose one type of content, what you need and click once on corresponding button: <br>
            <div style="padding: 2em 0;">
                <form method="post" style="display: inline-block; margin-left: 2em;">
                    <input type="hidden" name="demononce6" value="<?php print wp_create_nonce('mi-demo-code-style6'); ?>" />
                    <input name="reset" class="panel-save button-primary" type="submit" value="Default" />
                    <input type="hidden" name="action" value="demo-data-style6" />
                </form>
                <form method="post" style="display: inline-block; margin-left: 2em;">
                    <input type="hidden" name="demononce1" value="<?php print wp_create_nonce('mi-demo-code-style1'); ?>" />
                    <input name="reset" class="panel-save button-primary" type="submit" value="Style 1" />
                    <input type="hidden" name="action" value="demo-data-style1" />
                </form>
                <form method="post" style="display: inline-block; margin-left: 2em;">
                    <input type="hidden" name="demononce2" value="<?php print wp_create_nonce('mi-demo-code-style2'); ?>" />
                    <input name="reset" class="panel-save button-primary" type="submit" value="Style 2" />
                    <input type="hidden" name="action" value="demo-data-style2" />
                </form>
                <form method="post" style="display: inline-block; margin-left: 2em;">
                    <input type="hidden" name="demononce4" value="<?php print wp_create_nonce('mi-demo-code-style4'); ?>" />
                    <input name="reset" class="panel-save button-primary" type="submit" value="Style 3" />
                    <input type="hidden" name="action" value="demo-data-style4" />
                </form>
                <form method="post" style="display: inline-block; margin-left: 2em;">
                    <input type="hidden" name="demononce5" value="<?php print wp_create_nonce('mi-demo-code-style5'); ?>" />
                    <input name="reset" class="panel-save button-primary" type="submit" value="Style 4" />
                    <input type="hidden" name="action" value="demo-data-style5" />
                </form>
            </div>
        </div>
        <br />
        <br />

        <?php
		
		$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : ''; 
		
        if( 'demo-data-style1' == $action && check_admin_referer('mi-demo-code-style1' , 'demononce1')){

            $this->set_demo_data( $this->content_demo_style1 );

        } else if( 'demo-data-style2' == $action && check_admin_referer('mi-demo-code-style2' , 'demononce2')) {

            $this->set_demo_data( $this->content_demo_style2 );

        
		} else if( 'demo-data-style4' == $action && check_admin_referer('mi-demo-code-style4' , 'demononce4')) {

            $this->set_demo_data( $this->content_demo_style4 );

		} else if( 'demo-data-style5' == $action && check_admin_referer('mi-demo-code-style5' , 'demononce5')) {

            $this->set_demo_data( $this->content_demo_style5 );

		
		} else if( 'demo-data-style6' == $action && check_admin_referer('mi-demo-code-style6' , 'demononce6')) {

            $this->set_demo_data( $this->content_demo_style6 );

        }

    }

    /**
     * import demo data
     *
     * @since 2.2.0
     *
     * @return null
     */
    public function set_demo_data( $file ) {

	    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

        require_once ABSPATH . 'wp-admin/includes/import.php';

        $importer_error = false;

        if ( !class_exists( 'WP_Importer' ) ) {

            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	
            if ( file_exists( $class_wp_importer ) ){

                require_once($class_wp_importer);

            } else {

                $importer_error = true;

            }

        }

        if ( !class_exists( 'WP_Import' ) ) {

            $class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';

            if ( file_exists( $class_wp_import ) ) 
                require_once($class_wp_import);
            else
                $importer_error = true;

        }

        if($importer_error){

            die("Error on import");

        } else {
			
            if(!is_file( $file )){

                print "The XML file containing the dummy content is not available or could not be read .. You might want to try to set the file permission to chmod 755.<br/>If this doesn't work please use the Wordpress importer and import the XML file (should be located in your download .zip: Sample Content folder) manually ";

            } else {

               $wp_import = new WP_Import();
               $wp_import->fetch_attachments = true;
               $wp_import->import( $file );

         	}

    	}

    }

}
?>