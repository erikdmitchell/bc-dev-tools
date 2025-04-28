<?php
/**
 * AWS Marketplace class
 *
 * @package erikdmitchell\bcdevtools;
 * @since   0.1.0
 * @version 0.1.0
 */

namespace erikdmitchell\bcdevtools;

class AWSMarketplace {
    
    protected static $instance = null;

    public function __construct() {}

    /**
     * Gets the single instance of the class.
     *
     * @return BlogTaxonomies Single instance of the class.
     */
    public static function init() {
        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}


/*
        if ( ( current_user_can( 'manage_options' ) || $test_mode ) && '' === $aws_token ) {
echo "dev mode?";            
            $aws_token = get_option( 'boomi_aws_test_customer_token' );
        }
            */