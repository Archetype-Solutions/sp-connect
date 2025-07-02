<?php
defined('ABSPATH') || exit;

class SP_Connect {
    const OPTION_KEY = 'spc_channels';

    public static function init() {
        add_action('admin_menu', [self::class, 'register_admin_menu']);
        add_action('admin_init', [self::class, 'handle_channel_actions']);
        add_action('admin_init', [self::class, 'maybe_show_admin_notice']);
    }

    public static function register_admin_menu() {
        add_menu_page(
            __('Sunny Portal Connect', 'sp-connect'),
            __('Sunny Portal', 'sp-connect'),
            'manage_options',
            'spc-settings',
            [self::class, 'render_channel_list'],
            'dashicons-admin-generic'
        );

        add_submenu_page(
            null,
            __('Edit Channel', 'sp-connect'),
            __('Edit Channel', 'sp-connect'),
            'manage_options',
            'spc-channel-edit',
            [self::class, 'render_channel_edit']
        );
    }

    public static function handle_channel_actions() {
        if (!is_admin()) return;
    
        // Handle delete
        if (
            isset($_GET['page'], $_GET['action'], $_GET['id']) &&
            $_GET['page'] === 'spc-settings' &&
            $_GET['action'] === 'delete'
        ) {
            $id = sanitize_text_field($_GET['id']);
            self::delete_channel($id);
            wp_safe_redirect(admin_url('admin.php?page=spc-settings&deleted=1'));
            exit;
        }
    
        // Handle save (form submission)
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['spc_channel_nonce']) &&
            wp_verify_nonce($_POST['spc_channel_nonce'], 'save_channel')
        ) {
            $id = isset($_POST['channel_id']) ? sanitize_text_field($_POST['channel_id']) : wp_generate_uuid4();
            $channel = [
                'name' => sanitize_text_field($_POST['channel_name']),
                'system_id' => sanitize_text_field($_POST['system_id']),
            ];
            self::save_channel($id, $channel);
            wp_redirect(admin_url('admin.php?page=spc-settings&saved=1'));
            exit;
        }
    }
    
    public static function maybe_show_admin_notice() {
        if (isset($_GET['deleted']) && $_GET['deleted'] === '1') {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible"><p>Channel deleted successfully.</p></div>';
            });
        }
    
        if (isset($_GET['saved']) && $_GET['saved'] === '1') {
            add_action('admin_notices', function () {
                echo '<div class="notice notice-success is-dismissible"><p>Channel saved successfully.</p></div>';
            });
        }
    }
      
    public static function render_channel_list() {
        $channels = self::get_channels();
        ?>
        <div class="wrap">
            <h1>Sunny Portal Channels</h1>
            <a href="<?php echo admin_url('admin.php?page=spc-channel-edit'); ?>" class="button-primary">Add New Channel</a>
            <?php if (!empty($channels)): ?>
                <table class="widefat striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>System ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($channels as $id => $ch): ?>
                            <tr>
                                <td><?php echo esc_html($ch['name']); ?></td>
                                <td><?php echo esc_html($ch['system_id']); ?></td>
                                <td>
                                    <a href="<?php echo admin_url("admin.php?page=spc-channel-edit&id=$id"); ?>">Edit</a> |
                                    <a href="<?php echo admin_url("admin.php?page=spc-settings&action=delete&id=$id"); ?>" onclick="return confirm('Delete this channel?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No channels created yet.</p>
            <?php endif; ?>
        </div>
        <?php
    }
    

    public static function render_channel_edit() {
        $is_edit = isset($_GET['id']);
        $id = $is_edit ? sanitize_text_field($_GET['id']) : wp_generate_uuid4();
        $channel = $is_edit ? self::get_channel($id) : ['name' => '', 'system_id' => ''];
    
        ?>
        <div class="wrap">
            <h1><?php echo $is_edit ? 'Edit Channel' : 'Add New Channel'; ?></h1>
            <form method="post">
                <?php wp_nonce_field('save_channel', 'spc_channel_nonce'); ?>
                <input type="hidden" name="channel_id" value="<?php echo esc_attr($id); ?>">
                <table class="form-table">
                    <tr>
                        <th><label for="channel_name">Channel Name</label></th>
                        <td><input type="text" name="channel_name" id="channel_name" class="regular-text" value="<?php echo esc_attr($channel['name']); ?>" required></td>
                    </tr>
                    <tr>
                        <th><label for="system_id">System ID</label></th>
                        <td><input type="text" name="system_id" id="system_id" class="regular-text" value="<?php echo esc_attr($channel['system_id']); ?>" required></td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="Save Channel">
                    <a href="<?php echo admin_url('admin.php?page=spc-settings'); ?>" class="button-secondary">Cancel</a>
                </p>
            </form>
        </div>
        <?php
    }
    

    public static function get_channels() {
        return get_option(self::OPTION_KEY, []);
    }

    public static function get_channel($id) {
        $channels = self::get_channels();
        return $channels[$id] ?? null;
    }

    public static function save_channel($id, $data) {
        $channels = self::get_channels();
        $channels[$id] = $data;
        update_option(self::OPTION_KEY, $channels);
    }

    public static function delete_channel($id) {
        $channels = self::get_channels();
        unset($channels[$id]);
        update_option(self::OPTION_KEY, $channels);
    }
}
