<?php
namespace SPC;

defined('ABSPATH') || exit;

class Admin {
    public static function init() {
        add_action('admin_menu', [self::class, 'register_admin_menu']);
    }

    public static function register_admin_menu() {
        add_menu_page(
            __('Sunny Portal Connect', 'sp-connect'),
            __('Sunny Portal Connect', 'sp-connect'),
            'manage_options',
            'spc-settings',
            [self::class, 'render_settings_page'],
            'dashicons-admin-site-alt3',
            80
        );
    }

    public static function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Sunny Portal Connect Settings', 'sp-connect'); ?></h1>
            <p>Settings page coming soon.</p>
        </div>
        <?php
    }
}
