<?php
/**
 * Plugin Name: Voxpow - Speech Recognition for your website
 * Description: Speech Recognition Tool powered by Machine Learning. Direct in your website and for free.
 * Version: 1.1.5
 * Author: Voxpow
 * Author URI: https://voxpow.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: voxpow
 * Domain Path: /languages
 */

$voxpow_class = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'voxpow_class.php';
$voxpow_connection_class = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'voxpow_connection_class.php';

require $voxpow_class;
require $voxpow_connection_class;

load_plugin_textdomain('voxpow', false, dirname(plugin_basename(__FILE__)) . '/languages');

function voxpow_incompatibile($msg)
{
    require_once ABSPATH . DIRECTORY_SEPARATOR . 'wp-admin' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'plugin.php';
    deactivate_plugins(__FILE__);
    wp_die($msg);
}

if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {

    if (version_compare(PHP_VERSION, '5.3.3', '<')) {

        voxpow_incompatibile(
            __('Plugin Voxpow requires PHP 5.3.3 or higher. The plugin has now disabled itself.',
                'voxpow')
        );

    } elseif (!function_exists('curl_version')
        || !($curl = curl_version()) || empty($curl['version']) || empty($curl['features'])
        || version_compare($curl['version'], '7.16.2', '<')
    ) {

        voxpow_incompatibile(
            __('Plugin Voxpow Spaces Sync requires cURL 7.16.2+. The plugin has now disabled itself.', 'voxpow')
        );

    } elseif (!($curl['features'] & CURL_VERSION_SSL)) {

        voxpow_incompatibile(
            __('Plugin Voxpow requires that cURL is compiled with OpenSSL. The plugin has now disabled itself.',
                'voxpow')
        );

    }

}


/**
 * Run Voxpow function to register all the functionalities
 *
 * @since    1.0.0
 * @access   public
 */
function run_voxpow()
{
    //Get instance of the class
    $instance = Voxpow::get_instance();
    //Make the initial settings and registrations
    $instance->setup();
}

/**
 * Actions to make when deactivating plugin
 *
 * @since    1.0.0
 * @access   public
 */
function voxpow_on_deactivation()
{
    Voxpow::deactivate();
}

//Register the deactivation function
register_deactivation_hook(__FILE__, 'voxpow_on_deactivation');

//Run the plugin
run_voxpow();