<?php

/**
 * Plugin Name
 *
 * @package           WordPressPlugin
 * @author            Harkály Gergő
 * @copyright         2025 Harkály Gergő
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       TurboPress
 * Plugin URI:        https://wordpress.org/plugins/wp-turbo/
 * Description:       Multi-langual and multisite compatible plugin to make WordPress better, faster, safer. Feel free to use.
 * Version:           1.0.1
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            Harkály Gergő
 * Author URI:        https://www.harkalygergo.hu
 * Text Domain:       turbo-press
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://wordpress.org/plugins/wp-turbo/
 */

defined( 'ABSPATH' ) || exit;

class WPTurbo
{
    private string $pluginName = 'TurboPress';

    public function __construct() {
        // Initialize the plugin
        add_action( 'init', [ $this, 'init' ] );
    }

    public function init() {
        // Add admin menu item
        add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
    }

    public function add_admin_menu() {
        add_menu_page(
            $this->pluginName,
            $this->pluginName,
            'manage_options',
            'wp-turbo',
            [ $this, 'options_page' ],
            'dashicons-superhero',
            0
        );
    }

    public function options_page() {
        echo '<h1>'.$this->pluginName.' | WP Turbo | turboWP | TurboWP | WPTurbo Options</h1>';
        echo '<p>Welcome to the WPTurbo options page!</p>';
    }
}
new WPTurbo();

