<?php
namespace SPC;

defined('ABSPATH') || exit;

class Display {
    public static function init() {
        add_shortcode('spc_live_data', [self::class, 'render_live_data']);
    }

    public static function render_live_data($atts) {
        $atts = shortcode_atts([
            'channel_id' => 1
        ], $atts);

        $data = API::get_data($atts['channel_id']);

        ob_start(); ?>
        <div class="spc-telemetry">
            <p><strong>Status:</strong> <?php echo esc_html($data['status']); ?></p>
            <p><strong>Power:</strong> <?php echo esc_html($data['power']); ?> W</p>
            <p><strong>Updated:</strong> <?php echo esc_html($data['timestamp']); ?></p>
        </div>
        <?php return ob_get_clean();
    }
}
