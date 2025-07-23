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
 * Plugin Name:       WP Turbo
 * Plugin URI:        https://wordpress.org/plugins/wp-turbo/
 * Description:       Multi-langual and multisite compatible plugin to make WordPress better, faster, safer. Feel free to use.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            Harkály Gergő
 * Author URI:        https://www.harkalygergo.hu
 * Text Domain:       wp-turbo
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://wordpress.org/plugins/wp-turbo/
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WP Turbo',
        'WP Turbo',
        'manage_options',
        'wp-turbo',
        'wp_turbo_options_page',
        'dashicons-admin-generic',
        0
    );
}

function wp_turbo_options_page()
{
    echo 'teszt';
}

