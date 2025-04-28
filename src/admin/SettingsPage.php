<?php
/**
 * Settings Page class
 *
 * @package erikdmitchell\bcdevtools\admin;
 * @since   0.2.0
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools\admin;

class SettingsPage {

    private static $instance = null;

    private function __construct() {
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
    }

    public static function init() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function add_settings_page() {
        add_menu_page(
            'Custom Settings',
            'Custom Settings',
            'manage_options',
            'custom-settings',
            [ $this, 'render_settings_page' ]
        );
    }

    public function render_settings_page() {
        echo '<div class="wrap"><h1>Custom Settings Page</h1></div>';
    }
}