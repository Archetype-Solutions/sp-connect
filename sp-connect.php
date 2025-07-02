<?php
/**
 * Plugin Name: Sunny Portal Connect
 * Description: Integrate and display Sunny Portal microgrid telemetry on your WordPress site.
 * Version: 0.1.0
 * Author: Your Name
 * License: MIT
 */

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'class-sp-connect.php';

SP_Connect::init();
