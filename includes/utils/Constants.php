<?php
/**
 * BC Dev Constants
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.2.0
 * @version 0.1.0
 */

if ( ! defined( 'BC_DEV_MODE' ) ) {
    define( 'BC_DEV_MODE', (bool) get_option( '_bc_dev_settings_enable_dev_mode', false ) );
}

if ( ! defined( 'BC_DEV_VERSION' ) ) {
    define( 'BC_DEV_VERSION', '0.1.0' );
}