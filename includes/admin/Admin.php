<?php
/**
 * Admin class
 *
 * @package erikdmitchell\bcdevtools\admin;
 * @since   0.2.0
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools\admin;

class Admin {

    private static $instance = null;

    private function __construct() {
        add_action('admin_init', array( $this, 'update_settings' ) );
        add_action( 'admin_notices', array( $this, 'admin_notices' ) );

        add_filter( 'boomi_cms_admin_menu_pages', array( $this, 'add_settings_page' ), 10, 2 );
    }

    public static function init() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function add_settings_page($hook_names, $main_slug) {
        $hook_names[] = add_submenu_page(
            $main_slug, 
            'Dev Tools',
            'Dev Tools',
            'manage_options',
            'bc-dev-tools',
            array( $this, 'render_admin_page' ),
            PHP_INT_MAX
        );

        return $hook_names;
    }

    public function render_admin_page() {
        $path = __DIR__ . '/pages/admin.php';

        if ( file_exists( $path ) ) {
            include $path;
        } else {
            echo '<div class="notice notice-error"><p>Admin page not found.</p></div>';
        }
    }

    public function admin_notices() {
        if ( isset( $_GET['settings-updated'] ) && 'true' === $_GET['settings-updated'] ) {
            echo '<div class="notice notice-success is-dismissible"><p>Settings saved.</p></div>';
        }
    }

    public function update_settings() {
        $prefix = '_bc_dev_settings';

        if (!isset($_POST['bc_dev_settings_nonce']) || !wp_verify_nonce($_POST['bc_dev_settings_nonce'], 'bc_save_dev_settings')) {
            return;
        }

        $settings = isset( $_POST['bc_dev_settings'] ) ? wp_unslash( $_POST['bc_dev_settings'] ) : array();

        if (isset( $settings['submitted'] ) ) {
            unset( $settings['submitted'] );
        }
    
        if ( isset( $settings['enable_dev_mode'] ) ) {
            update_option( $prefix . '_enable_dev_mode', 1 );

            unset( $settings['enable_dev_mode'] );
        } else {
            update_option( $prefix . '_enable_dev_mode', 0 );
        }

        if ( ! empty( $settings ) ) {
            foreach ( $settings as $key => $value ) {
                if ( is_array( $value ) ) {
                    foreach ( $value as $sub_key => $sub_value ) {                      
                        boomi_update_option( $key . '_' . $sub_key, $sub_value );
                    }
                } else {
                    boomi_update_option( $prefix . '_' . $key, $value );
                }
            }
        }

        // Redirect to avoid resubmission and add query var.
        wp_safe_redirect( add_query_arg( 'settings-updated', 'true', wp_get_referer() ) );
        exit;
    }        
}