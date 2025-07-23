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
 * Plugin URI:        https://wordpress.org/plugins/turbopress/
 * Description:       Multilingual and multisite compatible WordPress plugin that provides a set of tools and features to enhance the functionality of any website. Make it better, faster and safer. It's free and always will be.
 * Version:           1.0.2
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

require_once __DIR__ . '/vendor/autoload.php';

(new \TurboPress\TurboPress)->init();
