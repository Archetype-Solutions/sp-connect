<?php
/**
 * Plugin Name: Sunny Portal Connect
 * Plugin URI: https://github.com/yourusername/sp-connect
 * Description: WordPress plugin to display SMA Sunny Portal microgrid telemetry data.
 * Version: 0.1.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * License: GPLv2 or later
 * Text Domain: sp-connect
 */

defined('ABSPATH') || exit;

define('SPC_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SPC_PLUGIN_URL', plugin_dir_url(__FILE__));

// Autoloader (composer or custom)
require_once SPC_PLUGIN_DIR . 'includes/class-spc-loader.php';

function spc_init_plugin() {
    \SPC\Loader::init();
}
add_action('plugins_loaded', 'spc_init_plugin');
