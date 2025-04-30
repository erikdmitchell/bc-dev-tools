<?php
/**
 * Tools for the Pay As You Go upgrade page
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.2.1
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools;

class PAYGUpgrade {

    /**
     * The single instance of the class
     *
     * @var PAYGUpgrade
     */
    private static $instance = null;

    /**
     * Constructor.
     */
    private function __construct() {

    }

    /**
     * Get or create the instance.
     *
     * @return PAYGUpgrade
     */
    public static function init() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}


// $aaid = null;

// // Check if 'aaid' exists in the query string
// if (isset($_GET['aaid']) && !empty($_GET['aaid'])) {
//     $aaid = sanitize_text_field($_GET['aaid']);
// } else {
//     // Fallback to site option
//     $aaid = get_option('default_aaid'); // Replace with your actual option name
// }