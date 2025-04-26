<?php
/**
 * BC Dev Tools class
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.1.0
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools;

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

        add_action('wp_enqueue_scripts', array($this, 'scripts_styles'));
    }

    /**
     * Gets the single instance of the class.
     *
     * @return BCMigration Single instance of the class.
     */
    public static function init() {
echo "foo monkey<br>";      
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
    }

    public function scripts_styles() {}

}