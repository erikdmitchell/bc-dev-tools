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
        add_action('admin_init', array($this, 'admin'));
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

    public function scripts_styles() {
        wp_enqueue_script('bc-dev-tools', BC_URL . '/vendor/erikmitchell/bc-dev-tools/src/mkto.js', array('bc-marketo'), '0.1.0', true);
    }

    public function admin() {
        if (is_admin()) {
            new Admin();
        }
    }

}