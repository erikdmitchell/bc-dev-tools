<?php
/**
 * Admin Bar class
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.2.0
 * @version 0.2.0
 */

namespace erikdmitchell\bcdevtools;

class AdminBar {

    /**
     * The single instance of the class
     *
     * @var AdminBar
     */
    private static $instance = null;

    /**
     * Constructor.
     */
    private function __construct() {
        add_action( 'admin_bar_menu', [ $this, 'admin_bar_menu' ], PHP_INT_MAX );
    }

    /**
     * Get or create the instance.
     *
     * @return AdminBar
     */
    public static function init() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Modify the admin bar.
     *
     * @param \WP_Admin_Bar $admin_bar
     * @return void
     */
    public function admin_bar_menu( $admin_bar ) {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $admin_bar->add_menu( [
            'id'     => 'custom-menu-item',
            'title'  => 'Menu Item',
            'href'   => esc_url( admin_url( 'admin.php?page=custom-options-page' ) ),
            'parent' => null,
            'group'  => false,
            'meta'   => '',
        ] );
    }
}