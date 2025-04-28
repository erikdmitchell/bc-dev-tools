<?php
/**
 * BC Dev Tools class
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.1.0
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools;

require_once __DIR__ . '/utils/Constants.php';

/**
 * BCDevTools class.
 */
class BCDevTools {

    private $plugin_url;

    /**
     * The single instance of the class.
     *
     * @var boolean
     */
    private static $instance = false;

    /**
     * Constructor.
     * 
     * @return void
     */
    private function __construct() {        
        $this->plugin_url = plugin_dir_url(__FILE__);

        $this->includes();
    }

    /**
     * Gets the single instance of the class.
     *
     * @return BCMigration Single instance of the class.
     */
    public static function init() {  
		  if ( ! self::$instance ) {
  			self::$instance = new self();
	  	}

		  return self::$instance;
    }

    private function includes() {
        AdminBar::init();

        if ( is_admin() ) {
            $admin_dir = __DIR__ . '/admin/';

            foreach ( glob( $admin_dir . '*.php' ) as $file ) {
                require_once $file;
    
                $class_name = basename( $file, '.php' );
    
                $full_class = '\\erikdmitchell\\bcdevtools\\admin\\' . $class_name;
    
                if ( class_exists( $full_class ) && method_exists( $full_class, 'init' ) ) {
                    $full_class::init();
                }
            }
        }
    }   
}