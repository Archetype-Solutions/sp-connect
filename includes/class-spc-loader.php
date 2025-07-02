<?php
namespace SPC;

defined('ABSPATH') || exit;

class Loader {
    public static function init() {
        require_once SPC_PLUGIN_DIR . 'includes/class-spc-api.php';
        require_once SPC_PLUGIN_DIR . 'includes/class-spc-admin.php';
        require_once SPC_PLUGIN_DIR . 'includes/class-spc-channels.php';
        require_once SPC_PLUGIN_DIR . 'includes/class-spc-display.php';

        Admin::init();
        Channels::init();
        Display::init();
    }
}
