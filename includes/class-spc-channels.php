<?php
namespace SPC;

defined('ABSPATH') || exit;

class Channels {
    public static function init() {
        // Future: Register custom post type or settings section
        add_action('init', [self::class, 'register_channel_type']);
    }

    public static function register_channel_type() {
        // Optional: Could be stored via CPT or options API
    }

    public static function get_channels() {
        return [
            [
                'id' => 1,
                'name' => 'My Microgrid A',
                'system_id' => 'sys1234'
            ]
        ];
    }
}
